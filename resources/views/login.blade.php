<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/login" method="post">
    @csrf
    <input type="text" value="" name="id_no" id="id_no" placeholder="رقم الهوية">
    <input type="button" value="دخول">
    </form>
</body>
</html>