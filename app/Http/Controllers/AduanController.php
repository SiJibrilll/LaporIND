<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Gambar_aduan;
use App\Models\Kategori;
use App\Models\Sub_kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AduanController extends Controller
{
    public function index()
    {
        $kategoriList = Kategori::all();
        $subkategoriList = Sub_kategori::all();

        return view('pelapor.formAduan', [
            'kategori' => $kategoriList,
            'sub_kategori' => $subkategoriList,
        ]);
    }


    public function create(Request $request)
{
    // Define the validation rules
    $validator = Validator::make($request->all(), [
        'judul' => 'required',
        'deskripsi' => 'required',
        'alamat' => 'required',
        'kategori' => 'required|exists:kategoris,id',
        'subkategori' => 'required|exists:sub_kategoris,id',
        'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size as needed
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Create and save the "aduan" (excluding images)
    $aduan = new Aduan;
    $aduan->user_id = Auth()->user()->id;
    $aduan->judul = $request->input('judul');
    $aduan->deskripsi = $request->input('deskripsi');
    $aduan->alamat = $request->input('alamat');
    $aduan->kategori_id = $request->input('kategori');
    $aduan->sub_kategori_id = $request->input('subkategori');
    $aduan->save();


    // Process and save each image to the "gambarAduan" table
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $image) {
            $gambar = new Gambar_aduan;
            $gambar->aduan_id = $aduan->id; // Associate the image with the aduan
            $gambar->image = $image->store('gambar_aduan'); // Store the image and get its path
            $gambar->save();
        }
    }

    return redirect('/beranda');
}
}
