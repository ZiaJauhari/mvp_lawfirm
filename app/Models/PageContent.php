<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'section',
        'key',
        'value',
        'type',
        'label',
        'order'
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Get content by key
     */
    public static function getByKey($key, $default = null)
    {
        $content = self::where('key', $key)->first();
        return $content ? $content->value : $default;
    }

    /**
     * Get all content for a page
     */
    public static function getByPage($page)
    {
        return self::where('page', $page)->orderBy('order')->get();
    }

    /**
     * Get all content for a page section
     */
    public static function getBySection($page, $section)
    {
        return self::where('page', $page)
            ->where('section', $section)
            ->orderBy('order')
            ->get();
    }
}
