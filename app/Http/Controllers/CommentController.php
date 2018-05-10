<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments  = Comment::all();
        return View::make('comments.index')->with('comments', $comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
          'content' => 'required',
          'post_id' => 'required',
          'user_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
          return Redirect::to('comments/create')
          ->withErrors($validator)
          ->withInput(Input::except('password'));
        } else {
          $comment = new Comment;
          $comment->content = Input::get('content');
          $comment->created_at = Carbon::now();
          $comment->updated_at = Carbon::now();
          $comment->post_id = Input::get('post_id');
          $comment->user_id = Input::get('user_id');
          $comment->save();
          // redirect
          Session::flash('message', 'Successfully created comment!');
          return Redirect::to('comments');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return View::make('comments.show')
                      ->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return View::make('comments.edit')
                    ->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $rules = array(
        'content' => 'required',
        'post_id' => 'required',
        'user_id' => 'required',
      );

      $validator = Validator::make(Input::all(), $rules);
      if ($validator->fails()) {
        return Redirect::to('comments/'. $id . '/edit')
        ->withErrors($validator)
        ->withInput(Input::except('password'));
      } else {
        $comment = Comment::find($id);
        $comment->content = Input::get('content');
        $comment->updated_at = Carbon::now();
        $comment->post_id = Input::get('post_id');
        $comment->user_id = Input::get('user_id');
        $comment->save();
        // redirect
        Session::flash('message', 'Successfully updated comment!');
        return Redirect::to('comments');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        Session::flash('message', 'Successfully deleted the comment');
        return Redirect::to('comments');
    }
}
