
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>اسم الفريق</th>
            <th>اسم العضو</th>
            <th>تاريخ الاضافة</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($teams as $team)
            <tr>
                <td>{{$team->ID}}</td>
                <td>{{$team->NAME}}</td>
                <td>{{$team->MEM_NAME}}</td>
                <td>{{$team->CREATED_AT}}</td>
             
            </tr>
        @endforeach
    </tbody>
</table>