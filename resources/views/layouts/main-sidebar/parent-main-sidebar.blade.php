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


                    <!-- Sons -->
                    <li>
                        <a href="{{ route('sons.index') }}"><i class="fa-solid fa-children"></i><span  class="right-nav-text">{{ trans('parent.sons') }}</span></a>
                    </li>

                    <!-- Attendance Reports -->
                    <li>
                        <a href="{{ route('student_exams.index') }}"><i class="fa-regular fa-file-lines"></i><span  class="right-nav-text">{{ trans('parent.attendance_report') }}</span></a>
                    </li>

                    <!-- Financial Report -->
                    <li>
                        <a href="{{ route('student_exams.index') }}"><i class="fa-solid fa-money-bill-trend-up"></i><span  class="right-nav-text">{{ trans('parent.financial_report') }}</span></a>
                    </li>

                    <!-- Profile-->
                    <li>
                        <a href="{{route('profile')}}"><i class="fas fa-id-card-alt"></i><span  class="right-nav-text">{{ trans('teacher.profile') }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
