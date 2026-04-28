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
        $footerItems = PageContent::where('page', 'footer')->orderBy('order')->get();
        $footer = [];
        foreach ($footerItems as $item) {
            $footer[$item->key] = $item->value;
        }

        $defaults = [
            'footer_description'   => 'Layanan hukum profesional dengan integritas dan keunggulan. Solusi hukum komprehensif untuk individu dan bisnis.',
            'footer_address'       => 'Jl. Sudirman No. 123<br>Jakarta Pusat, 10220',
            'footer_address_2'     => 'Jl. P. Diponegoro No. 45<br>Samarinda, Kalimantan Timur',
            'footer_phone'         => '+62 21 1234 5678',
            'footer_email'         => 'info@mvplaw.id',
            'footer_whatsapp'      => '+62 812 3456 7890',
            'footer_whatsapp_link' => 'https://wa.me/6281234567890',
            'footer_office_hours'  => 'Senin–Jumat: 08.00–17.00 WIB',
            'footer_copyright'     => 'MVP Law Firm. Hak cipta dilindungi undang-undang.',
            'footer_linkedin'      => '#',
            'footer_twitter'       => '#',
            'footer_facebook'      => '#',
            'footer_instagram'     => '#',
        ];

        $footer = array_merge($defaults, $footer);
        View::share('footerContents', $footer);
    }
}
