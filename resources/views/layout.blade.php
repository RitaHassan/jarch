<!DOCTYPE HTML>
<html lang="ar" dir="rtl">
<!--begin::Head-->

<head>
    <title>نظام إدارة الخطط و المهام الشهرية</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://">
    <link rel="shortcut icon" href="{{ get_asset('assets/media/logos/favicon.png') }}">
    @stack('css')
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ get_asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ get_asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ get_asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ get_asset('assets/css/fonts.css') }}" rel="stylesheet" type="text/css">
    <style>
        .tox-notifications-container {
            display: none;
        }

        .tox-tinymce {
            height: 250px !important;
        }
    </style>

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript>
        {{--    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe> --}}
    </noscript>
    <!--End::Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_aside_mobile_toggle" style="">
                <!--begin::Brand-->
                <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                    <!--begin::Logo-->
                    <a href="#" class="p-2">
                        {{--
                <img alt="Logo" src="{{asset('assets/media/logos/logo.png')}}" class="h-75px logo">
                --}}
                    </a>

                    <!--end::Logo-->
                    <!--begin::Aside toggler-->
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                        data-kt-toggle-name="aside-minimize">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                        <span class="svg-icon svg-icon-1 rotate-180 rotated">
                            <svg xmlns="http://www.w3.org/2000/svg" style="transform:rotate(180deg)" width="24"
                                height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.5"
                                    d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Aside toggler-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside menu-->
                <div class="aside-menu flex-column-fluid">
                    <!--begin::Aside Menu-->
                    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0" style="height: 127px;">
                        <!--begin::Menu-->

                        <div class="font-family-medium menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                            id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                            <div class="menu-item">
                                <a class="menu-link active" href="http://127.0.0.1:8000/">
                                    <span class="menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path
                                                    d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                    fill="#000000" fill-rule="nonzero"></path>
                                                <path
                                                    d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="menu-title">الرئيسية</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('teams.index') }}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <i class="fa fa-users"></i>
                                        </span>
                                    </span>
                                    <span class="menu-title">الفرق</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('systems.index') }}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <i class="icon-xl fas fa-window-restore"></i>
                                        </span>
                                    </span>
                                    <span class="menu-title">الانظمة</span>
                                </a>
                            </div>




                            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <img src="/assets/media/icons/research.svg">
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">المهام</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('tasks.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">مهام الفريق </span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('tasks.MyTasks') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">مهامي</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('tasks.create') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">إضافة مهمة</span>
                                        </a>
                                    </div>
                                </div>
                            </div>



                            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <img src="/assets/media/icons/research.svg">
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">ادراة المهام</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('tasks.index_all') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">المهام (الادارة)</span>
                                        </a>
                                    </div>

                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('tasks.create') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">إضافة مهمة</span>
                                        </a>
                                    </div>
                                </div>
                            </div>



                            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <img src="/assets/media/icons/research.svg">
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">الموظفين</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div class="menu-item">
                                        <a class="menu-link" href="{{ route('members.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">الموظفين (الادارة)</span>
                                        </a>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid pt-18 pt-lg-21" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" style="" class="header align-items-stretch">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Aside mobile toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                id="kt_aside_mobile_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-2x mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Aside mobile toggle-->
                        <!--begin::Mobile logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="."./../demo1/dist/index.html" class="d-lg-none">
                                <img alt="Logo"
                                    src="https://moi.gov.ps/Content/HomeMaster/assets/images/website-mainlogo.png"
                                    class="h-30px" />
                            </a>
                        </div>
                        <!--end::Mobile logo-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                            <!--begin::Navbar-->
                            <div class="d-flex align-items-stretch" id="kt_header_nav">
                                <!--begin::Menu wrapper-->
                                <div class="header-menu align-items-stretch" data-kt-drawer="true"
                                    data-kt-drawer-name="header-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                                    data-kt-drawer-direction="end"
                                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                                    <div class="app-name">
                                        <div class="figure">
                                            <img src="https://moi.gov.ps/Content/HomeMaster/assets/images/website-mainlogo.png"
                                                alt="">
                                        </div>
                                        <div class="txt">
                                            <h1>نظام إدارة الخطط و المهام الشهرية</h1>
                                            <h4>وزارة الداخلية والأمن الوطني</h4>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::Navbar-->
                            <!--begin::Topbar-->
                            <div class="d-flex align-items-stretch flex-shrink-0">
                                <!--begin::Toolbar wrapper-->


                                <div class="d-flex align-items-stretch flex-shrink-0">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center ms-1 ms-lg-3"
                                        id="kt_header_user_menu_toggle">
                                        <!--begin::Menu wrapper-->
                                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                            {{--                                        style="border: 1px solid #009ef7;" --}} data-kt-menu-trigger="click"
                                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                            <img src="{{ asset('assets/media/icons/user.png') }}" alt="user">
                                        </div>
                                        <!--begin::User account menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                            data-kt-menu="true">
                                            <div class="container">
                                                <div class="row">
                                                    {{--                                                <div class="col-2 p-0"> --}}
                                                    {{--                                                    <img class="w-100" --}}
                                                    {{--                                                         src="{{ asset('assets/media/icons/user.jpg') }}"> --}}
                                                    {{--                                                </div> --}}
                                                    <div class="col-12">
                                                        {{ session('user')['MEM_NAME'] }}
                                                    </div>
                                                </div>
                                                <div class="separator w-100 my-3"></div>
                                                <div class="row font-family-heavy">
                                                    <a href="{{ route('login.logout') }}" onclick=""
                                                        class="col">تسجيل
                                                        الخروج</a>
                                                    <span id="logout-progress"
                                                        class="indicator-progress position-relative translate-middle col"
                                                        style="top: 10px;">
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle top-25"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::User account menu-->

                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--end::User -->
                                    <!--begin::Heaeder menu toggle-->
                                    <div class="d-flex align-items-center d-lg-none ms-2 me-n3"
                                        title="Show header menu">
                                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                            id="kt_header_menu_mobile_toggle">
                                            <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                                        fill="black" />
                                                    <path opacity="0.3"
                                                        d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Heaeder menu toggle-->
                                </div>
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->




                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <!--begin::Container-->
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <!--begin::Title-->
                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('page_title')

                                    <!--end::Description-->
                                </h1>
                                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                    @if (isset($html_breadcrumbs))
                                        <li class="breadcrumb-item text-muted">
                                            <a href="{{ $html_breadcrumbs['title_url'] }}"
                                                class="text-muted text-hover-primary">{{ $html_breadcrumbs['title'] }}</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                                        </li>
                                        <li class="breadcrumb-item text-dark">{{ $html_breadcrumbs['subtitle'] }}</li>
                                    @endif
                                </ul>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->

                            <div class="d-flex align-items-center py-1">

                                <!--begin::Button-->
                                @if (isset($html_new_path))
                                    <a href="{{ $html_new_path }}" class="btn btn-sm btn-primary add"
                                        id="kt_toolbar_primary_button">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                    height="2" rx="1"
                                                    transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                                <rect x="4.36396" y="11.364" width="16" height="2"
                                                    rx="1" fill="black"></rect>
                                            </svg>
                                        </span>
                                        جديد</a>
                                    <!--end::Button-->
                                @else
                                    <span class="kt-subheader__btn-daterange-title"
                                        id="kt_dashboard_daterangepicker_title">اليوم : </span>&nbsp;
                                    <span class="kt-subheader__btn-daterange-date"
                                        id="kt_dashboard_daterangepicker_date">{{ date('Y-m-d') }}</span>
                                    {{-- <a href="javascript:;" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="" data-placement="left">
                                                 <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">{{__('views.Today')}}</span>&nbsp;
                                                 <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">{{date('Y-m-d')}}</span>
                                             </a> --}}
                                @endif
                                <!--end::Button-->

                            </div>

                        </div>
                        <!--end::Container-->


                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">
                            @yield('contents')
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>

    </div>
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->
    <!--end::Body-->
    <script src="{{ get_asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    {{-- <script src="{{secure_asset('assets/js/scripts.bundle.js')}}"></script> --}}
    {{-- <script src="{{secure_asset('assets/js/custom/widgets.js')}}"></script> --}}
    <script src="{{ get_asset('assets/js/scripts.js') }}"></script>
    <script src="{{ get_asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src=""></script>
    <script src="{{ get_asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ get_asset('assets/js/tinymce.min.js') }}"></script>
    <script src="{{ get_asset('assets/js/main.js') }}"></script>


    <script type="text/javascript">
        //tinymce.get('about-us-text').getContent()

        jQuery(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            @if (getAllErrors($errors))
                toastr.error("{!! getAllErrors($errors) !!}");
            @endif
            @if (getAllSuccessMessages())
                toastr.success("{!! getAllSuccessMessages() !!}");
            @endif

            $('.datepicker').flatpickr({
                dateFormat: "d/m/Y",
            });
        });



        tinymce.init({
            selector: 'textarea.tinymce-editor',
            // content_style:
            //     "@import url('" + window.location.origin + /assets/css/fonts.css');,
            font_formats: "رفيع جدا=MAINULTRALIGHT;رفيع=MAINLIGHT;وسط=MAINMEDIUM;سميك=MAINBOLD;سميك جدا=MAINHEAVY;",
            plugins: 'media mediaembed lists image link',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | link | image',
            mediaembed_max_width: 450,
            language: 'ar',
            language_url: '/assets/js/ar.js',
            a11y_advanced_options: true,
            relative_urls: false,
            remove_script_host: false,
            document_base_url: window.location.origin + '/'
        });
    </script>

    @stack('javascript')



</body>

</html>test
