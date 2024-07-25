<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function createMenu(Request $req)
    {
        $validated_data = $req->validate([
            "restaurant_id" => "required|exists:restaurants,id|numeric",
            "category" => "required|string|max:255"
        ]);
        $menu = Menu::create($validated_data);
        return response()->json([
            "menu" => $menu
        ], 201);
    }
    public function readMenu($id)
    {
        $menu = Menu::find($id);
        return response()->json([
            "menu" => $menu
        ], 200);
    }
    public function readAll()
    {
        $menus = Menu::all();
        return response()->json([
            "menu" => $menus
        ], 200);
    }
    public function updateMenu(Request $req, $id)
    {
        $menu = Menu::find($id);

        if ($menu) {
            $validated_data = $req->validate([
                "restaurant_id" => "required|exists:restaurants,id|numeric",
                "category" => "required|string|max:255"
            ]);
            $menu->update($validated_data);
        }
        return response()->json([
            "message" => "updated successfully"
        ], 204);
    }

    public function deleteMenu($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return response()->json([
            "message" => "deleted successfully"
        ], 204);
    }

    public function menuRestaurant($id)
    {
        // $menu = Menu::find($id);

        // $restaurant_id = $menu->restaurant_id;

        // $restaurant = Restaurant::find($restaurant_id);

        // $menu = Menu::join("restaurants", "restaurants.id", '=', 'menus.restaurant_id')
        // ->where("menus.id", $id)
        // ->get(['category', "name"]);
        $menu = Menu::select('category', "name")
            ->join("restaurants", "restaurants.id", '=', 'menus.restaurant_id')
            ->where("menus.id", $id)
            ->get();
        return response()->json([
            "menu" => $menu
        ]);
    }
    public function createReview($id)
    {
        $review = Review::create([
            "restaurant_id" => $id,
            "user_id" => Auth::id()
        ]);
    }
}
