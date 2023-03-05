<?php

namespace App\Http\Controllers\Megatalking\Pagoda;

use App\Http\Controllers\Controller;
use App\Models\Megatalking\Pagoda\View;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function show($id)
    {
        $view = View::findOrFail($id);
        return response()->success($view);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'elements' => 'required'
        ]);

        $view = View::findOrFail($id);
        $view->elements = $validated['elements'];
        $view->save();

        return response()->success('', 'Pagoda unit view has been updated.');
    }

}
