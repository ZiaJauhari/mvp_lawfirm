<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Service;
use App\Models\Team;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index()
    {
        $stats = [
            'articles' => Article::count(),
            'services' => Service::count(),
            'team' => Team::count(),
            'testimonials' => Testimonial::count(),
            'contacts' => Contact::count(),
            'unread_contacts' => Contact::unread()->count(),
        ];

        $recent_contacts = Contact::latest()->take(5)->get();
        $recent_articles = Article::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_contacts', 'recent_articles'));
    }
}
