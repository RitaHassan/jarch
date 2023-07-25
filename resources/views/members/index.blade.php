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
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="black"></path>
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

                    <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" title="حذف"
                        data-kt-docs-table-select="delete_selected">
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
                                    <input type="text" data-kt-docs-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-15" placeholder="اسم الموظف">
                                </div>
                            </div>
                            {{-- <div class="col-sm-3">
                            <div class="form-group" id="">
                                <label for="">اسم النظام</label>
                                <select name="SYSTEM_ID" id="SYSTEM_ID"
                                    class="form-control form-control-solid w-250px ps-15">
                                    <option value="" selected>--اختر--</option>
                                    @foreach ($systems as $system)
                                        <option value="{{ $system->ID }}" {{ $system->ID }}>
                                            {{ $system->SYSTEM_NAME }}</option>
                                    @endforeach
                                </select>                            </div>
                        </div> --}}
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

            <th class="text-center fw-bolder">رقم هوية الموظف</th>
            <th class="text-center fw-bolder">اسم الموظف</th>
            <th class="text-center fw-bolder">اسم الفريق</th>
            <th class="text-center fw-bolder">تاريخ اضافة الموظف</th>
            <th>حالة الموظف</th>
            <th class="text-center fw-bolder">الاجراءات</th>
        </thead>

    </table>
    <!--end::Datatable-->
    </div>
    </div>


    <div id="toggel_1_Modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modalTitle">عرض الانظمة</h3>

                </div>
                <div class="modal-body">

                    <div class="row">

                        <input type='hidden' id="MEMBER_ID" name="MEMBER_ID" value="" />
                        <div class="col-xl-6 form-group mb-6">
                            <label class="required form-label fw-bolder">اسم النظام</label>
                            <select name="SYSTEM_ID" id="SYSTEM_ID" class="form-control form-control-solid">
                                <option value="">--اختر--</option>
                                @foreach ($systems as $m)
                                    <option value="{{ $m->ID }}">{{ $m->SYSTEM_NAME }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-2 form-group mb-2">
                            <br>
                            <button type="button" id="add_member"
                                class='btn btn-sm btn-icon btn-xl btn-xl btn-primary btn-add-member'><i
                                    class='fa fa-plus'></i></button>
                        </div>
                    </div>

                    <input type="hidden" id="val_id_1" />
                    <input type="hidden" id="val_dat" />
                    <table class="table table-bordered table-hover table-striped dataTable" id="systems_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>النظام</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>




                </div>

            </div>
        </div>
    </div>


    <div id="toggel_2_Modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modalTitle">تعديل الفريق</h3>

                </div>
                <div class="modal-body">

                {{-- <div class="row"> --}}
                    <div class="col-xl-12 form-group mb-12">
                        <input type='hidden' id="ID" name="ID" value="" />
                        <div class="col-xl-6 form-group mb-6">
                            <label class="required form-label fw-bolder">اسم الفريق</label>
                            <select name="TEAM_ID" id="TEAM_IDs" class="form-control form-control-solid w-250px ps-15">
                                <option value="option_select" disabled selected>--اختر--</option>
                                @foreach ($teams as $m)
                                    <option value="{{ $m->ID }}">{{ $m->NAME }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 form-group mb-6">
                            <br>
                            <button type="button" id="btn_update" data-kt-docs-table-filter="update_team"
                                class='btn btn-icon btn-xl btn-xl btn-primary btn-add-member'>تعديل</button>
                        </div>
                    </div>
                {{-- </div> --}}

                </div>

            </div>
        </div>
    </div>
@endsection
@push('javascript')


    <script>

        $('#TEAM_IDs' ).select2({
            enableFiltering: true,
            maxHeight: 350
        });

        $('#TEAM_ID').select2({
            enableFiltering: true,
            maxHeight: 350

        });

       $('#SYSTEM_ID' ).select2({
        enableFiltering: true,
            maxHeight: 350

       }) ;
        "use strict";

        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var dt;
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                dt = $("#kt_datatable_example_1").DataTable({
                    pageLength: 10,
                    responsive: true,
                    searchDelay: 500,
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "bSort": true,
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
                        url: '{{ route('members.datatable') }}',
                        "data": function(d) {
                            // d.ID_NO = $('#ID_NO').val();
                            // d.CARD_ID = $('#CARD_ID').val();
                            // d.LICENSE_NUMBER = $('#LICENSE_NUMBER').val();
                            // d.LICENSE_EXPIRATION_DATE = $('#LICENSE_EXPIRATION_DATE').val();
                            // d.NAME = $('#NAME').val();
                        }
                    },
                    columns: [{
                            data: 'ID',
                            "searchable": false
                        },
                        {
                            data: 'ID_NUM',
                            "searchable": false
                        },
                        {
                            data: 'MEM_NAME',
                            "searchable": false
                        },
                        {
                            data: null,
                            "searchable": false,
                            render: function(data) {
                                if (data.NAME == null) {
                                    return '<span>-</span>';
                                } else {
                                    return '<span>' + data.NAME + ' </span>';
                                }
                            }
                        },
                        {
                            data: 'CREATED_AT_MEM',
                            "searchable": false
                        },
                        {
                            data: 'DELETED_AT',
                            "searchable": false,
                            render: function(data) {
                                if (data == null) {
                                    return '<span class="badge badge-success">فعال</span>';
                                } else {
                                    return '<span class="badge badge-danger">موقوف </span>';
                                }
                            }
                        },

                        {
                            data: null,
                            "searchable": false
                        }
                    ],
                    columnDefs: [{

                        },
                        {
                            targets: -1,
                            data: null,
                            orderable: false,
                            className: 'text-end',
                            render: function(data, type, row) {
                                var edit_link = '/members/' + data.ID + '/edit';
                                var view_link = '/members';
                                if (data.DELETED_AT == null ) {
                                    return `\
                        <!--begin::Menu item-->

                            <!--end::Menu-->
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
                                        ايقاف
                                    </a>
                                </div>

                                <!--end::Menu item-->
                                <!--end::Menu-->
                            <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_memeber="${data.ID}" val_val="1" class="menu-link px-3 toggel_1" > <i class="fa fa-tasks me-2"></i>
                                             عرض الانظمة
                                        </a>
                                    </div>



                            <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_memeber="${data.ID}" val_val="1" class="menu-link px-3 toggel_2" > <i class="fa fa-tasks me-2"></i>
                                            تعديل الفريق
                                         </a>
                                    </div>

                            </div>
                        </div>

                                    `;
                                } else {
                                    return `\
                        <!--begin::Menu item-->

                            <!--end::Menu-->
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-flip="top-end">
                                ...

                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                
                                <!--end::Menu item-->
                                <!--begin::Menu item-->

                                <div class="menu-item px-3">
                                    <a href="#" val_id="${data.ID}" class="menu-link px-3" data-kt-docs-table-filter="update_row"> <i class="fa fa-times me-2"></i>
                                        تفعيل
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--end::Menu-->
                            <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_memeber="${data.ID}" val_val="1" class="menu-link px-3 toggel_1" > <i class="fa fa-tasks me-2"></i>
                                             عرض الانظمة
                                        </a>
                                    </div>


                            <div class="menu-item px-3">
                                        <a href="#" val_id="${data.ID}" val_memeber="${data.ID}" val_val="1" class="menu-link px-3 toggel_2" > <i class="fa fa-tasks me-2"></i>
                                             تعديل الفريق
                                        </a>
                                    </div>

                            </div>
                        </div>
                                    `;

                                }
                            },
                        },
                    ],
                    // Add data-filter attribute
                    createdRow: function(row, data, dataIndex) {
                        $(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
                    }
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    handleDeleteRows();
                    handleupdateRows();
                    // handleupdateTeam();
                    KTMenu.createInstances();
                });
            }


            var handleSearchDatatable = function() {
                const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
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
                    d.addEventListener('click', function(e) {
                        e.preventDefault();
                        // Select parent row
                        const parent = e.target.closest('tr');

                        // Get customer name
                        const customerName = parent.querySelectorAll('td')[2].innerText;
                        const id = $(this).attr('val_id');
                        //   alert(id);
                        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "هل أنت متأكد من ايقاف  " + customerName + " ؟",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "نعم , ايقاف!",
                            cancelButtonText: "لا , الغاء",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then(function(result) {
                            if (result.value) {
                                // Simulate delete request -- for demo purpose only
                                jQuery.ajax({
                                    type: "DELETE",
                                    url: 'members/' + id,
                                    data: {
                                        "TEAM_ID": null,
                                        "_token": "{{ csrf_token() }}",
                                    },
                                    dataType: 'json',
                                    success: function(data) {
                                        Swal.fire({
                                            text: "تم ايقاف  " +
                                                customerName + "!.",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "حسنًا ، موافق!",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function() {
                                            // delete row data from server and re-draw datatable
                                            dt.draw();
                                        });
                                    }
                                });


                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: customerName + " تم الغاء عملية ايقاف.",
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
                const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="update_row"]');

                deleteButtons.forEach(d => {
                    // Delete button on click
                    d.addEventListener('click', function(e) {
                        e.preventDefault();
                        // Select parent row
                        const parent = e.target.closest('tr');

                        // Get customer name
                        const customerName = parent.querySelectorAll('td')[2].innerText;
                        const id = $(this).attr('val_id');
                        //   alert(id);
                        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "هل أنت متأكد من تفعيل  " + customerName + " ؟",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "نعم , فعل!",
                            cancelButtonText: "لا , الغاء",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then(function(result) {
                            if (result.value) {
                                // Simulate delete request -- for demo purpose only
                                jQuery.ajax({
                                    type: "get",
                                    url: 'members/update_deleted/' + id,

                                    dataType: 'json',
                                    success: function(data) {

                                        Swal.fire({
                                            text: "تم تفعيل  " +
                                                customerName + "!.",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "حسنًا ، موافق!",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function() {
                                            // delete row data from server and re-draw datatable
                                            dt.draw();
                                        });
                                    }
                                });


                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: customerName + " تم الغاء عملية التفعيل.",
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


            $(document).on('click', '.toggel_2', function(data, callbak) {
                $("#ID").val($(this).attr('val_memeber'));
                var TEAM_ID = $(this).attr('val_id');
                /// alert(member_id);
                $("#toggel_2_Modal").modal("show");
                $("#MEMBER_ID").val($(this).attr('val_memeber'));

                $("#btn_update").click(function(e) {
                    //alert(("#TEAM_ID").val($(this).attr('val_id')));
                    e.preventDefault();
                    jQuery.ajax({
                        type: "PATCH",
                        url: 'members/' + $("#ID").val(),
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'ID': $("#ID").val(),
                            "TEAM_ID": $("#TEAM_IDs").val(),
                        },
                        dataType: 'json',
                        success: function(data) {

                            $('#toggel_2_Modal').modal('hide');
                            $("#MEMBER_ID").val("");
                            $("#ID").val("");
                            dt.draw();

                            toastr.success(data.msg);

                        }
                    });
                });
            });


            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleDeleteRows();
                    handleupdateRows();
                    handleSearchDatatable();
                    // handleupdateTeam();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });



        $(document).on('click', '.toggel_1', function(data, callbak) {
            $("#val_id_1").val($(this).attr('val_id'));
            $("#ACTUAL_START_DT_1").val($(this).attr('val_dat'));
            var member_id = $(this).attr('val_id');
            /// alert(member_id);
            $("#toggel_1_Modal").modal("show");
            $("#MEMBER_ID").val($(this).attr('val_memeber'));

            jQuery.ajax({
                type: "get",
                url: 'systems/systems/' + member_id,
                dataType: 'json',
                success: function(data) {
                    $("#systems_table").find('tbody').empty();
                    data.forEach((d, index) => {
                        $("#systems_table").find('tbody').append("<tr><td>" + (index + 1) +
                            "</td><td>" + d.SYSTEM_NAME + "</td> <td><a val-id='" + d.IDS +
                            "' val_name='" + d.SYSTEM_NAME + "' val_member_id='" + d.ID +
                            "' class='btn btn-icon btn-xs btn-sm btn-danger btn-member-delete'><i class='fa fa-trash'></i></a></td><td></td></tr>"
                            );

                    });
                }
            });
        });





        function draw_members(member_id) {
            jQuery.ajax({
                type: "get",
                url: 'systems/systems/' + member_id,
                dataType: 'json',
                success: function(data) {
                    $("#systems_table").find('tbody').empty();
                    // alert(data);
                    data.forEach((d, index) => {
                        $("#systems_table").find('tbody').append("<tr><td>" + (index + 1) +
                            "</td><td>" + d.SYSTEM_NAME + "</td> <td><a val-id='" + d.IDS +
                            "' val_name='" + d.SYSTEM_NAME + "' val_member_id='" + d.ID +
                            "' class='btn btn-icon btn-xs btn-sm btn-danger btn-member-delete'><i class='fa fa-trash'></i></a></td><td></td></tr>"
                            );
                    });
                }
            });

            $('#viewModal').modal('show');
        }

        $(document).on('click', '.btn-member-delete', function(data, callbak) {
            const id = $(this).attr('val-id');
            const customerName = $(this).attr('val_name');
            const member_id = $(this).attr('val_member_id');
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
            }).then(function(result) {
                if (result.value) {
                    // Simulate delete request -- for demo purpose only
                    jQuery.ajax({
                        type: "DELETE",
                        url: 'systems/members/' + id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        dataType: 'json',
                        success: function(data) {
                            Swal.fire({
                                text: "تم حذف  " + customerName + "!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "حسنًا ، موافق!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function() {
                                // delete row data from server and re-draw datatable
                                draw_members(member_id);
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

        $("#add_member").click(function(e) {

            e.preventDefault();
            var SYSTEM_ID = $('#SYSTEM_ID').val();
            var MEMBER_ID = $("#MEMBER_ID").val();
            jQuery.ajax({
                type: "post",
                url: 'systems/members',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "SYSTEM_ID": SYSTEM_ID,
                    "MEMBER_ID": $("#MEMBER_ID").val(),
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status == 1) {
                        $("#ID_NUM").val("");
                        $("#MEM_NAME").val("");
                        // dt.draw();
                        toastr.success("تمت عملية الحفظ بنجاح");
                        draw_members(MEMBER_ID);

                    } else {
                        //dt.draw();
                        toastr.error(data.msg);
                    }


                }
            });
        });
        $('#TEAM_ID').select2({
            enableFiltering: true,
            maxHeight: 350

        });
    </script>
@endpush
