<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('auth.Register') }}</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />

    <!-- Google Fonts: Cairo for Arabic, Inter for English -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            blue: '#1e40af', 
                            'blue-light': '#3b82f6',
                            'blue-dark': '#1d4ed8',
                            green: '#10b981', 
                            'green-dark': '#059669',
                            navy: '#0f172a',
                        }
                    },
                    fontFamily: {
                        cairo: ['Cairo', 'sans-serif'],
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: {{ app()->getLocale() == 'ar' ? "'Cairo'" : "'Inter'" }}, sans-serif !important;
            margin: 0 !important;
            padding: 0 !important;
            background-color: #f8fafc;
        }

        /* Glassmorphism navigation */
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        /* Float animation */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-15px) scale(1.03); }
        }
        .animate-float {
            animation: float-slow 6s ease-in-out infinite;
        }

        /* Animated Floating Glass Shapes Background */
        .floating-glass-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            pointer-events: none;
            z-index: 1;
        }

        .floating-glass-shapes li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            animation: animateShapes 25s linear infinite;
            bottom: -150px;
            border-radius: 10px;
        }

        .floating-glass-shapes li:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-delay: 0s; }
        .floating-glass-shapes li:nth-child(2) { left: 10%; width: 30px; height: 30px; animation-delay: 2s; animation-duration: 12s; border-radius: 50%; }
        .floating-glass-shapes li:nth-child(3) { left: 70%; width: 40px; height: 40px; animation-delay: 4s; }
        .floating-glass-shapes li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s; border-radius: 50%; }
        .floating-glass-shapes li:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-delay: 0s; }
        .floating-glass-shapes li:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-delay: 3s; }
        .floating-glass-shapes li:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-delay: 7s; }
        .floating-glass-shapes li:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-delay: 15s; animation-duration: 45s; border-radius: 50%; }
        .floating-glass-shapes li:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-delay: 2s; animation-duration: 35s; }
        .floating-glass-shapes li:nth-child(10) { left: 85%; width: 150px; height: 150px; animation-delay: 0s; animation-duration: 11s; }

        @keyframes animateShapes {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 10px; }
            100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
        }
    </style>
