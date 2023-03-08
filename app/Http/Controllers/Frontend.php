<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\City;
use App\Models\Dish;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Frontend extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user()->name;
        $title = "Welcome " . $user;
        return view('front.index', ['title' => $title]);
    }
    public function show(Request $request)
    {



        if ($request->cityid && $request->cityid != 'all') {
            $restaurant = Restaurant::where('city_id', $request->cityid);
        } else {
            $restaurant = Restaurant::where('id', '>', 0);
        }
        if ($request->cityid && $request->cityid == 'default') {
            $restaurant = Restaurant::where('id', '>', 0);
        }
        $restaurant = match ($request->sort ?? '') {
            'front-n' => $restaurant->orderBy('title'),
            'back-n' => $restaurant->orderBy('title', 'desc'),
            default => $restaurant,
        };
        // $restaurant = match ($request->sort ?? '') {
        //     'front-n' => Restaurant::orderBy('title'),
        //     'back-n' => Restaurant::orderBy('title', 'desc'),
        //     default => Restaurant::orderBy('city_id'),
        // };
        $perpageShow = in_array($request->per_page, Restaurant::PER_PAGE) ? $request->per_page : 'all';
        if ($perpageShow == 'all') {
            $restaurant = $restaurant->get();
        } else {
            $restaurant = $restaurant->paginate($perpageShow)->withQueryString();
        }


        $dish = Dish::all()->sortBy('price');
        $city = City::all()->sortBy('title');
        //$city = $bcity->sortBy($bcity->map(fn (City $city) => $city->restaurants()->count()));
        $title = 'Restaurants list';
        return view('front.front-rlist', [
            'sortSelect' => Restaurant::SORT,
            'perpageSelect' => Restaurant::PER_PAGE,
            'perpageShow' => $perpageShow,
            'cityShow' => $request->cityid ? $request->cityid : '',
            'sortShow' => isset(Restaurant::SORT[$request->sort]) ? $request->sort : '',
            'title' => $title,
            'restaurant' => $restaurant,
            'city' => $city,
            'dish' => $dish,
        ]);
    }
    public function menu(Dish $dish, Restaurant $restaurant, User $user)
    {
        //$user->id = Auth::user()->id;
        $title = 'Menu';
        $dish = Dish::all();
        return view('front.restaurantmenu', [
            'dishes' => $dish,
            'title' => $title,
            'restaurant' => $restaurant,
            'user' => $user->id,
        ]);
    }
}
