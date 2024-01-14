<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\Review;
use App\Models\ServiceSubServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
