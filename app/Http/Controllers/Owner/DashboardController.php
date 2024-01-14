<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateToolRequest;
use App\Models\Tool;
use App\Models\ToolComment;
use App\Models\Role;
use App\Models\ServiceSubServices;
use App\Models\ToolPricing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $tools = Tool::where('status', 'Approved')->where('is_enable', true)
            ->orderBy('total_rating', 'desc')->orWhere('owner_id', Auth::user()->id)->get();
        $role = Role::where('name', 'owner')->first();
        $owners = User::where('role_id', $role->id)->get();

        return view('owner.dashboard', compact('tools', 'owners'));
    }

    public function searchTool(Request $request)
    {
        $q = Tool::query();
        if ($request->has('search') && $request->filled('search')) {
            $q->where(function ($query) use ($request) {
                $query->where('type', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('address', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('post_code', 'LIKE', '%' . $request->search . '%');

            });
        }
        $tools = $q
            ->where('is_enable', true)
            ->orderBy('total_rating', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'view' => view('owner.tool-table', compact('tools'))->render(),
        ]);
    }


    public function storeServices(Request $request)
    {
        $tool = Tool::find($request->tool_id);

        $service = $tool->services()->create([
            'type' => $request->service
        ]);
        foreach ($request->subServices as $subService) {
            $service->subServices()->create([
                'type' => $subService
            ]);
        }

        return redirect()->back()->with('success', 'Services Added Successfully');
    }

    public function storePricing(Request $request)
    {
        $tool = Tool::find($request->tool_id);

        $tool->pricings()->create([
            'time' => $request->time,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Time/Price Added Successfully');
    }

    private function data()
    {
        return [
            'type',
            'name',
            'avatar',
            'address',
            'post_code',
            'owner_id',
            'description',
            'price_per_hour'
        ];
    }

    public function storeTool(CreateToolRequest $request)
    {
//        $name = $product->image;
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/tool');
            $image->move($destinationPath, $name);
        }

        $request->request->add(['avatar' => $name, 'owner_id' => Auth::user()->id]);

        Tool::create($request->only($this->data()));

        return redirect(route('owner.dashboard'))->with('success', 'Tool Added Successfully');
    }

    public function updateTool(Request $request,$id)
    {

        $tool = Tool::find($id);
        $name = $tool->avatar;
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/tool');
            $image->move($destinationPath, $name);
        }

        $request->request->add(['avatar' => $name, 'owner_id' => Auth::user()->id]);

        $tool->update($request->only($this->data()));

        return redirect(route('owner.dashboard'))->with('success', 'Tool Updated Successfully');
    }

    public function updateToolPrice(Request $request,$id)
    {

        $toolPrice = ToolPricing::find($id);


        $toolPrice->update($request->all());

        return redirect(route('owner.get.tool.prices',$toolPrice->tool_id))->with('success', 'Price Updated Successfully');
    }

    public function editTool($id)
    {
        $tool = Tool::find($id);

        return view('owner.edit-tool',compact('tool'));
    }

    public function editToolPrice($id)
    {
        $price = ToolPricing::find($id);

        return view('owner.edit-tool-price',compact('price'));
    }
    public function toggleToolStatus($id)
    {
        $tool = Tool::find($id);
        if ($tool->is_enable) {
            $tool->is_enable = false;
        } else {
            $tool->is_enable = true;
        }

        $tool->save();

        return redirect()->back()->with('success', 'Tool Status Updated Successfully');
    }

    public function toolDetail($id)
    {
        $tool = Tool::find($id);
        $tool->load('comments', 'comments.replies', 'reviews', 'services', 'services.subServices');
        $isLiked = Auth::user()->likedTools()->where('tool_id', $tool->id)->first() ? true : false;
        $isReviewed = Auth::user()->reviewedTools()->where('tool_id', $tool->id)->first() ? true : false;

        return view('owner.tool.detail', compact('tool', 'isLiked', 'isReviewed'));
    }

 public function toolPrices($id)
    {
        $tool = Tool::find($id);
        $tool->load('pricings');

        return view('owner.tool.prices', compact('tool'));
    }

    public function review(Request $request)
    {
        $tool = Tool::find($request->tool_id);

        foreach ($request->subServices as $id => $rating) {
            $tool->reviews()->create([
                'user_id' => Auth::user()->id,
                'service_sub_service_id' => $id,
                'rating' => $rating,
            ]);
            $subService = ServiceSubServices::find($id);
            $total_rating = $subService->ratings->sum('rating');
            $total_review = $subService->ratings->count();
            $newRating = $total_rating / $total_review;
            $subService->total_rating = $newRating;
            $subService->save();
        }

        foreach ($tool->services as $service) {
            $rating = $service->subServices->sum('total_rating');
            $reviews = $service->subServices->count();
            $newRating = $rating / $reviews;
            $service->total_rating = $newRating;
            $service->save();
        }

        $rating = $tool->services->sum('total_rating');
        $reviews = $tool->services->count();
        $newRating = $rating / $reviews;
        $tool->total_rating = $newRating;
        $tool->review_count += $tool->review_count;
        $tool->save();


        return redirect()->back()->with('success', 'Tool Rated successfully');
    }


    public function comment(Request $request)
    {
        $tool = Tool::find($request->tool_id);
        if ($tool) {
            $tool->comments()->create([
                'user_id' => Auth::user()->id,
                'comment' => $request->comment,
            ]);
            $tool->comment_count += 1;
            $tool->save();
        }

        return redirect()->back()->with('success', 'Comment Added Successfully');
    }

    public function submitReply(Request $request)
    {
        $comment = ToolComment::find($request->comment_id);
        if ($comment) {
            $reply = $comment->replies()->create([
                'user_id' => Auth::user()->id,
                'comment' => $request->comment,
            ]);
            $comment->comment_replies += 1;
            $comment->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Reply saved successfully',
            'reply' => $reply->load('user'),
            'date' => Carbon::now()->diffForHumans()
        ]);
    }

    public function likeTool($id)
    {
        $tool = Tool::find($id);
        $findRecord = $tool->likes()->where('user_id', Auth::user()->id)->first();
        if ($findRecord) {
            $findRecord->delete();
            $tool->like_count -= 1;
            $message = 'Tool unliked successfully';
        } else {
            $tool->likes()->create([
                'user_id' => Auth::user()->id
            ]);
            $tool->like_count += 1;
            $message = 'Tool liked successfully';
        }
        $tool->save();

        return back()->with('success', $message);
    }

}
