@extends('layout')
@section('contents')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-flush shadow-sm">
                <div class="card-header collapsible cursor-pointer rotate active" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible" aria-expanded="true">
                    <h3 class="card-title fw-bolder">
   
إضافة أنظمة الفريق                    </h3>
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


                    @if (isset($system->ID))
                    <form class="row" method="POST" action="{{route('systems.update',$system->ID)}}" >
                        @method('patch')
                        @else
                    <form class="row" method="POST" action="{{route('systems.store')}}" >
                    @endif
                    @csrf
                    <div class="row w-100">
                        @if($errors -> all())
                            <div class="col" style="color: red;font-family: 'Cairo';">حدثت الأخطاء التالية أثناء الحفظ :
                                <ul>
                            @foreach($errors -> all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="col-xl-6 form-group mb-6">
                        <label class="required form-label fw-bolder">الفريق</label>
                        <select name="TEAM_ID" id="TEAM_ID" class="form-control form-control-solid" >
                        <option value="option_select" disabled selected>--اختر--</option>
                        @foreach($member2 as $m)
                            <option value="{{ $m->ID }}" {{$system->TEAM_ID == $m->ID  ? 'selected' : ''}}>{{ $m->NAME}}</option>
                        @endforeach
                        </select>  
                    </div>
                            <div class="col-xl-6 form-group mb-6">
                            <label class="required form-label fw-bolder">رقم النظام</label>
                            <input type="text"  id="SYSTEM_NUM" name="SYSTEM_NUM" value="{{old('SYSTEM_NUM',$system->SYSTEM_NUM)}}"  class="form-control form-control-solid" 
                            placeholder="رقم النظام">
                            </div>

                            <div class="col-xl-6 form-group mb-6">
                                <label class="required form-label fw-bolder">اسم النظام</label>
                                <input type="text"  id="SYSTEM_NAME" name="SYSTEM_NAME" value="{{old('SYSTEM_NAME',$system->SYSTEM_NAME)}}"  class="form-control form-control-solid" 
                                placeholder="اسم النظام">
                            </div>
                              


                            
                            <div class="col-xl-6 form-group mb-6">
                                <label class="required form-label fw-bolder">الحالة</label>

                                <?php
                                $acive="";
                                $un_active="";
                                    if($system->ACTIVE ==1){
                                        $acive="checked";
                                    }else{
                                        $un_active="checked";
                                    }
                                ?>
                                  <input type="radio" {{$acive}} class="form-check-input"  name="ACTIVE" value="1"/><label class="form-label">فعال</label>
                                <input type="radio" {{$un_active}} class="form-check-input"  name="ACTIVE" value="2"/><label class="form-label">غير فعال</label>
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




@endsection
<!--
@push('javascript')


@endpush

@push('css')
@endpush
        -->