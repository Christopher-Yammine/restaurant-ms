<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::all();
        return response()->json([
            "notifications" => $notifications
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificationRequest $request)
    {
        $notification = Notification::create($request->validated());
        return response()->json([
            "message" => "created"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        return response()->json(["notification" => $notification]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification->update($request->validated());
        return response()->json([
            "notifications" => $notification
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();
        return response()->json([
            null
        ], 204);
    }
}
