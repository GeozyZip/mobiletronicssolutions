<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HourModel;

class HourController extends Controller
{
    public function index()
    {
        $hours = HourModel::orderBy('hourID', 'desc')->get();
        return view('hour.index', compact('hours'));
    }

    public function create()
    {
        return view('hour.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hourDay' => 'required|string|max:255',
            'opHour' => 'required|string|max:255',
            'noTel' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        try {
            HourModel::create($validated);
            return redirect()->route('hours.index')->with('success', 'Hour created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('fail', 'Failed to create: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $hour = HourModel::findOrFail($id);
        return view('hour.edit', compact('hour'));
    }

    public function update(Request $request, $id)
    {
        $hour = HourModel::findOrFail($id);

        $validated = $request->validate([
            'hourDay' => 'required|string|max:255',
            'opHour' => 'required|string|max:255',
            'noTel' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        try {
            $hour->update($validated);
            return redirect()->route('hours.index')->with('success', 'Hour updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('fail', 'Failed to update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $hour = HourModel::findOrFail($id);

        try {
            $hour->delete();
            return redirect()->route('hours.index')->with('success', 'Hour deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('hours.index')->with('fail', 'Failed to delete: ' . $e->getMessage());
        }
    }
}
