<x-layout>
    <h1> halaman profil</h1>
    <img src="{{$data['user']->image}}" alt="">
    <div>
        <p> {{$data['user']->username}} </p>
        <p> {{$data['user']->email}} </p>
        <a href="/users/edit">Ubah profil</a>
    </div>
    
    @isset ($data['pelapor'])
        <div>
            <p> {{$data['pelapor']->nik}} </p>
            <p> {{$data['pelapor']->no_hp}} </p>
            <p> {{$data['pelapor']->alamat}} </p>
        </div>        
    @endisset
    <a href="/beranda">kembali</a>
</x-layout>