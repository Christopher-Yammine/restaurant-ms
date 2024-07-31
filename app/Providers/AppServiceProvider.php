<?php

namespace App\Providers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::created(function ($user) {
            Notification::insert([
                "name" => $user->name,
                "email" => $user->email,
                "created_at" => now(),
                "updated_at" => now()
            ]);
        });
    }
}
