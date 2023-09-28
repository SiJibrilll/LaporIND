<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details - Admin Panel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-sizing: border-box;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Add some sample styles for the sidebar links */
        .sidebar a {
            display: block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
        }

        /* Style the sidebar links when hovered */
        .sidebar a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="#">Dashboard</a>
        <a href="/admin/users/pelapor/list">Users</a>
        <a href="#">Settings</a>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">logout</button>
        </form>
    </div>

    <div class="main-content">
        {{$slot}}
    </div>
</body>
</html>