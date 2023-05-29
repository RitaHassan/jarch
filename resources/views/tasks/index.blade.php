@extends('layout')
@section('contents')

@php
use App\Models\Tasks;
$tasks = new Tasks();
$get_all_members= $tasks->get_all_members()['data'];

@endphp


<div id="waitModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modalTitle">اضافة سبب التأجيل</h3>

                </div>
                <div class="modal-body">
                        <input type="hidden" id="wait_id"/>
                        <div class="col-xl-6 form-group mb-6">
                            <label class="required form-label fw-bolder">سبب التأجيل</label>
                            <textarea id="DELAIED_REASON" name="DELAIED_REASON" class="form-control form-control-solid mb-8 f-family tinymce-editor"
                                rows="4" cols="4"></textarea>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary save" data-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>



    <div id="cancelModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="modalTitle">اضافة سبب الالغاء</h3>
                    </div>
                    <div class="modal-body">

                            <input type="hidden" id="cancel_id"/>

                            <div class="col-xl-6 form-group mb-6">
                                <label class="required form-label fw-bolder">سبب الالغاء</label>
                                <textarea id="CANCELED_REASON" name="CANCELED_REASON" class="form-control form-control-solid mb-8 f-family tinymce-editor"
                                rows="4" cols="4">{{old('CANCELED_REASON',$tasks->CANCELED_REASON)}}</textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary save_cancel" data-dismiss="modal">حفظ</button>
                    </div>
                </div>
            </div>
        </div>
<div class="card shadow-sm">
    <div class="card-body">
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack mb-5">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Search-->

            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                <!--begin::Filter-->
                {{-- <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="tooltip" title="Coming Soon">
                    <span class="svg-icon svg-icon-2">...</span>
                    Filter
                </button> --}}
                <!--end::Filter-->


            </div>
            <!--end::Toolbar-->

            <!--begin::Group actions-->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
                <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-docs-table-select="selected_count"></span> عنصر
                </div>

                <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" title="حذف" data-kt-docs-table-select="delete_selected">
                    حذف متعدد
                </button>
            </div>
            <!--end::Group actions-->
        </div>
        <!--end::Wrapper-->
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="SYSTEM_ID" id="SYSTEM_ID" class="form-control form-control-solid w-250px ps-15" >
                                    <option value=""  selected>--اختر--</option>
                                    @foreach($systems as $system)
                                        <option value="{{ $system->ID }}" {{$system->ID}}>{{ $system->SYSTEM_NAME}}</option>
                                    @endforeach
                                </select> 

                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="MEM_ID" id="MEM_ID" class="form-control form-control-solid w-250px ps-15"  data-kt-docs-table-filter="search5">
                                    <option value=""  selected>--اختر--</option>
                                    @foreach($get_all_members as $member)
                                        <option value="{{ $member->ID }}" {{$member->ID}}>{{ $member->MEM_NAME}}</option>
                                    @endforeach
                                </select> 

                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="عنوان المهمة" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" data-kt-docs-table-filter="search2"  id="ACTUAL_FINISH_MONTH" class="form-control form-control-solid w-250px ps-15" placeholder="شهر" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" data-kt-docs-table-filter="search3"  id="ACTUAL_FINISH_YEAR" class="form-control form-control-solid w-250px ps-15" placeholder="سنة" >
                            </div>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="COMPLETION_STATUS" id="COMPLETION_STATUS" class="form-control form-control-solid w-250px ps-15" data-kt-docs-table-filter="search4" >
                                    <option value="-1" disabled selected>--اختر--</option>
                                    <option value="">غير محدد</option>
                                    <option value="1">منجز</option>
                                    <option value="2">غير منجز</option>
                                    <option value="3">مؤجل</option>
                                    <option value="4">قيد العمل</option>
                                </select>
                            </div>
                        </div>  
                    </div>
                </form>
            </div>
        </div>
        <!--begin::Datatable-->
        <table id="kt_datatable_example_1" class="table align-middle table-row-bordered fs-6 gy-5">
            <thead>
                <th class="w-10px pe-2 text-center fw-bolder">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    </div>
                </th>
                <th class="text-center fw-bolder">اسم الفريق</th>
                <th class="text-center fw-bolder">اسم الموظف</th>
                <th class="text-center fw-bolder">اسم النظام</th>
                <th class="text-center fw-bolder">عنوان المهمة</th>
                <th class="text-center fw-bolder">نوع المهمة</th>
                <th class="text-center fw-bolder">تاريخ البدء المخطط له</th>
                <th class="text-center fw-bolder">تاريخ الانتهاء المخطط له</th>
                <th class="text-center fw-bolder">تاريخ البدء الفعلي</th>
                <th class="text-center fw-bolder">تاريخ الانتهاء الفعلي</th>
                <th class="text-center fw-bolder">الشهر</th>
                <th class="text-center fw-bolder">السنة</th>
                <th class="text-center fw-bolder">مدة الانجاز</th>
                <th class="text-center fw-bolder">نوع مدة الانجاز</th>
                <th class="text-center fw-bolder">حالة الانجاز</th>
                <th class="text-center fw-bolder">داخل الخطة</th>
                <th class="text-center fw-bolder">الاجراءات</th>
            </thead>

        </table>
        <!--end::Datatable-->
    </div>
