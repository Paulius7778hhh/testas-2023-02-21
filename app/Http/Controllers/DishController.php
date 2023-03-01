<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restaurant;
use App\Services\Rate;
use Illuminate\Http\Request;



class DishController extends Controller
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
        $restaurants = Restaurant::all();
        $title = 'Add dish';
        return view('back.plusdish', [
            'title' => $title,
            'restaurants' => $restaurants,
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
        $dish = new Dish;
        $dish->title = $request->title;
        $dish->restaurants_id = $request->restaurants_id;
        if ($request->file('picture')) {
            $picture = $request->file('picture');
            $ext = $picture->getClientOriginalExtension();

            $name = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            $picture->move(public_path() . '/dishpics/', $file);
            //$picture->move(public_path() . '/pictures/' . $file);
            $dish->picture = '/dishpics/' . $file;
        }
        $dish->price = $request->price;

        $dish->save();

        return redirect()->route('backend-rlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish, Restaurant $restaurant)
    {
        $title = 'Menu';
        $dish = Dish::all();
        return view('back.restaurantmenu', ['dishes' => $dish, 'title' => $title, 'restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $restaurants = Restaurant::all();
        $title = 'edit dish';
        return view('back.edit-dish', [
            'title' => $title,
            'restaurants' => $restaurants,
            'dish' => $dish,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $dish->title = $request->edit_title;
        $dish->restaurants_id = $request->edit_restaurants_id;
        if ($request->file('edit_picture')) {
            $picture = $request->file('edit_picture');
            $ext = $picture->getClientOriginalExtension();

            $name = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            if (isset($dish->picture)) {
                $dish->nopic();
            }
            if (isset($dish->picture)) {
                $dish->picture = null;
            }
            $picture->move(public_path() . '/dishpics/', $file);
            //$picture->move(public_path() . '/pictures/' . $file);
            $dish->edit_picture = '/dishpics/' . $file;
        }
        $dish->price = $request->edit_price;

        $dish->save();

        return redirect()->route('backend-rlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {

        $dish->delete();
        return redirect()->back();
    }
    public function submition(Request $request, Dish $dish)
    {

        $ids = $request->ids;
        $rating = $request->rating;
        $addrating = array_combine((array)$ids ?? [], (array)$rating ?? []);
        $dish->rating[] += $addrating;
        $dish->save();
        return redirect()->back();
    }
}
