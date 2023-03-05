<?php

namespace Tests\Feature\Megatalking;

use App\Models\Megatalking\MegatalkingUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TipsTest extends TestCase
{
    public function testTipsCreate()
    {
        Sanctum::actingAs(MegatalkingUser::factory()->create(), ['data:*']);
        $response = $this->post('/api/megatalking/videomaterial/tips', [
            'content_id' => '3',
            'text' => 'this is a sample tip'
        ]);

        $response->assertStatus(200);
    }

    public function testGetAllTips()
    {
        Sanctum::actingAs(MegatalkingUser::factory()->create(), ['data:*']);
        $response = $this->get('/api/megatalking/videomaterial/tips');
        $response->assertStatus(200);
    }

    public function testUpdateTip() {
        Sanctum::actingAs(MegatalkingUser::factory()->create(), ['data:*']);
        $response = $this->patch('/api/megatalking/videomaterial/tips/3', [
            'content_id' => '3',
            'text' => 'this is a sample tip'
        ]);

        $response->assertStatus(200);
    }
}
