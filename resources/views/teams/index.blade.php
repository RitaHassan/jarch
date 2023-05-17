@extends('layout')
@section('contents')


<div class="card shadow-sm">
    <div class="d-flex align-items-center py-1">

        <!--begin::Button-->
            <a href="#" class="btn btn-sm btn-primary add" id="kt_toolbar_primary_button">
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                </svg>
            </span> 
            إضافة فريق</a>
        <!--end::Button-->
    </div>
    
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
                                <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="اسم الفريق">
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
                <th class="text-center fw-bolder">اسم الفريق</th>
                <th class="text-end min-w-100px">الاجراءات</th>
            </thead>

        </table>
        <!--end::Datatable-->
    </div>
</div>


<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modalTitle">اضافة فريق</h3>
                </div>
                <div class="modal-body">

                                <div class="col-xl-12 form-group mb-12">
                                    <label class="required form-label fw-bolder">اسم الفريق</label>
                                    <input type="text"  id="NAME" name="NAME"  class="form-control form-control-solid" 
                                    placeholder="الفريق">
                                </div>
    
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="save_btn">
                                    <i class="fa fa-check me-2"></i> حفظ
                                </button>
                            </div>

                </div>

            </div>
        </div>
    </div>

    <div id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modalTitle">تعديل فريق</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="ID" value=""/>
                        <div class="col-xl-12 form-group mb-12">
                            <label class="required form-label fw-bolder">اسم الفريق</label>
                            <input type="text"  id="NAME_UPDATE" name="NAME"  value=""  class="form-control form-control-solid" 
                            placeholder="الفريق">
                        </div>
                        <div class="card-footer">
                            <button type="buttun" class="btn btn-primary" id="btn_update">
                                <i class="fa fa-check me-2"></i> حفظ
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div id="viewModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modalTitle">عرض أعضاء الفريق</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type='hidden'  id ="TEAM_ID" name="TEAM_ID" value=""/>

                    {{-- <div class="col-sm-4 form-group mb-4">
                        <label class="required form-label fw-bolder">اسم الفريق</label>
                        <select name="TEAM_ID" id="TEAM_ID" class="form-control form-control-solid" disabled >
                             <option value="-1" >--اختر--</option>
                            @foreach($member2 as $m)
                                <option value="{{$m->ID}}" {{$team->ID==$m->ID? 'selected' :''}}>{{$m->NAME}}</option>
                            @endforeach 
                        </select>  
                    </div> --}}
                    <div class="col-sm-4 form-group mb-4">
                        <label class="required form-label fw-bolder">رقم هوية الموظف</label>
                        <input type="text"  id="ID_NUM" name="ID_NUM"  class="form-control form-control-solid" 
                        placeholder="رقم الهوية">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label class="required form-label fw-bolder">اسم الموظف</label>
                        <input type="text"  id="MEM_NAME" name="MEM_NAME"   class="form-control form-control-solid" 
                        placeholder="اسم الموظف">
                    </div>
                    <div class="col-xl-2 form-group mb-2">

                    <button type="button" id="add_member" class='btn btn-icon btn-xl btn-xl btn-primary btn-add-member'><i class='fa fa-plus'></i></button>
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
                url: '{{ route('teams.datatable') }}',
                "data": function ( d ) {

                }
                },
                columns: [
                    { data: 'ID',"searchable": false },
                    { data: 'NAME',"searchable": false },
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
                        var add_link = '/teams/create_by_id/'+data.ID;
                       
                        return `\
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-flip="top-end">
                                ...
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3 update" val_id="${data.ID}" val_name="${data.NAME}"> <i class="fa fa-edit me-2"></i>
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

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" val_id="${data.ID}" val_name="${data.NAME}" class=" x menu-link px-3 view" data-kt-docs-table-filter="view_row"> <i class="fa fa-users me-1"></i>الأعضاء</a>
                                </div>
                
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
                const customerName = parent.querySelectorAll('td')[1].innerText;
                const id = $(this).attr('val_id'); 
                var str = $("#TEAM_ID").val(id);
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
                            url: 'teams/'+id,
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

    // start add team
    $(document).on('click', '.add', function (data, callbak) {
        $('#addModal').modal('show');  
    });

    $("#save_btn").click(function(e){
        e.preventDefault();
        jQuery.ajax({
                type: "post",
                url: 'teams',
                data:{
                    "_token": "{{ csrf_token() }}",
                    "NAME": $("#NAME").val(),
                },
                dataType: 'json',
                success :function (data) {
                    $('#addModal').modal('hide');
                    $("#NAME").val("");
                    dt.draw();
                    toastr.success("تمت عملية الحفظ بنجاح");

                }
            }); 
    });
    // end add team

    //start edit team
    $(document).on('click', '.update', function (data, callbak) {
        $("#ID").val($(this).attr('val_id'));
        $("#NAME_UPDATE").val($(this).attr('val_name'));
        $('#updateModal').modal('show');
    });
    
    $("#btn_update").click(function(e){
        e.preventDefault();
        jQuery.ajax({
                type: "PATCH",
                url: 'teams/'+ $("#ID").val(),
                data:{
                    "_token": "{{ csrf_token() }}",
                    "NAME": $("#NAME_UPDATE").val(),
                },
                dataType: 'json',
                success :function (data) {
                    $('#updateModal').modal('hide');
                    $("#NAME_UPDATE").val("");
                    $("#ID").val("");
                    dt.draw();
                    toastr.success("تمت عملية الحفظ بنجاح");

                }
            }); 
    });
    //end edit team

    //start show members
    $(document).on('click', '.view', function (data, callbak) {
        var team_id = $(this).attr('val_id');
        $('#TEAM_ID').val(team_id);
        draw_members(team_id);
    });

    $("#add_member").click(function(e){
        e.preventDefault();
        var name  = $('#TEAM_ID').val();
       // alert(name);
        jQuery.ajax({
                type: "post",
                url: 'members',
                data:{
                    "_token": "{{ csrf_token() }}",
                    "TEAM_ID":name,
                    "ID_NUM": $("#ID_NUM").val(), 
                    "MEM_NAME": $("#MEM_NAME").val(),
                    "ROLE":0,
                    "ACTIVE":1
                },
                dataType: 'json',
                success :function () {
                   // $('#addModal').modal('hide');
                    $("#ID_NUM").val(""); 
                    $("#MEM_NAME").val("");
                    toastr.success("تمت عملية الحفظ بنجاح");
                    draw_members(team_id);


                }
            }); 
    });

        $("#ID_NUM").change(function(){
            if($(this).val().length==9){
            jQuery.ajax({
            type: "get",
            url: '/members/info/'+$(this).val(),
            dataType: 'json',
            success :function (data) {
            if(data.StatusCode == 1){
                  $("#MEM_NAME").val(data.Result.FullName);
            }else{
                $("#MEM_NAME").val("");
            }
            }
    
        });
        }
        });
    function draw_members (team_id){
        jQuery.ajax({
                type: "get",
                url: 'teams/giveMembers/'+ team_id,
                dataType: 'json',
                success :function (data) {
                    $("#members_table").find('tbody').empty();
                    data.forEach((d, index)  => {
                        $("#members_table").find('tbody').append("<tr><td>"+(index+1)+"</td><td>"+d.MEM_NAME+"</td><td><a val-id='"+d.MEM_ID+"' val_name='"+d.MEM_NAME+"' val_team_id='"+team_id+"' class='btn btn-icon btn-xs btn-sm btn-danger btn-member-delete'><i class='fa fa-trash'></i></a></td><td></td></tr>");
                   
                    });
                }
            }); 

        $('#viewModal').modal('show');
    }
 $(document).on('click', '.btn-member-delete', function (data, callbak) {
    const id =  $(this).attr('val-id');
    const customerName = $(this).attr('val_name'); 
    const team_id = $(this).attr('val_team_id');
    alert(id);
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
                url: 'members/'+id,
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
                    draw_members(team_id);
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
    //end show members
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
