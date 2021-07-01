<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
    <ul>
    <!-- blade 문법 -->
        <li>{{$name}}</li>
        <li>{{$age}}</li>
    </ul>
</body>
</html>
