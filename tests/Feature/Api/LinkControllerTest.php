<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class LinkControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_no_token(): void
    {
        $response = $this->post(route('links.create'));

        $response->assertStatus(401);
    }

    public function test_create_invalid(): void
    {
        $response = $this->json('POST', route('links.create'), [
            'url' => $this->faker()->name(),
            'slug' => Str::random(config('links.max_slug_length')+1),
            'expires_at' => now()->addDays(random_int(1, 365))->format('Y-m-d H:i:s'),
        ], [
            'X-TOKEN' => config('api.token'),
        ]);

        $response->assertStatus(422);
    }

    public function test_create_valid(): void
    {
        $response = $this->json('POST', route('links.create'), [
            'url' => $this->faker()->url(),
            'slug' => Str::random(config('links.max_slug_length')),
            'expires_at' => $this->faker()->randomElement([null, now()->addDays(random_int(1, 365))->format('d.m.Y H:i')]),
        ], [
            'X-TOKEN' => config('api.token'),
        ]);

        $response->assertStatus(200);
    }
}
