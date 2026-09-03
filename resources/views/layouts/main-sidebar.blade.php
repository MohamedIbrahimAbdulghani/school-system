<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
            @if(Auth::guard('admin')->check())
                    @include('layouts.main-sidebar.admin-main-sidebar')
            @elseif(Auth::guard('teacher')->check())
                    @include('layouts.main-sidebar.teacher-main-sidebar')
            @elseif(Auth::guard('student')->check())
                    @include('layouts.main-sidebar.student-main-sidebar')
            @elseif(Auth::guard('parent')->check())
                    @include('layouts.main-sidebar.parent-main-sidebar')
            @endif
        <!-- Left Sidebar End-->
    </div>
</div>
