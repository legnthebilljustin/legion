<?php

namespace App\Http\Controllers\Megatalking\VideoMaterial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Megatalking\VideoFormRequest;
use App\Models\Megatalking\VideoMaterial\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return response()->success($videos);
    }

    public function store(VideoFormRequest $request)
    {
        $validated = $request->validated();

        Video::create($validated);
        return response()->success('', 'Video has been created.');
    }

    public function show($id)
    {
        $video = Video::where('youtube_id', $id)->with('contents')->first();

        // categorize video contents by type
        $data['title'] = $video->title;
        $data['contents']['standard'] = [];
        $data['contents']['basic'] = [];

        foreach($video->contents as $key => $val) {
            if ($val['type'] == 'basic') {
                array_push($data['contents']['basic'], $val);
            }
            else if ($val['type'] == 'standard') {
                array_push($data['contents']['standard'], $val);
            }
        }

        return response()->success($data);
    }

    public function update(VideoFormRequest $request, $id)
    {
        $validated = $request->validated();

        $video = Video::findOrFail($id);
        $video->title = $validated->title;
        $video->save();

        return response()->success('', "Video $validated->title have been updated.");
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user()->tokenCan('data:delete')) {
            return response()->error('You are not authorized to make that request.', 405);
        }
        
        Video::destroy($id);
        return response()->success('', "Unit have been deleted.");
    }
}
