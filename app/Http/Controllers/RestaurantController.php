<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function getAllRestaurants()
    {
        $restaurants = Restaurant::all();
        // $restaurants2 = Restaurant::get();
        return response()->json([
            "restaurants" => $restaurants->load(['hasReviews', 'hasMenus'])
        ], 200);
    }
    public function getRestaurant($id)
    {
        $restaurant = Restaurant::with(['hasReviews', 'hasMenus'])->find($id);
        // $restaurant2 = Restaurant::where('id', $id)->first();
        // $restaurant3 = Restaurant::where('id', $id)->get()[0];
        return response()->json([
            "restaurant" => $restaurant
        ]);
    }
    public function createRestaurant(Request $req)
    {
        //for the create method you need to add the attributes
        //inside the $fillable array in the model Restaurant
        // $restaurant = Restaurant::create([
        //     'name' => $req->name,
        //     'location' => $req->location

        // ]);
        // $restaurant2 = Restaurant::insert([
        //     'name' => $req->name,
        //     'location' => $req->location
        // ]);
        $restaurant = new Restaurant;
        $restaurant->name = $req->name;
        $restaurant->location = $req->location;
        $restaurant->save();

        return response()->json([
            "restaurant" => $restaurant,
            "message" => 'created successfully'
        ], 201);
    }
    public function updateRestaurant(Request $req, $id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->name = $req->name;
        $restaurant->location = $req->location;
        $restaurant->save();

        $restaurant::update([
            'name' => $req->name,
            'location' => $req->location
        ]);
    }
    public function deleteRestaurant($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return response()->json(null, 204);
    }
    public function restaurantMenus($id)
    {
        $restaurant2 = Restaurant::with('hasMenus')->where('id', $id)->get();
        $restaurant = Restaurant::join('menus', 'menus.restaurant_id', '=', 'restaurants.id')
            ->where('restaurants.id', $id)
            ->get();
        return response()->json([
            "restaurant" => $restaurant,
            "restaurant2" => $restaurant2
        ]);
    }
}
