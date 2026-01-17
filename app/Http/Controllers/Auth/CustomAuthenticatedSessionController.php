<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CustomAuthenticatedSessionController
{
    /**
     * عرض صفحة تسجيل الدخول
     */
    public function create()
    {
        return view('auth.login');
    }
    public function register() {
        return view('auth.register');
    }

    /**
     * تنفيذ عملية تسجيل الدخول
     */
    public function store(Request $request)
    {
        // تحقق من بيانات المستخدم
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // بعد تسجيل الدخول، وجّه المستخدم إلى الـ dashboard
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ]);
    }

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
