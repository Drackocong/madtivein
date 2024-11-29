<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah version</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gradient-to-br flex from-blue-100 via-indigo-200 items-center justify-center to-purple-100 min-h-screen">


    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md transition-transform transform hover:scale-105 duration-300 ease-in-out">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Tambah Version</h1>
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-5">{{ session('success') }}</div>
        @endif

        <form action="{{ route('produk.simpan_version') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">version </label>
                <input type="text" id="name" name="name" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                @error('name')
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
