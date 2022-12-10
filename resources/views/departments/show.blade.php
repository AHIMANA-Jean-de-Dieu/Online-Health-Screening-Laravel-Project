@extends('users.admin.layouts.master')
@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Content Head -->
        <div class="kt-subheader  kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">

                    <h3 class="kt-subheader__title">Department / {{$department->name}}</h3>

                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                    <span class="kt-subheader__desc"></span>

                </div>
            </div>
        </div>
        <!-- end:: Content Head -->

        <!-- begin:: Container -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

            <!--Begin::App-->
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>
                <!--End:: App Aside Mobile Toggle-->

                <!--Begin:: App Aside-->
                <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
                    <!--Begin::Portlet-->
                    <div class="kt-portlet kt-portlet--height-fluid-">
                        <div class="kt-portlet__head kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">

                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                <span class="kt-nav__link-text">Reports</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-send"></i>
                                                <span class="kt-nav__link-text">Messages</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                <span class="kt-nav__link-text">Charts</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                <span class="kt-nav__link-text">Members</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                <span class="kt-nav__link-text">Settings</span>
                                            </a>
                                        </li>
                                    </ul>            </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-2">
                                <div class="kt-widget__head">

                                    <div class="kt-widget__info">
                                        <a href="#" class="kt-widget__username">
                                            {{$department->name}}
                                        </a>
                                        <span class="kt-widget__desc">
                                            {{$department->description}}
                                        </span>
                                    </div>
                                </div>

                                <div class="kt-widget__body">

                                    <div class="kt-widget__content">
                                        <div class="kt-widget__stats kt-margin-r-20">
                                            <div class="kt-widget__icon">
                                                <i class="flaticon-piggy-bank"></i>
                                            </div>
                                            <div class="kt-widget__details">
                                                <span class="kt-widget__title">Total Appointments</span>
                                                <span class="kt-widget__value"><span></span></span>
                                            </div>
                                        </div>

                                        <div class="kt-widget__stats">
                                            <div class="kt-widget__icon">
                                                <i class="flaticon-pie-chart"></i>
                                            </div>
                                            <div class="kt-widget__details">
                                                <span class="kt-widget__title">Working Hours</span>
                                                <span class="kt-widget__value"><span></span></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Widget -->

                        </div>
                    </div>
                    <!--End::Portlet-->

                </div>
                <!--End:: App Aside-->

                <!--Begin:: App Content-->
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">
                        <div class="col">
                            <!--Begin::Section-->
                            <div class="kt-portlet">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Doctors in this Department
                                        </h3>
                                    </div>

                                </div>
                                <div class="kt-portlet__body kt-portlet__body--fit">
                                    <div class="row row-no-padding row-col-separator-xl">
                                        <div class="col-md-12 col-lg-12 col-xl-4">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <div class="kt-widget1">
                                                @foreach($department->doctors as $de)
                                                <div class="kt-widget1__item">
                                                    <div class="kt-widget1__info">
                                                        <h3 class="kt-widget1__title">{{$de->first_name}} {{$de->last_name}}</h3>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End::Section-->
                        </div>
                    </div>
                </div>
                <!--End:: App Content-->
            </div>
            <!--End::App-->
        </div>
        <!-- end:: Container -->
    </div>
    <!-- end:: Content -->
@endsection