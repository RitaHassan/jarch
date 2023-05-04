@extends('layout')
@section('contents')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-flush shadow-sm">
                <div class="card-header collapsible cursor-pointer rotate active" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible" aria-expanded="true">
                    <h3 class="card-title fw-bolder">
                        {{-- <span class="svg-icon svg-icon-1">
                                    <i class="fas fa-search fs-3 me-2"></i>
                                </span> --}}
إضافة فريق جديد                    </h3>
                    <div class="card-toolbar rotate-180">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11" y="18" width="13" height="2"
                                    rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                <path
                                    d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                </div>


                <div id="kt_docs_card_collapsible" class="collapse show">
                    <div class="card-body py-5">
                    @csrf  

                    @method('PUT')

                 <form class="row" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-xl-6 form-group mb-6">
                            <label class="required form-label fw-bolder">اسم الفريق</label>
                            <input type="text" value="" id="title" name="title"  class="form-control form-control-solid" 
                            placeholder="الفريق">
                            </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check me-2"></i> حفظ
                            </button>
                        </div>

                   </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>
    <!-- NOTES -->




   <!-- <?php //$role = session('user')['roles_ids'][0];?>-->
   <!-- <?php// $created_user = session('user')['idc']; ?>-->
@endsection
<!--
@push('javascript')
    <script type="text/javascript">
        $(function() {
            $(".date2").flatpickr({
                maxDate: new Date(),
                dateFormat: 'd/m/Y'
            });
        });



        // window.onload = (event) => {
        //     var created_user = <?php //echo $created_user; ?>;
        //     var role = <?php //echo $role; ?>;
        //     if ( role == 701688) {
        //         $('#sub').show();
        //         $('#manager').show();
        //     }
        //     if (role == 701687 || role == 701688) {
        //         $('#sub').hide();
        //         $('#manager').show();
        //     }
        //     if (role == 701711) {
        //         $('#sub').show();
        //         $('#manager').hide();
        //     }
        //     if (role == 701686) {
        //         $('#sub').hide();
        //         $('#manager').hide();
        //     }
        // };

    </script>

@endpush

@push('css')
@endpush
        -->