@extends('layouts.guest')

@section('title', 'Services')

@section('content')
<div class="min-h-screen bg-[#1A1A1A] py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-[#ffd700] mb-4">Our Services</h1>
            <p class="text-lg text-[#a1a1a1]">
                Layanan profesional skining dan infusion untuk mobil dan motor dengan kualitas terbaik dan hasil yang memuaskan.
            </p>
        </div>

        <!-- Services List -->
        <div class="space-y-12">
            @foreach($services as $index => $service)
                <div class="bg-[#161615] border border-[#2a2a2a] rounded-lg overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                        <div class="{{ $index % 2 == 1 ? 'lg:order-2' : '' }}">
                            @if($service->image_path)
                                <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="w-full h-64 object-cover rounded-lg">
                            @else
                                @php
                                    // Gambar mobil modifikasi dari Unsplash
                                    $serviceImages = [
                                        'Skinning' => 'https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?w=800&h=600&fit=crop&q=80',
                                        'Infusion' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=800&h=600&fit=crop&q=80',
                                        'Handlay' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=800&h=600&fit=crop&q=80',
                                    ];
                                    $imageUrl = $serviceImages[$service->title] ?? 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=800&h=600&fit=crop&q=80';
                                @endphp
                                <img src="{{ $imageUrl }}" alt="{{ $service->title }}" class="w-full h-64 object-cover rounded-lg">
                            @endif
                        </div>
                        <div class="{{ $index % 2 == 1 ? 'lg:order-1' : '' }}">
                            <h2 class="text-3xl font-bold text-[#ffd700] mb-4">{{ $service->title }}</h2>
                            <div class="text-[#a1a1a1] whitespace-pre-line">
                                {{ $service->description }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if($services->count() === 0)
                <div class="text-center py-12">
                    <p class="text-[#a1a1a1]">Belum ada layanan tersedia.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

