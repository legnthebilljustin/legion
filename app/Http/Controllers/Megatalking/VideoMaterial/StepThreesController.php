<?php

namespace App\Http\Controllers\Megatalking\VideoMaterial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Megatalking\StepThreeFormRequest;
use App\Models\Megatalking\VideoMaterial\StepThree;
use Illuminate\Http\Request;

class StepThreesController extends Controller
{

    public function store(StepThreeFormRequest $request)
    {
        $validated = $request->validated();

        StepThree::create($validated);

        return response()->success('', 'Step Three has been added to unit.');
    }


    public function show($id)
    {
        $data = StepThree::where('unit_video_material_id', $id)->first();
        return response()->success($data);
    }

    public function update(StepThreeFormRequest $request, $id)
    {
        $validated = $request->validated();

        $data = StepThree::where('unit_video_material_id', $id)->where('type', $_GET['type'])->first();
        if (!$data) {
            return response()->error("Request resource not found.", 404);
        }

        $data->data = $validated['data'];
        $data->save();

        return response()->success('Step Three has been updated.');
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user->tokenCan('data:delete')) 
        {
            return response()->error('You are not authorized to make that request.', 405);
        }

        StepThree::destroy($id);

        return response()->success('Step Three deleted.');
    }
}
