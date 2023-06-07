@extends('layout')
@section('contents')
@php
use App\Models\statistics;

$statistics = new statistics();
@endphp


<!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
                <div class="font-family-bold p-5" style="color: red;">ليس لديك الصلاحية للدخول للصفحة المطلوبة</div>
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xxl-12">
                    <div class="row g-5 g-xl-8">
                        <!-- الدراسات -->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="#"
                                class="card card_background hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="row pe-3 ps-3">
                                    <div class="col-md-4 text-center statistics_name">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="fw-bolder fs-1 mb-2 mt-5 text-white"></div>
                                        <div class="fw-bold fw-bolder text-white">الفرق</div>
                                    </div>
                                    <div class="col-md-8">
                                     @php
                                     @endphp
                                        <div class="row card-body pt-5 pe-3 pb-2 ps-1 text-center card_certified">
                                            <div class="col-3 fw-bolder fs-3">
                                                @foreach($TOTAL_COUNT as $teams)
                                                {{$teams->TOTAL_COUNT}}
                                                @endforeach
                                                
                                                {{-- {{$TOTAL_COUNT}} --}}
                                            </div>
                                            <div  class="col-9 fw-bolder">عدد الفرق</div>
                                        </div>
                                        <div class="row card-body pt-2 pe-1 pb-2 ps-1 text-center card_notSupported">
                                            <div class="col-3 fw-bolder fs-3 ">
                                                @foreach($TOTAL_MEMBERS as $members)
                                                {{$members->TOTAL_MEMBERS}}
                                                @endforeach
                                            
                                            </div>
                                            <div  class="fw-bolder col-9">عدد الأعضاء بالفرق</div>
                                        </div>
                                     

                                       
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <!-- الأبحاث -->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="#"
                                class="card card_background hoverable mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="row pe-3 ps-3">
                                    <div class="col-md-4 text-center statistics_name">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="fw-bolder fs-1 mb-2 mt-5 text-white"></div>
                                        <div class="fw-bold fw-bolder text-white"> الأنظمة </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row card-body pt-5 pe-1 pb-2 ps-1  text-center card_certified">
                                            <div class="col-3 fw-bolder fs-3">
                                                @foreach($TOTAL_SYSTEMS as $systems)
                                                {{$systems->TOTAL_SYSTEMS}}
                                                @endforeach

                                                {{-- {{$TOTAL_SYSTEMS}} --}}
                                            </div>
                                            <div class="fw-bolder col-9 ">عدد الأنظمة</div>
                                        </div>
                                        <div class="row card-body pt-2 pe-1 pb-2 ps-1 text-center card_notSupported">
                                            <div class="col-3 fw-bolder fs-3 ">

                                                @foreach($SYSTEMS_DISABLE as $systemsDis)
                                                {{$systemsDis->SYSTEMS_DISABLE}}
                                                @endforeach
                                                {{-- {{$SYSTEMS_DISABLE}} --}}
                                            </div>
                                            <div  class="fw-bolder col-9 ">عدد الأنظمة المتوقفة</div>
                                        </div>
             
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    
                        <!-- المقترحات-->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="#"
                                class="card card_background hoverable mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="row pe-3 ps-3">
                                    <div class="col-md-4 text-center statistics_name">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="fw-bolder fs-1 mb-2 mt-5 text-white"></div>
                                        <div class="fw-bold fw-bolder text-white"> المهام </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row card-body pt-4 pe-1 pb-2 ps-1 text-center card_certified">
                                            <div class="col-3 fw-bolder fs-3 ">

                                                @foreach($TASKS_COUNT as $tasks)
                                                {{$tasks->TASKS_COUNT}}
                                                @endforeach
                                                {{-- {{$TASKS_COUNT}} --}}
                                            </div>
                                            <div  class="fw-bolder col-9">المهام العامة للشهر الحالي</div>
                                        </div>
                                        <div class="row card-body pt-2 pe-1 pb-2 ps-1 text-center card_notSupported">
                                            <div class="col-3 fw-bolder fs-3 ">

                                                @foreach($COMPLETED_TASKS as $tasksCom)
                                                {{$tasksCom->COMPLETED_TASKS}}
                                                @endforeach
                                                {{-- {{$COMPLETED_TASKS}} --}}
                                            </div>
                                            <div  class="fw-bolder col-9">المهام المنجزة للشهر الحالي</div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        <!-- التقارير-->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4">
                            <!--begin::Statistics Widget 5-->
                            <a href="#"
                                class="card card_background hoverable mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="row pe-3 ps-3">
                                    <div class="col-md-4 text-center statistics_name">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class=" fw-bolder fs-1 mb-2 mt-5 text-white"></div>
                                        <div class="fw-bold fw-bolder text-white"> مهامي</div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row card-body pt-5 pe-1 pb-2 ps-1 text-center card_certified">
                                            <div class="col-3 fw-bolder fs-3 ">

                                                @foreach($MY_TOTAL_TASKS as $MytasksCom)
                                                {{$MytasksCom->MY_TOTAL_TASKS}}
                                                @endforeach
                                                {{-- {{$MY_TOTAL_TASKS}} --}}
                                            </div>
                                            <div  class="fw-bolder col-9 ">عدد مهامي للشهر الحالي</div>
                                        </div>
                                        <div class="row card-body pt-2 pe-1 pb-2 ps-1 text-center card_notSupported">
                                            <div class="col-3 fw-bolder fs-3 ">

                                                @foreach($MY_COMPLETED_TASKS as $Mytasks)
                                                {{$Mytasks->MY_COMPLETED_TASKS}}
                                                @endforeach
                                                {{-- {{$MY_COMPLETED_TASKS}} --}}
                                            </div>
                                            <div  class="fw-bolder col-9 ">عدد مهامي المنجزة للشهر الحالي</div>
                                        </div>
                                    

                            
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                        
                        <!-- تسهيل مهمة باحث-->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 p-1">
                            <!--begin::Statistics Widget 5-->
                            <a href="#"
                                class="card card_background hoverable mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="row pe-3 ps-3">
                                    <div class="col-md-4 text-center facilitate_card">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                        fill="black"></path>
                                                </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="fw-bolder fs-1 mb-2 mt-5 text-white"></div>
                                        <div class="fw-bold fw-bolder text-white">مهام الشهر الماضي </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row card-body pt-5 pe-1 pb-2 ps-1 text-center card_certified">
                                            <div class="col-3 fw-bolder fs-3 ">

                                                @foreach($LAST_TOTAL_TASKS as $lasTtasks)
                                                {{$lasTtasks->LAST_TOTAL_TASKS}}
                                                @endforeach
                                                {{-- {{$LAST_TOTAL_TASKS}} --}}
                                            </div>
                                            <div  class="fw-bolder col-9">عدد المهام العامة للشهر الماضي </div>
                                        </div>
                                        <div class="row card-body pt-2 pe-1 pb-2 ps-1 text-center card_notSupported">
                                            <div class="col-3 fw-bolder fs-3 ">

                                                @foreach($MY_LAST_TOTAL_TASKS as $mylasTtasks)
                                                {{$mylasTtasks->MY_LAST_TOTAL_TASKS}}
                                                @endforeach
                                                {{-- {{$MY_LAST_TOTAL_TASKS}} --}}
                                            </div>
                                            <div  class="fw-bolder col-9 ">عدد المهام المنجزة للشهر الماضي</div>
                                        </div>

                                    
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                   




                        <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 p-1">
                            <!--begin::Statistics Widget 5-->
                            <a href="#"
                                class="card card_background hoverable mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="row pe-3 ps-3">
                                    <div class="col-md-4 text-center facilitate_card">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                        fill="black"></path>
                                                </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <div class="fw-bolder fs-1 mb-2 mt-5 text-white"></div>
                                        <div class="fw-bold fw-bolder text-white">مهام السنة الحالية</div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row card-body pt-5 pe-1 pb-2 ps-1 text-center card_certified">
                                            <div class="col-3 fw-bolder fs-3 ">

                                                @foreach($MY_TASKS_YEAR as $MY_TASK)
                                                {{$MY_TASK->MY_TASKS_YEAR}}
                                                @endforeach
                                                {{-- {{$LAST_TOTAL_TASKS}} --}}
                                            </div>
                                            <div  class="fw-bolder col-9">عدد المهام العامة  للسنة الحالية </div>
                                        </div>
                                        <div class="row card-body pt-2 pe-1 pb-2 ps-1 text-center card_notSupported">
                                            <div class="col-3 fw-bolder fs-3 ">

                                                @foreach($MY_COMPLETED_TASKS_YEAR as $comptasks)
                                                {{$comptasks->MY_COMPLETED_TASKS_YEAR}}
                                                @endforeach
                                                {{-- {{$MY_LAST_TOTAL_TASKS}} --}}
                                            </div>
                                            <div  class="fw-bolder col-9 ">عدد المهام المنجزة للسنة الحالية </div>
                                        </div>

                                    
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>

                


                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
       </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    @endsection