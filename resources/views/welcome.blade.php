<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('welcome.system_title') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/logo-icon-dark.jpg') }}" type="image/x-icon" media="(prefers-color-scheme: light)" />
    <link rel="icon" href="{{ asset('assets/images/logo-icon-light.jpg') }}" type="image/x-icon" media="(prefers-color-scheme: dark)" />

    <!-- Google Fonts: Cairo for Arabic, Inter for English -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Animate On Scroll (AOS) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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
        /* Modern Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        html, body {
            overflow-x: hidden !important;
            max-width: 100% !important;
        }

        body {
            font-family: {{ app()->getLocale() == 'ar' ? "'Cairo'" : "'Inter'" }}, sans-serif !important;
            margin: 0 !important;
            padding: 0 !important;
            background-color: #f8fafc !important;
            scroll-behavior: smooth;
        }

        /* Glassmorphism navigation */
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Float animation */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-15px) scale(1.03); }
        }
        .animate-float {
            animation: float-slow 6s ease-in-out infinite;
        }

        /* Custom glow effects */
        .glow-blue {
            box-shadow: 0 0 40px -10px rgba(37, 99, 235, 0.2);
        }
        .glow-green {
            box-shadow: 0 0 40px -10px rgba(16, 185, 129, 0.2);
        }
    </style>
