<!--=================================
 header start-->
<nav class="flex-row p-0 admin-header navbar navbar-default col-lg-12 col-12 fixed-top d-flex">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ url('/') }}">
            <picture>
                <source srcset="{{ asset('assets/images/logo-white.jpg') }}" media="(prefers-color-scheme: dark)">
                <img src="{{ asset('assets/images/logo-dark.jpg') }}" alt="Logo">
            </picture>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
            <picture>
                <source srcset="{{ asset('assets/images/logo-icon-light.jpg') }}" media="(prefers-color-scheme: dark)">
                <img src="{{ asset('assets/images/logo-icon-dark.jpg') }}" alt="Logo Mini">
            </picture>
        </a>
    </div>

    <!-- Top bar left -->
    <ul class="mr-auto nav navbar-nav">
        <li class="nav-item">
            <a id="button-toggle" class="inline-block ml-20 button-toggle-nav pull-left"
                href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
        <li class="nav-item">
            <div class="search">
                <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                    <input type="text" class="not-click form-control" placeholder="{{ trans('navbar.search') }}" value=""
                        name="search">
                    <button class="search-button" type="submit">
                        <i class="fa fa-search not-click"></i>
                    </button>
                </div>
            </div>
        </li>
    </ul>

    <!-- top bar right -->
    <ul class="ml-auto nav navbar-nav">
        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>

        <!-- Notifications -->
        <li class="nav-item dropdown no-hover">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="ti-bell"></i>
                <span class="badge badge-danger notification-status"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                <div class="dropdown-header notifications">
                    <strong>{{ trans('navbar.notifications') }}</strong>
                    <span class="badge badge-pill badge-warning">05</span>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">{{ trans('navbar.new_user') }}<small
                        class="float-right text-muted time">{{ trans('navbar.just_now') }}</small> </a>
                <a href="#" class="dropdown-item"> {{ trans('navbar.new_invoice') }}<small
                        class="float-right text-muted time">22{{ trans('navbar.minutes') }}</small> </a>
                <a href="#" class="dropdown-item">{{ trans('navbar.server_error') }}<small
                        class="float-right text-muted time">7{{ trans('navbar.hours') }}</small> </a>
                <a href="#" class="dropdown-item">{{ trans('navbar.db_report') }}<small class="float-right text-muted time">1
                        {{ trans('navbar.days') }}</small> </a>
                <a href="#" class="dropdown-item">{{ trans('navbar.order_confirm') }}<small class="float-right text-muted time">2
                        {{ trans('navbar.days') }}</small> </a>
            </div>
        </li>

        <!-- Language Switcher -->
        <style>
            .lang-dropdown-wrapper {
                display: flex;
                align-items: center;
                padding: 0 10px;
            }
            .lang-switcher-btn {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 6px 12px;
                border-radius: 8px;
                text-decoration: none !important;
                border: 1px solid #cbd5e1;
                color: #475569 !important;
                background-color: #ffffff;
                transition: all 0.3s ease;
                font-size: 11px;
                font-weight: 700;
                text-transform: uppercase;
                height: 34px;
                cursor: pointer;
            }
            .lang-switcher-btn:hover, .dropdown.show .lang-switcher-btn {
                color: #1e40af !important;
                background-color: #f8fafc;
                border-color: #1e40af;
            }
            .lang-chevron {
                font-size: 8px;
                transition: transform 0.3s ease;
            }
            .dropdown.show .lang-chevron {
                transform: rotate(180deg);
            }

            .lang-switcher-dropdown {
                border-radius: 12px !important;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
                border: 1px solid #f1f5f9 !important;
                padding: 6px 0 !important;
                min-width: 130px !important;
                margin-top: 8px !important;
            }
            .lang-switcher-item {
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                padding: 8px 16px !important;
                font-size: 13px !important;
                color: #334155 !important;
                font-weight: 600 !important;
                transition: all 0.2s ease !important;
            }
            .lang-switcher-item:hover {
                background-color: #f8fafc !important;
                color: #1e40af !important;
                text-decoration: none !important;
            }
            .lang-switcher-item .active-check {
                color: #10b981 !important;
                font-size: 12px;
            }

            /* Enable Click behavior for dropdowns using no-hover class */
            .admin-header .dropdown.no-hover.show .dropdown-menu {
                margin-top: 0 !important;
                display: block !important;
                visibility: visible !important;
                opacity: 1 !important;
            }
        </style>
        <li class="nav-item dropdown lang-dropdown-wrapper no-hover">
            <a class="lang-switcher-btn" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa-solid fa-globe" style="font-size: 13px;"></i>
                <span>{{ app()->getLocale() }}</span>
                <i class="fa-solid fa-chevron-down lang-chevron"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right lang-switcher-dropdown">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a rel="alternate" class="dropdown-item lang-switcher-item" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <span>{{ $properties['native'] }}</span>
                        @if(app()->getLocale() == $localeCode)
                            <i class="fa-solid fa-circle-check active-check"></i>
                        @endif
                    </a>
                @endforeach
            </div>
        </li>

        <!-- Quick Links -->
        <li class="nav-item dropdown no-hover">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="true"> <i class="ti-view-grid"></i> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big">
                <div class="dropdown-header">
                    <strong>{{ trans('navbar.quick_links') }}</strong>
                </div>
                <div class="dropdown-divider"></div>
                <div class="nav-grid">
                    <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>
                        <h5>{{ trans('navbar.new_task') }}</h5>
                    </a>
                    <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                        <h5>{{ trans('navbar.assign_task') }}</h5>
                    </a>
                </div>
                <div class="nav-grid">
                    <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                        <h5>{{ trans('navbar.add_orders') }}</h5>
                    </a>
                    <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>
                        <h5>{{ trans('navbar.new_orders') }}</h5>
                    </a>
                </div>
            </div>
        </li>

        <!-- User Profile -->
        <li class="nav-item dropdown mr-30 no-hover">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('assets/images/user_icon.png') }}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{ Auth::user()->name }}</h5>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>{{ trans('navbar.activity') }}</a>
                <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>{{ trans('navbar.messages') }}</a>
                <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>{{ trans('navbar.profile') }}</a>
                <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>{{ trans('navbar.projects') }}<span
                        class="badge badge-info">6</span> </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>{{ trans('navbar.settings') }}</a>
                <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="text-danger ti-unlock"></i> {{ trans('auth.Logout') }}
                        </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
<!--=================================
 header End-->
