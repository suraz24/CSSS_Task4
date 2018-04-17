<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return View::make('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('categories.create');
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
        'id' => 'required',
        'name' => 'required',
      );
      $validator = Validator::make(Input::all(), $rules);
      if ($validator->fails()) {
        return Redirect::to('categories/create')
        ->withErrors($validator)
        ->withInput(Input::except('password'));
      } else {
        $category = new Category;
        $category->id = Input::get('id');
        $category->name = Input::get('name');
        $category->created_at = Carbon::now();
        $category->updated_at = Carbon::now();
        $category->save();
        // redirect
        Session::flash('message', 'Successfully created category!');
        return Redirect::to('categories');
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
        $category = Category::find($id);
        return View::make('categories.show')
                    ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return View::make('categories.edit')
                    ->with('category', $category);
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
        'id' => 'required',
        'name' => 'required',
      );
      $validator = Validator::make(Input::all(), $rules);
      if ($validator->fails()) {
        return Redirect::to('categories/' . $id . '/edit')
        ->withErrors($validator)
        ->withInput(Input::except('password'));
      } else {
        $category =  Category::find($id);
        $category->id = Input::get('id');
        $category->name = Input::get('name');
        $category->updated_at = Carbon::now();
        $category->save();
        // redirect
        Session::flash('message', 'Successfully updated category!');
        return Redirect::to('categories');
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
        $category = Category::find($id);
        $category->delete();

        Session::flash('message', 'Successfully deleted the category!!!');
        return Redirect::to('categories');
    }
}
