
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('auth.Login') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/logo-icon-dark.jpg') }}" type="image/x-icon" media="(prefers-color-scheme: light)" />
    <link rel="icon" href="{{ asset('assets/images/logo-icon-light.jpg') }}" type="image/x-icon" media="(prefers-color-scheme: dark)" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Tailwind -->
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
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: {{ app()->getLocale() == 'ar' ? "'Cairo'" : "'Inter'" }},
            sans-serif !important;
        }

        /* Glass Effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        /* Floating Shapes */
        .floating-glass-shapes {
            position: absolute;
            inset: 0;
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
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            animation: animateShapes 25s linear infinite;
            bottom: -150px;
            border-radius: 10px;
        }

        .floating-glass-shapes li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .floating-glass-shapes li:nth-child(2) {
            left: 10%;
            width: 30px;
            height: 30px;
            animation-delay: 2s;
            animation-duration: 12s;
            border-radius: 50%;
        }

        .floating-glass-shapes li:nth-child(3) {
            left: 70%;
            width: 40px;
            height: 40px;
            animation-delay: 4s;
        }

        .floating-glass-shapes li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
            border-radius: 50%;
        }

        .floating-glass-shapes li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .floating-glass-shapes li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .floating-glass-shapes li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .floating-glass-shapes li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
            border-radius: 50%;
        }

        .floating-glass-shapes li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .floating-glass-shapes li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animateShapes {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 10px;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

        /* User Card Animation */
        .user-card {
            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease,
                border-color 0.35s ease;
        }

        .user-card:hover {
            transform: translateY(-8px);
        }

        /* Image Animation */
        .user-image {
            transition: transform 0.4s ease;
        }

        .user-card:hover .user-image {
            transform: scale(1.08);
        }

        /* Back Button */
        .back-button {
            transition: all 0.3s ease;
        }

        .back-button:hover {
            transform: translateX(
                {{ app()->getLocale() == 'ar' ? '4px' : '-4px' }}
            );
        }
    </style>
</head>

<body class="antialiased">

<div class="relative min-h-screen overflow-hidden bg-slate-950">

    <!-- Background Image -->
    <div
        class="absolute inset-0 bg-center bg-no-repeat bg-cover"
        style="background-image: url('{{ asset('assets/images/school-hero-bg.png') }}');">
    </div>

    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-950/95 via-slate-900/85 to-blue-950/90"></div>

    <!-- Grid -->
    <div
        class="absolute inset-0 opacity-30"
        style="
            background-image:
                linear-gradient(to right, rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 4rem 4rem;
        ">
    </div>

    <!-- Floating Shapes -->
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


    <!-- Main Content -->
    <main class="relative z-10 flex items-center justify-center min-h-screen px-4 py-8 sm:px-6 lg:px-8">

        <div class="w-full max-w-5xl">

            <!-- Main Card -->
            <div class="overflow-hidden border shadow-2xl glass-card rounded-3xl border-white/20">
            <!-- Language Switcher -->
            <div class="absolute top-4 {{ app()->getLocale() == 'ar' ? 'left-4' : 'right-4' }} z-50">
                <div class="relative inline-block text-left" id="lang-dropdown-wrapper">
                    <button type="button" id="lang-dropdown-btn" class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg text-slate-600 bg-white/60 hover:text-brand-blue hover:bg-white transition duration-300 border border-slate-200 shadow-sm focus:outline-none">
                        <i class="text-xs fa-solid fa-globe"></i>
                        <span class="text-[10px] font-bold uppercase">{{ app()->getLocale() }}</span>
                        <i class="fa-solid fa-chevron-down text-[8px] transition duration-300" id="lang-chevron"></i>
                    </button>
                    <div id="lang-dropdown-menu" class="hidden absolute {{ app()->getLocale() == 'ar' ? 'left-0' : 'right-0' }} mt-2.5 w-32 rounded-xl bg-white border border-slate-100 shadow-xl py-1 z-50">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a rel="alternate" class="flex items-center justify-between px-3 py-1.5 text-xs text-slate-700 hover:bg-slate-50 hover:text-brand-blue transition font-semibold" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <span>{{ $properties['native'] }}</span>
                                @if(app()->getLocale() == $localeCode)
                                    <i class="fa-solid fa-circle-check text-[10px] text-brand-green"></i>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
                <!-- Header -->
                <div class="px-5 pt-8 pb-5 text-center sm:px-8 sm:pb-7 sm:pt-10 md:px-12">

                    <!-- Logo -->
                    {{-- <a href="{{ url('/') }}" class="flex items-center justify-center w-16 h-16 mx-auto text-2xl text-white transition duration-300 shadow-xl rounded-2xl bg-gradient-to-tr from-brand-blue to-indigo-500 shadow-brand-blue/30 hover:scale-110 sm:h-20 sm:w-20 sm:text-3xl"><i class="fa-solid fa-graduation-cap"></i></a> --}}
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-icon-light.jpg') }}" style="width: 50px; height: 50px; margin: auto;"></a>

                    <!-- Title -->
                    <h1 class="mt-5 text-2xl font-black tracking-tight text-slate-900 sm:mt-6 sm:text-3xl md:text-4xl" >{{ trans('auth.Welcome Back') }} </h1>

                    <!-- Description -->
                    <p class="max-w-xl mx-auto mt-2 text-xs font-medium leading-6 text-slate-500 sm:text-sm md:text-base" > {{ trans('auth.Login to your account to continue') }} </p>

                </div>


                <!-- Users -->
                <div class="px-4 pb-7 sm:px-8 sm:pb-10 md:px-12">
                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-2 sm:gap-5 lg:grid-cols-4" >
                        <!-- Student -->
                        <a href="{{ route('login.show', 'student') }}" class="p-4 text-center border shadow-sm user-card group rounded-2xl border-slate-200 bg-white/80 hover:border-blue-300 hover:bg-white hover:shadow-xl sm:rounded-3xl sm:p-6" >
                            <div class="flex items-center justify-center w-24 h-24 mx-auto rounded-2xl bg-blue-50 sm:h-32 sm:w-32 md:h-36 md:w-36" >
                                <img src="{{ asset('assets/images/student.png') }}"  alt="طالب" class="object-contain w-20 h-20 user-image sm:h-28 sm:w-28 md:h-32 md:w-32" >
                            </div>
                            <h2  class="mt-4 text-sm font-extrabold text-slate-800 sm:mt-5 sm:text-lg" >
                                {{ trans('auth.student') }}
                            </h2>
                            <p class="hidden mt-1 text-xs text-slate-400 sm:block">{{ trans('auth.login_student') }}</p>
                            <div class="mt-3 text-blue-600 transition duration-300 opacity-0 group-hover:opacity-100"> <i class="fa-solid fa-arrow-left"></i></div>
                        </a>

                        <!-- Parent -->
                        <a href="{{ route('login.show', 'parent') }}" class="p-4 text-center border shadow-sm user-card group rounded-2xl border-slate-200 bg-white/80 hover:border-emerald-300 hover:bg-white hover:shadow-xl sm:rounded-3xl sm:p-6" >
                            <div class="flex items-center justify-center w-24 h-24 mx-auto rounded-2xl bg-emerald-50 sm:h-32 sm:w-32 md:h-36 md:w-36" >
                                <img src="{{ asset('assets/images/parent.png') }}" alt="ولي أمر" class="object-contain w-20 h-20 user-image sm:h-28 sm:w-28 md:h-32 md:w-32" >
                            </div>
                            <h2 class="mt-4 text-sm font-extrabold text-slate-800 sm:mt-5 sm:text-lg" >{{ trans('auth.parent') }}</h2>
                            <p class="hidden mt-1 text-xs text-slate-400 sm:block">{{ trans('auth.login_parent') }}</p>
                            <div class="mt-3 transition duration-300 opacity-0 text-emerald-600 group-hover:opacity-100" >
                                <i class="fa-solid fa-arrow-left"></i>
                            </div>
                        </a>

                        <!-- Teacher -->
                        <a href="{{ route('login.show', 'teacher') }}" class="p-4 text-center border shadow-sm user-card group rounded-2xl border-slate-200 bg-white/80 hover:border-violet-300 hover:bg-white hover:shadow-xl sm:rounded-3xl sm:p-6" >

                            <div class="flex items-center justify-center w-24 h-24 mx-auto rounded-2xl bg-violet-50 sm:h-32 sm:w-32 md:h-36 md:w-36" >
                                <img src="{{ asset('assets/images/teacher.png') }}" alt="معلم" class="object-contain w-20 h-20 user-image sm:h-28 sm:w-28 md:h-32 md:w-32" >
                            </div>
                            <h2 class="mt-4 text-sm font-extrabold text-slate-800 sm:mt-5 sm:text-lg" >{{ trans('auth.teacher') }}</h2>
                            <p class="hidden mt-1 text-xs text-slate-400 sm:block">{{ trans('auth.login_teacher') }} </p>
                            <div class="mt-3 transition duration-300 opacity-0 text-violet-600 group-hover:opacity-100" >
                                <i class="fa-solid fa-arrow-left"></i>
                            </div>
                        </a>

                        <!-- Admin -->
                        <a  href="{{ route('login.show', 'admin') }}" class="p-4 text-center border shadow-sm user-card group rounded-2xl border-slate-200 bg-white/80 hover:border-red-300 hover:bg-white hover:shadow-xl sm:rounded-3xl sm:p-6" >
                            <div class="flex items-center justify-center w-24 h-24 mx-auto rounded-2xl bg-red-50 sm:h-32 sm:w-32 md:h-36 md:w-36">
                                <img src="{{ asset('assets/images/admin.png') }}" alt="Admin" class="object-contain w-20 h-20 user-image sm:h-28 sm:w-28 md:h-32 md:w-32"  >
                            </div>

                            <h2 class="mt-4 text-sm font-extrabold text-slate-800 sm:mt-5 sm:text-lg" >{{ trans('auth.admin') }}</h2>

                            <p class="hidden mt-1 text-xs text-slate-400 sm:block">{{ trans('auth.login_admin') }}</p>

                            <div
                                class="mt-3 text-red-600 transition duration-300 opacity-0 group-hover:opacity-100"
                            >
                                <i class="fa-solid fa-arrow-left"></i>
                            </div>

                        </a>

                    </div>


                    <!-- Back Home -->
                    <div class="text-center mt-7 sm:mt-9">

                        <a
                            href="{{ url('/') }}"
                            class="inline-flex items-center gap-2 text-xs font-bold back-button text-slate-500 hover:text-brand-blue sm:text-sm"
                        >
                            <i class="fa-solid fa-arrow-right"></i>

                            <span>{{ trans('welcome.system_title') }}</span>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
<script>
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

