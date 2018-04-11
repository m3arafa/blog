<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
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
        $user = Auth::user();


        $data = [
            'post_id' => $request->post_id,
            'user_id' => $user->id,
            'body' => $request->body,
            'photo' => $user->photo->path
        ];

        Comment::create($data);

        $request->session()->flash('comment_message', 'Your Comment has been submitted.');

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
        $comment = Comment::find($id);

        return view('comments.edit', compact('comment'));
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

        $comment = Comment::find($id);
        $user = User::find($comment->user_id);
        $post_id = $comment->post_id;

        $data = [
            'user_id' => $user->id,
            'comment_id' => $comment->id,
            'body' => $request->body,
            'photo' => $user->photo->path
        ];

        $user->comments()->whereId($id)->first()->update($data);

        $path = "post/" . $post_id;

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
        $comment = Comment::find($id);
        $user = User::find($comment->user_id);

        $user->comments()->whereId($id)->delete();

        $path = "post/" . $comment->post_id;

        return redirect($path);
    }
}
