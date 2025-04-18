<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceModel;

class ServiceController extends Controller
{
    public function index()
    {
        $services = ServiceModel::orderBy('serviceId', 'desc')->get();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'serviceName' => 'required|string|max:255',
            'serviceImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('serviceImage')) {
                $imageName = time().'.'.$request->serviceImage->extension();
                $request->serviceImage->move(public_path('service_images'), $imageName);
                $validated['serviceImage'] = $imageName;
            }

            ServiceModel::create($validated);
            return redirect()->route('services.index')->with('success', 'Service created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('fail', 'Failed to create service: '.$e->getMessage());
        }
    }

    public function show($id)
    {
        $service = ServiceModel::findOrFail($id);
        return view('services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = ServiceModel::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = ServiceModel::findOrFail($id);

        $validated = $request->validate([
            'serviceName' => 'required|string|max:255',
            'serviceImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('serviceImage')) {
                if ($service->serviceImage && file_exists(public_path('service_images/'.$service->serviceImage))) {
                    unlink(public_path('service_images/'.$service->serviceImage));
                }

                $imageName = time().'.'.$request->serviceImage->extension();
                $request->serviceImage->move(public_path('service_images'), $imageName);
                $validated['serviceImage'] = $imageName;
            }

            $service->update($validated);
            return redirect()->route('services.index')->with('success', 'Service updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('fail', 'Failed to update service: '.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $service = ServiceModel::findOrFail($id);

        try {
            if ($service->serviceImage && file_exists(public_path('service_images/'.$service->serviceImage))) {
                unlink(public_path('service_images/'.$service->serviceImage));
            }

            $service->delete();
            return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('services.index')->with('fail', 'Failed to delete service: '.$e->getMessage());
        }
    }

    public function public()
    {
        $services = ServiceModel::all();
        return view('service2', compact('services'));
    }
}