        <div class="side-menu-fixed " style="overflow-y:auto; overflow-x:hidden;">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main-side.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>


                    <!-- Quizzes -->
                    <li>
                        <a href="{{ route('quizzes.index') }}"><i class="fas fa-book-open"></i><span  class="right-nav-text">{{ trans('Quizzes.quizzes') }}</span></a>
                    </li>

                    <!-- Profile-->
                    <li>
                        <a href="{{route('settings.index')}}"><i class="fas fa-id-card-alt"></i><span  class="right-nav-text">{{ trans('settings.settings_list') }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
