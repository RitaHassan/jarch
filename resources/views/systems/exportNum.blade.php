<table>
    <thead>
        <tr>
            <th>اسم النظام</th>
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
        @foreach ($systems as $system)
        <tr>
            <th>{{$system->SYSTEM_NAME}}</th>
            <th>{{$system->RECORDSTOTAL}}</th>
            <th>{{$system->UNDEFINED}}</th>
            <th>{{$system->DONE}}</th>
            <th>{{$system->NOT_DONE}}</th>
            <th>{{$system->DELAYED}}</th>
            <th>{{$system->PROCCESS}}</th>
            <th>{{$system->CANCEL}}</th>

        </tr>
        @endforeach
    </tbody>
</table>
