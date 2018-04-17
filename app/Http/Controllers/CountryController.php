<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return View::make('countries.index')
                      ->with('countries',$countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('countries.create');
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
        return Redirect::to('countries/create')
        ->withErrors($validator)
        ->withInput(Input::except('password'));
      } else {
        $country = new Country;
        $country->id = Input::get('id');
        $country->name = Input::get('name');
        $country->created_at = Carbon::now();
        $country->updated_at = Carbon::now();
        $country->save();
        // redirect
        Session::flash('message', 'Successfully created country!');
        return Redirect::to('countries');
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
      $country = Country::find($id);
      return View::make('countries.show')
                  ->with('country', $country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);
        return View::make('countries.edit')
                    ->with('country', $country);
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
        return Redirect::to('countries/'. $id . '/edit')
        ->withErrors($validator)
        ->withInput(Input::except('password'));
      } else {
        $country = Country::find($id);
        $country->id = Input::get('id');
        $country->name = Input::get('name');
        $country->updated_at = Carbon::now();
        $country->save();
        // redirect
        Session::flash('message', 'Successfully updated country!');
        return Redirect::to('countries');
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
        $country = Country::find($id);
        $country->delete();

        Session::flash('message', 'Successfully deleted the country!!!');
        return Redirect::to('countries');
    }
}
