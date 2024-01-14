<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Tool;
use App\Models\ToolComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
