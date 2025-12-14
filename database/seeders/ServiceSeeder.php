<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua services yang duplikat, hanya simpan yang unik berdasarkan title
        $titles = ['Skinning', 'Infusion', 'Handlay'];
        
        // Hapus services yang tidak ada di list
        Service::whereNotIn('title', $titles)->delete();
        
        // Hapus duplikat, hanya simpan yang pertama
        foreach ($titles as $title) {
            $services = Service::where('title', $title)->get();
            if ($services->count() > 1) {
                $services->skip(1)->each->delete();
            }
        }
        
        // Buat atau update 3 services
        Service::updateOrCreate(
            ['title' => 'Skinning'],
            [
                'description' => 'Layanan skining adalah proses pelapisan bagian eksterior kendaraan dengan material vinyl atau wrap berkualitas tinggi. Proses ini memberikan tampilan baru pada kendaraan Anda tanpa merusak cat asli. Material yang digunakan tahan lama, mudah dirawat, dan dapat dilepas kapan saja tanpa meninggalkan bekas pada cat asli.',
                'image_path' => null,
                'is_active' => true,
            ]
        );

        Service::updateOrCreate(
            ['title' => 'Infusion'],
            [
                'description' => 'Layanan infusion adalah teknik pewarnaan atau pelapisan khusus yang memberikan efek visual yang unik dan menarik pada kendaraan. Teknik ini menggunakan metode khusus untuk menghasilkan warna dan efek yang tidak bisa didapatkan dengan cat biasa. Hasilnya memberikan kesan premium dan eksklusif pada kendaraan Anda.',
                'image_path' => null,
                'is_active' => true,
            ]
        );

        Service::updateOrCreate(
            ['title' => 'Handlay'],
            [
                'description' => 'Layanan handlay adalah teknik pelapisan khusus dengan metode aplikasi manual yang memberikan hasil lebih presisi dan detail. Teknik ini sangat cocok untuk area-area yang sulit dijangkau atau memerlukan ketelitian tinggi. Handlay memberikan hasil yang lebih rapi dan sempurna dibandingkan dengan metode biasa, terutama untuk bagian-bagian yang memiliki lekukan atau detail kompleks pada kendaraan.',
                'image_path' => null,
                'is_active' => true,
            ]
        );
        
        $this->command->info('Services berhasil diupdate! Total: ' . Service::count());
    }
}
