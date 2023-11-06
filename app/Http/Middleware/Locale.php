<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;

class Locale
{
    public function handle($request, Closure $next)
    {
        
        $defaultLang = env('APP_INSTALL') ? Setting::where(['name' => 'default_language', 'type' => 'General'])->first()->value : 'en';
        $locale = is_null($defaultLang) ? 'en' : $defaultLang;
        app()->setLocale($locale);
        return $next($request);
    }
}