</div>
@endsection
@push('javascript')


<script>

    "use strict";
    
    // Class definition
    var KTDatatablesServerSide = function () {
        // Shared variables
        var table;
        var dt;
        var filterPayment;
    
        // Private functions
        var initDatatable = function () {
            dt = $("#kt_datatable_example_1").DataTable({
                responsive: true,
                searchDelay: 500,
                processing: false,
                serverSide: true,
                "bSort": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
                },
                stateSave: false,
                select: {
                    style: 'os',
                    selector: 'td:first-child',
                    className: 'row-selected'
                },
                ajax: {
                url: '{{ route('tasks.datatable') }}',
                "data": function ( d ) {
                    d.ACTUAL_FINISH_MONTH = $('#ACTUAL_FINISH_MONTH').val();
                    d.ACTUAL_FINISH_YEAR= $('#ACTUAL_FINISH_YEAR').val();
                    d.MEM_ID= $('#MEM_ID').val(); 
                    d.SYSTEM_ID= $('#SYSTEM_ID').val();
                    d.COMPLETION_STATUS = $('#COMPLETION_STATUS').val();
                }
                },
                columns: [
        
                    { data: 'ID',"searchable": false },
                    { data: 'TEAM',"searchable": false },
                    { data: 'MEM_NAME',"searchable": false },
                    { data: 'SYSTEM',"searchable": false },
                    { data: 'TITLE',"searchable": false },
                    { data: 'TASK_TYPE',"searchable": false ,render: function (data) {
                    
                        if(data == 1){
                            return "تحليل";
                        }else if(data== 2){
                            return "نطوير";
                        }else if(data== 3){
                            return "اجتماع";
                        }else if(data== 4){
                            return "دعم فني";
                        }else if(data== 5){
                            return "تقرير";
                        }else{
                            return "اختبار";
                        }
                    } },
                    { data: 'PLANNED_START_DT',"searchable": false },
                    { data: 'PLANNED_FINISH_DT',"searchable": false },
                    { data: 'ACTUAL_START_DT',"searchable": false },
                    { data: 'ACTUAL_FINISH_DT',"searchable": false },
                    { data: 'MONTH',"searchable": false },
                    { data: 'YEAR',"searchable": false },
                    { data: 'COMPLETION_PERIOD',"searchable": false },
                    { data: 'DURATION_TYPE',"searchable": false,render: function (data) {
                
                    if(data == '1'){
                            return "يوم";
                        }else if(data=='2'){
                            return "ساعة";
                        }else{
                          return "شهر";
                        }
                    }},
      
                        {
                            data: null,
                            'bSort': true,
                            render: function(data) {
                                if (data.COMPLETION_STATUS == 0) {
                                    return '<span class="badge badge-secondary val">غير محدد</span>';
                                }
                                if (data.COMPLETION_STATUS == 1) {
                                    return '<span class="badge badge-info val">منجز</span>';
                                }
                                if (data.COMPLETION_STATUS == 2) {
                                    return '<span class="badge badge-danger val ">غير منجز</span>';
                                }
                                if (data.COMPLETION_STATUS== 3) {
                                    return '<span class="badge badge-primary val ">مؤجل</span>';
                                }   
                                  if (data.COMPLETION_STATUS== 4) {
                                    return '<span class="badge badge-success val">قيد العمل</span>';
                                }
                                if (data.COMPLETION_STATUS== 5) {
                                    return '<span class="badge badge-danger val">الغاء</span>';
                                }
                                
                                return '-';
                            },"searchable": false


                        },
                    { data: 'IN_PLAN',"searchable": false,render: function (data) {
                        if(data == '1'){
                            return "نعم";
                        }else{
                            return "لا";
                        }
                    } },
                    { data: null,"searchable": false }
                ],
                columnDefs: [
                    {
                        targets: 0,
                        orderable: false,
                        render: function (data) {
                            return `
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="${data}" />
                                </div>`;
                        }
                    },
                    {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        var edit_link = '/tasks/'+data.ID+'/edit';
                      //  var update_can = '/tasks/update_reason/'+data.ID;
                        var update_del = '/tasks/update_reason/'+data.ID;

                        var toggel_text="";
                        var toggel_icon="check";
                        var action ="";
                       if(data.COMPLETION_STATUS == 1){
                        action = `\
                                 <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="0" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            غير محدد
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="2" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            غير منجز
                                        </a>
                                    </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="4" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            قيد العمل
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                        `;
                        // toggel_text="منجز";
                        // toggel_icon="check";

                       }else if(data.COMPLETION_STATUS == 2){
                        action = `\
                                 <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="0" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            غير محدد
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="1" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                             منجز
                                        </a>
                                    </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="4" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            قيد العمل
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="3" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            مؤجل 
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                        `;
                        // toggel_text="غير منجز";
                        // toggel_icon="cancel";
                       
                       }else if(data.COMPLETION_STATUS == 3){
                        action = `\
                                 <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="0" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            غير محدد
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="1" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                             منجز
                                        </a>
                                    </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="4" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            قيد العمل
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="2" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            غير منجز 
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                        `;
                        // toggel_text="مؤجل";
                        // toggel_icon="check";
                       }else if(data.COMPLETION_STATUS == 4){
                        action = `\
                                 <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="0" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            غير محدد
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="1" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                             منجز
                                        </a>
                                    </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="3" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            مؤجل
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="2" class="menu-link px-3 toggel" > <i class="fa fa-times me-2"></i>
                                            غير منجز 
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                        `;

                        // toggel_text="قيد العمل";
                        // toggel_icon="edit";
                       }else{
                        action = `\
                                 <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="4" class="menu-link px-3 toggel" > <i class="fa fa-tasks me-2"></i>
                                            قيد العمل
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="1" class="menu-link px-3 toggel" > <i class="fa fa-tasks me-2"></i>
                                             منجز
                                        </a>
                                    </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="3" class="menu-link px-3 toggel" > <i class="fa fa-tasks me-2"></i>
                                            مؤجل
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_val="2" class="menu-link px-3 toggel" > <i class="fa fa-tasks me-2"></i>
                                            غير منجز 
                                        </a>
                                    </div>
                                <!--end::Menu item--> 
                        `;

                       }
                    
                        return `\
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-flip="top-end">
                                ...
                              
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="${edit_link}" class="menu-link px-3" data-kt-docs-table-filter="edit_row"> <i class="fa fa-edit me-2"></i>
                                        تعديل
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" val_id="${data.ID}" class="menu-link px-3" data-kt-docs-table-filter="delete_row"> <i class="fa fa-times me-2"></i>
                                        حذف
                                    </a>
                                </div>
                                <!--end::Menu item--> 
                                `+action+
                                `/                         
                                 <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" val_id="${data.ID}" class="menu-link px-3 cancel"  data-kt-docs-table-filter="add_reason2"> <i class="fa fa-times me-2"></i>
                                  الغاء                              
                                  </a>
                                </div>
                                <!--end::Menu item-->
                                
                            </div>
                            <!--end::Menu-->
                        `;
                    },
                },
                ],
                // Add data-filter attribute
                createdRow: function (row, data, dataIndex) {
                    $(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
                }
            });
    
            table = dt.$;
    
            // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
            dt.on('draw', function () {
                handleDeleteRows();
                handleupdateRows();
                handleupdatecancel();
                KTMenu.createInstances();
            });
        }
    
        
        var handleSearchDatatable = function () {
            const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                dt.search(e.target.value).draw();
            });
             }
            var handleSearchDatatable2 = function () {
            const filterSearch2 = document.querySelector('[data-kt-docs-table-filter="search2"]');
            filterSearch2.addEventListener('keyup', function (x) {
                dt.draw();
            });
        }  
        
        var handleSearchDatatable3 = function () {
            const filterSearch3 = document.querySelector('[data-kt-docs-table-filter="search3"]');
            filterSearch3.addEventListener('keyup', function (x) {
                 dt.draw();
             });
        }  

        // Delete user
        var handleDeleteRows = () => {
            // Select all delete buttons
            const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');
    
            deleteButtons.forEach(d => {
                // Delete button on click
                d.addEventListener('click', function (e) {
                    e.preventDefault();
                    // Select parent row
                    const parent = e.target.closest('tr');
    
                    // Get customer name
                    const customerName = parent.querySelectorAll('td')[1].innerText;
                    const id = $(this).attr('val_id'); 
                    // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "هل أنت متأكد من حذف  " + customerName + " ؟",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم , احذف!",
                        cancelButtonText: "لا , الغاء",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            // Simulate delete request -- for demo purpose only
                            jQuery.ajax({
                                type: "DELETE",
                                 url: 'tasks/'+id,
                                data:{
                                    "_token": "{{ csrf_token() }}",
                                },
                                dataType: 'json',
                                success :function (data) {
                                    Swal.fire({
                                    text: "تم حذف  " + customerName + "!.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "حسنًا ، موافق!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {
                                    // delete row data from server and re-draw datatable
                                    dt.draw();
                                });
                                }
                            });
                               
                     
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: customerName + " تم الغاء عملية الحذف.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسنًا ، موافق!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });
                })
            });
        }

         var handleupdateRows = () => {
            // Select all delete buttons
            const update_reason = document.querySelectorAll('[data-kt-docs-table-filter="add_reason"]');
    
            update_reason.forEach(d => {
                // Delete button on click
                d.addEventListener('click', function (e) {

                    e.preventDefault();
                    // Select parent row
                    const parent = e.target.closest('tr');
                    $("#wait_id").val($(this).attr('val_id'));


                    // Get customer name
                    // const customerName = parent.querySelectorAll('td')[3].innerText;
                    // const id = $(this).attr('val_id'); 
                   


                });  
            });
                
        }


        var handleupdatecancel = () => {
            // Select all delete buttons
            const update_reason = document.querySelectorAll('[data-kt-docs-table-filter="add_reason2"]');
    
            update_reason.forEach(d => {
                // Delete button on click
                d.addEventListener('click', function (e) {

                    e.preventDefault();
                    // Select parent row
                    const parent = e.target.closest('tr');
                    $("#cancel_id").val($(this).attr('val_id'));


                    // Get customer name
                    // const customerName = parent.querySelectorAll('td')[3].innerText;
                    // const id = $(this).attr('val_id'); 
                   


                });  
            });
                
        }

        $('#MEM_ID' ).on('change', function (data, callbak) {
            dt.draw();
        });
        $('#SYSTEM_ID').on('change', function (data, callbak) {
            dt.draw();
        });
        $('#COMPLETION_STATUS' ).on('change', function (data, callbak) {
            dt.draw();
        });
        $(document).on('click', '.toggel', function (data, callbak) {
            var id = $(this).attr('val_id');
            var status = $(this).attr('val_val');
            jQuery.ajax({
                type: "get",
                url: 'tasks/change_status/'+id,
                data:{
                    "COMPLETION_STATUS": status,
                },
                dataType: 'json',
                success :function (data) {
                    dt.draw();
                    toastr.success("تم تعديل حالة المهمة");

                }
            }); 
        });

        $(".save").click(function(){
                        var id = $("#wait_id").val();
                        var Content = tinymce.get("DELAIED_REASON").getContent(); 
                        
                        jQuery.ajax({

                            type: "post",
                            url: 'tasks/update_reason/'+status,
                            data:{
                                "_token": "{{ csrf_token() }}",       
                                "id": id,
                                "ISDELAY":1,
                                "ISCANCEL":0,
                                "DELAIED_REASON":Content, 
                                "CANCELED_REASON":null,
                                "COMPLETION_STATUS": 3,
                                "UPDATED_BY":1,

                            },
                            dataType: 'json',
                            success :function (data) {
                                dt.draw();
                                toastr.success("تم تأجيل المهمة بنجاح");

                                tinyMCE.get('#DELAIED_REASON').getContent()


                            }
                                            }); 

                     }); 

                                     
                    $(".save_cancel").click(function(){
                                            var id = $("#cancel_id").val(); 
                                            var Content = tinymce.get("CANCELED_REASON").getContent(); 
                                            jQuery.ajax({
                                                type: "post",
                                                url: 'tasks/update_reason/'+id,
                                                data:{
                                                    "_token": "{{ csrf_token() }}",       
                                                    "id": id,
                                                    "ISDELAY":0,
                                                    "ISCANCEL":1,
                                                    "DELAIED_REASON":null, 
                                                    "CANCELED_REASON": Content,
                                                    "COMPLETION_STATUS": 5,
                                                    "UPDATED_BY":1
                                                },
                                                dataType: 'json',
                                                success :function (data) {
                                                    dt.draw();
                                                    toastr.success("تم الغاء المهمة بنجاح");
                                                    tinyMCE.get('CANCELED_REASON').getContent()

                                                    }
                                            }); 
                     }); 


                

        return {
            init: function () {
                initDatatable();
                handleDeleteRows();
                handleSearchDatatable();
                handleSearchDatatable2();
                handleSearchDatatable3();
                handleupdateRows();
                handleupdatecancel();
            }
        }
    }();
    
    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesServerSide.init();
    });
 
    $(document).on('click', '.wait', function (data, callbak) {
                    $('#waitModal').modal('show');
       
                });
