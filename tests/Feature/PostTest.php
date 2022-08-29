<?php

namespace Tests\Feature;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
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
    public function test_user_can_post()
    {
        factory(Website::class)->create();
        $data = [
            "content" => "This is a test",
            "website_id" => 1
        ];
        $response = $this->post('api/post',$data);
        $response->assertStatus(200);
        $responseBody= $response->decodeResponseJson();
        $this->assertNotEmpty($responseBody);
    }
}
