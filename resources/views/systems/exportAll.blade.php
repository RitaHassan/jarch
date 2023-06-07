
<table>
    <thead>
        <tr>
            <th>#</th>
            <th> اسم العضو</th>
            <th> تاريخ اضافة العضو </th>
            <th>اسم النظام</th>
            <th> تاريخ اضافة  النظام</th>
            <th> الحالة النظام</th>


        </tr>
    </thead>
    <tbody>
        @foreach ($systems as $system)
            <tr>
                <td>{{$system->ID}}</td>
                <td>{{$system->MEM_NAME}}</td>
                <td>{{$system->CREATE_MEMBER}}</td>
                <td>{{$system->SYSTEM_NAME}}</td>
                <td>{{$system->CRTEATE_SYSTEM}}</td>
                <td>
                    @if ($system->ACTIVE == 1)
                    فعال
                    @else
                    غير فعال
                    @endif
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
