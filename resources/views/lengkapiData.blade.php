<x-layout>
    <h1> Lengkapi data </h1>
    <form action="/dataPelapor/create" method="POST">
        @csrf
        <input type="text" name="nik" placeholder="masukan NIK">
        <input type="text" name="alamat" placeholder="masukan alamat">
        <input type="text" name="no_hp" placeholder="masukan nomor telepon">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>