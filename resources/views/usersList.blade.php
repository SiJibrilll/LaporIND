<x-adminLayout>
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

        /* Style for the users table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px; /* Increased padding for rows */
            text-align: left;
            border-bottom: 1px solid #ddd;
            line-height: 1.5; /* Increased line height for better spacing */
        }

        tbody tr:hover {
            background-color: #e7e7e7;
            cursor: pointer;
        }

        /* Style for user profile images */
        .user-profile {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>

    <h1>Daftar pelapor</h1>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Profile Picture</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr onclick="window.location.href = '/dataPelapor/{{$user->id}}/show';">
                    <td>{{$user->username}}</td>
                    <td> {{$user->email}} </td>
                    <td><img class="user-profile" src="{{$user->image}}" alt="User 1"></td>
                </tr>                        
            @endforeach
        </tbody>
    </table>
</x-adminLayout>