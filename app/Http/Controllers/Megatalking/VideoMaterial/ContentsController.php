<?php

namespace App\Http\Controllers\Megatalking\VideoMaterial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Megatalking\ContentsFormRequest;
use App\Models\Megatalking\Videomaterial\Content;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index()
    {
        $contents = Content::orderBy('start_time', 'ASC')->get();
        return response()->success($contents);
    }
    public function store(ContentsFormRequest $request)
    {
        $validated = $request->validated();
        Content::create($validated);

        return response()->success('', "Content has been added.");
    }

    public function show($id)
    {
        $content = Content::with('tips')->find($id);
        return response()->success($content);
    }

    public function update(ContentsFormRequest $request, $id)
    {
        $validated = $request->validated();

        $content = Content::findOrFail($id);
        $content->type = $validated['type'];
        $content->start_time = $validated['start_time'];
        $content->end_time = $validated['end_time'];
        $content->sentence = $validated['sentence'];
        $content->translation = $validated['translation'];
        $content->save();

        return response()->success('', "Content details as been updated.");
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user()->tokenCan('data:delete')) {
            return response()->error('You are not authorized to make that request.', 405);
        }

        Content::destroy($id);

        return response()->success('', 'Content has been deleted.');
    }
}