</head>
<body class="antialiased text-slate-800 selection:bg-brand-blue selection:text-white">

    <div class="relative min-h-screen flex items-center justify-center bg-slate-900 overflow-hidden py-12 px-4 sm:px-6 lg:px-8">
        <!-- Background Image with Cover -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-50" style="background-image: url('{{ asset('assets/images/school-hero-bg.png') }}');"></div>
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/80 via-slate-900/60 to-slate-950/90 backdrop-blur-[4px] pointer-events-none"></div>
        
        <!-- Decorative subtle grid -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff05_1px,transparent_1px),linear-gradient(to_bottom,#ffffff05_1px,transparent_1px)] bg-[size:4rem_4rem] pointer-events-none"></div>

        <!-- Animated Floating Glass Shapes -->
        <ul class="floating-glass-shapes">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

        <div class="max-w-md w-full space-y-8 glass-card p-10 rounded-3xl shadow-2xl z-10 relative border border-white/20">
            
            <!-- Language Switcher -->
            <div class="absolute top-6 {{ app()->getLocale() == 'ar' ? 'left-6' : 'right-6' }} z-50">
                <div class="relative inline-block text-left" id="lang-dropdown-wrapper">
                    <button type="button" id="lang-dropdown-btn" class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-slate-600 bg-white/60 hover:text-brand-blue hover:bg-white transition duration-300 border border-slate-200 shadow-sm focus:outline-none">
                        <i class="fa-solid fa-globe text-sm"></i>
                        <span class="text-xs font-bold uppercase">{{ app()->getLocale() }}</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition duration-300" id="lang-chevron"></i>
                    </button>
                    <div id="lang-dropdown-menu" class="hidden absolute {{ app()->getLocale() == 'ar' ? 'left-0' : 'right-0' }} mt-2 w-36 rounded-xl bg-white border border-slate-100 shadow-xl py-1.5 z-50">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a rel="alternate" class="flex items-center justify-between px-3.5 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-brand-blue transition font-semibold" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <span>{{ $properties['native'] }}</span>
                                @if(app()->getLocale() == $localeCode)
                                    <i class="fa-solid fa-circle-check text-xs text-brand-green"></i>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <a href="{{ url('/') }}" class="inline-block transform hover:scale-110 transition duration-300">
                    <div class="w-20 h-20 mx-auto rounded-2xl bg-gradient-to-tr from-brand-blue to-indigo-500 text-white flex items-center justify-center text-4xl shadow-lg shadow-brand-blue/30">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                </a>
                <h2 class="mt-6 text-3xl font-black text-slate-900 tracking-tight {{ app()->getLocale() == 'ar' ? 'font-cairo' : 'font-inter' }}">
                    {{ trans('auth.Register_title') }}
                </h2>
                <p class="mt-2 text-sm text-slate-500 font-medium">
                    {{ trans('auth.Register_subtitle') }}
                </p>
            </div>

            <!-- Errors -->
            @if ($errors->any())
                <div class="mb-4 bg-red-50/90 backdrop-blur-sm border border-red-200 text-red-600 rounded-2xl p-4 shadow-sm">
                    <div class="font-bold text-sm mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ trans('auth.validation_error') }}
                    </div>
                    <ul class="text-xs space-y-1 font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ trans($error) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
                @csrf

                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-bold text-slate-700 mb-1.5">{{ trans('auth.Name') }}</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-4' : 'left-0 pl-4' }} flex items-center pointer-events-none">
                                <i class="fa-regular fa-user text-slate-400"></i>
                            </div>
                            <input id="name" name="name" type="text" value="{{ old('name') }}"  autofocus autocomplete="name" 
                                class="block w-full {{ app()->getLocale() == 'ar' ? 'pr-11 pl-4' : 'pl-11 pr-4' }} py-3.5 border border-slate-200 rounded-xl text-slate-900 bg-white/60 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-blue/50 focus:border-brand-blue transition-all duration-300 sm:text-sm font-medium shadow-sm hover:border-brand-blue/30 placeholder-slate-400" 
                                placeholder="{{ app()->getLocale() == 'ar' ? 'الاسم الكامل' : 'Full Name' }}">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-bold text-slate-700 mb-1.5">{{ trans('auth.Email') }}</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-4' : 'left-0 pl-4' }} flex items-center pointer-events-none">
                                <i class="fa-regular fa-envelope text-slate-400"></i>
                            </div>
                            <input id="email" name="email" type="email" value="{{ old('email') }}"  autocomplete="username" 
                                class="block w-full {{ app()->getLocale() == 'ar' ? 'pr-11 pl-4' : 'pl-11 pr-4' }} py-3.5 border border-slate-200 rounded-xl text-slate-900 bg-white/60 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-blue/50 focus:border-brand-blue transition-all duration-300 sm:text-sm font-medium shadow-sm hover:border-brand-blue/30 placeholder-slate-400" 
                                placeholder="name@example.com">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-bold text-slate-700 mb-1.5">{{ trans('auth.Password') }}</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'right-0 pr-4' : 'left-0 pl-4' }} flex items-center pointer-events-none">
                                <i class="fa-solid fa-lock text-slate-400"></i>
                            </div>
                            <input id="password" name="password" type="password"  autocomplete="new-password" 
                                class="block w-full px-11 py-3.5 border border-slate-200 rounded-xl text-slate-900 bg-white/60 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-blue/50 focus:border-brand-blue transition-all duration-300 sm:text-sm font-medium shadow-sm hover:border-brand-blue/30 placeholder-slate-400" 
                                placeholder="••••••••">
                            <button type="button" onclick="togglePassword('password', 'togglePasswordIcon')" tabindex="-1" class="absolute inset-y-0 {{ app()->getLocale() == 'ar' ? 'left-0 pl-4' : 'right-0 pr-4' }} flex items-center text-slate-400 hover:text-brand-blue transition-colors duration-300 focus:outline-none">
                                <i id="togglePasswordIcon" class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>


                    <!-- Terms & Conditions (if enabled) -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="flex items-start gap-3 pt-1">
                            <input type="checkbox" name="terms" id="terms" required 
                                class="mt-1 h-4 w-4 rounded border-slate-200 text-brand-blue focus:ring-brand-blue/50 focus:ring-2 transition-all duration-300">
                            <label for="terms" class="text-xs text-slate-500 font-medium leading-tight">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="font-bold text-brand-blue hover:text-brand-blue-dark transition-colors duration-300 underline">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="font-bold text-brand-blue hover:text-brand-blue-dark transition-colors duration-300 underline">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </label>
                        </div>
                    @endif
                </div>

                <div class="pt-3">
                    <button type="submit" 
                        class="w-full flex justify-center items-center gap-3 py-4 px-4 border border-transparent text-sm font-black rounded-2xl text-white bg-gradient-to-r from-brand-blue to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-blue transition-all duration-300 shadow-xl shadow-brand-blue/30 transform hover:-translate-y-1">
                        {{ trans('auth.Register_btn') }}
                        <i class="fa-solid fa-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                    </button>
                </div>
                
                <div class="text-center mt-6 pt-6 border-t border-slate-200">
                    <p class="text-sm font-medium text-slate-500">
                        {{ trans('auth.Already registered?') }} 
                        <a href="{{ route('login') }}" class="font-bold text-brand-blue hover:text-brand-blue-dark transition-colors duration-300 ml-1 mr-1 relative after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-brand-blue after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:duration-300">
                            {{ trans('auth.Log in') }}
                        </a>
                    </p>
                </div>
            </form>
            
            <!-- Link Back to Home -->
            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-brand-blue transition duration-300 group">
                    <i class="fa-solid fa-house group-hover:-translate-y-1 transition duration-300"></i>
                    <span>{{ __('welcome.system_title') }}</span>
                </a>
            </div>
        </div>
    </div>
</body>
<script>
    // Password Toggle
    function togglePassword(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    // Language Dropdown controller
    const langDropdownBtn = document.getElementById('lang-dropdown-btn');
    const langDropdownMenu = document.getElementById('lang-dropdown-menu');
    const langChevron = document.getElementById('lang-chevron');

    if (langDropdownBtn) {
        langDropdownBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            langDropdownMenu.classList.toggle('hidden');
            langChevron.classList.toggle('rotate-180');
        });

        document.addEventListener('click', () => {
            if (!langDropdownMenu.classList.contains('hidden')) {
                langDropdownMenu.classList.add('hidden');
                langChevron.classList.remove('rotate-180');
            }
        });
    }
</script>
</html>
