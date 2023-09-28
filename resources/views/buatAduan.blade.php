<x-layout>
    <h1>buat aduan mu disini</h1>
    <form action="/aduan/create" method="POST">
        @csrf
        <input name="judul" placeholder="judul">
        <textarea name="deskripsi">deskripsi</textarea>
        <input name="alamat" placeholder="alamat"> <button> gunakan lokasi mu saat ini</button>
</x-layout>