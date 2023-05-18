@extends('layout')
@section('contents')
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
                            <div class="form-group" id="">
                                <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="اسم النظام" >
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <br>

                            <div class="form-group" id="">
                               
                            </div>
                            </form>
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
                <th class="text-center fw-bolder min-w-100px">رقم النظام</th>
                <th class="text-center fw-bolder">اسم النظام</th>
                <th>الحالة</th>
                <th class="text-end fw-bolder">الاجراءات</th>
            </thead>

        </table>
        <!--end::Datatable-->
    </div>
</div>
{{-- start modal to add system  --}}
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">اضافة نظام</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <label class="required form-label fw-bolder">رقم النظام</label>
                        <input type="text"  id="SYSTEM_NUM" name="SYSTEM_NUM"  class="form-control form-control-solid" 
                        placeholder="رقم النظام">
                    </div>
                    <div class="col-md-6">
                        <label class="required form-label fw-bolder">اسم النظام</label>
                        <input type="text"  id="SYSTEM_NAME" name="SYSTEM_NAME"  class="form-control form-control-solid" 
                        placeholder="اسم النظام">
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button type="submit" class="btn btn-primary" id="save_btn">
                            <i class="fa fa-check me-2"></i> حفظ
                        </button>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
{{-- end modal to add system  --}}

