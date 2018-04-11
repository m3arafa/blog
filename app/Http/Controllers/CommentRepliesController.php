<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentRepliesController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = Auth::user();

        $data = [
            'user_id' => $user->id,
            'comment_id' => $request->comment_id,
            'body' => $request->body,
            'photo' => $user->photo->path
        ];

        CommentReply::create($data);

        $request->session()->flash('reply_message', 'your Reply has been submitted');

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $reply = CommentReply::find($id);

        return view('replies.edit', compact('reply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $reply = CommentReply::find($id);
        $comment = Comment::find($reply->comment_id);
        $post = Post::find($comment->post_id);

        $data = [
            'user_id' => $reply->user_id,
            'comment_id' => $reply->comment_id,
            'photo' => $reply->photo,
            'body' => $request->body
        ];

        $user->replies()->whereId($id)->first()->update($data);


        $path = "post/" . $post->id . "/";

        return redirect($path);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = Auth::user();
        $user->replies()->whereId($id)->delete();

        return redirect()->back();
    }
}
