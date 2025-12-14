<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('services', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('services', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service berhasil diupdate.');
    }

    public function destroy(Service $service)
    {
        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service berhasil dihapus.');
    }

    public function toggleActive(Service $service)
    {
        $service->update(['is_active' => !$service->is_active]);

        return redirect()->route('admin.services.index')
            ->with('success', 'Status service berhasil diubah.');
    }
}

