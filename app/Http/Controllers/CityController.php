<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;


class CityController extends Controller
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
        $title = 'Add City';
        return view('back.addcity', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = new City;
        $city->title = $request->title;
        $city->save();

        return redirect()->route('backend-rlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $title = 'Edit City';
        return view('back.edit-city', ['title' => $title, 'city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $city->title = $request->edit_title;
        $city->save();
        return redirect()->route('backend-rlist', [$city]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        if (!$city->restaurants()->count()) {
            $city->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors('This city still has active restaurants');
        }
    }
}
