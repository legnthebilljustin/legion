<?php

namespace App\Http\Controllers\Megatalking;

use App\Http\Controllers\Controller;
use App\Http\Requests\Megatalking\MaterialRequest;
use App\Models\Megatalking\Course;

class CoursesController extends Controller
{
    public function index() {
        $courses = Course::all()->groupBy('type');
        return $courses;
    }

    public function store(MaterialRequest $request) 
    {
        $validated = $request->safe()->only(['title', 'type']);

        Course::create([
            'title' => $validated['title'],
            'type' => $validated['type']
        ]);

        return response()->success('', 'Course created.');
    }

    public function show($id) {
        Course::findOrFail($id);

    }

    public function update(MaterialRequest $request, $id) {
        $validated = $request->safe()->only(['title', 'type']);

        $course = Course::findOrFail($id);
        $course->title = $validated['title'];
        $course->type = $validated['type'];
        $course->save();

        return response()->success('', "Course $course->title have  been updated.");
    }

    public function delete($id) {
        $course = Course::findOrFail($id);
        Course::destroy($id);

        return response()->success('', "$course->title have been deleted.");
    }
}
