<table>
    <thead>
        <tr>
            <th>اسم الفريق</th>
            <th>اسم الموظف</th>
            <th>اسم النظام</th>
            <th>عنوان المهمة</th>
            <th>نوع المهمة</th>
            <th>تاريخ البدء المخطط له</th>
            <th>تاريخ الانتهاء المخطط له</th>
            <th>تاريخ البدء الفعلي</th>
            <th>تاريخ الانتهاء الفعلي</th>
            <td>الشهر</td>
            <td>السنة</td>
            <td>مدة الانجاز	</td>
            <td>نوع مدة الانجاز	</td>
            <td>حالة الانجاز</td>
            <td>داخل الخطة</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <th>{{$task->TEAM}}</th>
            <th>{{$task->MEM_NAME}}</th>
            <th>{{$task->SYSTEM}}</th>
            <th>{{$task->TITLE}}</th>
            <th>@if ($task->TASK_TYPE == 1)
                تحليل
            @elseif($task->TASK_TYPE == 2)
                تطوير
            @elseif($task->TASK_TYPE == 3)
                اجتماع
            @elseif($task->TASK_TYPE == 4)
                دعم فني
            @elseif($task->TASK_TYPE == 5)
            تقرير 
            @else
            اختبار
            @endif</th>
            <th>{{$task->PLANNED_START_DT}}</th>
            <th>{{$task->PLANNED_FINISH_DT}}</th>
            <th>{{$task->ACTUAL_START_DT}}</th>
            <th>{{$task->ACTUAL_FINISH_DT}}</th>
            <td>{{$task->MONTH}}</td>
            <td>{{$task->YEAR}}</td>
            <td>{{$task->COMPLETION_PERIOD}}</td>
            <td>@if ($task->DURATION_TYPE == 1)
                يوم    
            @elseif($task->DURATION_TYPE == 2)
                ساعة
            @else
                شهر
            @endif</td>
            <td>
            @if ($task->COMPLETION_STATUS == 0)
                غير محدد
            @elseif($task->COMPLETION_STATUS == 1)
                منجر
            @elseif($task->COMPLETION_STATUS == 2)
                غير منجز
            @elseif($task->COMPLETION_STATUS == 3)
                مؤجل
            @elseif($task->COMPLETION_STATUS == 4)
                قيد العمل
            @elseif($task->COMPLETION_STATUS == 5)
                الغاء
            @endif
            </td>
            <td>{{$task->IN_PLAN == 1?"نعم":"لا"}}</td>
        </tr>
        @endforeach
    </tbody>
</table>