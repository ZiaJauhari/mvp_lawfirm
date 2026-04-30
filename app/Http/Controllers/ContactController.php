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
            'contact_map_jakarta_iframe' => '',
            'contact_map_samarinda_iframe' => '',
        ];

        // Ensure map keys exist in database for Admin to see
        foreach (['contact_map_jakarta_iframe' => 'Embed Map Jakarta', 'contact_map_samarinda_iframe' => 'Embed Map Samarinda'] as $key => $label) {
            if (!isset($contents[$key])) {
                try {
                    \App\Models\PageContent::create([
                        'page' => 'contact',
                        'section' => 'map',
                        'key' => $key,
                        'value' => '',
                        'type' => 'textarea',
                        'label' => $label,
                        'order' => 50
                    ]);
                    $contents[$key] = '';
                } catch (\Exception $e) {}
            }
        }

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

        \App\Models\ContactMessage::create($validated);

        return redirect()->route('contact')->with('success', 'Terima kasih atas pesan Anda. Kami akan menghubungi Anda segera!');
    }
}
