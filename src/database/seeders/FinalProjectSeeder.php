<?php

namespace Database\Seeders;

use App\Models\FinalProject;
use Illuminate\Database\Seeder;

class FinalProjectSeeder extends Seeder
{
    public function run(): void
{
        FinalProject::create([
            'title' => 'Sistem Catalog Resep Masakan Rumahan Sederhana',
            'description' => 'Sistem ini memungkinkan pengguna untuk melihat berbagai resep, serta mencari resep berdasarkan kategori atau nama makanan. Pengguna juga dapat menyimpan resep favorit mereka untuk akses mudah di masa depan.',
            'problem' => 'Informasi resep masakan rumahan sederhana masih tersebar di berbagai sumber dan belum tersusun secara terpusat sehingga pengguna kesulitan menemukan resep yang lengkap dan mudah dipahami. ',
            'main_feature' => 'Pencarian Resep, Kategori Resep, Resep Favorit',
            'tech_stack' => 'Laravel, Filament v3, MariaDB, Docker, Git',
            'status' => 'Sedang Dikerjakan',
            'progress' => 25,
            'erd_image' => null,
            'year' => 2026,
        ]);
}
}