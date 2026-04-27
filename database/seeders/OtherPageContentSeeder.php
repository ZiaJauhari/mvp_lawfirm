<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;

class OtherPageContentSeeder extends Seeder
{
    public function run()
    {
        $contents = [
            // Tentang Kami
            ['page' => 'about', 'section' => 'hero', 'key' => 'about_hero_title', 'value' => 'Cerita Kami', 'type' => 'text', 'label' => 'Hero Title', 'order' => 1],
            ['page' => 'about', 'section' => 'hero', 'key' => 'about_hero_subtitle', 'value' => 'Didirikan atas prinsip integritas, keunggulan, dan dedikasi klien, MVP Law Firm telah melayani individu dan bisnis selama lebih dari 25 tahun.', 'type' => 'textarea', 'label' => 'Hero Subtitle', 'order' => 2],
            ['page' => 'about', 'section' => 'mission', 'key' => 'about_mission_title', 'value' => 'Misi Kami', 'type' => 'text', 'label' => 'Mission Title', 'order' => 3],
            ['page' => 'about', 'section' => 'mission', 'key' => 'about_mission_text', 'value' => 'Memberikan layanan hukum yang luar biasa yang melindungi hak dan kepentingan klien kami, sambil mempertahankan standar tertinggi etika profesional dan integritas. Kami berusaha membuat representasi hukum berkualitas dapat diakses oleh semua.', 'type' => 'textarea', 'label' => 'Mission Text', 'order' => 4],
            ['page' => 'about', 'section' => 'vision', 'key' => 'about_vision_title', 'value' => 'Visi Kami', 'type' => 'text', 'label' => 'Vision Title', 'order' => 5],
            ['page' => 'about', 'section' => 'vision', 'key' => 'about_vision_text', 'value' => 'Menjadi mitra hukum yang paling tepercaya untuk individu dan bisnis — dikenal karena keahlian, inovasi, dan komitmen tak tergoyahkan terhadap kesuksesan klien. Kami menetapkan standar keunggulan dalam industri hukum.', 'type' => 'textarea', 'label' => 'Vision Text', 'order' => 6],
            ['page' => 'about', 'section' => 'values', 'key' => 'about_values_title', 'value' => 'Apa yang Kami Junjung', 'type' => 'text', 'label' => 'Values Title', 'order' => 7],
            ['page' => 'about', 'section' => 'values', 'key' => 'about_values_subtitle', 'value' => 'Prinsip-prinsip yang memandu praktik kami dan mendefinisikan budaya kerja kami', 'type' => 'textarea', 'label' => 'Values Subtitle', 'order' => 8],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_title', 'value' => '25 Tahun Keunggulan', 'type' => 'text', 'label' => 'Timeline Title', 'order' => 9],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_subtitle', 'value' => 'Tonggak-tonggak penting dalam perjalanan firma kami', 'type' => 'textarea', 'label' => 'Timeline Subtitle', 'order' => 10],

            // Layanan
            ['page' => 'services', 'section' => 'hero', 'key' => 'services_hero_title', 'value' => 'Layanan Hukum Kami', 'type' => 'text', 'label' => 'Hero Title', 'order' => 1],
            ['page' => 'services', 'section' => 'hero', 'key' => 'services_hero_subtitle', 'value' => 'Solusi hukum komprehensif dan strategis yang disesuaikan untuk melindungi hak Anda dan memajukan kepentingan Anda.', 'type' => 'textarea', 'label' => 'Hero Subtitle', 'order' => 2],
            ['page' => 'services', 'section' => 'approach', 'key' => 'services_approach_title', 'value' => 'Pendekatan Kami', 'type' => 'text', 'label' => 'Approach Title', 'order' => 3],
            ['page' => 'services', 'section' => 'approach', 'key' => 'services_approach_subtitle', 'value' => 'Bagaimana kami memberikan keunggulan', 'type' => 'text', 'label' => 'Approach Subtitle', 'order' => 4],

            // Tim
            ['page' => 'team', 'section' => 'hero', 'key' => 'team_hero_title', 'value' => 'Temui Para Ahli Kami', 'type' => 'text', 'label' => 'Hero Title', 'order' => 1],
            ['page' => 'team', 'section' => 'hero', 'key' => 'team_hero_subtitle', 'value' => 'Profesional hukum berpengalaman kami berdedikasi untuk memberikan layanan terbaik dan mencapai hasil optimal bagi klien.', 'type' => 'textarea', 'label' => 'Hero Subtitle', 'order' => 2],

            // Artikel
            ['page' => 'articles', 'section' => 'hero', 'key' => 'articles_hero_title', 'value' => 'Wawasan & Berita Hukum', 'type' => 'text', 'label' => 'Hero Title', 'order' => 1],
            ['page' => 'articles', 'section' => 'hero', 'key' => 'articles_hero_subtitle', 'value' => 'Tetap terinformasi dengan pembaruan hukum, analisis, dan liputan dari tim profesional hukum kami.', 'type' => 'textarea', 'label' => 'Hero Subtitle', 'order' => 2],
            ['page' => 'articles', 'section' => 'newsletter', 'key' => 'articles_newsletter_title', 'value' => 'Tetap Terinformasi', 'type' => 'text', 'label' => 'Newsletter Title', 'order' => 3],
            ['page' => 'articles', 'section' => 'newsletter', 'key' => 'articles_newsletter_subtitle', 'value' => 'Berlangganan newsletter kami untuk wawasan hukum terbaru dan analisis ahli langsung ke kotak masuk Anda.', 'type' => 'textarea', 'label' => 'Newsletter Subtitle', 'order' => 4],

            // Kontak
            ['page' => 'contact', 'section' => 'hero', 'key' => 'contact_hero_title', 'value' => 'Kontak Kami', 'type' => 'text', 'label' => 'Hero Title', 'order' => 1],
            ['page' => 'contact', 'section' => 'hero', 'key' => 'contact_hero_subtitle', 'value' => 'Siap membahas kebutuhan hukum Anda? Hubungi tim kami untuk konsultasi gratis.', 'type' => 'textarea', 'label' => 'Hero Subtitle', 'order' => 2],
            ['page' => 'contact', 'section' => 'info', 'key' => 'contact_info_title', 'value' => 'Mari Mulai Percakapan', 'type' => 'text', 'label' => 'Contact Info Title', 'order' => 3],
            ['page' => 'contact', 'section' => 'info', 'key' => 'contact_info_subtitle', 'value' => 'Baik Anda memiliki pertanyaan hukum spesifik atau membutuhkan representasi hukum komprehensif, tim kami siap membantu. Hubungi kami hari ini untuk menjadwalkan konsultasi gratis Anda.', 'type' => 'textarea', 'label' => 'Contact Info Subtitle', 'order' => 4],
        ];

        foreach ($contents as $content) {
            PageContent::updateOrCreate(
                ['key' => $content['key']],
                $content
            );
        }
    }
}
