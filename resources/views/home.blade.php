@extends('layouts.guest')

@section('title', 'Home')

@section('content')
<div class="min-h-screen bg-[#1A1A1A]">
    <!-- Hero Section -->
    <section class="py-20 bg-[#161615]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h1 class="text-4xl md:text-5xl font-bold text-[#e5e5e5] mb-6">
                        Solusi <span class="text-[#ffd700]">Skinning & Infusion</span> Terbaik untuk Kendaraan Anda
                    </h1>
                    <p class="text-lg text-[#a1a1a1] mb-8">
                        Layanan profesional skining dan infusion untuk mobil dan motor dengan kualitas terbaik. Transformasi kendaraan Anda dengan hasil yang memukau dan tahan lama.
                    </p>
                </div>
                <div class="w-full h-96 rounded-lg border border-[#2a2a2a] overflow-hidden" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?w=800&h=600&fit=crop&q=80" alt="Vehicle Wrapping" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="py-20 bg-[#1A1A1A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#ffd700] mb-4">Why Us</h2>
                <p class="text-lg text-[#a1a1a1]">
                    Mengapa memilih layanan kami untuk kebutuhan skining dan infusion kendaraan Anda
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Why Us 1 -->
                <div class="text-center bg-[#161615] p-6 rounded-lg border border-[#2a2a2a]" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-24 h-24 rounded-full mx-auto mb-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?w=200&h=200&fit=crop&q=80" alt="Kualitas Premium" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-semibold text-[#ffd700] mb-2">Kualitas Premium</h3>
                    <p class="text-[#a1a1a1]">
                        Menggunakan material berkualitas tinggi dan teknologi terbaru untuk hasil yang maksimal dan tahan lama.
                    </p>
                </div>

                <!-- Why Us 2 -->
                <div class="text-center bg-[#161615] p-6 rounded-lg border border-[#2a2a2a]" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-24 h-24 rounded-full mx-auto mb-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1560253023-3ec5d502959f?w=200&h=200&fit=crop&q=80" alt="Tim Berpengalaman" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-semibold text-[#ffd700] mb-2">Tim Berpengalaman</h3>
                    <p class="text-[#a1a1a1]">
                        Didukung oleh tim profesional yang berpengalaman dalam bidang skining dan infusion kendaraan.
                    </p>
                </div>

                <!-- Why Us 3 -->
                <div class="text-center bg-[#161615] p-6 rounded-lg border border-[#2a2a2a]" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-24 h-24 rounded-full mx-auto mb-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=200&h=200&fit=crop&q=80" alt="Harga Terjangkau" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-semibold text-[#ffd700] mb-2">Harga Terjangkau</h3>
                    <p class="text-[#a1a1a1]">
                        Menawarkan harga yang kompetitif dengan kualitas terbaik untuk semua jenis kendaraan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Works Section -->
    <section class="py-20 bg-[#161615]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#ffd700] mb-4">Featured Works</h2>
                <p class="text-lg text-[#a1a1a1]">
                    Portfolio hasil kerja kami yang telah mengubah tampilan kendaraan pelanggan
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Featured Work 1 -->
                <div class="bg-[#1A1A1A] rounded-lg overflow-hidden border border-[#2a2a2a] hover:border-[#ffd700] transition-colors" data-aos="fade-up" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?w=600&h=400&fit=crop&q=80" alt="Honda Civic Skinning" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-[#ffd700] mb-2">Honda Civic Skinning</h3>
                        <p class="text-[#a1a1a1]">
                            Proses skining lengkap untuk Honda Civic dengan hasil yang rapi dan presisi.
                        </p>
                    </div>
                </div>

                <!-- Featured Work 2 -->
                <div class="bg-[#1A1A1A] rounded-lg overflow-hidden border border-[#2a2a2a] hover:border-[#ffd700] transition-colors" data-aos="fade-up" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=600&h=400&fit=crop&q=80" alt="Honda Jazz Infusion" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-[#ffd700] mb-2">Honda Jazz Infusion</h3>
                        <p class="text-[#a1a1a1]">
                            Layanan infusion untuk Honda Jazz dengan berbagai pilihan warna dan desain.
                        </p>
                    </div>
                </div>

                <!-- Featured Work 3 -->
                <div class="bg-[#1A1A1A] rounded-lg overflow-hidden border border-[#2a2a2a] hover:border-[#ffd700] transition-colors" data-aos="fade-up" data-aos-delay="300">
                    <img src="https://images.unsplash.com/photo-1558980664-1db506751c6c?w=600&h=400&fit=crop&q=80" alt="Yamaha XMAX Skinning" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-[#ffd700] mb-2">Yamaha XMAX Skinning</h3>
                        <p class="text-[#a1a1a1]">
                            Skining custom untuk Yamaha XMAX dengan detail yang sangat halus.
                        </p>
                    </div>
                </div>

                <!-- Featured Work 4 -->
                <div class="bg-[#1A1A1A] rounded-lg overflow-hidden border border-[#2a2a2a] hover:border-[#ffd700] transition-colors" data-aos="fade-up" data-aos-delay="400">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=600&h=400&fit=crop&q=80" alt="Mobil SUV Skinning" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-[#ffd700] mb-2">Mobil SUV Skinning</h3>
                        <p class="text-[#a1a1a1]">
                            Proyek skining untuk mobil SUV dengan area kerja yang luas dan kompleks.
                        </p>
                    </div>
                </div>

                <!-- Featured Work 5 -->
                <div class="bg-[#1A1A1A] rounded-lg overflow-hidden border border-[#2a2a2a] hover:border-[#ffd700] transition-colors" data-aos="fade-up" data-aos-delay="500">
                    <img src="https://images.unsplash.com/photo-1558980664-769d59546b3d?w=600&h=400&fit=crop&q=80" alt="Motor Sport Infusion" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-[#ffd700] mb-2">Motor Sport Infusion</h3>
                        <p class="text-[#a1a1a1]">
                            Infusion untuk motor sport dengan desain yang sporty dan menarik.
                        </p>
                    </div>
                </div>

                <!-- Featured Work 6 -->
                <div class="bg-[#1A1A1A] rounded-lg overflow-hidden border border-[#2a2a2a] hover:border-[#ffd700] transition-colors" data-aos="fade-up" data-aos-delay="600">
                    <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=600&h=400&fit=crop&q=80" alt="Kombinasi Skinning & Infusion" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-[#ffd700] mb-2">Kombinasi Skinning & Infusion</h3>
                        <p class="text-[#a1a1a1]">
                            Kombinasi layanan skining dan infusion untuk hasil yang lebih maksimal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

