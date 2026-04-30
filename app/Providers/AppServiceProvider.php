<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\PageContent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share footer content globally
        $footerItems = PageContent::getByPage('footer');
        $footer = [];
        foreach ($footerItems as $item) {
            $footer[$item->key] = $item->value;
        }

        // Auto-create footer_title if it doesn't exist in DB to make it appear in Admin
        if (!isset($footer['footer_title'])) {
            try {
                PageContent::create([
                    'page' => 'footer',
                    'section' => 'brand',
                    'key' => 'footer_title',
                    'value' => 'Clarity in Every Legal Move',
                    'type' => 'text',
                    'label' => 'Judul Footer',
                    'order' => 0
                ]);
                // Refresh list
                $footerItems = PageContent::getByPage('footer');
                foreach ($footerItems as $item) {
                    $footer[$item->key] = $item->value;
                }
            } catch (\Exception $e) {
                // Silently fail if DB not ready
            }
        }

        // Auto-migrate Twitter to TikTok if it exists
        if (isset($footer['footer_twitter']) && !isset($footer['footer_tiktok'])) {
            try {
                PageContent::query()->where('key', 'footer_twitter')->update([
                    'key' => 'footer_tiktok',
                    'label' => 'URL TikTok',
                ]);
                // Refresh list
                $footerItems = PageContent::getByPage('footer');
                $footer = [];
                foreach ($footerItems as $item) {
                    $footer[$item->key] = $item->value;
                }
            } catch (\Exception $e) {}
        }

        // Ensure TikTok exists if still missing
        if (!isset($footer['footer_tiktok'])) {
            try {
                PageContent::create([
                    'page' => 'footer',
                    'section' => 'sosial_media',
                    'key' => 'footer_tiktok',
                    'value' => '#',
                    'type' => 'text',
                    'label' => 'URL TikTok',
                    'order' => 22
                ]);
                // Final refresh
                $footerItems = PageContent::getByPage('footer');
                foreach ($footerItems as $item) {
                    $footer[$item->key] = $item->value;
                }
            } catch (\Exception $e) {}
        }

        $defaults = [
            'footer_title'         => 'Clarity in Every Legal Move',
            'footer_description'   => 'Layanan hukum profesional dengan integritas dan keunggulan. Solusi hukum komprehensif untuk individu dan bisnis.',
            'footer_address'       => 'Jl. Sudirman No. 123<br>Jakarta Pusat, 10220',
            'footer_address_2'     => 'Jl. P. Diponegoro No. 45<br>Samarinda, Kalimantan Timur',
            'footer_phone'         => '+62 21 1234 5678',
            'footer_email'         => 'info@mvplaw.id',
            'footer_whatsapp'      => '+62 812 3456 7890',
            'footer_whatsapp_link' => 'https://wa.me/6281234567890',
            'footer_office_hours'  => 'Senin–Jumat: 08.00–17.00 WIB',
            'footer_copyright'     => 'MVP Law Firm. Hak cipta dilindungi undang-undang.',
            'footer_instagram'     => '#',
            'footer_facebook'      => '#',
            'footer_tiktok'        => '#',
            'footer_linkedin'      => '#',
        ];

        $footer = array_merge($defaults, $footer);
        View::share('footerContents', $footer);
    }
}
