<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutModel;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = AboutModel::orderBy('aboutId', 'desc')->get();
        return view('about.index', compact('abouts'));
    }

    public function create()
    {
        return view('about.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aboutDesc' => 'required|string|max:255',
            'aboutImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('aboutImage')) {
                $imageName = time() . '.' . $request->aboutImage->extension();
                $request->aboutImage->move(public_path('about_images'), $imageName);
                $validated['aboutImage'] = $imageName;
            }

            AboutModel::create($validated);
            return redirect()->route('abouts.index')->with('success', 'About created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('fail', 'Failed to create: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $about = AboutModel::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = AboutModel::findOrFail($id);

        $validated = $request->validate([
            'aboutDesc' => 'required|string|max:255',
            'aboutImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('aboutImage')) {
                if ($about->aboutImage && file_exists(public_path('about_images/' . $about->aboutImage))) {
                    unlink(public_path('about_images/' . $about->aboutImage));
                }

                $imageName = time() . '.' . $request->aboutImage->extension();
                $request->aboutImage->move(public_path('about_images'), $imageName);
                $validated['aboutImage'] = $imageName;
            }

            $about->update($validated);
            return redirect()->route('abouts.index')->with('success', 'About updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('fail', 'Failed to update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $about = AboutModel::findOrFail($id);

        try {
            if ($about->aboutImage && file_exists(public_path('about_images/' . $about->aboutImage))) {
                unlink(public_path('about_images/' . $about->aboutImage));
            }

            $about->delete();
            return redirect()->route('abouts.index')->with('success', 'About deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('abouts.index')->with('fail', 'Failed to delete: ' . $e->getMessage());
        }
    }

    public function public()
    {
        return view('about2');
    }
}
