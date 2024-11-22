<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Keterangan;


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
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function edit($id) {
        $product = Product::find($id); 
        if (!$product) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan');
        }
        return view('produk.edit', compact('product'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:10000',
            'paragraph' => 'required|string',
        ]);

        $produk = Product::findOrFail($id);
        $produk->name = $request->name;
        $produk->paragraph = $request->paragraph;

        if ($request->hasFile('logo')) {
            if ($produk->logo) {
                Storage::disk('public')->delete($produk->logo);
            }

            $path = $request->file('logo')->store('logos', 'public');
            $produk->logo = $path;
        }

        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function show($id)
    {
        $produk = Product::findOrFail($id);
        return view('produk.detail', compact('produk'));
    }

    public function tambahKeterangan()
    {
        return view('produk.tambah_keterangan'); 
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


    return redirect()->route('produk.tambah_keterangan')->with('success', 'Keterangan berhasil ditambahkan!');
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

    // Mengembalikan view dengan data produk
    return view('produk.produk_detail', compact('product'));
}

}
