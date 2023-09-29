<x-layout>
    <form method="POST" action="/aduan/create" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul">
        </div>

        <div>
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi"></textarea>
        </div>

        <div>
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat">
        </div>
        
        <div>
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori">
                <option value="" selected disabled>Pilih kategori</option>
                @foreach($kategori as $category)
                    <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="subkategori">Sub Kategori</label>
            <select id="subkategori" name="subkategori">
                <option value="" selected disabled>Pilih Sub kategori</option>
                @foreach($sub_kategori as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->sub_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image">Upload Image</label>
            <input type="file" id="image" name="image[]" multiple>
        </div>

        <button type="submit">Submit</button>
    </form>
</x-layout>
