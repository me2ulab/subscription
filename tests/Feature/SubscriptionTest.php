<?php

namespace Tests\Feature;

use App\Models\Plan;
use App\Models\Website;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_user_can_subscribe()
    {
        factory(Website::class)->create();
        factory(User::class)->create();
        factory(Plan::class)->create();


        $data = [
            "user_id" => 1,
            "website_id" => 1,
            "plan_id" => 1
        ];
        $response = $this->post('api/post',$data);
        $response->assertStatus(200);
        $responseBody= $response->decodeResponseJson();
        $this->assertNotEmpty($responseBody);
    }
}
