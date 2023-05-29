@extends('layout')
@section('contents')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-flush shadow-sm">
                <div class="card-header collapsible cursor-pointer rotate active" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible" aria-expanded="true">
                    <h3 class="card-title fw-bolder">
   
إضافة مهام الفريق                    </h3>
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


                    @if (isset($tasks->ID))
                    <form class="row" method="POST" action="{{route('tasks.update',$tasks->ID)}}" >
                        @method('patch')
                        @else
                    <form class="row" method="POST" action="{{route('tasks.store')}}" >
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
                                <label class="required form-label fw-bolder">اسم النظام</label>
                

                                <select name="SYSTEM_ID" id="SYSTEM_ID" class="form-control form-control-solid" >
                                    <option value="option_select" disabled selected>--اختر--</option>
                                    @foreach($systems as $m)
                                        <option value="{{ $m->ID }}" {{$tasks->SYSTEM_ID == $m->ID  ? 'selected' : ''}}>{{ $m->SYSTEM_NAME}}</option>
                                    @endforeach
                                </select> 
                            </div>

                            <div class="col-xl-6 form-group mb-6">
                                <label class="required form-label fw-bolder">اسم الموظف</label>
                                <select name="MEM_ID" id="MEM_ID" class="form-control form-control-solid" >
                              
                                       <option value="option_select" disabled selected>--اختر--</option>
                                    @foreach($GET_MEMBERS as $m)
                                        <option value="{{ $m->ID }}" {{$tasks->MEM_ID == $m->ID  ? 'selected' : ''}}>{{ $m->MEM_NAME}}</option>
                                    @endforeach
                                </select> 

                                </div>

                          
                              
                            <div class="col-xl-6 form-group mb-6">
                                <label class="required form-label fw-bolder">عنوان المهمة </label>
                                <input type="text"  id="TITLE" name="TITLE" value="{{old('TITLE',$tasks->TITLE)}}"  class="form-control form-control-solid" 
                                placeholder="عنوان المهمة">
                            </div>

                            <div class="col-xl-6 form-group mb-6">
                                <label class="form-label fw-bolder">وصف المهمة </label>
                                <textarea id="DESCRIPTION" name="DESCRIPTION" class="form-control form-control-solid mb-8 f-family tinymce-editor"
                                rows="3">{{ old('DESCRIPTION',$tasks->DESCRIPTION)}}</textarea>
                            </div>

                            <div class="col-xl-6 form-group mb-6">
                                <label class="form-label fw-bolder">الأولوية</label>
                                <select name="PRIORITY" id="PRIORITY" class="form-control form-control-solid">
                                    <option value=""  selected>--اختر--</option>
                                    <option value="1" @selected($tasks->PRIORITY == '1')>1</option>
                                    <option value="2"  @selected($tasks->PRIORITY == '2')>2</option>
                                    <option value="3"  @selected($tasks->PRIORITY == '3')>3</option>
                                    <option value="4"  @selected($tasks->PRIORITY == '4')>4</option>
                                    <option value="5"  @selected($tasks->PRIORITY == '5')>5</option>
                                    <option value="6"  @selected($tasks->PRIORITY == '6')>6</option>
                                    <option value="7"  @selected($tasks->PRIORITY == '7')>7</option>
                                    <option value="8"  @selected($tasks->PRIORITY == '8')>8</option>
                                    <option value="9"  @selected($tasks->PRIORITY == '9')>9</option>
                                    <option value="10"  @selected($tasks->PRIORITY == '10')>10</option>
                                    </select> 
                                </div>

                                   
                                <div class="col-xl-6 form-group mb-6">
                                    <label class="required form-label fw-bolder">مصدر المهمة</label>
                                    <select name="TASK_TYPE" id="TASK_TYPE" class="form-control form-control-solid" >
                                    <option value="-1" disabled selected>--اختر--</option>
                                    <option value="1" @selected($tasks->TASK_TYPE == '1')>تحليل</option>
                                    <option value="2"  @selected($tasks->TASK_TYPE == '2')>تطوير</option>
                                    <option value="3" @selected($tasks->TASK_TYPE == '3')>اجتماع</option>
                                    <option value="4" @selected($tasks->TASK_TYPE == '4') >دعم فني</option>
                                    <option value="5"  @selected($tasks->TASK_TYPE == '5')>تقرير</option>
                                    <option value="6" @selected($tasks->TASK_TYPE == '6')>اختبار</option>
                                    <option value="7" @selected($tasks->TASK_TYPE == '7')>مراسلة</option>
                                    <option value="8" @selected($tasks->TASK_TYPE == '8')>أمن معلومات</option>
                                    </select>  
                                </div>

                                <div class="col-xl-6 form-group mb-6">
                                    <label class="required form-label fw-bolder">تاريخ البدء المخطط له</label>
                                    <input class="date2 form-control" type="text" name="PLANNED_START_DT" minlength="5" maxlength="200" 
                                    value="{{ old('PLANNED_START_DT', $tasks->PLANNED_START_DT) }}" autocomplete="off">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                </div>
                                <div class="col-xl-6 form-group mb-6">
                                    <label class="required form-label fw-bolder">تاريخ الانتهاء المخطط له</label>
                                    <input class="date2 form-control" type="text" name="PLANNED_FINISH_DT" minlength="5" maxlength="200" 
                                    value="{{ old('PLANNED_FINISH_DT', $tasks->PLANNED_FINISH_DT) }}" autocomplete="off">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <div class="col-xl-6 form-group mb-6">
                                    <label class="form-label fw-bolder">تاريخ البدء الفعلي</label>
                                    <input class="date2 form-control" type="text" name="ACTUAL_START_DT" minlength="5" maxlength="200" 
                                    value="{{ old('ACTUAL_START_DT', $tasks->ACTUAL_START_DT) }}" autocomplete="off">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <div class="col-xl-6 form-group mb-6">
                                    <label class="form-label fw-bolder">تاريخ الانتهاء الفعلي</label>
                                    <input class="date2 form-control" type="text" name="ACTUAL_FINISH_DT" minlength="5" maxlength="200" 
                                    value="{{ old('ACTUAL_FINISH_DT', $tasks->ACTUAL_FINISH_DT) }}" autocomplete="off">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <div class="col-xl-6 form-group mb-6">
                                    <label class="form-label fw-bolder">مدة الانجاز</label>
                                      <input type="text"  id="COMPLETION_PERIOD" name="COMPLETION_PERIOD" value="{{old('COMPLETION_PERIOD',$tasks->COMPLETION_PERIOD)}}"  class="form-control form-control-solid" 
                                      placeholder="مدة الانجاز">
                                </div>

                                <div class="col-xl-6 form-group mb-6">
                                    <label class="form-label fw-bolder">نوع مدة الانجاز</label>
                                    <select name="DURATION_TYPE" id="DURATION_TYPE" class="form-control form-control-solid" >
                                        <option value="-1" disabled selected>--اختر--</option>
                                        <option value="1" @selected($tasks->DURATION_TYPE == '1')>يوم</option>
                                        <option value="2" @selected($tasks->DURATION_TYPE == '2')>ساعة</option>
                                        <option value="3" @selected($tasks->DURATION_TYPE == '3')>ساعتين</option>
                                        <option value="4" @selected($tasks->DURATION_TYPE == '4')>شهر</option>
                                    
                                      </select>
                                </div>

                                <div class="col-xl-6 form-group mb-6">
                                    <label class="required form-label fw-bolder">حالة الانجاز</label>
                                    <select name="COMPLETION_STATUS" id="COMPLETION_STATUS" class="form-control form-control-solid" >
                                        <option value=""  selected>--اختر--</option>
                                        <option value="0" @selected($tasks->COMPLETION_STATUS == '0')>غير محدد</option>
                                        <option value="1" @selected($tasks->COMPLETION_STATUS == '1')>منجز</option>
                                        <option value="2" @selected($tasks->COMPLETION_STATUS == '2')>غير منجز</option>
                                        <option value="3" @selected($tasks->COMPLETION_STATUS == '3')>مؤجل</option>
                                        <option value="4" @selected($tasks->COMPLETION_STATUS == '4')>قيد العمل</option>
                                    
                                      </select>
                                </div>

                                <div class="col-xl-6 form-group mb-6">
                                    <label>داخل الخطة</label>
                                    <div class="radio-inline">
                                        <label class="radio radio-lg">
                                            <input type="radio" @checked($tasks->IN_PLAN == '1') @checked($tasks->IN_PLAN == null) value="1" name="IN_PLAN">
                                            <span></span>
                                            نعم
                                        </label>
                                        <label class="radio radio-lg">
                                            <input type="radio" @checked($tasks->IN_PLAN == '2') name="IN_PLAN" value="2">
                                            <span></span>
                                           لا
                                        </label>
                                       
                                    </div>
                                </div>


                                <div class="col-xl-6 form-group mb-6">
                                    <label class="required form-label fw-bolder">ملاحظات</label>
                                    <textarea id="NOTES" name="NOTES" class="form-control form-control-solid mb-8 f-family tinymce-editor"
                                rows="3">{{ old('NOTES',$tasks->NOTES)}}</textarea>
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

@push('javascript')
<script type="text/javascript">
    $(function() {
        $(".date2").flatpickr({
            dateFormat: 'd/m/Y'
        });
    });

    $(document).ready(function () {

        $("#SYSTEM_ID").change(function (e, x) {
            var SYSTEM_ID = $("#SYSTEM_ID").val();
            $.ajax({
                url: '/systems/members/'+SYSTEM_ID,
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    var len = data.length;

                    $("#MEM_ID").empty();
                    $("#MEM_ID").append("<option value=''>--اختر--</option>");

                    for (var i = 0; i < len; i++) {
                        var id = data[i]['ID'];
                        var name = data[i]['MEM_NAME'];
                        $("#MEM_ID").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        });

    });
        </script>
@endpush

@push('css')
@endpush
        