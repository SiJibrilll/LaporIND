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

        /* Style for the user details container */
        .user-details-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        /* Style for user profile image */
        .user-profile {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        }

        /* Style for user details text */
        .user-details-text {
            margin-top: 10px;
        }

        /* Style for user data labels */
        .user-data-label {
            font-weight: bold;
        }
    </style>

    @isset ($data)
        <h1>Tentang pelapor</h1>
        <div class="user-details-container">
            <div class="user-details-text">
                <img class="user-profile" src="{{$data['user']->image}}" alt="User 1">
                <div>
                    <h2>{{$data['user']->username}} </h2>
                    <p class="user-data-label">Email:</p>
                    <p> {{$data['user']->email}} </p>
                    <p class="user-data-label">Alamat:</p>
                    <p>{{$data['pelapor']->alamat}}</p>
                    <p class="user-data-label">NIK:</p>
                    <p>{{$data['pelapor']->nik}}</p>
                    <p class="user-data-label">Nomor telepon:</p>
                    <p>{{{$data['pelapor']->no_hp}}} </p>
                </div>
            </div>
        </div>
        
    @else
        <h1> {{$pesan}} </h1>
    @endisset
</x-adminLayout>