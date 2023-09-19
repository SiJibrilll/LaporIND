<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Selamat datang di halaman beranda</h1>
    @auth
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>    
    @endauth
</body>
</html>