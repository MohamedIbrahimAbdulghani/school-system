<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginValidationRequest;
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
    public function store(LoginValidationRequest $request, $type)
    {
        // Set the app locale from the session (saved during GET request)
        $locale = session('locale', app()->getLocale());
        app()->setLocale($locale);

        $allowedTypes = ['admin', 'teacher', 'student', 'parent'];

        abort_unless(in_array($type, $allowedTypes), 404);

        // تحقق من بيانات المستخدم
        $credentials = $request->only('email', 'password');

        if (Auth::guard($type)->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => trans('auth.failed'),
        ]);
    }

    /**
     * تسجيل الخروج
     */

    // Get the authenticated guard
    private function getAuthenticatedGuard()
    {
        foreach (['admin', 'teacher', 'student', 'parent'] as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }

        return null;
    }

    public function destroy(Request $request)
    {
        // Auth::guard('web')->logout();
        $guard = $this->getAuthenticatedGuard();

        if ($guard) {
            Auth::guard($guard)->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // هات اللغة من الكوكي
        $locale = $request->cookie('locale', app()->getLocale());

        // اعمل redirect على الصفحة الرئيسية بنفس اللغة
        return redirect(LaravelLocalization::getLocalizedURL($locale, '/'));
    }
}