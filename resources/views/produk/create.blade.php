<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-blue-500 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md transition-transform transform hover:scale-105 duration-300 ease-in-out">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Tambah Produk</h1>
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-5">{{ session('success') }}</div>
        @endif
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Nama Produk</label>
                <input type="text" id="name" name="name" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="logo" class="block text-gray-700 font-medium">Logo Produk</label>
                <input type="file" id="logo" name="logo" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" accept="image/*" required>
                @error('logo')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="paragraph" class="block text-gray-700 font-medium mb-2">Deskripsi Produk</label>
                <textarea 
                    id="paragraph" 
                    name="paragraph" 
                    rows="4"
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 resize-y"
                    placeholder="Masukkan deskripsi produk..."
                    required
                ></textarea>
                @error('paragraph')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>