<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Team;
use App\Models\Article;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\PageContent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->take(6)->get();
        $teams = Team::active()->take(4)->get();
        $articles = Article::published()->take(3)->get();
        $testimonials = Testimonial::active()->take(6)->get();

        // Get page contents for home page
        $pageContents = PageContent::getByPage('home');
        
        // Organize contents by key for easy access
        $contents = [];
        foreach ($pageContents as $content) {
            $contents[$content->key] = $content->value;
        }

        // Default values if not set
        $defaults = [
            'hero_title' => 'Membela Hak & Masa Depan Anda',
            'hero_subtitle' => 'Layanan hukum profesional dengan integritas dan keunggulan. Kami menyediakan solusi hukum komprehensif untuk individu dan bisnis.',
            'hero_badge' => 'Keunggulan Hukum Terpercaya',
            'services_title' => 'Bidang Praktik',
            'services_subtitle' => 'Layanan hukum komprehensif yang disesuaikan dengan kebutuhan Anda',
            'why_title' => 'Pengalaman & Keunggulan',
            'why_description' => 'Dengan pengalaman gabungan lebih dari 25 tahun, tim pengacara berdedikasi kami telah berhasil menangani ribuan kasus, memperoleh kepercayaan klien di seluruh negeri.',
            'team_title' => 'Temui Pengacara Kami',
            'team_subtitle' => 'Profesional berdedikasi yang berkomitmen pada kesuksesan Anda',
            'testimonials_title' => 'Apa Kata Klien',
            'testimonials_subtitle' => 'Kisah nyata dari klien nyata',
            'articles_title' => 'Wawasan Hukum',
            'cta_title' => 'Siap Memulai?',
            'cta_subtitle' => 'Jadwalkan konsultasi gratis dengan tim hukum berpengalaman kami hari ini.',
            'stat_experience' => '25',
            'stat_cases' => '1000',
            'stat_lawyers' => '50',
            'stat_success' => '98',
        ];

        // Merge defaults with custom content
        $contents = array_merge($defaults, $contents);

        // Calculate stats for dashboard
        $stats = [
            'total_services' => Service::count(),
            'total_team' => Team::count(),
            'total_articles' => Article::count(),
            'pending_orders' => Contact::unread()->count(),
        ];

        return view('home.home', compact('services', 'teams', 'articles', 'testimonials', 'stats', 'contents'));
    }
}
