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
                                <span class="right-nav-text">{{ trans('dashboard.Dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="index.html">{{ trans('dashboard.Dashboard_01') }}</a> </li>
                            <li> <a href="index-02.html">{{ trans('dashboard.Dashboard_02') }}</a> </li>
                            <li> <a href="index-03.html">{{ trans('dashboard.Dashboard_03') }}</a> </li>
                            <li> <a href="index-04.html">{{ trans('dashboard.Dashboard_04') }}</a> </li>
                            <li> <a href="index-05.html">{{ trans('dashboard.Dashboard_05') }}</a> </li>
                        </ul>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{ trans('component.Components') }}
                    </li>

                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left">
                                <i class="ti-palette"></i>
                                <span class="right-nav-text">{{ trans('component.Elements') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="accordions.html">{{ trans('component.Accordions') }}</a></li>
                            <li><a href="alerts.html">{{ trans('component.Alerts') }}</a></li>
                            <li><a href="button.html">{{ trans('component.Button') }}</a></li>
                            <li><a href="colorpicker.html">{{ trans('component.Colorpicker') }}</a></li>
                            <li><a href="dropdown.html">{{ trans('component.Dropdown') }}</a></li>
                            <li><a href="lists.html">{{ trans('component.Lists') }}</a></li>
                            <li><a href="modal.html">{{ trans('component.Modal') }}</a></li>
                            <li><a href="nav.html">{{ trans('component.Nav') }}</a></li>
                            <li><a href="nicescroll.html">{{ trans('component.Nicescroll') }}</a></li>
                            <li><a href="pricing-table.html">{{ trans('component.PricingTable') }}</a></li>
                            <li><a href="ratings.html">{{ trans('component.Ratings') }}</a></li>
                            <li><a href="date-picker.html">{{ trans('component.DatePicker') }}</a></li>
                            <li><a href="tabs.html">{{ trans('component.Tabs') }}</a></li>
                            <li><a href="typography.html">{{ trans('component.Typography') }}</a></li>
                            <li><a href="popover-tooltips.html">{{ trans('component.PopoverTooltips') }}</a></li>
                            <li><a href="progress.html">{{ trans('component.Progress') }}</a></li>
                            <li><a href="switch.html">{{ trans('component.Switch') }}</a></li>
                            <li><a href="sweetalert2.html">{{ trans('component.Sweetalert2') }}</a></li>
                            <li><a href="touchspin.html">{{ trans('component.Touchspin') }}</a></li>
                        </ul>
                    </li>

                    <!-- menu item Calendar -->
                    <li>
                        <a href="calendar.html">
                            <i class="ti-calendar"></i>
                            <span class="right-nav-text">{{ trans('page.Calendar') }}</span>
                        </a>
                    </li>

                    <!-- menu item Todo list -->
                    <li>
                        <a href="todo.html">
                            <i class="ti-menu-alt"></i>
                            <span class="right-nav-text">{{ trans('page.Todo') }}</span>
                        </a>
                    </li>

                    <!-- menu item Chat -->
                    <li>
                        <a href="chat.html">
                            <i class="ti-comments"></i>
                            <span class="right-nav-text">{{ trans('page.Chat') }}</span>
                        </a>
                    </li>

                    <!-- menu item Mail box -->
                    <li>
                        <a href="mailbox.html">
                            <i class="ti-email"></i>
                            <span class="right-nav-text">{{ trans('page.Mailbox') }}</span>
                        </a>
                    </li>

                    <!-- menu item Charts -->
                    <li>
                        <a href="charts.html">
                            <i class="ti-bar-chart"></i>
                            <span class="right-nav-text">{{ trans('page.Charts') }}</span>
                        </a>
                    </li>

                    <!-- menu item Font Icon -->
                    <li>
                        <a href="icons.html">
                            <i class="ti-face-smile"></i>
                            <span class="right-nav-text">{{ trans('page.FontIcon') }}</span>
                        </a>
                    </li>

                    <!-- menu item Widgets -->
                    <li>
                        <a href="widgets.html">
                            <i class="ti-widget"></i>
                            <span class="right-nav-text">{{ trans('page.Widgets') }}</span>
                        </a>
                    </li>

                    <!-- menu item Forms & Editor -->
                    <li>
                        <a href="forms.html">
                            <i class="ti-pencil-alt"></i>
                            <span class="right-nav-text">{{ trans('page.FormsEditor') }}</span>
                        </a>
                    </li>

                    <!-- menu item Data tables -->
                    <li>
                        <a href="tables.html">
                            <i class="ti-layout-grid2"></i>
                            <span class="right-nav-text">{{ trans('page.DataTable') }}</span>
                        </a>
                    </li>

                    <!-- menu item Custom Pages -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#customPages">
                            <div class="pull-left">
                                <i class="ti-files"></i>
                                <span class="right-nav-text">{{ trans('page.CustomPages') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="customPages" class="collapse" data-parent="#sidebarnav">
                            <li><a href="profile.html">{{ trans('page.Profile') }}</a></li>
                            <li><a href="invoice.html">{{ trans('page.Invoice') }}</a></li>
                            <li><a href="faq.html">{{ trans('page.FAQ') }}</a></li>
                        </ul>
                    </li>

                    <!-- menu item Authentication -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left">
                                <i class="ti-lock"></i>
                                <span class="right-nav-text">{{ trans('page.Authentication') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li><a href="login.html">{{ trans('auth.Login') }}</a></li>
                            <li><a href="register.html">{{ trans('auth.Register') }}</a></li>
                            <li><a href="forgot-password.html">{{ trans('auth.ForgotPassword') }}</a></li>
                        </ul>
                    </li>

                    <!-- menu item Maps -->
                    <li>
                        <a href="maps.html">
                            <i class="ti-map"></i>
                            <span class="right-nav-text">{{ trans('page.Maps') }}</span>
                        </a>
                    </li>

                    <!-- menu item Timeline -->
                    <li>
                        <a href="timeline.html">
                            <i class="ti-time"></i>
                            <span class="right-nav-text">{{ trans('page.Timeline') }}</span>
                        </a>
                    </li>

                    <!-- menu item Multi Level -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multiLevel">
                            <div class="pull-left">
                                <i class="ti-layers"></i>
                                <span class="right-nav-text">{{ trans('page.MultiLevel') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multiLevel" class="collapse" data-parent="#sidebarnav">
                            <li><a href="#">{{ trans('page.Level1') }}</a></li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#level2">
                                    {{ trans('page.Level2') }} <span class="pull-right ti-plus"></span>
                                </a>
                                <ul id="level2" class="collapse">
                                    <li><a href="#">{{ trans('page.Level2_1') }}</a></li>
                                    <li><a href="#">{{ trans('page.Level2_2') }}</a></li>
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
