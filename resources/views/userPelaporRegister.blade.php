<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Silahkan daftar kan diri anda disini</h1>
    <form action="/user/create" method="POST">
    @csrf
    <input type="text" placeholder="Masukan username">
    <input type="text" placeholder="Masukan password">
    </form>
</body>
</html>