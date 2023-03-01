<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');
        // $response = $this->post('/api/login');

        # test json
        // $response = $this->postJson('/api/register', [ 'name' => 'uniquename3', 'password' => 12345678 ]);
        $response->assertStatus(200);
    }
    
}
