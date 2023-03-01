<?php

namespace Tests\Feature\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function test_login() {
        $response = $this->post('/api/login', [
            'name' => 'hello2',
            'password' => 12345678
        ]);

        $response->assertOk();
    }
}
