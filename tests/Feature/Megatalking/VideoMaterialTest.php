<?php

namespace Tests\Feature\Megatalking;

use App\Models\Megatalking\MegatalkingUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class VideoMaterialTest extends TestCase
{
    public function testCoursesCreate()
    {
        Sanctum::actingAs(MegatalkingUser::factory()->create(), ['data:*']);
        $response = $this->post('/api/megatalking/courses', [
            'title' => 'Test Title',
            'type' => 'webbooks'
        ]);

        $response->assertStatus(200);
    }

    public function testGetAllCourses()
    {
        Sanctum::actingAs(MegatalkingUser::factory()->create(), ['data:*']);
        $response = $this->get('/api/megatalking/courses');
        $response->assertStatus(200);
    }

    public function testUpdateCourse() {
        Sanctum::actingAs(MegatalkingUser::factory()->create(), ['data:*']);
        $response = $this->patch('/api/megatalking/courses/1', [
            'title' => 'Test Title',
            'type' => 'webbooks'
        ]);

        $response->assertStatus(200);
    }
}
