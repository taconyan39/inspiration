<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Idea;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function testLogin()
    // {
    //     $this->assertTrue(true);

    //     $user = 'title';
    //     // $this->assertEmpty($user);
    //     $this->assertEquals('title',$user);

    //     $msg = "Hello";
    //     $this->assertEquals('Hello', $msg);

    //     $n = random_int(0, 100);
    //     $this->assertLessThan(100, $n);
    // }

    public function testLogin(){

        // $this->assertTrue(true);

        // $response = $this->get('/');
        // $response->assertStatus(200);

        // $idea = Idea::find(999);
        // $this->assertNull($idea);

        $response = $this->get('/idea/999');
        $response->assertStatus(404);

        // $user = factory(User::class)->create();
        // $response = $this->actingAs($user)->get('/mypage');
        // $response->assertStatus(200);
    }
}
