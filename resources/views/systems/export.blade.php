
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>اسم النظام</th>
            <th>رقم النظام</th>
            <th> عدد الاعضاء</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($systems as $system)
            <tr>
                <td>{{$system->ID}}</td>
                <td>{{$system->SYSTEM_NAME}}</td>
                <td>{{$system->SYSTEM_NUM}}</td>
                <td>{{$system->MEMBERS}}</td>

            </tr>
        @endforeach
    </tbody>
</table>
