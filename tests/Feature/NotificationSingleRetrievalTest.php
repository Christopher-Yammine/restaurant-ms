<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationSingleRetrievalTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/api/notifications/2');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "notification" => [
                "id",
                "name",
                "created_at",
                "updated_at"
            ]
        ]);
    }
}
