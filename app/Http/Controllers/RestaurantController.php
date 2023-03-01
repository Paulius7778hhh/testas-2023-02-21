<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\City;
use Illuminate\Http\Request;



class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Restaurant list';
        $cities = City::all()->sortBy('title');
        $restaurantlist = Restaurant::all()->sortBy('title');
        return view('back.rlist', [
            'title' => $title,
            'cities' => $cities,
            'restaurantlist' => $restaurantlist,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $title = 'Add Restaurant';
        return view('back.addrestaurant', [
            'title' => $title,
            'cities' => $cities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;
        $restaurant->title = $request->title;
        $restaurant->address = $request->address;
        $restaurant->work_start = $request->work_start;
        $restaurant->work_end = $request->work_end;
        $restaurant->city_id = $request->city_id;
        $restaurant->save();

        return redirect()->route('backend-rlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $title = 'Edit Restaurant';
        $cities = City::all();
        return view('back.edit-restaurant', ['title' => $title, 'restaurant' => $restaurant, 'cities' => $cities,]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->title = $request->edit_title;
        $restaurant->city_id = $request->edit_city_id;
        $restaurant->address = $request->edit_address;
        $restaurant->work_start = $request->edit_work_start;
        $restaurant->work_end = $request->edit_work_end;
        $restaurant->save();
        return redirect()->route('backend-rlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if (!$restaurant->dishes()->count()) {
            $restaurant->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors('Restaurant still working,can`t delete working restaurant');
        }
    }
}
