<?php

namespace App\Http\Controllers\Megatalking\VideoMaterial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Megatalking\TipsFormRequest;
use App\Models\Megatalking\VideoMaterial\Tip;
use Illuminate\Http\Request;

class TipsController extends Controller
{

    public function index()
    {
        $tips = Tip::all();
        return response()->success($tips);
    }

    public function store(TipsFormRequest $request)
    {
        $validated = $request->validated();

        Tip::create($validated);
        return response()->success('', 'Tips has been added to this content.');
    }

    public function update(TipsFormRequest $request, $id)
    {
        $validated = $request->validated();

        $tip = Tip::findOrFail($id);
        $tip->text = $validated['text'];
        $tip->save();

        return response()->success('Tip has been updated.');
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user()->tokenCan('data:delete')) {
            return response()->error('You are not authorized to make that request.', 405);
        }

        Tip::destroy($id);
        return response()->success('Tip has been deleted.');
    }
}
