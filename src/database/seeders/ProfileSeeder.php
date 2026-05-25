<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'photo' => null,
            'badge' => 'Web Developer',
            'name' => 'Iis Sumarni',
            'tagline' => 'I design and build delightful digital experiences.',
            'about_me' => " Saya Iis Sumarni, mahasiswa Program Studi Teknik Informatika yang memiliki ketertarikan dalam bidang pengembangan sistem informasi dan web development. Saya fokus mempelajari serta mengembangkan aplikasi dengan dukungan teknologi seperti Filament v3, Livewire, Blade, dan MariaDB. Sebagai mahasiswa Teknik Informatika, saya memiliki semangat belajar yang tinggi dan senang mengeksplorasi teknologi baru untuk meningkatkan kemampuan di bidang pemrograman.",
            'tech_stack' => "Laravel, Filament v3, Livewire, Blade, MariaDB",
        ]);
    }
}
