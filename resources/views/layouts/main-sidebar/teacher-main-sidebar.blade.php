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


                    <!-- sections-->
                    <li>
                        <a href="{{ route('section') }}"><i class="fas fa-chalkboard"></i><span  class="right-nav-text">{{ trans('main-side.sections') }}</span></a>
                    </li>

                    <!-- Students-->
                    <li>
                        <a href="{{route('student.index')}}"><i class="fas fa-user-graduate"></i><span
                                class="right-nav-text">{{trans('student.students')}}</span></a>
                    </li>

                    <!-- Quizzes -->
                    <li>
                        <a href="{{route('quizze.index')}}"><i class="fas fa-clipboard-list"></i><span
                                class="right-nav-text">{{trans('quizzes.quizzes_list')}}</span></a>
                    </li>

                    
                    <!-- Online Classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('main-side.Onlineclasses')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('online_classe.index') }}">{{ trans('online_classes.direct_connection') }}</a> </li>
                        </ul>
                    </li>

                    <!-- reports -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fas fa-chalkboard"></i>{{trans('teacher.reports')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                        <ul id="students-menu" class="collapse">
                            <li> <a href="{{route('attendance.report')}}">{{trans('teacher.report_attendances')}}</a></li>
                            <li> <a href="{{route('attendance.quizze')}}">{{trans('teacher.report_quizzs')}}</a></li>
                        </ul>
                    </li>


                    <!-- Profile-->
                    <li>
                        <a href="{{route('settings.index')}}"><i class="fas fa-id-card-alt"></i><span  class="right-nav-text">{{ trans('settings.settings_list') }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
