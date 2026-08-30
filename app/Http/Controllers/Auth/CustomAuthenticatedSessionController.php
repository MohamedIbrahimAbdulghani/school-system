<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CustomAuthenticatedSessionController
{
    /**
     * صفحة اختيار نوع تسجيل الدخول
     */
    public function create()
    {
        // return view('auth.login');
        return view('auth.login-type');
    }

    /**
     * عرض صفحة تسجيل الدخول حسب نوع المستخدم
     */
    public function showLoginForm($type)
    {
        $allowedTypes = [
            'admin',
            'teacher',
            'student',
            'parent',
        ];

        abort_unless(in_array($type, $allowedTypes), 404);

        return view('auth.login', compact('type'));
    }

    /**
     * صفحة التسجيل
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * تنفيذ عملية تسجيل الدخول
     */
    public function store(Request $request, $type)
    {
        // Set the app locale from the session
        $locale = session('locale', app()->getLocale());
        app()->setLocale($locale);

        // تحديد الـ Guard حسب نوع المستخدم
        $guards = [
            'admin' => 'web',
            'teacher' => 'teacher',
            'student' => 'student',
            'parent' => 'parent',
        ];

        abort_unless(isset($guards[$type]), 404);

        $guard = $guards[$type];

        // التحقق من بيانات الدخول
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // محاولة تسجيل الدخول
        if (Auth::guard($guard)->attempt($credentials)) {

            $request->session()->regenerate();

            // Dashboard حسب نوع المستخدم
            return match ($type) {

                'admin' => redirect()->route('dashboard'),

                'teacher' => redirect()->route('teacher.dashboard'),

                'student' => redirect()->route('student.dashboard'),

                'parent' => redirect()->route('parent.dashboard'),
            };
        }

        return back()->withErrors([
            'email' => trans('auth.failed'),
        ])->onlyInput('email');
    }

    /**
     * تسجيل الخروج
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // هات اللغة من الكوكي
        $locale = $request->cookie('locale', app()->getLocale());

        // Redirect للصفحة الرئيسية بنفس اللغة
        return redirect(
            LaravelLocalization::getLocalizedURL($locale, '/')
        );
    }
}
