<!--=================================
 header start-->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/logo-dark.png') }}" alt="">
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/logo-icon-dark.png') }}" alt="">
        </a>
    </div>

    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
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
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>

        <!-- Notifications -->
        <li class="nav-item dropdown ">
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
        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa-solid fa-language"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                <div class="dropdown-header ">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </li>

        <!-- Quick Links -->
        <li class="nav-item dropdown ">
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
        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('assets/images/profile-image.png') }}" alt="avatar">
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
