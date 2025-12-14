@extends('layouts.guest')

@section('title', 'Pricelist')

@section('content')
<div class="min-h-screen bg-[#1A1A1A] py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-[#ffd700] mb-4">Pricelist</h1>
            <p class="text-lg text-[#a1a1a1]">
                Daftar harga lengkap untuk layanan skining dan infusion berbagai model kendaraan. Pilih kategori dan model kendaraan Anda untuk melihat detail harga.
            </p>
        </div>

        <!-- Categories -->
        @foreach($categories as $catIndex => $category)
            <div class="mb-8" data-aos="fade-up" data-aos-delay="{{ $catIndex * 100 }}">
                <h2 class="text-2xl font-bold text-[#ffd700] mb-4">{{ $category->name }}</h2>
                
                <!-- Vehicle Models -->
                @if($category->vehicleModels->count() > 0)
                    <div class="space-y-4">
                        @foreach($category->vehicleModels as $modelIndex => $model)
                            <div class="border border-[#2a2a2a] bg-[#161615] rounded-lg" data-aos="fade-up" data-aos-delay="{{ ($catIndex * 100) + ($modelIndex * 50) }}">
                                <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-[#2a2a2a] focus:outline-none transition-colors" onclick="toggleAccordion('model-{{ $model->id }}')">
                                    <span class="text-lg font-semibold text-[#ffd700]">{{ $model->name }}</span>
                                    <svg id="model-{{ $model->id }}-icon" class="w-5 h-5 text-[#ffd700] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="model-{{ $model->id }}-content" class="hidden px-6 pb-4">
                                    @if($model->parts->count() > 0)
                                        <!-- Parts Table -->
                                        <div class="overflow-x-auto mt-4">
                                            <table class="min-w-full divide-y divide-[#2a2a2a]">
                                                <thead class="bg-[#1A1A1A]">
                                                    <tr>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-[#ffd700] uppercase tracking-wider">
                                                            Foto
                                                        </th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-[#ffd700] uppercase tracking-wider">
                                                            Part
                                                        </th>
                                                        <th class="px-4 py-3 text-left text-xs font-medium text-[#ffd700] uppercase tracking-wider">
                                                            Harga
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-[#161615] divide-y divide-[#2a2a2a]">
                                                    @foreach($model->parts as $part)
                                                        <tr>
                                                            <td class="px-4 py-4">
                                                                @if($part->image_path)
                                                                    <img src="{{ asset('storage/' . $part->image_path) }}" alt="{{ $part->name }}" class="w-20 h-20 object-cover rounded border border-[#2a2a2a]">
                                                                @else
                                                                    <div class="bg-[#2a2a2a] w-20 h-20 rounded border border-[#2a2a2a]"></div>
                                                                @endif
                                                            </td>
                                                            <td class="px-4 py-4 text-sm text-[#e5e5e5]">
                                                                {{ $part->name }}
                                                            </td>
                                                            <td class="px-4 py-4 text-sm font-medium text-[#ffd700]">
                                                                Rp {{ number_format($part->price, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="py-8 text-center text-[#a1a1a1]">
                                            Belum ada part untuk model ini.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="border border-[#2a2a2a] bg-[#161615] rounded-lg p-6 text-center text-[#a1a1a1]">
                        Belum ada model kendaraan untuk kategori ini.
                    </div>
                @endif
            </div>
        @endforeach

        @if($categories->count() === 0)
            <div class="text-center py-12">
                <p class="text-[#a1a1a1]">Belum ada data pricelist tersedia.</p>
            </div>
        @endif
    </div>
</div>

<script>
function toggleAccordion(id) {
    const content = document.getElementById(id + '-content');
    const icon = document.getElementById(id + '-icon');
    
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}
</script>
@endsection
