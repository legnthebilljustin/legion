<?php

namespace Tests\Feature\Megatalking;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TipsTest extends TestCase
{
    private $headers = [
        'Authorization' => 'Bearer 2|oNaVPqEXjTm0AWca1EgpvNBAEnfFWTalR0V5xrmU'
    ];

    public function testTipsCreate()
    {
        $response = $this->withHeaders($this->headers)->post('/api/megatalking/videomaterial/tips', [
            'content_id' => '3',
            'text' => 'this is a sample tip'
        ]);

        $response->assertStatus(200);
    }

    public function testGetAllTips()
    {
        $response = $this->withHeaders($this->headers)->get('/api/megatalking/videomaterial/tips');
        $response->assertStatus(200);
    }

    public function testUpdateTip() {
        $response = $this->withHeaders($this->headers)->patch('/api/megatalking/videomaterial/tips/3', [
            'content_id' => '3',
            'text' => 'this is a sample tip'
        ]);

        $response->assertStatus(200);
    }
}
