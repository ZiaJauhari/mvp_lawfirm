<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;

class CompletePageContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // ================== ABOUT PAGE ==================
            ['page' => 'about', 'section' => 'quote', 'key' => 'about_quote_text', 'value' => 'Keadilan bukan hanya sebuah kata — itu adalah komitmen yang kami pegang setiap hari.', 'type' => 'textarea', 'label' => 'Teks Kutipan (Quote)', 'order' => 10],
            ['page' => 'about', 'section' => 'quote', 'key' => 'about_quote_author', 'value' => 'Pendiri MVP Law Firm', 'type' => 'text', 'label' => 'Penulis Kutipan', 'order' => 11],
            
            ['page' => 'about', 'section' => 'values', 'key' => 'about_value_1_title', 'value' => 'Integritas', 'type' => 'text', 'label' => 'Nilai 1: Judul', 'order' => 20],
            ['page' => 'about', 'section' => 'values', 'key' => 'about_value_1_desc', 'value' => 'Komitmen tak tergoyahkan terhadap praktik etis dan nasihat yang jujur kepada setiap klien.', 'type' => 'textarea', 'label' => 'Nilai 1: Deskripsi', 'order' => 21],
            ['page' => 'about', 'section' => 'values', 'key' => 'about_value_2_title', 'value' => 'Keunggulan', 'type' => 'text', 'label' => 'Nilai 2: Judul', 'order' => 22],
            ['page' => 'about', 'section' => 'values', 'key' => 'about_value_2_desc', 'value' => 'Pengejaran tanpa henti terhadap standar tertinggi dalam setiap kasus yang kami tangani.', 'type' => 'textarea', 'label' => 'Nilai 2: Deskripsi', 'order' => 23],
            ['page' => 'about', 'section' => 'values', 'key' => 'about_value_3_title', 'value' => 'Fokus Klien', 'type' => 'text', 'label' => 'Nilai 3: Judul', 'order' => 24],
            ['page' => 'about', 'section' => 'values', 'key' => 'about_value_3_desc', 'value' => 'Menempatkan kebutuhan dan kepentingan klien selalu di atas segalanya dalam setiap keputusan.', 'type' => 'textarea', 'label' => 'Nilai 3: Deskripsi', 'order' => 25],
            ['page' => 'about', 'section' => 'values', 'key' => 'about_value_4_title', 'value' => 'Inovasi', 'type' => 'text', 'label' => 'Nilai 4: Judul', 'order' => 26],
            ['page' => 'about', 'section' => 'values', 'key' => 'about_value_4_desc', 'value' => 'Menerapkan pendekatan modern dan kreatif sambil menghormati tradisi dan nilai hukum.', 'type' => 'textarea', 'label' => 'Nilai 4: Deskripsi', 'order' => 27],

            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_1_year', 'value' => '1999', 'type' => 'text', 'label' => 'Timeline 1: Tahun', 'order' => 30],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_1_title', 'value' => 'Firma Didirikan', 'type' => 'text', 'label' => 'Timeline 1: Judul', 'order' => 31],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_1_desc', 'value' => 'MVP Law Firm didirikan dengan visi menyediakan layanan hukum berkualitas tinggi yang dapat diakses oleh semua kalangan.', 'type' => 'textarea', 'label' => 'Timeline 1: Deskripsi', 'order' => 32],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_2_year', 'value' => '2005', 'type' => 'text', 'label' => 'Timeline 2: Tahun', 'order' => 33],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_2_title', 'value' => 'Ekspansi Regional', 'type' => 'text', 'label' => 'Timeline 2: Judul', 'order' => 34],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_2_desc', 'value' => 'Membuka kantor tambahan dan memperluas tim untuk melayani lebih banyak klien di berbagai wilayah Indonesia.', 'type' => 'textarea', 'label' => 'Timeline 2: Deskripsi', 'order' => 35],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_3_year', 'value' => '2012', 'type' => 'text', 'label' => 'Timeline 3: Tahun', 'order' => 36],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_3_title', 'value' => 'Penghargaan Nasional', 'type' => 'text', 'label' => 'Timeline 3: Judul', 'order' => 37],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_3_desc', 'value' => 'Menerima berbagai penghargaan bergengsi untuk keunggulan di bidang hukum korporasi dan keluarga dari asosiasi nasional.', 'type' => 'textarea', 'label' => 'Timeline 3: Deskripsi', 'order' => 38],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_4_year', 'value' => '2018', 'type' => 'text', 'label' => 'Timeline 4: Tahun', 'order' => 39],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_4_title', 'value' => 'Transformasi Digital', 'type' => 'text', 'label' => 'Timeline 4: Judul', 'order' => 40],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_4_desc', 'value' => 'Mengadopsi teknologi hukum terkini untuk meningkatkan layanan dan aksesibilitas klien secara digital.', 'type' => 'textarea', 'label' => 'Timeline 4: Deskripsi', 'order' => 41],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_5_year', 'value' => '2024', 'type' => 'text', 'label' => 'Timeline 5: Tahun', 'order' => 42],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_5_title', 'value' => 'Inovasi & Pertumbuhan', 'type' => 'text', 'label' => 'Timeline 5: Judul', 'order' => 43],
            ['page' => 'about', 'section' => 'timeline', 'key' => 'about_timeline_5_desc', 'value' => 'Meluncurkan layanan digital inovatif dan memperluas tim ke 50+ pengacara ahli di berbagai bidang hukum.', 'type' => 'textarea', 'label' => 'Timeline 5: Deskripsi', 'order' => 44],

            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_1_number', 'value' => '25', 'type' => 'text', 'label' => 'Statistik 1: Angka', 'order' => 50],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_1_label', 'value' => 'Tahun Pengalaman', 'type' => 'text', 'label' => 'Statistik 1: Label', 'order' => 51],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_1_desc', 'value' => 'Melayani klien sejak 1999', 'type' => 'text', 'label' => 'Statistik 1: Keterangan', 'order' => 52],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_2_number', 'value' => '50', 'type' => 'text', 'label' => 'Statistik 2: Angka', 'order' => 53],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_2_label', 'value' => 'Pengacara Ahli', 'type' => 'text', 'label' => 'Statistik 2: Label', 'order' => 54],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_2_desc', 'value' => 'Profesional hukum berdedikasi', 'type' => 'text', 'label' => 'Statistik 2: Keterangan', 'order' => 55],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_3_number', 'value' => '10000', 'type' => 'text', 'label' => 'Statistik 3: Angka', 'order' => 56],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_3_label', 'value' => 'Kasus Ditangani', 'type' => 'text', 'label' => 'Statistik 3: Label', 'order' => 57],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_3_desc', 'value' => 'Representasi yang sukses', 'type' => 'text', 'label' => 'Statistik 3: Keterangan', 'order' => 58],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_4_number', 'value' => '98', 'type' => 'text', 'label' => 'Statistik 4: Angka', 'order' => 59],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_4_label', 'value' => 'Tingkat Keberhasilan', 'type' => 'text', 'label' => 'Statistik 4: Label', 'order' => 60],
            ['page' => 'about', 'section' => 'stats', 'key' => 'about_stat_4_desc', 'value' => 'Kepuasan klien terjamin', 'type' => 'text', 'label' => 'Statistik 4: Keterangan', 'order' => 61],


            // ================== SERVICES PAGE ==================
            ['page' => 'services', 'section' => 'process', 'key' => 'services_process_1_title', 'value' => 'Konsultasi', 'type' => 'text', 'label' => 'Proses 1: Judul', 'order' => 10],
            ['page' => 'services', 'section' => 'process', 'key' => 'services_process_1_desc', 'value' => 'Konsultasi awal gratis untuk memahami kebutuhan hukum Anda secara menyeluruh', 'type' => 'textarea', 'label' => 'Proses 1: Deskripsi', 'order' => 11],
            ['page' => 'services', 'section' => 'process', 'key' => 'services_process_2_title', 'value' => 'Analisis', 'type' => 'text', 'label' => 'Proses 2: Judul', 'order' => 12],
            ['page' => 'services', 'section' => 'process', 'key' => 'services_process_2_desc', 'value' => 'Analisis kasus mendalam dan perumusan strategi hukum yang tepat sasaran', 'type' => 'textarea', 'label' => 'Proses 2: Deskripsi', 'order' => 13],
            ['page' => 'services', 'section' => 'process', 'key' => 'services_process_3_title', 'value' => 'Eksekusi', 'type' => 'text', 'label' => 'Proses 3: Judul', 'order' => 14],
            ['page' => 'services', 'section' => 'process', 'key' => 'services_process_3_desc', 'value' => 'Representasi hukum profesional dan manajemen kasus yang terstruktur', 'type' => 'textarea', 'label' => 'Proses 3: Deskripsi', 'order' => 15],
            ['page' => 'services', 'section' => 'process', 'key' => 'services_process_4_title', 'value' => 'Resolusi', 'type' => 'text', 'label' => 'Proses 4: Judul', 'order' => 16],
            ['page' => 'services', 'section' => 'process', 'key' => 'services_process_4_desc', 'value' => 'Mencapai hasil terbaik dan memastikan kepuasan klien sepenuhnya', 'type' => 'textarea', 'label' => 'Proses 4: Deskripsi', 'order' => 17],

            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_1_title', 'value' => 'Dasar', 'type' => 'text', 'label' => 'Paket 1: Nama', 'order' => 20],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_1_desc', 'value' => 'Untuk masalah hukum sederhana', 'type' => 'text', 'label' => 'Paket 1: Deskripsi', 'order' => 21],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_1_price', 'value' => 'Hubungi Kami', 'type' => 'text', 'label' => 'Paket 1: Harga', 'order' => 22],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_1_subprice', 'value' => 'Harga sesuai kebutuhan', 'type' => 'text', 'label' => 'Paket 1: Sub Harga', 'order' => 23],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_1_features', 'value' => 'Konsultasi Awal Gratis
