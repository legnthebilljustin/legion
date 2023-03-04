<?php

namespace App\Http\Controllers\Megatalking;

use App\Http\Controllers\Controller;
use App\Http\Requests\Megatalking\MaterialRequest;
use App\Models\Megatalking\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index() {
        $courses = Course::all()->groupBy('type');
        return $courses;
    }

    public function store(MaterialRequest $request) 
    {
        $validated = $request->safe()->only(['title']);

        Course::create([
            'title' => $validated['title'],
            'type' => $request['type']
        ]);

        return response()->success('', 'Course created.');
    }

    public function show($id) {
        // Course::findOrFail($id);

    }

    public function update(MaterialRequest $request, $id) {
        $validated = $request->safe()->only(['title']);

        $course = Course::findOrFail($id);
        $course->title = $validated['title'];
        $course->type = $request['type'];
        $course->save();

        return response()->success('', "Course $course->title have  been updated.");
    }

    public function destroy(Request $request, $id) {
        if ($request->user()->tokenCan('data:delete')) {
            Course::destroy($id);

            return response()->success('', "Course have been deleted.");
        }
        else {
            return response()->error('You are not authorized to make that request.', 405);
        }
    }
}
