<?php
// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->get();

        $pageContents = \App\Models\PageContent::getByPage('services');
        
        $contents = [];
        foreach ($pageContents as $content) {
            $contents[$content->key] = $content->value;
        }

        $defaults = [
            'services_hero_title' => 'Layanan Hukum Kami',
            'services_hero_subtitle' => 'Solusi hukum komprehensif dan strategis yang disesuaikan untuk melindungi hak Anda dan memajukan kepentingan Anda.',
            'services_approach_title' => 'Pendekatan Kami',
            'services_approach_subtitle' => 'Bagaimana kami memberikan keunggulan',
        ];

        $contents = array_merge($defaults, $contents);

        return view('services.services', compact('services', 'contents'));
    }

    public function show(string $slug)
    {
        $service = Service::query()->where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('services.show', compact('service'));
    }
}