<?php
// app/Http/Controllers/ArticleController.php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\PageContent;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $pageContents = PageContent::getByPage('articles');
        
        $contents = [];
        foreach ($pageContents as $content) {
            $contents[$content->key] = $content->value;
        }

        $defaults = [
            'articles_hero_title' => 'Wawasan & Berita Hukum',
            'articles_hero_subtitle' => 'Tetap terinformasi dengan pembaruan hukum, analisis, dan liputan dari tim profesional hukum kami.',
            'articles_newsletter_title' => 'Tetap Terinformasi',
            'articles_newsletter_subtitle' => 'Berlangganan newsletter kami untuk wawasan hukum terbaru dan analisis ahli langsung ke kotak masuk Anda.',
        ];

        $contents = array_merge($defaults, $contents);

        $query = Article::published();

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%');
            });
        }

        $articles = $query->paginate(9);
        $categories = Article::published()->distinct()->pluck('category');

        return view('articles.articles', compact('articles', 'categories', 'contents'));

    }

    public function show(string $slug)
    {
        $article = Article::query()->where('slug', $slug)->where('is_published', true)->firstOrFail();
        $article->incrementViews();
        
        $relatedArticles = Article::published()
            ->where('category', $article->category)
            ->where('id', '!=', $article->id)
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
