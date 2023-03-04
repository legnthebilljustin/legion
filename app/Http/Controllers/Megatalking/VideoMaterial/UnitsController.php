<?php

namespace App\Http\Controllers\Megatalking\VideoMaterial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Megatalking\MaterialRequest;
use App\Models\Megatalking\Course;
use App\Models\Megatalking\VideoMaterial\UnitVideoMaterial;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('id');

        $units = Course::where('course_id', $id)->orderBy('priority', 'ASC')->get();
        return response()->success($units);
    }
 
    public function store(MaterialRequest $request)
    {
        $status = $this->checkIfCourseExist($request->course_id);
        
        if (!$status) {
            return response()->error("Course id $request->course_id does not exist in our records.", 404);
        }

        UnitVideoMaterial::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
        ]);

        return response()->success('', 'Unit created.');
    }

    public function show($id)
    {
        $unit = UnitVideoMaterial::where('id', $id)
                    ->with('video')
                    ->get();
        return response()->success('', $unit);
    }

    public function update(MaterialRequest $request, $id)
    {
        $request->safe()->only(['title']);

        $unit = UnitVideoMaterial::findOrFail($id);
        $unit->title = $request->title;
        $unit->priority = $request->priority;
        $unit->save();

        return response()->success('', $unit);
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user()->tokenCan('data:delete')) {
            return response()->error('You are not authorized to make that request.', 405);
        }
        
        UnitVideoMaterial::destroy($id);
        return response()->success('', "Unit have been deleted.");
    }

    private function checkIfCourseExist($id) {
        return Course::findOrFail($id);
    }
}
