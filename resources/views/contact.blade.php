@extends('layouts.guest')

@section('title', 'Contact')

@section('content')
<div class="min-h-screen bg-[#1A1A1A] py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-[#ffd700] mb-4">Contact Us</h1>
            <p class="text-lg text-[#a1a1a1]">
                Hubungi kami untuk konsultasi atau informasi lebih lanjut tentang layanan skining dan infusion kendaraan Anda.
            </p>
        </div>

        <!-- Direct Contact Information -->
        <div class="bg-[#161615] border border-[#2a2a2a] rounded-lg p-8 mb-8" data-aos="fade-up" data-aos-delay="100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <p class="text-sm font-medium text-[#a1a1a1] mb-2">EMAIL</p>
                    <a href="mailto:info@dlux.com" class="text-lg text-[#e5e5e5] hover:text-[#ffd700] transition-colors">
                        info@dlux.com
                    </a>
                </div>
                <div>
                    <p class="text-sm font-medium text-[#a1a1a1] mb-2">WHATSAPP</p>
                    <a href="https://wa.me/6281234567890" target="_blank" class="text-lg text-[#e5e5e5] hover:text-[#ffd700] transition-colors">
                        +62 812 3456 7890
                    </a>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-[#161615] border border-[#2a2a2a] rounded-lg p-8" data-aos="fade-up" data-aos-delay="200">
            <form action="#" method="POST" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @csrf
                
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Name</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 bg-[#2a2a2a] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-2 focus:ring-[#ffd700] focus:border-[#ffd700] transition-colors" placeholder="Your name">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Phone number</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-3 bg-[#2a2a2a] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-2 focus:ring-[#ffd700] focus:border-[#ffd700] transition-colors" placeholder="Your phone number">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Email</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 bg-[#2a2a2a] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-2 focus:ring-[#ffd700] focus:border-[#ffd700] transition-colors" placeholder="your.email@example.com">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Vehicle type / Model</label>
                        <input type="text" name="vehicle" class="w-full px-4 py-3 bg-[#2a2a2a] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-2 focus:ring-[#ffd700] focus:border-[#ffd700] transition-colors" placeholder="e.g. Honda Civic, Yamaha XMAX">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Project description</label>
                        <textarea name="description" rows="4" class="w-full px-4 py-3 bg-[#2a2a2a] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-2 focus:ring-[#ffd700] focus:border-[#ffd700] transition-colors resize-none" placeholder="Tell us about your project..."></textarea>
                    </div>

                <div>
                    <label class="block text-sm font-medium text-[#a1a1a1] mb-3">Project budget (IDR)</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="budget" value="5-10" class="sr-only peer">
                            <div class="px-4 py-3 border border-[#2a2a2a] rounded-lg text-center text-[#a1a1a1] peer-checked:border-[#ffd700] peer-checked:text-[#ffd700] hover:border-[#ffd700] transition-colors">
                                5 - 10 mio
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="budget" value="10-25" class="sr-only peer">
                            <div class="px-4 py-3 border border-[#2a2a2a] rounded-lg text-center text-[#a1a1a1] peer-checked:border-[#ffd700] peer-checked:text-[#ffd700] hover:border-[#ffd700] transition-colors">
                                10 - 25 mio
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="budget" value="25-50" class="sr-only peer">
                            <div class="px-4 py-3 border border-[#2a2a2a] rounded-lg text-center text-[#a1a1a1] peer-checked:border-[#ffd700] peer-checked:text-[#ffd700] hover:border-[#ffd700] transition-colors">
                                25 - 50 mio
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="budget" value="50+" class="sr-only peer">
                            <div class="px-4 py-3 border border-[#2a2a2a] rounded-lg text-center text-[#a1a1a1] peer-checked:border-[#ffd700] peer-checked:text-[#ffd700] hover:border-[#ffd700] transition-colors">
                                > 50 mio
                            </div>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#a1a1a1] mb-3">Project timeline</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="timeline" value="urgent" class="sr-only peer">
                            <div class="px-4 py-3 border border-[#2a2a2a] rounded-lg text-center text-[#a1a1a1] peer-checked:border-[#ffd700] peer-checked:text-[#ffd700] hover:border-[#ffd700] transition-colors">
                                < 1 month
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="timeline" value="1-3" class="sr-only peer">
                            <div class="px-4 py-3 border border-[#2a2a2a] rounded-lg text-center text-[#a1a1a1] peer-checked:border-[#ffd700] peer-checked:text-[#ffd700] hover:border-[#ffd700] transition-colors">
                                1 - 3 months
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="timeline" value="3-6" class="sr-only peer">
                            <div class="px-4 py-3 border border-[#2a2a2a] rounded-lg text-center text-[#a1a1a1] peer-checked:border-[#ffd700] peer-checked:text-[#ffd700] hover:border-[#ffd700] transition-colors">
                                3 - 6 months
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="timeline" value="flexible" class="sr-only peer">
                            <div class="px-4 py-3 border border-[#2a2a2a] rounded-lg text-center text-[#a1a1a1] peer-checked:border-[#ffd700] peer-checked:text-[#ffd700] hover:border-[#ffd700] transition-colors">
                                Flexible
                            </div>
                        </label>
                    </div>
                </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full px-6 py-4 bg-[#ffd700] text-[#1A1A1A] rounded-lg font-medium hover:bg-[#ffed4e] transition-colors">
                            SUBMIT
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