Tinjauan Dokumen
Saran Hukum Dasar
Dukungan via Email', 'type' => 'textarea', 'label' => 'Paket 1: Fitur (tiap baris)', 'order' => 24],

            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_2_title', 'value' => 'Profesional', 'type' => 'text', 'label' => 'Paket 2: Nama', 'order' => 25],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_2_desc', 'value' => 'Untuk kebutuhan hukum menengah-kompleks', 'type' => 'text', 'label' => 'Paket 2: Deskripsi', 'order' => 26],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_2_price', 'value' => 'Hubungi Kami', 'type' => 'text', 'label' => 'Paket 2: Harga', 'order' => 27],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_2_subprice', 'value' => 'Konsultasi & penawaran gratis', 'type' => 'text', 'label' => 'Paket 2: Sub Harga', 'order' => 28],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_2_features', 'value' => 'Semua di Paket Dasar
Strategi Kasus Mendalam
Representasi Pengadilan
Dukungan Prioritas
Persiapan & Review Dokumen', 'type' => 'textarea', 'label' => 'Paket 2: Fitur (tiap baris)', 'order' => 29],

            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_3_title', 'value' => 'Enterprise', 'type' => 'text', 'label' => 'Paket 3: Nama', 'order' => 30],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_3_desc', 'value' => 'Untuk bisnis & korporasi besar', 'type' => 'text', 'label' => 'Paket 3: Deskripsi', 'order' => 31],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_3_price', 'value' => 'Kustom', 'type' => 'text', 'label' => 'Paket 3: Harga', 'order' => 32],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_3_subprice', 'value' => 'Sesuai skala & kebutuhan bisnis', 'type' => 'text', 'label' => 'Paket 3: Sub Harga', 'order' => 33],
            ['page' => 'services', 'section' => 'pricing', 'key' => 'services_pricing_3_features', 'value' => 'Semua di Paket Profesional
Tim Hukum Khusus
Dukungan Prioritas 24/7
Manajemen Kepatuhan
Solusi Hukum Kustom', 'type' => 'textarea', 'label' => 'Paket 3: Fitur (tiap baris)', 'order' => 34],


            // ================== CONTACT PAGE ==================
            ['page' => 'contact', 'section' => 'map', 'key' => 'contact_map_title', 'value' => 'Kunjungi Kantor Kami', 'type' => 'text', 'label' => 'Peta: Judul', 'order' => 10],
            ['page' => 'contact', 'section' => 'map', 'key' => 'contact_map_subtitle', 'value' => 'Terletak strategis di pusat kota', 'type' => 'text', 'label' => 'Peta: Deskripsi', 'order' => 11],
            
            ['page' => 'contact', 'section' => 'faq', 'key' => 'contact_faq_section_title', 'value' => 'Pertanyaan yang Sering Diajukan', 'type' => 'text', 'label' => 'FAQ: Judul Seksi', 'order' => 20],
            ['page' => 'contact', 'section' => 'faq', 'key' => 'contact_faq_section_subtitle', 'value' => 'Temukan jawaban untuk pertanyaan umum tentang layanan kami', 'type' => 'text', 'label' => 'FAQ: Deskripsi Seksi', 'order' => 21],
            
            ['page' => 'contact', 'section' => 'faq', 'key' => 'contact_faq_1_q', 'value' => 'Bagaimana cara menjadwalkan konsultasi?', 'type' => 'text', 'label' => 'FAQ 1: Pertanyaan', 'order' => 22],
            ['page' => 'contact', 'section' => 'faq', 'key' => 'contact_faq_1_a', 'value' => 'Anda dapat menjadwalkan konsultasi dengan mengisi formulir kontak, menelepon kantor kami secara langsung, atau mengirim email kepada kami. Kami menawarkan konsultasi tatap muka dan virtual.', 'type' => 'textarea', 'label' => 'FAQ 1: Jawaban', 'order' => 23],
            ['page' => 'contact', 'section' => 'faq', 'key' => 'contact_faq_2_q', 'value' => 'Apa yang harus saya bawa ke pertemuan pertama?', 'type' => 'text', 'label' => 'FAQ 2: Pertanyaan', 'order' => 24],
            ['page' => 'contact', 'section' => 'faq', 'key' => 'contact_faq_2_a', 'value' => 'Harap bawa dokumen apa pun yang relevan dengan kasus Anda, identifikasi, dan daftar pertanyaan yang ingin Anda diskusikan. Ini membantu kami memberikan saran yang paling akurat.', 'type' => 'textarea', 'label' => 'FAQ 2: Jawaban', 'order' => 25],
            ['page' => 'contact', 'section' => 'faq', 'key' => 'contact_faq_3_q', 'value' => 'Bagaimana struktur biaya Anda?', 'type' => 'text', 'label' => 'FAQ 3: Pertanyaan', 'order' => 26],
            ['page' => 'contact', 'section' => 'faq', 'key' => 'contact_faq_3_a', 'value' => 'Struktur biaya kami bervariasi tergantung pada jenis kasus. Kami menawarkan tarif per jam, biaya tetap, dan pengaturan kontingensi. Kami akan membahas semua biaya secara transparan selama konsultasi Anda.', 'type' => 'textarea', 'label' => 'FAQ 3: Jawaban', 'order' => 27],
            ['page' => 'contact', 'section' => 'faq', 'key' => 'contact_faq_4_q', 'value' => 'Apakah Anda menawarkan rencana pembayaran?', 'type' => 'text', 'label' => 'FAQ 4: Pertanyaan', 'order' => 28],
            ['page' => 'contact', 'section' => 'faq', 'key' => 'contact_faq_4_a', 'value' => 'Ya, kami memahami bahwa layanan hukum dapat menjadi investasi yang signifikan. Kami menawarkan rencana pembayaran fleksibel untuk membantu membuat representasi hukum berkualitas dapat diakses.', 'type' => 'textarea', 'label' => 'FAQ 4: Jawaban', 'order' => 29],

            // ================== HOME PAGE ==================
            ['page' => 'home', 'section' => 'why_features', 'key' => 'home_feat_1_title', 'value' => 'Rekam Jejak Terbukti', 'type' => 'text', 'label' => 'Fitur 1: Judul', 'order' => 40],
            ['page' => 'home', 'section' => 'why_features', 'key' => 'home_feat_1_desc', 'value' => 'Tingkat keberhasilan 98% di semua bidang praktik hukum kami', 'type' => 'textarea', 'label' => 'Fitur 1: Deskripsi', 'order' => 41],
            ['page' => 'home', 'section' => 'why_features', 'key' => 'home_feat_2_title', 'value' => 'Perhatian Personal', 'type' => 'text', 'label' => 'Fitur 2: Judul', 'order' => 42],
            ['page' => 'home', 'section' => 'why_features', 'key' => 'home_feat_2_desc', 'value' => 'Setiap kasus mendapatkan fokus dan strategi yang berdedikasi penuh', 'type' => 'textarea', 'label' => 'Fitur 2: Deskripsi', 'order' => 43],
            ['page' => 'home', 'section' => 'why_features', 'key' => 'home_feat_3_title', 'value' => 'Ketersediaan 24/7', 'type' => 'text', 'label' => 'Fitur 3: Judul', 'order' => 44],
            ['page' => 'home', 'section' => 'why_features', 'key' => 'home_feat_3_desc', 'value' => 'Dukungan hukum darurat 24 jam untuk masalah mendesak Anda', 'type' => 'textarea', 'label' => 'Fitur 3: Deskripsi', 'order' => 45],
            ['page' => 'home', 'section' => 'why_features', 'key' => 'home_feat_4_title', 'value' => 'Biaya Transparan', 'type' => 'text', 'label' => 'Fitur 4: Judul', 'order' => 46],
            ['page' => 'home', 'section' => 'why_features', 'key' => 'home_feat_4_desc', 'value' => 'Tidak ada biaya tersembunyi — konsultasi awal selalu gratis', 'type' => 'textarea', 'label' => 'Fitur 4: Deskripsi', 'order' => 47],
        ];

        foreach ($contents as $content) {
            PageContent::updateOrCreate(
                ['page' => $content['page'], 'key' => $content['key']],
                $content
            );
        }
    }
}