</head>
<body class="antialiased text-slate-800 selection:bg-brand-blue selection:text-white">

    <!-- Navigation Bar -->
    <header class="fixed top-0 z-50 w-full transition-all duration-300 border-b glass-nav border-slate-100/80">
        <div class="flex items-center justify-between px-4 py-3 mx-auto max-w-7xl sm:px-6">
            <!-- Logo Section -->
            <a href="#" class="flex items-center gap-2 sm:gap-3">
                <img src="{{ asset('assets/images/logo-icon-dark.jpg') }}" alt="Logo" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full shadow-sm">
                <span class="text-base font-black text-transparent lg:text-xl bg-clip-text bg-gradient-to-r from-brand-blue to-indigo-600">
                    {{ __('welcome.system_title') }}
                </span>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="items-center hidden gap-5 text-sm font-semibold lg:flex text-slate-600">
                <a href="#features" class="transition duration-300 hover:text-brand-blue whitespace-nowrap">{{ __('welcome.nav_features') }}</a>
                <a href="#roles" class="transition duration-300 hover:text-brand-blue whitespace-nowrap">{{ app()->getLocale() == 'ar' ? 'الأدوار' : 'Roles' }}</a>
                <a href="#about" class="transition duration-300 hover:text-brand-blue whitespace-nowrap">{{ __('welcome.nav_about') }}</a>
                <a href="#contact" class="transition duration-300 hover:text-brand-blue whitespace-nowrap">{{ __('welcome.nav_contact') }}</a>
            </nav>

            <!-- Language and Auth Controls -->
            <div class="flex items-center gap-3">

                <!-- Language Selector -->
                <div class="relative inline-block text-start" id="lang-dropdown-wrapper">
                    <button type="button" id="lang-dropdown-btn" class="inline-flex items-center gap-1.5 px-2.5 py-2 rounded-lg text-slate-600 hover:text-brand-blue hover:bg-slate-100 transition duration-300 border border-slate-200">
                        <i class="text-sm fa-solid fa-globe"></i>
                        <span class="text-xs font-bold uppercase">{{ app()->getLocale() }}</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition duration-300" id="lang-chevron"></i>
                    </button>
                    <div id="lang-dropdown-menu" class="hidden absolute {{ app()->getLocale() == 'ar' ? 'left-0' : 'right-0' }} mt-2 w-36 rounded-xl bg-white border border-slate-100 shadow-xl py-1.5 z-50">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a rel="alternate" class="flex items-center justify-between px-3.5 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-brand-blue transition font-semibold" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <span>{{ $properties['native'] }}</span>
                                @if(app()->getLocale() == $localeCode)
                                    <i class="text-xs fa-solid fa-circle-check text-brand-green"></i>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Auth Buttons -->
                <div class="items-center hidden gap-2 sm:flex">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-brand-blue to-blue-700 text-white font-bold text-sm px-4 py-2 rounded-lg hover:shadow-lg hover:shadow-blue-500/20 transform hover:-translate-y-0.5 transition duration-300">
                            <i class="text-xs fa-solid fa-table-columns"></i>
                            <span>{{ __('welcome.go_to_dashboard') }}</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-bold transition duration-300 text-slate-600 hover:text-brand-blue">
                            {{ __('welcome.login') }}
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-brand-blue to-blue-700 text-white font-bold text-sm px-4 py-2 rounded-lg hover:shadow-lg hover:shadow-blue-500/20 transform hover:-translate-y-0.5 transition duration-300">
                                {{ __('welcome.start_now') }}
                            </a>
                        @endif
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button type="button" id="mobile-menu-btn" class="p-2 transition duration-300 rounded-lg lg:hidden text-slate-600 hover:text-brand-blue hover:bg-slate-100">
                    <i class="text-xl fa-solid fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden px-6 py-4 space-y-3 bg-white border-t shadow-inner lg:hidden border-slate-100">
            <a href="#features" class="block py-1 font-semibold transition duration-300 text-slate-600 hover:text-brand-blue">{{ __('welcome.nav_features') }}</a>
            <a href="#roles" class="block py-1 font-semibold transition duration-300 text-slate-600 hover:text-brand-blue">{{ __('welcome.roles_title') }}</a>
            <a href="#stats" class="block py-1 font-semibold transition duration-300 text-slate-600 hover:text-brand-blue">{{ __('welcome.stats_title') }}</a>
            <a href="#about" class="block py-1 font-semibold transition duration-300 text-slate-600 hover:text-brand-blue">{{ __('welcome.nav_about') }}</a>
            <a href="#contact" class="block py-1 font-semibold transition duration-300 text-slate-600 hover:text-brand-blue">{{ __('welcome.nav_contact') }}</a>
            <hr class="border-slate-100">
            <div class="flex flex-col gap-2 pt-2">
                @auth
                    <a href="{{ url('/dashboard') }}" class="flex items-center justify-center gap-2 bg-brand-blue text-white font-bold py-2.5 rounded-xl shadow-md">
                        <i class="fa-solid fa-table-columns"></i>
                        <span>{{ __('welcome.go_to_dashboard') }}</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex items-center justify-center border border-slate-200 text-slate-700 font-bold py-2.5 rounded-xl hover:bg-slate-50 transition">
                        {{ __('welcome.login') }}
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="flex items-center justify-center bg-brand-blue text-white font-bold py-2.5 rounded-xl shadow-md">
                            {{ __('welcome.start_now') }}
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </header>


    <!-- Hero Section -->
    <section class="relative flex items-center justify-center min-h-screen pb-16 overflow-hidden bg-slate-900 pt-28 lg:pt-36 lg:pb-20">
        <!-- Background Image with Cover -->
        <div class="absolute inset-0 bg-center bg-no-repeat bg-cover" style="background-image: url('{{ asset('assets/images/school-hero-bg.png') }}');"></div>

        <!-- Overlay: Glassmorphic dark gradient for stunning readability -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/75 via-slate-900/60 to-slate-950/85 backdrop-blur-[2px]"></div>

        <!-- Decorative subtle grid -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff03_1px,transparent_1px),linear-gradient(to_bottom,#ffffff03_1px,transparent_1px)] bg-[size:4rem_4rem]"></div>

        <!-- Floating Backdrop Orbs for rich aesthetics -->
        <div class="absolute rounded-full top-1/4 left-1/10 w-96 h-96 bg-brand-blue-light/10 blur-3xl animate-float"></div>
        <div class="absolute rounded-full bottom-1/4 right-1/10 w-80 h-80 bg-brand-green/10 blur-3xl animate-float" style="animation-delay: 3s;"></div>

        <div class="relative z-10 w-full px-6 mx-auto text-center max-w-7xl">

            <!-- Hero Text Block (Centered) -->
            <div class="max-w-4xl mx-auto" data-aos="fade-up">

                <h1 class="mb-6 text-3xl font-black leading-tight text-white sm:text-5xl md:text-6xl lg:text-7xl font-cairo drop-shadow-md">
                    {{ __('welcome.hero_title') }}
                </h1>
                <p class="max-w-3xl mx-auto mb-10 text-base font-medium leading-relaxed sm:text-lg md:text-xl lg:text-2xl text-slate-200 drop-shadow-sm">
                    {{ __('welcome.hero_description') }}
                </p>

                <!-- Call to Action Buttons -->
                <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center w-full gap-3 px-8 py-4 text-lg font-extrabold text-white transition duration-300 transform shadow-xl sm:w-auto bg-gradient-to-r from-brand-blue to-blue-700 hover:from-blue-600 hover:to-blue-850 rounded-2xl shadow-blue-500/20 hover:shadow-blue-500/30 hover:-translate-y-1">
                            <i class="fa-solid fa-table-columns"></i>
                            <span>{{ __('welcome.go_to_dashboard') }}</span>
                        </a>
                    @else
                        <a href="#features" class="inline-flex items-center justify-center w-full gap-3 px-8 py-4 text-base font-black text-white transition duration-300 transform border sm:w-auto bg-white/10 hover:bg-white/20 border-white/20 md:text-lg rounded-2xl backdrop-blur-md hover:-translate-y-1">
                            <span>{{ __('welcome.explore_system') }}</span>
                            <i class="text-xs fa-solid fa-arrow-down animate-bounce"></i>
                        </a>
                    @endauth
                </div>
            </div>

        </div>
    </section>


    <!-- Features Section -->
    <section id="features" class="relative py-24 bg-white">
        <div class="px-6 mx-auto max-w-7xl">

            <div class="max-w-3xl mx-auto mb-20 text-center" data-aos="fade-up">
                <h2 class="mb-4 text-3xl font-extrabold md:text-4xl text-slate-900 font-cairo">
                    {{ __('welcome.features_title') }}
                </h2>
                <div class="w-16 h-1.5 bg-brand-blue rounded-full mx-auto mb-6"></div>
                <p class="text-lg text-slate-600">
                    {{ __('welcome.features_subtitle') }}
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

                <!-- Feature 1: Stages -->
                <div class="flex flex-col items-start gap-5 p-8 transition duration-300 border shadow-sm bg-slate-50 border-slate-100 hover:border-brand-blue/30 rounded-3xl hover:shadow-xl hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-center text-2xl transition duration-300 w-14 h-14 rounded-2xl bg-brand-blue-light/10 text-brand-blue-light group-hover:bg-brand-blue group-hover:text-white">
                        <i class="fa-solid fa-folder-tree"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900">{{ __('welcome.feature_stages') }}</h3>
                    <p class="text-sm leading-relaxed text-slate-650">{{ __('welcome.feature_stages_desc') }}</p>
                </div>

                <!-- Feature 2: Students -->
                <div class="flex flex-col items-start gap-5 p-8 transition duration-300 border shadow-sm bg-slate-50 border-slate-100 hover:border-brand-blue/30 rounded-3xl hover:shadow-xl hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-center text-2xl transition duration-300 w-14 h-14 rounded-2xl bg-brand-green/10 text-brand-green group-hover:bg-brand-green group-hover:text-white">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900">{{ __('welcome.feature_students') }}</h3>
                    <p class="text-sm leading-relaxed text-slate-650">{{ __('welcome.feature_students_desc') }}</p>
                </div>

                <!-- Feature 3: Finance -->
                <div class="flex flex-col items-start gap-5 p-8 transition duration-300 border shadow-sm bg-slate-50 border-slate-100 hover:border-brand-blue/30 rounded-3xl hover:shadow-xl hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center justify-center text-2xl text-purple-600 transition duration-300 w-14 h-14 rounded-2xl bg-purple-150/15 group-hover:bg-purple-600 group-hover:text-white">
                        <i class="fa-solid fa-credit-card"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900">{{ __('welcome.feature_finance') }}</h3>
                    <p class="text-sm leading-relaxed text-slate-650">{{ __('welcome.feature_finance_desc') }}</p>
                </div>

                <!-- Feature 4: Exams -->
                <div class="flex flex-col items-start gap-5 p-8 transition duration-300 border shadow-sm bg-slate-50 border-slate-100 hover:border-brand-blue/30 rounded-3xl hover:shadow-xl hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-center text-2xl transition duration-300 w-14 h-14 rounded-2xl bg-amber-100/20 text-amber-500 group-hover:bg-amber-500 group-hover:text-white">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900">{{ __('welcome.feature_exams') }}</h3>
                    <p class="text-sm leading-relaxed text-slate-650">{{ __('welcome.feature_exams_desc') }}</p>
                </div>

                <!-- Feature 5: Library -->
                <div class="flex flex-col items-start gap-5 p-8 transition duration-300 border shadow-sm bg-slate-50 border-slate-100 hover:border-brand-blue/30 rounded-3xl hover:shadow-xl hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-center text-2xl transition duration-300 w-14 h-14 rounded-2xl bg-rose-100/20 text-rose-500 group-hover:bg-rose-500 group-hover:text-white">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900">{{ __('welcome.feature_library') }}</h3>
                    <p class="text-sm leading-relaxed text-slate-650">{{ __('welcome.feature_library_desc') }}</p>
                </div>

                <!-- Feature 6: Online Learning -->
                <div class="flex flex-col items-start gap-5 p-8 transition duration-300 border shadow-sm bg-slate-50 border-slate-100 hover:border-brand-blue/30 rounded-3xl hover:shadow-xl hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center justify-center text-2xl transition duration-300 w-14 h-14 rounded-2xl bg-cyan-100/20 text-cyan-550 group-hover:bg-cyan-500 group-hover:text-white">
                        <i class="fa-solid fa-video"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900">{{ __('welcome.feature_online_learning') }}</h3>
                    <p class="text-sm leading-relaxed text-slate-650">{{ __('welcome.feature_online_learning_desc') }}</p>
                </div>

            </div>
        </div>
    </section>


    <!-- Roles Section -->
    <section id="roles" class="py-24 overflow-hidden bg-slate-50">
        <div class="px-6 mx-auto max-w-7xl">

            <div class="max-w-3xl mx-auto mb-20 text-center" data-aos="fade-up">
                <h2 class="mb-4 text-3xl font-extrabold md:text-4xl text-slate-900">
                    {{ __('welcome.roles_title') }}
                </h2>
                <div class="w-16 h-1.5 bg-brand-green rounded-full mx-auto mb-6"></div>
                <p class="text-lg text-slate-650">
                    {{ __('welcome.roles_subtitle') }}
                </p>
            </div>

            <!-- Roles Grid -->
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">

                <!-- Admin Card -->
                <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition duration-300 overflow-hidden border border-slate-100 flex flex-col h-full" data-aos="fade-up" data-aos-delay="100">
                    <div class="h-2.5 bg-brand-blue"></div>
                    <div class="flex flex-col items-start flex-grow gap-4 p-8">
                        <div class="flex items-center justify-center w-12 h-12 text-xl font-bold rounded-xl bg-brand-blue/10 text-brand-blue">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-slate-900">{{ __('welcome.role_admin') }}</h3>
                        <p class="flex-grow text-sm leading-relaxed text-slate-600">{{ __('welcome.role_admin_desc') }}</p>
                        <div class="w-full pt-4 space-y-2 text-xs font-semibold border-t border-slate-50 text-slate-500">
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-brand-blue"></i> {{ app()->getLocale() == 'ar' ? 'تهيئة النظام والفروع والمراحل' : 'System & Branch configuration' }}</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-brand-blue"></i> {{ app()->getLocale() == 'ar' ? 'إدارة الموظفين والتقارير المالية' : 'Staff & Financial accounting' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Teacher Card -->
                <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition duration-300 overflow-hidden border border-slate-100 flex flex-col h-full" data-aos="fade-up" data-aos-delay="200">
                    <div class="h-2.5 bg-brand-green"></div>
                    <div class="flex flex-col items-start flex-grow gap-4 p-8">
                        <div class="flex items-center justify-center w-12 h-12 text-xl font-bold rounded-xl bg-brand-green/10 text-brand-green">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-slate-900">{{ __('welcome.role_teacher') }}</h3>
                        <p class="flex-grow text-sm leading-relaxed text-slate-600">{{ __('welcome.role_teacher_desc') }}</p>
                        <div class="w-full pt-4 space-y-2 text-xs font-semibold border-t border-slate-50 text-slate-500">
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-brand-green"></i> {{ app()->getLocale() == 'ar' ? 'تسجيل الحضور والغياب للطلاب' : 'Daily student attendance' }}</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-brand-green"></i> {{ app()->getLocale() == 'ar' ? 'بناء الاختبارات ومراقبة النتائج' : 'Online test builder & grading' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Student Card -->
                <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition duration-300 overflow-hidden border border-slate-100 flex flex-col h-full" data-aos="fade-up" data-aos-delay="300">
                    <div class="h-2.5 bg-indigo-500"></div>
                    <div class="flex flex-col items-start flex-grow gap-4 p-8">
                        <div class="flex items-center justify-center w-12 h-12 text-xl font-bold text-indigo-500 rounded-xl bg-indigo-550/10">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-slate-900">{{ __('welcome.role_student') }}</h3>
                        <p class="flex-grow text-sm leading-relaxed text-slate-600">{{ __('welcome.role_student_desc') }}</p>
                        <div class="w-full pt-4 space-y-2 text-xs font-semibold border-t border-slate-50 text-slate-500">
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-indigo-500"></i> {{ app()->getLocale() == 'ar' ? 'حل الفروض والامتحانات مباشرة' : 'Online exams & assignments' }}</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-indigo-500"></i> {{ app()->getLocale() == 'ar' ? 'تحميل الملخصات والمناهج' : 'Syllabus & files download' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Parent Card -->
                <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition duration-300 overflow-hidden border border-slate-100 flex flex-col h-full" data-aos="fade-up" data-aos-delay="400">
                    <div class="h-2.5 bg-amber-500"></div>
                    <div class="flex flex-col items-start flex-grow gap-4 p-8">
                        <div class="flex items-center justify-center w-12 h-12 text-xl font-bold rounded-xl bg-amber-100/20 text-amber-500">
                            <i class="fa-solid fa-users-line"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-slate-900">{{ __('welcome.role_parent') }}</h3>
                        <p class="flex-grow text-sm leading-relaxed text-slate-600">{{ __('welcome.role_parent_desc') }}</p>
                        <div class="w-full pt-4 space-y-2 text-xs font-semibold border-t border-slate-50 text-slate-500">
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-amber-500"></i> {{ app()->getLocale() == 'ar' ? 'رصد المستوى الدراسي والدرجات' : 'Track marks & grades' }}</div>
                            <div class="flex items-center gap-2"><i class="fa-solid fa-circle text-[6px] text-amber-500"></i> {{ app()->getLocale() == 'ar' ? 'تسديد الرسوم والتقارير المالية' : 'Frictionless fees payments' }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Statistics Section -->
    <section id="stats" class="relative py-20 overflow-hidden text-white bg-gradient-to-r from-brand-blue to-indigo-900">
        <!-- Decoration element -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(255,255,255,0.05),transparent)]"></div>

        <div class="relative z-10 px-6 mx-auto max-w-7xl">
            <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
                <h2 class="mb-4 text-2xl font-extrabold text-white md:text-3xl">
                    {{ __('welcome.stats_title') }}
                </h2>
                <div class="w-12 h-1 mx-auto rounded-full bg-brand-green"></div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 gap-8 text-center lg:grid-cols-4 md:gap-12">

                <!-- Stat 1: Students -->
                <div class="space-y-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="mb-2 text-4xl text-brand-green"><i class="fa-solid fa-graduation-cap"></i></div>
                    <div class="text-4xl font-black tracking-tight text-white md:text-5xl stat-count" data-target="1200">0+</div>
                    <div class="text-sm font-semibold text-slate-350">{{ __('welcome.stats_students') }}</div>
                </div>

                <!-- Stat 2: Teachers -->
                <div class="space-y-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="mb-2 text-4xl text-brand-green"><i class="fa-solid fa-chalkboard-user"></i></div>
                    <div class="text-4xl font-black tracking-tight text-white md:text-5xl stat-count" data-target="80">0+</div>
                    <div class="text-sm font-semibold text-slate-350">{{ __('welcome.stats_teachers') }}</div>
                </div>

                <!-- Stat 3: Classrooms -->
                <div class="space-y-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="mb-2 text-4xl text-brand-green"><i class="fa-solid fa-school-flag"></i></div>
                    <div class="text-4xl font-black tracking-tight text-white md:text-5xl stat-count" data-target="50">0+</div>
                    <div class="text-sm font-semibold text-slate-350">{{ __('welcome.stats_classes') }}</div>
                </div>

                <!-- Stat 4: Exams -->
                <div class="space-y-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="mb-2 text-4xl text-brand-green"><i class="fa-solid fa-clipboard-question"></i></div>
                    <div class="text-4xl font-black tracking-tight text-white md:text-5xl stat-count" data-target="5000">0+</div>
                    <div class="text-sm font-semibold text-slate-350">{{ __('welcome.stats_exams') }}</div>
                </div>

            </div>
        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="relative py-24 bg-white">
        <div class="px-6 mx-auto max-w-7xl">
            <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">

                <!-- Left (Illustrative SVG Node Graph) -->
                <div class="order-last lg:col-span-5 lg:order-first" data-aos="fade-right">
                    <div class="flex items-center justify-center p-8 border shadow-sm bg-slate-50 border-slate-100 rounded-3xl">
                        <svg class="w-full h-64 max-w-sm" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Center School Node -->
                            <circle cx="100" cy="100" r="28" fill="#1e40af" fill-opacity="0.1" stroke="#1e40af" stroke-width="2" stroke-dasharray="3 3"/>
                            <circle cx="100" cy="100" r="20" fill="#1e40af"/>
                            <text x="100" y="104" fill="white" font-size="12" text-anchor="middle" font-family="Segoe UI Symbol">🏫</text>

                            <!-- Connected Lines -->
                            <line x1="100" y1="80" x2="100" y2="40" stroke="#cbd5e1" stroke-width="2"/>
                            <line x1="100" y1="120" x2="100" y2="160" stroke="#cbd5e1" stroke-width="2"/>
                            <line x1="80" y1="100" x2="40" y2="100" stroke="#cbd5e1" stroke-width="2"/>
                            <line x1="120" y1="100" x2="160" y2="100" stroke="#cbd5e1" stroke-width="2"/>

                            <!-- Admin Node -->
                            <circle cx="100" cy="35" r="15" fill="#3b82f6"/>
                            <text x="100" y="39" fill="white" font-size="10" text-anchor="middle" font-family="Segoe UI Symbol">🛡️</text>

                            <!-- Teacher Node -->
                            <circle cx="40" cy="100" r="15" fill="#10b981"/>
                            <text x="40" y="104" fill="white" font-size="10" text-anchor="middle" font-family="Segoe UI Symbol">👨‍🏫</text>

                            <!-- Student Node -->
                            <circle cx="160" cy="100" r="15" fill="#6366f1"/>
                            <text x="160" y="104" fill="white" font-size="10" text-anchor="middle" font-family="Segoe UI Symbol">🎓</text>

                            <!-- Parent Node -->
                            <circle cx="100" cy="165" r="15" fill="#f59e0b"/>
                            <text x="100" y="169" fill="white" font-size="10" text-anchor="middle" font-family="Segoe UI Symbol">👨‍👩‍👦</text>
                        </svg>
                    </div>
                </div>

                <!-- Right Description -->
                <div class="space-y-6 lg:col-span-7" data-aos="fade-left">
                    <span class="text-sm font-bold tracking-wider uppercase text-brand-blue">{{ __('welcome.nav_about') }}</span>
                    <h2 class="text-3xl font-extrabold leading-tight md:text-4xl text-slate-900 font-cairo">
                        {{ __('welcome.about_title') }}
                    </h2>
                    <p class="text-base leading-relaxed text-slate-650 md:text-lg">
                        {{ __('welcome.about_text') }}
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <div class="flex items-center gap-3 px-5 py-3 border bg-slate-50 border-slate-100 rounded-2xl">
                            <i class="text-lg fa-solid fa-shield-halved text-brand-blue"></i>
                            <span class="text-sm font-bold text-slate-700">{{ app()->getLocale() == 'ar' ? 'أمان وسرية عالية للبيانات' : 'Highly secure database' }}</span>
                        </div>
                        <div class="flex items-center gap-3 px-5 py-3 border bg-slate-50 border-slate-100 rounded-2xl">
                            <i class="text-lg fa-solid fa-bolt text-brand-green"></i>
                            <span class="text-sm font-bold text-slate-700">{{ app()->getLocale() == 'ar' ? 'سرعة فائقة وتجاوب كامل' : 'High performance & speed' }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="relative py-24 bg-slate-50">
        <div class="max-w-5xl px-6 mx-auto">

            <div class="relative p-8 space-y-8 overflow-hidden text-center bg-white border shadow-xl rounded-3xl border-slate-100 md:p-12 lg:p-16" data-aos="zoom-in">
                <!-- Background decoration glow -->
                <div class="absolute rounded-full -top-20 -right-20 w-44 h-44 bg-brand-green/10 blur-2xl"></div>
                <div class="absolute rounded-full -bottom-20 -left-20 w-44 h-44 bg-brand-blue/10 blur-2xl"></div>

                <div class="flex items-center justify-center w-16 h-16 mx-auto text-3xl rounded-2xl bg-brand-blue/10 text-brand-blue">
                    <i class="fa-solid fa-headset"></i>
                </div>

                <div class="max-w-2xl mx-auto space-y-4">
                    <h2 class="text-3xl font-extrabold text-slate-900 font-cairo">
                        {{ __('welcome.contact_title') }}
                    </h2>
                    <p class="text-base text-slate-650 md:text-lg">
                        {{ __('welcome.contact_text') }}
                    </p>
                </div>

                <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <a href="mailto:mohamedibrahimabdulghani@gmail.com" class="inline-flex items-center gap-3 bg-brand-blue hover:bg-brand-blue-dark text-white font-bold px-8 py-4 rounded-2xl shadow-lg shadow-brand-blue/20 transform hover:-translate-y-0.5 transition duration-300">
                        <i class="text-lg fa-solid fa-envelope"></i>
                        <span>mohamedibrahimabdulghani@gmail.com</span>
                    </a>
                </div>
            </div>

        </div>
    </section>


    <!-- Footer -->
    <footer class="py-16 border-t bg-slate-900 text-slate-400 border-slate-800">
        <div class="grid grid-cols-1 gap-12 px-6 mx-auto max-w-7xl md:grid-cols-12 md:gap-8">

            <!-- Branding Column -->
            <div class="space-y-5 md:col-span-5">
                <a href="#" class="flex items-center gap-3">
                    <span class="text-3xl">🏫</span>
                    <span class="text-xl font-black text-white">
                        {{ __('welcome.system_title') }}
                    </span>
                </a>
                <p class="max-w-sm text-sm leading-relaxed text-slate-400">
                    {{ app()->getLocale() == 'ar'
                       ? 'منصة برمجية متكاملة لربط الطالب والمعلم وولي الأمر بالإدارة المدرسية لتطوير الأداء الأكاديمي والعمليات المالية.'
                       : 'A smart software suite linking parents, students, and teachers directly with school operations.' }}
                </p>
                <div class="flex gap-4">
                    <a href="https://github.com/MohamedIbrahimAbdulghani" target="_blank" class="flex items-center justify-center w-10 h-10 transition duration-300 border rounded-xl bg-slate-800 border-slate-750 hover:bg-brand-blue hover:text-white">
                        <i class="text-lg fa-brands fa-github"></i>
                    </a>
                    <a href="mailto:mohamedibrahimabdulghani@gmail.com" class="flex items-center justify-center w-10 h-10 transition duration-300 border rounded-xl bg-slate-800 border-slate-750 hover:bg-brand-blue hover:text-white">
                        <i class="text-lg fa-solid fa-envelope"></i>
                    </a>
                </div>
            </div>

            <!-- Links Column -->
            <div class="space-y-4 md:col-span-3">
                <h4 class="text-base font-bold text-white">{{ app()->getLocale() == 'ar' ? 'روابط سريعة' : 'Quick Navigation' }}</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="#features" class="transition hover:text-white">{{ __('welcome.nav_features') }}</a></li>
                    <li><a href="#roles" class="transition hover:text-white">{{ __('welcome.roles_title') }}</a></li>
                    <li><a href="#stats" class="transition hover:text-white">{{ __('welcome.stats_title') }}</a></li>
                    <li><a href="#about" class="transition hover:text-white">{{ __('welcome.nav_about') }}</a></li>
                </ul>
            </div>

            <!-- Developer & GitHub Details -->
            <div class="space-y-4 md:col-span-4">
                <h4 class="text-base font-bold text-white">{{ app()->getLocale() == 'ar' ? 'مستودع الكود والمصدر' : 'Source Code' }}</h4>
                <p class="text-sm leading-relaxed">
                    {{ app()->getLocale() == 'ar'
                       ? 'المشروع مفتوح المصدر على مستودع GitHub لسهولة التطوير والاطلاع.'
                       : 'This project is fully open source on GitHub.' }}
                </p>
                <a href="https://github.com/MohamedIbrahimAbdulghani/school-system" target="_blank" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-750 border border-slate-700 text-white font-bold py-2.5 px-4 rounded-xl text-sm transition">
                    <i class="text-base fa-brands fa-github"></i>
                    <span>{{ __('welcome.github_repo') }}</span>
                </a>
            </div>

        </div>

        <div class="px-6 pt-8 mx-auto mt-12 space-y-4 text-xs text-center border-t max-w-7xl border-slate-800">
            <p>{{ __('welcome.footer_text') }}</p>
            <p class="font-medium text-slate-500">
                {{ __('welcome.developer_rights') }}
            </p>
        </div>
    </footer>


    <!-- AOS library scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- Scripts for dynamic behaviors -->
    <script>
        // Initialize Scroll Animations
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Mobile Menu controller
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Language Dropdown controller
        const langDropdownBtn = document.getElementById('lang-dropdown-btn');
        const langDropdownMenu = document.getElementById('lang-dropdown-menu');
        const langChevron = document.getElementById('lang-chevron');

        langDropdownBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            langDropdownMenu.classList.toggle('hidden');
            langChevron.classList.toggle('rotate-180');
        });

        document.addEventListener('click', () => {
            langDropdownMenu.classList.add('hidden');
            langChevron.classList.remove('rotate-180');
        });

        // Demo Login Modal controller
        const demoModal = document.getElementById('demo-modal');
        const modalBox = document.getElementById('modal-box');

        function openDemoModal() {
            demoModal.classList.remove('hidden');
            setTimeout(() => {
                modalBox.classList.remove('scale-95', 'opacity-0');
                modalBox.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        function closeDemoModal() {
            modalBox.classList.remove('scale-100', 'opacity-100');
            modalBox.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                demoModal.classList.add('hidden');
            }, 300);
        }

        // Copy Text Helper
        function copyText(elementId, btn) {
            const text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text).then(() => {
                const icon = btn.querySelector('i');
                icon.className = 'fa-solid fa-check text-brand-green';
                setTimeout(() => {
                    icon.className = 'fa-regular fa-copy';
                }, 2000);
            });
        }

        // Statistics Count Up Animation via Intersection Observer
        const counters = document.querySelectorAll('.stat-count');
        const speed = 100; // Counter animation speed

        const startCounting = (counter) => {
            const target = +counter.getAttribute('data-target');
            let count = 0;
            const increment = Math.ceil(target / speed);

            const updateCount = () => {
                count += increment;
                if (count < target) {
                    counter.innerText = count + '+';
                    setTimeout(updateCount, 15);
                } else {
                    counter.innerText = target + '+';
                }
            };
            updateCount();
        };

        const statsObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    startCounting(counter);
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => {
            statsObserver.observe(counter);
        });

        // Sticky Navbar scroll behavior
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('shadow-md', 'py-3');
                header.classList.remove('py-4');
            } else {
                header.classList.remove('shadow-md', 'py-3');
                header.classList.add('py-4');
            }
        });
    </script>
</body>
</html>
