<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationInsertTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('/api/notifications/', [
            "name" => "random",
            "email" => "predovic.joanny@example.com",
            "created_at" => now(),
            "updated_at" => now()

        ]);

        $response->assertStatus(201);
        $response->assertJson([
            "message" => "created"
        ]);
    }
}
