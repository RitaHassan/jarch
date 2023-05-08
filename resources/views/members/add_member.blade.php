@extends('layout')
@section('contents')

@php
use App\Models\Member;
 $member = new Member();
@endphp
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-flush shadow-sm">
                <div class="card-header collapsible cursor-pointer rotate active" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible" aria-expanded="true">
                    <h3 class="card-title fw-bolder">
   
إضافة أعضاء الفريق                    </h3>
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
        
                    <form class="row" method="POST" action="{{route('teams.save_by_id',$team->ID)}}" >
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
                            <select name="TEAM_ID" id="TEAM_ID" class="form-control form-control-solid" disabled >
                                <option value="-1" >--اختر--</option>
                                @foreach($member2 as $m)
                                    <option value="{{$m->ID}}" {{$team->ID==$m->ID? 'selected' :''}}>{{$m->NAME}}</option>
                                @endforeach
                            </select>  
                    </div>
                            <div class="col-xl-6 form-group mb-6">
                            <label class="required form-label fw-bolder">رقم هوية الموظف</label>
                            <input type="text"  id="ID_NUM" name="ID_NUM" value=""  class="form-control form-control-solid" 
                            placeholder="رقم الهوية">
                            </div>

                            <div class="col-xl-6 form-group mb-6">
                                <label class="required form-label fw-bolder">اسم الموظف</label>
                                <input type="text"  id="MEM_NAME" name="MEM_NAME" value=""  class="form-control form-control-solid" 
                                placeholder="اسم الموظف">
                                </div>
                                <div class="col-xl-6 form-group mb-6">
                                <label class="required form-label fw-bolder">الصفة</label>
                                <select name="ROLE" id="ROLE" class="form-control form-control-solid" >
                                    <option value="-1" disabled selected>--اختر--</option>
                                    <option value="1" >مشرف</option>
                                    <option value="2">عضو</option>
                            
                                  </select>
                             </div>
                           

                                    <div class="col-xl-6 form-group mb-6">
                                    <label class="required form-label fw-bolder">الحالة</label>
                                    <?php
                                    $acive="";
                                    $un_active="";
                                        if($member->ACTIVE ==1){
                                            $acive="checked";
                                        }else{
                                            $un_active="checked";
                                        }
                                    ?>
                                      <input type="radio" {{$acive}} class="form-check-input"  name="ACTIVE" value="2"/><label class="form-label">فعال</label>
                                    <input type="radio" {{$un_active}} class="form-check-input"  name="ACTIVE" value="1"/><label class="form-label">غير فعال</label>
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


    

  <!--@push('javascript')

    <script>
            $(document).ready(function () {
            var num = -1;
            $("#Add").on("click", function () {
                num++;
                $("#textboxDiv").append(
                    "<div class='col-md-12' id='textfield'>" +
                    "<label class='col-md-3 control-label'>رقم الهوية</label>" +
                    "<br ><span class='col-md-5' ><input type='text' class='form-control' name='TOOL_NAME[]' id='TOOL_NAME'>  &ensp; </span>" +
                    "<span class='glyphicon glyphicon-minus col-md-2 minus' style='color: red'></span> </br>" +
                    "</div>"+
                      "<div class='col-md-12' id='textfield'>" +
                    "<label class='col-md-3 control-label'>اسم الموظف</label>" +
                    "<br ><span class='col-md-5' ><input type='text' class='form-control' name='TOOL_NAME[]' id='TOOL_NAME'>  &ensp; </span>" +
                    "<span class='glyphicon glyphicon-minus col-md-2 minus' style='color: red'></span> </br>" +
                    "</div>"+
                      "<div class='col-md-12' id='textfield'>" +
                    "<label class='col-md-3 control-label'>الصفة</label>" +
                    "<br ><span class='col-md-5'> <select name='ROLE' id='ROLE' class='form-control form-control-solid' >"+
                        " <option value='-1'>اختر</option>"+
                        " <option value='1'>مشرف</option>"+
                        "<option value='2'>عضو</option>"+
                        "</select> &ensp;</span>" +
                        "<span class='fa fa-minus col-md-2 minus' style='color: red'></span> </br>" +
                    
                    "</div>");
            });

            $(document).on("click", ".minus", function () {
                var child = $(this);
                child.parent().remove();
            });
            $(".minus").on("click", function () {
                var child = $(this);
                child.parent().remove();
            });
        });

    </script>
    @endpush-->




@endsection
@push('javascript')
    <script type="text/javascript">
        let isCreate = {{$member != null ? 'false' : 'true'}};
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
    </script>
@endpush
