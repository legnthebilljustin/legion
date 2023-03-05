<?php

namespace App\Http\Controllers\Megatalking\Pagoda;

use App\Http\Controllers\Controller;
use App\Http\Requests\Megatalking\Pagoda\UnitFormRequest;
use App\Models\Megatalking\Pagoda\UnitPagoda;
use App\Models\Megatalking\Pagoda\View;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function store(UnitFormRequest $request)
    {
        $validated = $request->validated();

        $unit = UnitPagoda::create($validated);

        $this->createViews($unit->id);

        return response()->success('', "Pagoda unit has been created.");
    }

    public function show($id)
    {
        $unit = UnitPagoda::where('id', $id)->with('views')->first();
        foreach($unit->views as $key => $val) {
            if ($val->mode == "study") {
                $unit['study'] = $val;
            }
            else if ($val->mode == "class") {
                $unit['class'] = $val;
            }
        }
        unset($unit->views);

        // create list
        return response($unit);
    }

    public function update(UnitFormRequest $request, $id)
    {
        $validated = $request->validated();

        $unit = UnitPagoda::findOrFail($id);
        $unit->title = $validated['title'];
        $unit->save();

        return response()->success('', "Pagoda unit $unit->title has been updated.");
    }

    public function destroy(Request $request, $id)
    {
        if (!$request->user->tokenCan('data:delete')) {
            return response()->error('You are not authorized to make that request.', 405);
        }

        UnitPagoda::findOrFail($id);
        return response()->success('', 'Pagoda unit has been deleted.');
    }

    private function createViews($unitId) {
        $modes = ['class', 'study'];
        foreach ($modes as $mode) {
            View::create([
                'unit_pagoda_id' => $unitId,
                'mode' => $mode,
                'elements' => '[{"contents":[]}]'
            ]);
        }
        
        return true;
    }

    private function createListForMenu($array) {

    }

    private function insertList() {
        
    }
}
