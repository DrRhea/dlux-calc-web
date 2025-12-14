@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div>
    <h1 class="text-3xl font-bold text-[#e5e5e5] mb-6">Dashboard</h1>
    
    <div class="bg-[#161615] rounded-lg border border-[#2a2a2a] p-6">
        <h2 class="text-2xl font-semibold text-[#e5e5e5] mb-4">Welcome, <span class="text-[#ffd700]">Admin</span>!</h2>
        <p class="text-[#a1a1a1] mb-6">
            Selamat datang di Admin Dashboard. Gunakan menu di sidebar untuk mengelola konten website.
        </p>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-[#2a2a2a] border border-[#2a2a2a] p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-[#a1a1a1] mb-2">Total Services</h3>
                <p class="text-3xl font-bold text-[#ffd700]">{{ $totalServices }}</p>
            </div>
            <div class="bg-[#2a2a2a] border border-[#2a2a2a] p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-[#a1a1a1] mb-2">Total Categories</h3>
                <p class="text-3xl font-bold text-[#ffd700]">{{ $totalCategories }}</p>
            </div>
            <div class="bg-[#2a2a2a] border border-[#2a2a2a] p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-[#a1a1a1] mb-2">Total Models</h3>
                <p class="text-3xl font-bold text-[#ffd700]">{{ $totalModels }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

