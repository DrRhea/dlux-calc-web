<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Category;
use App\Models\VehicleModel;
use App\Models\Part;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Services
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

        // Categories
        $categoryMobil = Category::create([
            'name' => 'Mobil',
            'slug' => Str::slug('Mobil'),
        ]);

        $categoryMotor = Category::create([
            'name' => 'Motor',
            'slug' => Str::slug('Motor'),
        ]);

        // Vehicle Models - Mobil
        $modelCivic = VehicleModel::create([
            'category_id' => $categoryMobil->id,
            'name' => 'Civic',
        ]);

        $modelJazz = VehicleModel::create([
            'category_id' => $categoryMobil->id,
            'name' => 'Jazz',
        ]);

        // Vehicle Models - Motor
        $modelXMAX = VehicleModel::create([
            'category_id' => $categoryMotor->id,
            'name' => 'XMAX',
        ]);

        // Parts - Civic
        Part::create([
            'vehicle_model_id' => $modelCivic->id,
            'name' => 'Skinning Full Body',
            'price' => 5000000,
            'image_path' => null,
        ]);

        Part::create([
            'vehicle_model_id' => $modelCivic->id,
            'name' => 'Skinning Bonnet',
            'price' => 600000,
            'image_path' => null,
        ]);

        Part::create([
            'vehicle_model_id' => $modelCivic->id,
            'name' => 'Skinning Roof',
            'price' => 500000,
            'image_path' => null,
        ]);

        Part::create([
            'vehicle_model_id' => $modelCivic->id,
            'name' => 'Infusion Full Body',
            'price' => 6000000,
            'image_path' => null,
        ]);

        // Parts - Jazz
        Part::create([
            'vehicle_model_id' => $modelJazz->id,
            'name' => 'Skinning Full Body',
            'price' => 4500000,
            'image_path' => null,
        ]);

        Part::create([
            'vehicle_model_id' => $modelJazz->id,
            'name' => 'Skinning Bonnet',
            'price' => 550000,
            'image_path' => null,
        ]);

        Part::create([
            'vehicle_model_id' => $modelJazz->id,
            'name' => 'Skinning Door',
            'price' => 400000,
            'image_path' => null,
        ]);

        // Parts - XMAX
        Part::create([
            'vehicle_model_id' => $modelXMAX->id,
            'name' => 'Skinning Full Body',
            'price' => 3000000,
            'image_path' => null,
        ]);

        Part::create([
            'vehicle_model_id' => $modelXMAX->id,
            'name' => 'Skinning Fairing',
            'price' => 800000,
            'image_path' => null,
        ]);

        Part::create([
            'vehicle_model_id' => $modelXMAX->id,
            'name' => 'Infusion Full Body',
            'price' => 3500000,
            'image_path' => null,
        ]);

        $this->command->info('Dummy data berhasil dibuat!');
        $this->command->info('- 3 Services');
        $this->command->info('- 2 Categories');
        $this->command->info('- 3 Vehicle Models');
        $this->command->info('- 10 Parts');
    }
}
