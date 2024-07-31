<?php

namespace Tests\Unit;

use App\Models\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotificationModelTest extends TestCase
{

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $notification = Notification::create([
            "name" => "test name",
            "email" => 'yhahn@example.net',
        ]);

        $this->assertInstanceOf(Notification::class, $notification);
        $this->assertEquals('test name', $notification->name);
        $this->assertEquals('yhahn@example.net', $notification->email);
    }
}
