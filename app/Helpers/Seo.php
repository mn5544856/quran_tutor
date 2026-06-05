<?php

namespace App\Helpers;

class Seo
{
    public static function url()
    {
        return rtrim(config('app.url'), '/');
    }

    public static function canonical()
    {
        $path = request()->path();

        // Home page fix
        if ($path === '/' || $path === '') {
            return self::url();
        }

        return self::url() . '/' . trim($path, '/');
    }

    public static function title($title = null)
    {
        return $title
            ? $title . ' | Ilm e Quran Academy'
            : 'Ilm e Quran Academy | Learn Ilm e Quran with Expert Teachers';
    }

    public static function description($desc = null)
    {
        return $desc
            ?: 'Learn Ilm e Quran online with expert one-to-one teachers. Flexible Quran classes for kids and adults with Tajweed and memorization.';
    }

    public static function keywords($keywords = null)
    {
        return $keywords
            ?: 'online Quran classes, Quran academy, Tajweed, , Noorani Qaida, Quran learning online';
    }

    public static function ogImage()
    {
        return asset('images/og-image.jpeg');
    }

    public static function ogUrl()
    {
        return self::canonical();
    }
}