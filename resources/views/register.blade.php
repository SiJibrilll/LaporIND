<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .register-container {
            background-color: white;
            border: 1px solid #ddd;
            width: 60%; /* Adjust the width as a percentage of the viewport width */
            max-width: 400px; /* Set a maximum width for larger screens */
            padding: 5%;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px; /* Rounded edges */
        }
        
        .register-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .register-container button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Silahkan daftar kan diri anda disini</h1>
        <form action="/userPelapor/create" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Masukan username">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="text" placeholder="Masukan password">
            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>