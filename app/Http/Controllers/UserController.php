<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return View::make('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('users.create');
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
          'id'          =>   'required',
          'name'        =>   'required',
          'email'       =>   'required',
          'password'    =>   'required',
          'country_id'  =>    'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
          return Redirect::to('users/create')
          ->withErrors($validator)
          ->withInput(Input::except('password'));
        } else {
          $user = new User;
          $user->id = Input::get('id');
          $user->name = Input::get('name');
          $user->email = Input::get('email');
          $user->password = Input::get('password');
          $user->created_at = Carbon::now();
          $user->updated_at = Carbon::now();
          $user->country_id = Input::get('country_id');
          $user->save();
          // redirect
          Session::flash('message', 'Successfully created user!');
          return Redirect::to('users');
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
      $user = User::find($id);
      return View::make('users.show')-> with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return View::make('users.edit')->with('user',$user);
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
        'id'          =>   'required',
        'name'        =>   'required',
        'email'       =>   'required',
        'password'    =>   'required',
        'country_id'  =>    'required',
      );

      $validator = Validator::make(Input::all(), $rules);
      if ($validator->fails()) {
        return Redirect::to('users/create')
        ->withErrors($validator)
        ->withInput(Input::except('password'));
      } else {
        $user = User::find($id);
        $user->id = Input::get('id');
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->updated_at = Carbon::now();
        $user->country_id = Input::get('country_id');
        $user->save();
        // redirect
        Session::flash('message', 'Successfully created user!');
        return Redirect::to('users');
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
        $user = User::find($id);
        $user->delete();
        Session::flash('message', 'Successfully deleted the user!!!');
        return Redirect::to('users');
    }
}
