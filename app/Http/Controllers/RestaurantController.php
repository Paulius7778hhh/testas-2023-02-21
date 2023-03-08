<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



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
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|alpha:ascii|min:3|max:30',
                'address' => 'required|alpha:ascii|min:3|max:30',
                //'username_post' => 'unique:accountlists,username',
                'work_start' => 'required|integer|unique:accountlists,idnumber|regex:/^([3-6]{1})([0-9]{2})([0-1]{1})([0-9]{1})([0-3]{1})([0-9]{1})([0-9999]{4})$/',
                'work_end' => 'required|unique:accountlists,accountid|min:24|max:24|regex:/^LT([0-9]{2}) 7300 0([0-9]{3}) ([0-9]{4}) ([0-9]{4})$/',
                'city_id' => 'required',
                'password_post' => 'required|min:8|max:30',
            ],
            [
                'title_post.required' => 'Fill out name field',
                'title_post.alpha' => 'Name field can be enter only alphabetic letters',
                'title_post.min' => 'Name field input too short ',
                'title_post.max' => 'Name field input too long ',
                'surname_post.required' => 'Fill out surname field',
                'surname_post.alpha' => 'Surname field can be enter only alphabetic letters',
                'surname_post.min' => 'Surname field input too short',
                'surname_post.max' => 'Surname field input too long',
                'idnumber_post.required' => 'Fill out Id number field',
                'idnumber_post.integer' => 'Id number input must be an integer.',
                'idnumber_post.unique' => 'This Id number already exsist',
                'idnumber_post.regex' => 'The Id number format is invalid',
                'email_post.required' => 'Fill email field',
                'email_post.email' => 'Must be valid email address',
                'email_post.unique' => 'There is already an email address',
                'accountid_post.required' => 'Can`touch this IBAN',
                'accountid_post.unique' => 'Can`touch this IBAN',
                'accountid_post.min' => 'Can`touch this IBAN',
                'accountid_post.max' => 'Can`touch this IBAN',
                'accountid_post.regex' => 'Don`t touch this IBAN ya bastard',
                'password_post.required' => 'Enter password',
                'password_post.min' => 'Password too short',
                'password_post.max' => 'Password too long'
            ]

        );
        $request->flash();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
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
