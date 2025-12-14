@extends('layouts.admin')

@section('title', 'Manage Services')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-[#e5e5e5]">Manage Services</h1>
        <a href="{{ route('admin.services.create') }}" class="bg-[#ffd700] text-[#1A1A1A] px-4 py-2 rounded-lg hover:bg-[#ffed4e] font-medium">
            + Add Service
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-900 border border-green-700 text-green-200 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-[#161615] rounded-lg border border-[#2a2a2a] overflow-hidden">
        @if($services->count() > 0)
            <table class="min-w-full divide-y divide-[#2a2a2a]">
                <thead class="bg-[#2a2a2a]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">
                            Foto
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">
                            Judul
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">
                            Deskripsi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-[#161615] divide-y divide-[#2a2a2a]">
                    @foreach($services as $service)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($service->image_path)
                                    <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="w-20 h-20 object-cover rounded border border-[#2a2a2a]">
                                @else
                                    <div class="bg-[#2a2a2a] w-20 h-20 rounded border border-[#2a2a2a]"></div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#e5e5e5]">
                                {{ $service->title }}
                            </td>
                            <td class="px-6 py-4 text-sm text-[#a1a1a1]">
                                {{ Str::limit($service->description, 100) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('admin.services.toggle-active', $service) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 rounded text-xs font-medium {{ $service->is_active ? 'bg-green-900 text-green-200' : 'bg-red-900 text-red-200' }}">
                                        {{ $service->is_active ? 'Active' : 'Hidden' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.services.edit', $service) }}" class="text-[#ffd700] hover:text-[#ffed4e] mr-3">Edit</a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus service ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="p-8 text-center text-[#a1a1a1]">
                Belum ada service. <a href="{{ route('admin.services.create') }}" class="text-[#ffd700] hover:text-[#ffed4e]">Tambah service pertama</a>
            </div>
        @endif
    </div>
</div>
@endsection

