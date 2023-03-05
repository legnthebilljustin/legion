<?php

namespace Tests\Feature\Megatalking;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VideoMaterialTest extends TestCase
{
    private $headers = [
        'Authorization' => 'Bearer 2|oNaVPqEXjTm0AWca1EgpvNBAEnfFWTalR0V5xrmU'
    ];

    public function testCoursesCreate()
    {
        $response = $this->withHeaders($this->headers)->post('/api/megatalking/courses', [
            'title' => 'Test Title',
            'type' => 'webbooks'
        ]);

        $response->assertStatus(200);
    }

    public function testGetAllCourses()
    {
        $response = $this->withHeaders($this->headers)->get('/api/megatalking/courses');
        $response->assertStatus(200);
    }

    public function testUpdateCourse() {
        $response = $this->withHeaders($this->headers)->patch('/api/megatalking/courses/1', [
            'title' => 'Test Title',
            'type' => 'webbooks'
        ]);

        $response->assertStatus(200);
    }
}
