<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;

class FooterContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // Footer - Brand
            ['page' => 'footer', 'section' => 'brand', 'key' => 'footer_title', 'value' => 'Clarity in Every Legal Move', 'type' => 'text', 'label' => 'Judul Footer', 'order' => 0],
            ['page' => 'footer', 'section' => 'brand', 'key' => 'footer_description', 'value' => 'MVP Lawfirm membantu Anda mengambil keputusan hukum dengan kejelasan, strategi, dan arah yang terukur.', 'type' => 'textarea', 'label' => 'Deskripsi Footer', 'order' => 1],

            // Footer - Contact Info
            ['page' => 'footer', 'section' => 'kontak', 'key' => 'footer_address', 'value' => 'Jl. Sudirman No. 123<br>Jakarta Pusat, 10220', 'type' => 'textarea', 'label' => 'Alamat Kantor 1 (Jakarta)', 'order' => 10],
            ['page' => 'footer', 'section' => 'kontak', 'key' => 'footer_address_2', 'value' => 'Jl. P. Diponegoro No. 45<br>Samarinda, Kalimantan Timur', 'type' => 'textarea', 'label' => 'Alamat Kantor 2 (Samarinda)', 'order' => 11],
            ['page' => 'footer', 'section' => 'kontak', 'key' => 'footer_phone', 'value' => '+62 21 1234 5678', 'type' => 'text', 'label' => 'Nomor Telepon', 'order' => 11],
            ['page' => 'footer', 'section' => 'kontak', 'key' => 'footer_email', 'value' => 'info@mvplaw.id', 'type' => 'text', 'label' => 'Email', 'order' => 12],
            ['page' => 'footer', 'section' => 'kontak', 'key' => 'footer_whatsapp', 'value' => '+62 812 3456 7890', 'type' => 'text', 'label' => 'Nomor WhatsApp (Tampilan)', 'order' => 13],
            ['page' => 'footer', 'section' => 'kontak', 'key' => 'footer_whatsapp_link', 'value' => 'https://wa.me/6281234567890', 'type' => 'text', 'label' => 'Link WhatsApp (URL)', 'order' => 14],
            ['page' => 'footer', 'section' => 'kontak', 'key' => 'footer_office_hours', 'value' => 'Senin–Jumat: 08.00–17.00 WIB', 'type' => 'text', 'label' => 'Jam Operasional', 'order' => 15],

            // Footer - Social Media
            ['page' => 'footer', 'section' => 'sosial_media', 'key' => 'footer_linkedin', 'value' => '#', 'type' => 'text', 'label' => 'URL LinkedIn', 'order' => 20],
            ['page' => 'footer', 'section' => 'sosial_media', 'key' => 'footer_twitter', 'value' => '#', 'type' => 'text', 'label' => 'URL Twitter / X', 'order' => 21],
            ['page' => 'footer', 'section' => 'sosial_media', 'key' => 'footer_facebook', 'value' => '#', 'type' => 'text', 'label' => 'URL Facebook', 'order' => 22],
            ['page' => 'footer', 'section' => 'sosial_media', 'key' => 'footer_instagram', 'value' => '#', 'type' => 'text', 'label' => 'URL Instagram', 'order' => 23],

            // Footer - Copyright
            ['page' => 'footer', 'section' => 'lainnya', 'key' => 'footer_copyright', 'value' => 'MVP Law Firm. Hak cipta dilindungi undang-undang.', 'type' => 'text', 'label' => 'Teks Hak Cipta', 'order' => 30],
        ];

        foreach ($contents as $content) {
            PageContent::updateOrCreate(
                ['key' => $content['key']],
                $content
            );
        }
    }
}
