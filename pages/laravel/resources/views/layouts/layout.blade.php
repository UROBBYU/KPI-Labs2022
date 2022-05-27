<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Інформаційна система "Деканат</title>
</head>
<body>
    @yield('title')
    <div class="container">
        <p>Основна інформація</p>
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
</html>