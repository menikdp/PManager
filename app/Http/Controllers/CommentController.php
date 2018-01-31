<?php

namespace App\Http\Controllers;

use App\Http\Models\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //save data
        if (Auth::check()) {
            $comment = Comment::create([
                'body' => $request->input('body'),
                'url' => $request->input('url'),
                'commentable_id' => $request->input('commentable_id'),
                'commentable_type' => $request->input('commentable_type'),
                'user_id' => Auth::user()->id
            ]);
            
            //if sucecess, sent flash and redirect to company page
            if ($comment) {
                return back()->with('success', 'Comment added successfully');
            }  
        }

        return back()->withInput()->with('error', 'Error creating comment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