{{-- start modal to update system  --}}
<div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">تعديل نظام</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="ID_UPDATE">
                    <div class="col-md-3">
                        <label class="required form-label fw-bolder">رقم النظام</label>
                        <input type="text"  id="SYSTEM_NUM_UPDATE" name="SYSTEM_NUM_UPDATE"  class="form-control form-control-solid" 
                        placeholder="رقم النظام">
                    </div>
                    <div class="col-md-6">
                        <label class="required form-label fw-bolder">اسم النظام</label>
                        <input type="text"  id="SYSTEM_NAME_UPDATE" name="SYSTEM_NAME_UPDATE"  class="form-control form-control-solid" 
                        placeholder="اسم النظام">
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button type="submit" class="btn btn-primary" id="update_btn">
                            <i class="fa fa-check me-2"></i> حفظ
                        </button>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
{{-- end modal to update system  --}}
<div id="membersModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">عرض أعضاء الفريق</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type='hidden'  id ="SYSTEM_ID" name="SYSTEM_ID" value=""/>

                <div class="col-sm-10 form-group mb-10">
                    <label class="required form-label fw-bolder">اسم العضو</label>
                    <select name="MEMBER_ID" id="MEMBER_ID" class="form-control form-control-solid"  >
                         <option value="" >--اختر--</option>
                        @foreach($members as $member)
                            <option value="{{$member->ID}}">{{$member->MEM_NAME}}</option>
                        @endforeach 
                    </select>  
                </div>
                
                <div class="col-xl-2 form-group mb-2">
                    <br>
                <button type="button" id="add_member" class='btn btn-sm btn-icon btn-xl btn-xl btn-primary btn-add-member'><i class='fa fa-plus'></i></button>
            </div>

            </div>
            <table class="table table-bordered table-hover table-striped dataTable" id="members_table">

                <thead>
                    <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th></th>
                    </tr>
                  </thead>   
                  <tbody >
                  </tbody> 
            </table>
            </div>
           
        </div>
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
                url: '{{ route('systems.datatable') }}',
                "data": function ( d ) {
                    // d.ID_NO = $('#ID_NO').val();
                    // d.CARD_ID = $('#CARD_ID').val(); 
                    // d.LICENSE_NUMBER = $('#LICENSE_NUMBER').val();
                    // d.LICENSE_EXPIRATION_DATE = $('#LICENSE_EXPIRATION_DATE').val(); 
                    // d.NAME = $('#NAME').val();
                }
                },
                columns: [
                    { data: 'ID',"searchable": false },
                    { data: 'SYSTEM_NUM',"searchable": false ,"width": "100px"},
                    { data: 'SYSTEM_NAME',"searchable": false,"className": 'text-center', },
                    { data:'ACTIVE','title':'الحالة','bSort':true,render :function (data) {
                        if(data == 1){
                            return '<span class="badge badge-success">فعال</span>';
                        }
                        if(data == 0){
                            return '<span class="badge badge-danger">غير فعال</span>';
                        }
                        return '-';
                    }},
                    { data: null,"searchable": false ,"width": "100px"}
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
                        var toggel_text="";
                        var toggel_icon="check";
                       if(data.ACTIVE == 1){
                        toggel_text="تعطيل";
                        toggel_icon="times";
                       }else{
                        toggel_text="تفعيل";
                        toggel_icon="check";
                       }
                        return `\
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-flip="top-end">
                                ...
                              
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 members" val_id="${data.ID}" val_system_num="${data.SYSTEM_NUM}"> <i class="fa fa-users me-2"></i>
                                        الاعضاء
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 update" val_id="${data.ID}" val_system_num="${data.SYSTEM_NUM}"  val_name="${data.SYSTEM_NAME}"> <i class="fa fa-edit me-2"></i>
                                        تعديل
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 toggel" val_id="${data.ID}"  > <i class="fa fa-${toggel_icon} me-2"></i>
                                        ${toggel_text}
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" val_id="${data.ID}" class="menu-link px-3" data-kt-docs-table-filter="delete_row"> <i class="fa fa-trash me-2"></i>
                                        حذف
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
                KTMenu.createInstances();
            });
        }
    
        
        var handleSearchDatatable = function () {
            const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function (e) {
                dt.search(e.target.value).draw();
            });
        //
        // const btnFilterSearch = document.querySelector('[data-kt-docs-table-filter="search_btn"]');
        // btnFilterSearch.addEventListener('click', function (e) {
        //     e.preventDefault();
        //     dt.search('').draw();
        // });
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
                    const customerName = parent.querySelectorAll('td')[2].innerText;
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
                                 url: 'systems/'+id,
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

     

        // start save system
        $(document).on('click', '.add', function (data, callbak) {
            $('#addModal').modal('show');  
        });

        $("#save_btn").click(function(e){
            e.preventDefault();
            jQuery.ajax({
                    type: "post",
                    url: 'systems',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        "NAME": $("#NAME").val(),
                        "TEAM_ID" : 0,
                        "SYSTEM_NUM": $("#SYSTEM_NUM").val(),
                        "SYSTEM_NAME": $("#SYSTEM_NAME").val(),
                        "ACTIVE" : 1
                    },
                    dataType: 'json',
                    success :function (data) {
                        $('#addModal').modal('hide');
                        $("#SYSTEM_NUM").val("");
                        $("#SYSTEM_NAME").val("");
                        dt.draw();
                        toastr.success("تمت عملية الحفظ بنجاح");

                    }
                }); 
        });
        // end save system

       //start edit system
       $(document).on('click', '.update', function (data, callbak) {
            $("#ID_UPDATE").val($(this).attr('val_id'));
            $("#SYSTEM_NUM_UPDATE").val($(this).attr('val_system_num'));
            $("#SYSTEM_NAME_UPDATE").val($(this).attr('val_name'));
            $('#updateModal').modal('show');
        });
        $(document).on('click', '.members', function (data, callbak) {
            $("#SYSTEM_ID").val($(this).attr('val_id'));
            draw_members($(this).attr('val_id'));
             $('#membersModal').modal('show');
        })
        
        function draw_members(system_id){
            jQuery.ajax({
                    type: "get",
                    url: 'systems/members/'+ system_id,
                    dataType: 'json',
                    success :function (data) {
                        $("#members_table").find('tbody').empty();
                        data.forEach((d, index)  => {
                            $("#members_table").find('tbody').append("<tr><td>"+(index+1)+"</td><td>"+d.MEM_NAME+"</td><td><a val-id='"+d.ID+"' val_name='"+d.MEM_NAME+"' val_system_id ='"+d.SYSTEM_ID+"' class='btn btn-icon btn-xs btn-sm btn-danger btn-member-delete'><i class='fa fa-trash'></i></a></td><td></td></tr>");
                    
                        });
                    }
                }); 

            $('#viewModal').modal('show');
        }

        $(document).on('click', '.btn-member-delete', function (data, callbak) {
            const id =  $(this).attr('val-id');
            const customerName = $(this).attr('val_name');
            const system_id = $(this).attr('val_system_id'); 
            Swal.fire({
                text: "هل أنت متأكد من عملية الحذف",
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
                        url: 'systems/members/'+id,
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
                            draw_members(system_id);
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
        });

        $("#update_btn").click(function(e){
            e.preventDefault();
            jQuery.ajax({
                type: "PATCH",
                url: 'systems/'+ $("#ID_UPDATE").val(),
                data:{
                    "_token": "{{ csrf_token() }}",
                    "TEAM_ID" : 0,
                    "SYSTEM_NUM": $("#SYSTEM_NUM_UPDATE").val(),
                    "SYSTEM_NAME": $("#SYSTEM_NAME_UPDATE").val(),
                    "ACTIVE": 1
                },
                dataType: 'json',
                success :function (data) {
                    $('#updateModal').modal('hide');
                    $("#SYSTEM_NUM_UPDATE").val("");
                    $("#SYSTEM_NAME_UPDATE").val("");
                    $("#ID_UPDATE").val("");
                    dt.draw();
                    toastr.success("تمت عملية الحفظ بنجاح");

                }
            }); 
        });
        $("#add_member").click(function(e){
        e.preventDefault();
        var SYSTEM_ID  = $('#SYSTEM_ID').val();
        jQuery.ajax({
                type: "post",
                url: 'systems/members',
                data:{
                    "_token": "{{ csrf_token() }}",
                    "SYSTEM_ID":SYSTEM_ID,
                    "MEMBER_ID": $("#MEMBER_ID").val(), 
                },
                dataType: 'json',
                success :function (data) {
                    if(data.status ==1){
                        $("#ID_NUM").val(""); 
                        $("#MEM_NAME").val("");
                        toastr.success("تمت عملية الحفظ بنجاح");
                        draw_members(SYSTEM_ID);
                    }else{
                        toastr.error(data.msg);
                    }
                    


                }
            }); 
    });
        // end edit system
        
        // toggel 
        $(document).on('click', '.toggel', function (data, callbak) {
            var id = $(this).attr('val_id');
            jQuery.ajax({
                type: "get",
                url: 'systems/toggel/'+id,
               
                dataType: 'json',
                success :function (data) {
                    dt.draw();
                    toastr.success("تمت العملية  بنجاح");

                }
            }); 
        });
        // Public methods
        return {
            init: function () {
                initDatatable();
                handleDeleteRows();
                handleSearchDatatable();
            }
        }
    }();
    
    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesServerSide.init();
    });
    
    </script>
@endpush
