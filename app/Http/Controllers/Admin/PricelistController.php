<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\VehicleModel;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PricelistController extends Controller
{
    public function index()
    {
        $categories = Category::with('vehicleModels.parts')->get();
        $vehicleModels = VehicleModel::with('category', 'parts')->get();
        $parts = Part::with('vehicleModel.category')->get();
        
        return view('admin.pricelist.index', compact('categories', 'vehicleModels', 'parts'));
    }

    // Categories CRUD
    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        Category::create($validated);

        return redirect()->route('admin.pricelist.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function updateCategory(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $category->update($validated);

        return redirect()->route('admin.pricelist.index')
            ->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.pricelist.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    // Vehicle Models CRUD
    public function storeVehicleModel(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        VehicleModel::create($validated);

        return redirect()->route('admin.pricelist.index')
            ->with('success', 'Model kendaraan berhasil ditambahkan.');
    }

    public function updateVehicleModel(Request $request, VehicleModel $vehicleModel)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        $vehicleModel->update($validated);

        return redirect()->route('admin.pricelist.index')
            ->with('success', 'Model kendaraan berhasil diupdate.');
    }

    public function destroyVehicleModel(VehicleModel $vehicleModel)
    {
        $vehicleModel->delete();

        return redirect()->route('admin.pricelist.index')
            ->with('success', 'Model kendaraan berhasil dihapus.');
    }

    // Parts CRUD
    public function storePart(Request $request)
    {
        $validated = $request->validate([
            'vehicle_model_id' => 'required|exists:vehicle_models,id',
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('parts', 'public');
        }

        Part::create($validated);

        return redirect()->route('admin.pricelist.index')
            ->with('success', 'Part berhasil ditambahkan.');
    }

    public function updatePart(Request $request, Part $part)
    {
        $validated = $request->validate([
            'vehicle_model_id' => 'required|exists:vehicle_models,id',
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($part->image_path) {
                Storage::disk('public')->delete($part->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('parts', 'public');
        }

        $part->update($validated);

        return redirect()->route('admin.pricelist.index')
            ->with('success', 'Part berhasil diupdate.');
    }

    public function destroyPart(Part $part)
    {
        if ($part->image_path) {
            Storage::disk('public')->delete($part->image_path);
        }

        $part->delete();

        return redirect()->route('admin.pricelist.index')
            ->with('success', 'Part berhasil dihapus.');
    }
}

