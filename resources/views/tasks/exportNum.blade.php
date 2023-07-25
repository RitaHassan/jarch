<table>
    <thead>
        <tr>
            <th>اسم الفريق</th>
            <th>العدد الكلي للمهام</th>
            <th> عدد المهام الغير محددة</th>
            <th> عدد المهام المنجزة</th>
            <th> عدد المهام الغير منجزة</th>
            <th>عدد المهام المؤجلة </th>
            <th>عدد المهام قيد العمل</th>
            <th>عدد المهام الملغية </th>

        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <th>{{$task->NAME}}</th>
            <th>{{$task->RECORDSTOTAL}}</th>
            <th>{{$task->UNDEFINED}}</th>
            <th>{{$task->DONE}}</th>
            <th>{{$task->NOT_DONE}}</th>
            <th>{{$task->DELAYED}}</th>
            <th>{{$task->PROCCESS}}</th>
            <th>{{$task->CANCEL}}</th>

        </tr>
        @endforeach
    </tbody>
</table>
