<table>
    <thead>
        <tr>
            <th>اسم الفريق</th>
            <th>اسم الموظف</th>
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
        @foreach ($teams as $team)
        <tr>
            <th>{{$team->NAME}}</th>
            <th>{{$team->MEM_NAME}}</th>
            <th>{{$team->RECORDSTOTAL}}</th>
            <th>{{$team->UNDEFINED}}</th>
            <th>{{$team->DONE}}</th>
            <th>{{$team->NOT_DONE}}</th>
            <th>{{$team->DELAYED}}</th>
            <th>{{$team->PROCCESS}}</th>
            <th>{{$team->CANCEL}}</th>

        </tr>
        @endforeach
    </tbody>
</table>
