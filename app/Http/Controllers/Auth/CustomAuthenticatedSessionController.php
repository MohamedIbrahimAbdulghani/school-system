<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CustomAuthenticatedSessionController
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // هات اللغة من الكوكي (أو خليها اللغة الحالية لو مفيش كوكي)
        $locale = $request->cookie('locale', app()->getLocale());

        // اعمل redirect على الصفحة الرئيسية بنفس اللغة
        return redirect(LaravelLocalization::getLocalizedURL($locale, '/'));
    }
}