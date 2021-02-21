<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/mypage');
        $response->assertStatus(302);

        $response = $this->get('/post-idea');
        $response->assertStatus(302);

        $response = $this->get('/post-idea/1/edit');
        $response->assertStatus(302);

        // $response = $this->get('/post-idea/buy/1');
        // $response->assertStatus(302);

        // $response = $this->get('/post-idea/post-review/1');
        // $response->assertStatus(302);

        $response = $this->get('/myideas-list');
        $response->assertStatus(302);

        $response = $this->get('/interests-list');
        $response->assertStatus(302);

        $response = $this->get('/profile');
        $response->assertStatus(302);

    }
}
