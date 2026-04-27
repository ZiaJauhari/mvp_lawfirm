<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $pageContents = \App\Models\PageContent::getByPage('contact');
        
        $contents = [];
        foreach ($pageContents as $content) {
            $contents[$content->key] = $content->value;
        }

        $defaults = [
            'contact_hero_title' => 'Kontak Kami',
            'contact_hero_subtitle' => 'Siap membahas kebutuhan hukum Anda? Hubungi tim kami untuk konsultasi gratis.',
            'contact_info_title' => 'Mari Mulai Percakapan',
            'contact_info_subtitle' => 'Baik Anda memiliki pertanyaan hukum spesifik atau membutuhkan representasi hukum komprehensif, tim kami siap membantu.',
        ];

        $contents = array_merge($defaults, $contents);

        return view('contact.contact', compact('contents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'practice_area' => 'nullable|string|max:100',
            'message' => 'required|string|max:5000',
        ]);

        // Here you would typically send an email or save to database
        // For now, we'll just redirect back with a success message

        return redirect()->route('contact')->with('success', 'Terima kasih atas pesan Anda. Kami akan menghubungi Anda segera!');
    }
}
