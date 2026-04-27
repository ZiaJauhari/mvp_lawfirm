<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;

class PageContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // Home Page - Hero Section
            [
                'page' => 'home',
                'section' => 'hero',
                'key' => 'hero_badge',
                'value' => 'Keunggulan Hukum Terpercaya',
                'type' => 'text',
                'label' => 'Hero Badge',
                'order' => 1
            ],
            [
                'page' => 'home',
                'section' => 'hero',
                'key' => 'hero_title',
                'value' => 'Membela Hak & Masa Depan Anda',
                'type' => 'text',
                'label' => 'Hero Title',
                'order' => 2
            ],
            [
                'page' => 'home',
                'section' => 'hero',
                'key' => 'hero_subtitle',
                'value' => 'Layanan hukum profesional dengan integritas dan keunggulan. Kami menyediakan solusi hukum komprehensif untuk individu dan bisnis.',
                'type' => 'textarea',
                'label' => 'Hero Subtitle',
                'order' => 3
            ],
            
            // Home Page - Stats Section
            [
                'page' => 'home',
                'section' => 'stats',
                'key' => 'stat_experience',
                'value' => '25',
                'type' => 'text',
                'label' => 'Tahun Pengalaman',
                'order' => 10
            ],
            [
                'page' => 'home',
                'section' => 'stats',
                'key' => 'stat_cases',
                'value' => '1000',
                'type' => 'text',
                'label' => 'Kasus Menang',
                'order' => 11
            ],
            [
                'page' => 'home',
                'section' => 'stats',
                'key' => 'stat_lawyers',
                'value' => '50',
                'type' => 'text',
                'label' => 'Pengacara Ahli',
                'order' => 12
            ],
            [
                'page' => 'home',
                'section' => 'stats',
                'key' => 'stat_success',
                'value' => '98',
                'type' => 'text',
                'label' => 'Tingkat Keberhasilan %',
                'order' => 13
            ],

            // Home Page - Services Section
            [
                'page' => 'home',
                'section' => 'services',
                'key' => 'services_title',
                'value' => 'Bidang Praktik',
                'type' => 'text',
                'label' => 'Services Title',
                'order' => 20
            ],
            [
                'page' => 'home',
                'section' => 'services',
                'key' => 'services_subtitle',
                'value' => 'Layanan hukum komprehensif yang disesuaikan dengan kebutuhan Anda',
                'type' => 'textarea',
                'label' => 'Services Subtitle',
                'order' => 21
            ],

            // Home Page - Why Choose Us Section
            [
                'page' => 'home',
                'section' => 'why',
                'key' => 'why_title',
                'value' => 'Pengalaman & Keunggulan',
                'type' => 'text',
                'label' => 'Why Choose Us Title',
                'order' => 30
            ],
            [
                'page' => 'home',
                'section' => 'why',
                'key' => 'why_description',
                'value' => 'Dengan pengalaman gabungan lebih dari 25 tahun, tim pengacara berdedikasi kami telah berhasil menangani ribuan kasus, memperoleh kepercayaan klien di seluruh negeri.',
                'type' => 'textarea',
                'label' => 'Why Choose Us Description',
                'order' => 31
            ],

            // Home Page - Team Section
            [
                'page' => 'home',
                'section' => 'team',
                'key' => 'team_title',
                'value' => 'Temui Pengacara Kami',
                'type' => 'text',
                'label' => 'Team Title',
                'order' => 40
            ],
            [
                'page' => 'home',
                'section' => 'team',
                'key' => 'team_subtitle',
                'value' => 'Profesional berdedikasi yang berkomitmen pada kesuksesan Anda',
                'type' => 'textarea',
                'label' => 'Team Subtitle',
                'order' => 41
            ],

            // Home Page - Testimonials Section
            [
                'page' => 'home',
                'section' => 'testimonials',
                'key' => 'testimonials_title',
                'value' => 'Apa Kata Klien',
                'type' => 'text',
                'label' => 'Testimonials Title',
                'order' => 50
            ],
            [
                'page' => 'home',
                'section' => 'testimonials',
                'key' => 'testimonials_subtitle',
                'value' => 'Kisah nyata dari klien nyata',
                'type' => 'textarea',
                'label' => 'Testimonials Subtitle',
                'order' => 51
            ],

            // Home Page - Articles Section
            [
                'page' => 'home',
                'section' => 'articles',
                'key' => 'articles_title',
                'value' => 'Wawasan Hukum',
                'type' => 'text',
                'label' => 'Articles Title',
                'order' => 60
            ],

            // Home Page - CTA Section
            [
                'page' => 'home',
                'section' => 'cta',
                'key' => 'cta_title',
                'value' => 'Siap Memulai?',
                'type' => 'text',
                'label' => 'CTA Title',
                'order' => 70
            ],
            [
                'page' => 'home',
                'section' => 'cta',
                'key' => 'cta_subtitle',
                'value' => 'Jadwalkan konsultasi gratis dengan tim hukum berpengalaman kami hari ini.',
                'type' => 'textarea',
                'label' => 'CTA Subtitle',
                'order' => 71
            ],
        ];

        foreach ($contents as $content) {
            PageContent::create($content);
        }
    }
}
