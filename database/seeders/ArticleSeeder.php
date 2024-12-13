<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'articleTitle'=>'Jenis Sampah Organik dan Anorganik Serta Cara Pengelolaannya',
            'articlePicture' => 'assets/article1.jpg',
            'articleUrl' => 'https://fkm.unhas.ac.id/jenis-sampah-organik-dan-anorganik-serta-cara-pengelolaannya/'
        ]);

        Article::create([
            'articleTitle'=>'Sampah Plastik Ancaman Bagi Lingkungan dan Kehidupan',
            'articlePicture' => 'assets/article2.jpg',
            'articleUrl' => 'https://plasticsmartcities.wwf.id/feature/article/sampah-plastik-ancaman-bagi-lingkungan-dan-kehidupan'
        ]);

        Article::create([
            'articleTitle'=>'Manfaat Limbah Organik dalam Kehidupan Sehari-hari',
            'articlePicture' => 'assets/article3.jpg',
            'articleUrl' => 'https://mutucertification.com/manfaat-limbah-organik/'
        ]);

        Article::create([
            'articleTitle'=>'Sampah Plastik Ancaman Bagi Lingkungan dan Kehidupan',
            'articlePicture' => 'assets/article4.jpeg',
            'articleUrl' => 'https://www.detik.com/sulsel/berita/d-6994816/37-contoh-sampah-anorganik-lengkap-dengan-cara-pengelolaannya'
        ]);

        Article::create([
            'articleTitle'=>'Pengertian, Jenis, dan Cara mengelola Sampah dengan baik dan benar.',
            'articlePicture' => 'assets/article5.jpg',
            'articleUrl' => 'https://sdnungaran1.sch.id/berita/read/Pengertian-Jenis-dan-Cara-mengelola-Sampah-dengan-baik-dan-benar'
        ]);

        Article::create([
            'articleTitle'=>'4 Cara Efektif Mengelola Sampah Organik',
            'articlePicture' => 'assets/article6.jpg',
            'articleUrl' => 'https://waste4change.com/blog/cara-jitu-mengelola-sampah-organik-anti-ribet-dan-kotor/'
        ]);
    }
}