$("button[data-dismiss=modal]").click(function()
{
  $(".modal").modal('hide');
}); 


$(document).on('click', '.cancel', function (data, callbak) {
                    $('#cancelModal').modal('show');
       
                });
$("button[data-dismiss=modal]").click(function()
{
  $(".modal").modal('hide');
});

                    $(".save").click(function(){
                        var id = $("#wait_id").val(); 
                      //  alert(id);
                    jQuery.ajax({
                            type: "post",
                            url: 'tasks/update_reason/'+id,
                            data:{
                                "_token": "{{ csrf_token() }}",       
                                "id": id,
                                "ISDELAY":1,
                                "ISCANCEL":0,
                                "DELAIED_REASON":$( "#DELAIED_REASON" ).val(), 
                                "CANCELED_REASON":null,
                                "UPDATED_BY":1
                            },
                            dataType: 'json',
                            success :function (data) {
                            
                                toastr.success();

                                   }
                        }); 


                    });

                    
                    $(".save_cancel").click(function(){
                                            var id = $("#cancel_id").val(); 
                                        //  alert(id);
                                        jQuery.ajax({
                                                type: "post",
                                                url: 'tasks/update_reason/'+id,
                                                data:{
                                                    "_token": "{{ csrf_token() }}",       
                                                    "id": id,
                                                    "ISDELAY":0,
                                                    "ISCANCEL":1,
                                                    "DELAIED_REASON":null, 
                                                    "CANCELED_REASON":$( "#CANCELED_REASON" ).val(),
                                                    "UPDATED_BY":1
                                                },
                                                dataType: 'json',
                                                success :function (data) {
                                                
                                                    toastr.success();

                                                    }
                                            }); 

                     }); 


  $( '#MEM_ID' ).select2( {
           enableFiltering: true,
           maxHeight: 350
           
         } ) ; 
        
        
    $( '#COMPLETION_STATUS' ).select2( {
           enableFiltering: true,
            maxHeight: 350
           
       } ) ;

    $( '#SYSTEM_ID' ).select2( {
           enableFiltering: true,
           
       } ) ;

       
    </script>
@endpush
