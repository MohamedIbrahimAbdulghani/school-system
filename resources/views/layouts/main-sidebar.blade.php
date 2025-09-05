<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed vh-100" style="overflow-y:auto; overflow-x:hidden;">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left">
                                <i class="ti-home"></i>
                                <span class="right-nav-text">{{ trans('main-sidebar-translate.Dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="index.html">{{ trans('main-sidebar-translate.Dashboard_01') }}</a> </li>
                            <li> <a href="index-02.html">{{ trans('main-sidebar-translate.Dashboard_02') }}</a> </li>
                            <li> <a href="index-03.html">{{ trans('main-sidebar-translate.Dashboard_03') }}</a> </li>
                            <li> <a href="index-04.html">{{ trans('main-sidebar-translate.Dashboard_04') }}</a> </li>
                            <li> <a href="index-05.html">{{ trans('main-sidebar-translate.Dashboard_05') }}</a> </li>
                        </ul>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{ trans('main-sidebar-translate.Components') }}
                    </li>

                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left">
                                <i class="ti-palette"></i>
                                <span class="right-nav-text">{{ trans('main-sidebar-translate.Elements') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="accordions.html">{{ trans('main-sidebar-translate.Accordions') }}</a></li>
                            <li><a href="alerts.html">{{ trans('main-sidebar-translate.Alerts') }}</a></li>
                            <li><a href="button.html">{{ trans('main-sidebar-translate.Button') }}</a></li>
                            <li><a href="colorpicker.html">{{ trans('main-sidebar-translate.Colorpicker') }}</a></li>
                            <li><a href="dropdown.html">{{ trans('main-sidebar-translate.Dropdown') }}</a></li>
                            <li><a href="lists.html">{{ trans('main-sidebar-translate.Lists') }}</a></li>
                            <li><a href="modal.html">{{ trans('main-sidebar-translate.Modal') }}</a></li>
                            <li><a href="nav.html">{{ trans('main-sidebar-translate.Nav') }}</a></li>
                            <li><a href="nicescroll.html">{{ trans('main-sidebar-translate.Nicescroll') }}</a></li>
                            <li><a href="pricing-table.html">{{ trans('main-sidebar-translate.PricingTable') }}</a></li>
                            <li><a href="ratings.html">{{ trans('main-sidebar-translate.Ratings') }}</a></li>
                            <li><a href="date-picker.html">{{ trans('main-sidebar-translate.DatePicker') }}</a></li>
                            <li><a href="tabs.html">{{ trans('main-sidebar-translate.Tabs') }}</a></li>
                            <li><a href="typography.html">{{ trans('main-sidebar-translate.Typography') }}</a></li>
                            <li><a href="popover-tooltips.html">{{ trans('main-sidebar-translate.PopoverTooltips') }}</a></li>
                            <li><a href="progress.html">{{ trans('main-sidebar-translate.Progress') }}</a></li>
                            <li><a href="switch.html">{{ trans('main-sidebar-translate.Switch') }}</a></li>
                            <li><a href="sweetalert2.html">{{ trans('main-sidebar-translate.Sweetalert2') }}</a></li>
                            <li><a href="touchspin.html">{{ trans('main-sidebar-translate.Touchspin') }}</a></li>
                        </ul>
                    </li>

                    <!-- menu item Calendar -->
                    <li>
                        <a href="calendar.html">
                            <i class="ti-calendar"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.Calendar') }}</span>
                        </a>
                    </li>

                    <!-- menu item Todo list -->
                    <li>
                        <a href="todo.html">
                            <i class="ti-menu-alt"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.Todo') }}</span>
                        </a>
                    </li>

                    <!-- menu item Chat -->
                    <li>
                        <a href="chat.html">
                            <i class="ti-comments"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.Chat') }}</span>
                        </a>
                    </li>

                    <!-- menu item Mail box -->
                    <li>
                        <a href="mailbox.html">
                            <i class="ti-email"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.Mailbox') }}</span>
                        </a>
                    </li>

                    <!-- menu item Charts -->
                    <li>
                        <a href="charts.html">
                            <i class="ti-bar-chart"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.Charts') }}</span>
                        </a>
                    </li>

                    <!-- menu item Font Icon -->
                    <li>
                        <a href="icons.html">
                            <i class="ti-face-smile"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.FontIcon') }}</span>
                        </a>
                    </li>

                    <!-- menu item Widgets -->
                    <li>
                        <a href="widgets.html">
                            <i class="ti-widget"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.Widgets') }}</span>
                        </a>
                    </li>

                    <!-- menu item Forms & Editor -->
                    <li>
                        <a href="forms.html">
                            <i class="ti-pencil-alt"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.FormsEditor') }}</span>
                        </a>
                    </li>

                    <!-- menu item Data tables -->
                    <li>
                        <a href="tables.html">
                            <i class="ti-layout-grid2"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.DataTable') }}</span>
                        </a>
                    </li>

                    <!-- menu item Custom Pages -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#customPages">
                            <div class="pull-left">
                                <i class="ti-files"></i>
                                <span class="right-nav-text">{{ trans('main-sidebar-translate.CustomPages') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="customPages" class="collapse" data-parent="#sidebarnav">
                            <li><a href="profile.html">{{ trans('main-sidebar-translate.Profile') }}</a></li>
                            <li><a href="invoice.html">{{ trans('main-sidebar-translate.Invoice') }}</a></li>
                            <li><a href="faq.html">{{ trans('main-sidebar-translate.FAQ') }}</a></li>
                        </ul>
                    </li>

                    <!-- menu item Authentication -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left">
                                <i class="ti-lock"></i>
                                <span class="right-nav-text">{{ trans('main-sidebar-translate.Authentication') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li><a href="login.html">{{ trans('main-sidebar-translate.Login') }}</a></li>
                            <li><a href="register.html">{{ trans('main-sidebar-translate.Register') }}</a></li>
                            <li><a href="forgot-password.html">{{ trans('main-sidebar-translate.ForgotPassword') }}</a></li>
                        </ul>
                    </li>

                    <!-- menu item Maps -->
                    <li>
                        <a href="maps.html">
                            <i class="ti-map"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.Maps') }}</span>
                        </a>
                    </li>

                    <!-- menu item Timeline -->
                    <li>
                        <a href="timeline.html">
                            <i class="ti-time"></i>
                            <span class="right-nav-text">{{ trans('main-sidebar-translate.Timeline') }}</span>
                        </a>
                    </li>

                    <!-- menu item Multi Level -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multiLevel">
                            <div class="pull-left">
                                <i class="ti-layers"></i>
                                <span class="right-nav-text">{{ trans('main-sidebar-translate.MultiLevel') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multiLevel" class="collapse" data-parent="#sidebarnav">
                            <li><a href="#">{{ trans('main-sidebar-translate.Level1') }}</a></li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#level2">
                                    {{ trans('main-sidebar-translate.Level2') }} <span class="pull-right ti-plus"></span>
                                </a>
                                <ul id="level2" class="collapse">
                                    <li><a href="#">{{ trans('main-sidebar-translate.Level2_1') }}</a></li>
                                    <li><a href="#">{{ trans('main-sidebar-translate.Level2_2') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Left Sidebar End-->
    </div>
</div>


        <!-- Left Sidebar End-->

        <!--=================================
