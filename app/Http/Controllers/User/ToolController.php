<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\ToolHiring;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToolController extends Controller
{
    /**
     * @param Tool $tool
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Tool $tool)
    {
        $tool->load('comments', 'comments.replies', 'reviews', 'services', 'services.subServices');
        $isLiked = Auth::user()->likedTools()->where('tool_id', $tool->id)->first() ? true : false;
        $isReviewed = Auth::user()->reviewedTools()->where('tool_id', $tool->id)->first() ? true : false;


        return view('user.tool.detail', compact('tool', 'isLiked', 'isReviewed'));
    }

    public function hireTool(Request $request)
    {
        $startDateString = $request->start_date;
        $endDateString = $request->end_date;

        $startDateStringWithoutTimezone = preg_replace('/\s\(.*\)$/', '', $startDateString);
        $endDateStringWithoutTimezone = preg_replace('/\s\(.*\)$/', '', $endDateString);

        try {
            ToolHiring::create(
                [
                    'user_id' => Auth::user()->id,
                    'tool_id' => $request->tool_id,
                    "type" => $request->type,
                    "duration" => $request->duration,
                    'start_date' => Carbon::parse($startDateStringWithoutTimezone)->toDateTimeString(),
                    'end_date' => Carbon::parse($endDateStringWithoutTimezone)->toDateTimeString(),
                    "total_price" => $request->total_price,
                    "Hiring_price" => $request->Hiring_price,
                ]);

            return redirect(route('user.hired.tools'));
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Tool hired successfully',
        ]);
    }

    public function hiredTools()
    {
        $hiredTools = Auth::user()->hiredTools()->get();

        return view('user.hired-tools', compact('hiredTools'));
    }

    public function hireNewTool($id)
    {
        $tool = Tool::find($id);

        return view('user.tool.hire-new-tool', compact('tool'));
    }
}
