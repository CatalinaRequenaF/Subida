<?php

namespace Tests\Feature;

use App\Models\Community;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CommunityTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_can_update_communities(){

        Sanctum::actingAs(
            User::factory()->create(),['*']
        );

        $comunidad=Community::factory()->create();
        $data=[

            "title" => "update-title-test",
            "body"  => "update-body-test"
        ];

        $response = $this->patchJson(route('communities.update',$comunidad),$data,
        ['Content-Type' => 'application/vnd.api+json']);


        $response->assertStatus(200);

    }
}
