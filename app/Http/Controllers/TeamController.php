<?php
// app/Http/Controllers/TeamController.php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::active()->get();

        $pageContents = \App\Models\PageContent::getByPage('team');
        
        $contents = [];
        foreach ($pageContents as $content) {
            $contents[$content->key] = $content->value;
        }

        $defaults = [
            'team_hero_title' => 'Temui Para Ahli Kami',
            'team_hero_subtitle' => 'Profesional hukum berpengalaman kami berdedikasi untuk memberikan layanan terbaik dan mencapai hasil optimal bagi klien.',
        ];

        $contents = array_merge($defaults, $contents);

        return view('team.team', compact('teams', 'contents'));
    }
}