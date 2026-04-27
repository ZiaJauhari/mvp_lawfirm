<?php
// app/Http/Controllers/AboutController.php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $pageContents = PageContent::getByPage('about');
        
        $contents = [];
        foreach ($pageContents as $content) {
            $contents[$content->key] = $content->value;
        }

        $defaults = [
            'about_hero_title' => 'Cerita Kami',
            'about_hero_subtitle' => 'Didirikan atas prinsip integritas, keunggulan, dan dedikasi klien, MVP Law Firm telah melayani individu dan bisnis selama lebih dari 25 tahun.',
            'about_mission_title' => 'Misi Kami',
            'about_mission_text' => 'Memberikan layanan hukum yang luar biasa yang melindungi hak dan kepentingan klien kami, sambil mempertahankan standar tertinggi etika profesional dan integritas. Kami berusaha membuat representasi hukum berkualitas dapat diakses oleh semua.',
            'about_vision_title' => 'Visi Kami',
            'about_vision_text' => 'Menjadi mitra hukum yang paling tepercaya untuk individu dan bisnis — dikenal karena keahlian, inovasi, dan komitmen tak tergoyahkan terhadap kesuksesan klien. Kami menetapkan standar keunggulan dalam industri hukum.',
            'about_values_title' => 'Apa yang Kami Junjung',
            'about_values_subtitle' => 'Prinsip-prinsip yang memandu praktik kami dan mendefinisikan budaya kerja kami',
            'about_timeline_title' => '25 Tahun Keunggulan',
            'about_timeline_subtitle' => 'Tonggak-tonggak penting dalam perjalanan firma kami',
        ];

        $contents = array_merge($defaults, $contents);

        return view('about.about', compact('contents'));
    }
}