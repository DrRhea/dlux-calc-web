@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div>
    <h1 class="text-3xl font-bold text-[#e5e5e5] mb-6">Edit Service</h1>

    <div class="bg-[#161615] rounded-lg border border-[#2a2a2a] p-6">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-[#a1a1a1] mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" required
                    class="w-full px-4 py-2 bg-[#2a2a2a] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700]">
                @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-[#a1a1a1] mb-2">Description</label>
                <textarea name="description" id="description" rows="5" required
                    class="w-full px-4 py-2 bg-[#2a2a2a] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700]">{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            @if($service->image_path)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Current Image</label>
                    <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="w-32 h-32 object-cover rounded border border-[#2a2a2a]">
                </div>
            @endif

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-[#a1a1a1] mb-2">New Image (optional)</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-4 py-2 bg-[#2a2a2a] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700]">
                @error('image')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                        class="w-4 h-4 text-[#ffd700] bg-[#2a2a2a] border-[#2a2a2a] rounded focus:ring-[#ffd700]">
                    <span class="ml-2 text-sm text-[#a1a1a1]">Active (tampilkan di website)</span>
                </label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-[#ffd700] text-[#1A1A1A] px-6 py-2 rounded-lg hover:bg-[#ffed4e] font-medium">
                    Update Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="bg-[#2a2a2a] text-[#e5e5e5] px-6 py-2 rounded-lg hover:bg-[#3a3a3a] font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

