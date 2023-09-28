<x-layout>
    <h1>Selamat datang di halaman beranda</h1>
    <img src="{{auth()->user()->image}}">
    <p>halo {{auth()->user()->username}}</p>
    @auth
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>    
    @endauth

    <a href="/aduan">Buat aduan</a>
    <a href="">Aduan saya</a>
    <a href="/users/read">Lihat user</a>
</x-layout>