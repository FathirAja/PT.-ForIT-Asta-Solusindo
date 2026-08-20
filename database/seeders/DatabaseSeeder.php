<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@foritasta.co.id',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

        $layananList = [
            ['nama' => 'Pengembangan Website', 'deskripsi' => 'Kami membangun website modern, cepat, dan responsif sesuai kebutuhan bisnis Anda.', 'icon' => 'fa-solid fa-globe'],
            ['nama' => 'Pengembangan Aplikasi Mobile', 'deskripsi' => 'Membuat aplikasi Android & iOS yang fungsional dan user-friendly.', 'icon' => 'fa-solid fa-mobile-screen'],
            ['nama' => 'IT Consulting', 'deskripsi' => 'Konsultasi strategi teknologi informasi untuk mendukung pertumbuhan bisnis.', 'icon' => 'fa-solid fa-comments'],
            ['nama' => 'Cloud Solution', 'deskripsi' => 'Solusi infrastruktur cloud yang aman, scalable, dan efisien.', 'icon' => 'fa-solid fa-cloud'],
            ['nama' => 'UI/UX Design', 'deskripsi' => 'Desain antarmuka yang menarik dan pengalaman pengguna yang nyaman.', 'icon' => 'fa-solid fa-pen-ruler'],
            ['nama' => 'Maintenance & Support', 'deskripsi' => 'Layanan pemeliharaan sistem 24/7 untuk menjaga kestabilan aplikasi Anda.', 'icon' => 'fa-solid fa-headset'],
        ];

        foreach ($layananList as $item) {
            Layanan::create($item);
        }
    }
}
