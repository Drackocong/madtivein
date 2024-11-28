<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Keterangan;
use App\Models\Version;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('produk.index', compact('products'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
             'paragraph' => 'required'
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');

        Product::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'paragraph' => $request->paragraph,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);


        if ($product->logo) {
            Storage::disk('public')->delete($product->logo);
        }

        $product->delete();
        return redirect()->route('produk.destroy')->with('success', 'Produk berhasil dihapus!');
    }



    public function hapusketerangan($title)
    {
        $Keterangan = Keterangan::findOrFail($title);


        if ($Keterangan->title) {
            Storage::disk('public')->delete($Keterangan->title);
        }

        $Keterangan->delete();
        return redirect()->route('produk.hapusketerangan')->with('success', 'Produk berhasil dihapus!');

    }

    public function edit($id) {
        $product = Produk::find($id);
        if (!$product) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan');
        }
        return view('produk.edit', compact('keterangan'));
    }


    public function updateproduk(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:10000',
            'paragraph' => 'required|string',
        ]);

        $product = Keterangan::findOrFail($id);
        $product->name = $request->name;
        $product->paragraph = $request->paragraph;

        if ($request->hasFile('logo')) {
            if ($product->logo) {
                Storage::disk('public')->delete($product->logo);
            }

            $path = $request->file('logo')->store('logos', 'public');
            $product->logo = $path;
        }

        $product->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }




    public function editketerangan($id) {
        $product = Keterangan::find($id);
        if (!$product) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan');
        }
        return view('produk.editketerangan', compact('product'));
    }





    public function version1($id) {


        $product = Keterangan::find($id);

        return view('produk.editketerangan', compact('product'));
    }


    public function version2($id) {


        $product = Keterangan::find($id);

        return view('produk.editketerangan', compact('product'));
    }



    public function updateketerangan(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:10000',
            'paragraph' => 'required|string',
        ]);

        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->description = $request->description;

        if ($request->hasFile('logo')) {
            if ($product->logo) {
                Storage::disk('public')->delete($product->logo);
            }

            $path = $request->file('logo')->store('logos', 'public');
            $product->logo = $path;
        }

        $product->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function show($id, $product)

    {

        $products = Product::paginate(3);
        $produk = Product::findOrFail($id);
        $version= version::all();


         // Get Keterangan records where title is 'medisy'
       $Keterangan = Keterangan::where('title', $product)->get() ;// Memfilter berdasarkan status produkget();


        return view('produk.detail', compact('produk','version','Keterangan'));
    }

    public function tambahKeterangan()
    {
        return view('produk.tambah_keterangan');
    }


    public function tambahversion()
    {
        return view('produk.tambah_version');

    }

    public function simpanKeterangan(Request $request)
{

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'jenisKeterangan' => 'required|string',
        'fileUpload' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi,mkv|max:2048',
    ]);


    $keterangan = new Keterangan;
    $keterangan->title = $validated['title'];
    $keterangan->description = $validated['description'];
    $keterangan->jenis_keterangan = $validated['jenisKeterangan'];


    if ($request->hasFile('fileUpload')) {
        $file = $request->file('fileUpload');
        $path = $file->store('uploads', 'public');
        $keterangan->file_path = $path;
    }

    $keterangan->save();



}

public function produkList()
{
    $products = Product::paginate(6);
    return view('produk.produk_list', compact('products'));
}

public function detail($id)
{
    // Mengambil produk berdasarkan ID
    $product = Product::findOrFail($id);
    $version= version::all();

    // Mengembalikan view dengan data produk
    return view('produk.produk_detail', compact('product','version'));
}



public function produkdetail($id)
{
    // Mengambil produk berdasarkan ID
    $product = Product::findOrFail($id);
    $version= version::all();

    $version =version::where('name', $version)->get() ;// Memfilter berdasarkan status produkget();

    // Mengembalikan view dengan data produk
   // Melakukan sesuatu dengan data produk atau parameter lainnya
   return view('produk.detail', compact('product','idproduk'));
}

 public function simpanversion(Request $request)
{


    $request->validate([
        'name' => 'required|string|max:255',


    ]);



    version::create([
        'name' => $request->name,


    ]);







}




}
