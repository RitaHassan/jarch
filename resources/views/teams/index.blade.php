
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
                <th class="text-center fw-bolder">اسم النظام</th>
                <th class="text-center fw-bolder">الاجراءات</th>
            </thead>

        </table>
        <!--end::Datatable-->
    </div>
</div>


 <div id="viewModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modalTitle">عرض أعضاء الفريق</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

                </div>
                <div class="modal-body">
                    <input type='hidden'  id ="TEAM_ID" name="TEAM_ID" value=""/>
               <!-- <div id="here_table"></div>-->

                <table class="table table-bordered table-hover table-striped dataTable" id="members_table">
  
                    <thead>
                        <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        </tr>
                      </thead>   
                      <tbody >
                      
                      </tbody> 
                </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">اغلاق</button>
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
                    // d.ID_NO = $('#ID_NO').val();
                    // d.CARD_ID = $('#CARD_ID').val(); 
                    // d.LICENSE_NUMBER = $('#LICENSE_NUMBER').val();
                    // d.LICENSE_EXPIRATION_DATE = $('#LICENSE_EXPIRATION_DATE').val(); 
                    // d.NAME = $('#NAME').val();
                }
                },
                columns: [
                    { data: 'ID',"searchable": false },
                    { data: 'NAME',"searchable": false },
                    { data: 'SYSTEM_NAME',"searchable": false },
                    { data: null,"searchable": false }
                ],
                columnDefs: [
                  
                    {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        var edit_link = '/teams/'+data.ID+'/edit';
                        var add_link = '/teams/create_by_id/'+data.ID;
                        var add_system = '/systems/'+data.ID+'/create';
                       
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
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="${add_link}"  val_id="${data.ID}" class="menu-link px-3" data-kt-docs-table-filter=""> <i class="fa fa-times me-2"></i>
                                        إضافة أعضاء
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" val_id="${data.ID}" class="menu-link px-3 view" data-kt-docs-table-filter="view_row"> <i class="fa fa-times me-2"></i>
                                         عرض الأعضاء
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="${add_system}" class="menu-link px-3" data-kt-docs-table-filter=""> <i class="fa fa-times me-2"></i>
                                         إضافة نظام 
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
                handleViewRows();
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

       

// Delete user
var handleViewRows = () => {
            // Select all delete buttons
            const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="view_row"]');
    
            deleteButtons.forEach(d => {
                // Delete button on click
                d.addEventListener('click', function (e) {
                    e.preventDefault();
                    // Select parent row
                    const parent = e.target.closest('tr');
    
                    // Get customer name
                    const customerName = parent.querySelectorAll('td')[3].innerText;
                    const id = $(this).attr('val_id'); 
                    var str = $("#TEAM_ID").val(id);
                   // alert(id);
                    jQuery.ajax({
                                type: "get",
                                url: 'teams/giveMembers/'+id,
                                
                                dataType: 'json',
                                success :function (data) {
                                //   $('#members-table').append('<th><tr><td>رقم الهوية</td><td>الصفة الوظيفية</td></tr></th>')+
                                      
                                //   $('table > tbody  > tr').each(function(index, tr) { 

                                //   '<td>'+data[0][ID_NUM]+'</td><td></td>'
                                  
                                //     });


                                $("#members_table").empty();
                    $("#members_table").append('<tr>'+
                                            '<th>#</th>'+
                                            '<th>رقم الهوية</th>'+
                                            '<th>الاسم</th>'+
                                            '<th>الصفة</th>'+
                                            '</tr>');
                    data.forEach(element => {
                    var role = (element.ROLE == 1) ? 'مشرف' : 'عضو';
                        $("#members_table").append(
'<tr><td>' +  element.ID  + '</td>' +
'<td>' +  element.ID_NUM   + '</td>'+
'<td>' +  element.MEM_NAME   + '</td>'+
'<td>'+ role+'</td></tr>'

);

                        });
                            


                                }
                          
                            });
                               






                   
                  
                })
            });
        }

    
        // Public methods
        return {
            init: function () {
                initDatatable();
                handleDeleteRows();
                handleViewRows();
                handleSearchDatatable();
            }
        }
    }();
    
    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesServerSide.init();
    });
    

    $(document).on('click', '.view', function (data, callbak) {
                    $('#viewModal').modal('show');
       
                });
$("button[data-dismiss=modal]").click(function()
{
  $(".modal").modal('hide');
});
    </script>
@endpush
