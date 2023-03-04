<?php

namespace Tests\Feature\Megatalking;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentsTest extends TestCase
{
   
    private $headers = [
        'Authorization' => 'Bearer 1|Mx2t0UMeG6pFTxe7fcYjLYnd00CAkolkhjh8vubD'
    ];

    public function testContentCreate()
    {
        $response = $this->withHeaders($this->headers)->post('/api/megatalking/videomaterial/contents', [
            'video_id' => '1',
            'type' => 'basic',
            'start_time' => '1.14',
            'end_time' => '1.14',
            'sentence' => 'this is a sentence',
            'translation' => 'this is a translation'
        ]);

        $response->assertStatus(200);
    }

    public function testGetAllContents()
    {
        $response = $this->withHeaders($this->headers)->get('/api/megatalking/videomaterial/contents');
        $response->assertStatus(200);
    }

    public function testShowContent()
    {
        $response = $this->withHeaders($this->headers)->get('/api/megatalking/videomaterial/contents/1');
        $response->assertStatus(200);
    }

    public function testUpdateContent() {
        $response = $this->withHeaders($this->headers)->patch('/api/megatalking/videomaterial/contents/3', [
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
