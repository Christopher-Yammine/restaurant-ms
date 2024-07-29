<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::all();
        return response()->json([
            'deliveries' => $deliveries
        ], 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliveryRequest $request)
    {
        // $validated_resquest = $request->validate();
        // $validated_resquest['user_id'] = Auth::id();
        // $delivery = Delivery::create($validated_resquest);
        $delivery = Delivery::create($request->validated());
        return response()->json([
            "delivery" => $delivery
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        return response()->json([
            "delivery" => $delivery
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryRequest $request, Delivery $delivery)
    {
        $delivery->update($request->validated());
        return response()->json([
            "delivery" => $delivery
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return response()->json(null, 204);
    }
    public function findByName($name)
    {
        $delivery = Delivery::where('name', $name)->first();
        return response()->json([
            "delivery" => $delivery
        ], 200);
    }
}
