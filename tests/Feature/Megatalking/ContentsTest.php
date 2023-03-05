<?php

namespace Tests\Feature\Megatalking;

use App\Models\Megatalking\MegatalkingUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ContentsTest extends TestCase
{

    public function testContentCreate()
    {
        Sanctum::actingAs(MegatalkingUser::factory()->create(), ['data:*']);
        $response = $this->post('/api/megatalking/videomaterial/contents', [
            'video_id' => '1',
            'type' => 'basic',
            'start_time' => '1.14',
            'end_time' => '1.14',
            'sentence' => 'this is a sentence',
            'translation' => 'this is a translation'
        ]);

        $response->assertOk(200);
    }

    public function testGetAllContents()
    {
        Sanctum::actingAs(MegatalkingUser::factory()->create(), ['data:*']);
        $response = $this->get('/api/megatalking/videomaterial/contents');
        $response->assertStatus(200);
    }

    public function testShowContent()
    {
        Sanctum::actingAs(MegatalkingUser::factory()->create(), ['data:*']);
        $response = $this->get('/api/megatalking/videomaterial/contents/1');
        $response->assertStatus(200);
    }

    public function testUpdateContent() {
        Sanctum::actingAs(MegatalkingUser::factory()->create(), ['data:*']);
        $response = $this->patch('/api/megatalking/videomaterial/contents/3', [
            'video_id' => '1',
            'type' => 'basic',
            'start_time' => '1.14',
            'end_time' => '1.14',
            'sentence' => 'this is a sentence',
            'translation' => 'this is a translation'
        ]);

        $response->assertStatus(200);
    }
}
