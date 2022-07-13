<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    const PAGINATION = 10;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $description = $request->get('description');
        $units = Unit::where('status', '=', 1)->where('description', 'like', '%' . $description . '%')->paginate($this::PAGINATION);
        // dd($units);
        return view('unit.index', compact('units', 'description'));
    }
    public function create()
    {
        return view('unit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'description' => 'required|max:30',
            ],
            [
                'description.required' => 'Enter description of unit',
                'description.max' => 'Maximum 30 characters for unit description',
            ]
        );
        $unit = new Unit();
        $unit->description = $validated['description'];
        $unit->status = 1;
        $unit->save();
        return redirect()->route('unit.index')->with('alert', ['type' => 'success', 'message' => 'Unit successfully created']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('unit.edit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'description' => 'required|max:30',
            ],
            [
                'description.required' => 'Enter description of unit',
                'description.max' => 'Maximum 30 characters for unit description',
            ]
        );

        $unit = Unit::findOrFail($id);
        $unit->description = $validated['description'];
        $unit->update();
        return redirect()->route('unit.index')->with('alert', ['type' => 'info', 'message' => 'Unit successfully updated']);
    }
    public function confirmDelete($id)
    {
        $unit = Unit::findOrFail($id);
        return view('unit.confirm', compact('unit'));
    }
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->status = 0;
        $unit->save();
        return redirect()->route('unit.index')->with('alert', ['type' => 'info', 'message' => 'Unit has been deleted']);
    }
}
