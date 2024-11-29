<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#0066CC",
                    },
                    fontFamily: {
                        sans: ["Poppins", "sans-serif"],
                    },
                },
            },
        };
    </script>
</head>
<body class="font-sans bg-gradient-to-br from-blue-100 via-indigo-200 to-purple-100 min-h-screen">
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Edit Produk</h2>

        <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">





        <form action="{{ route('produk.updateketerangan', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <!-- Nama Produk -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-medium mb-2">
                        judul
                    </label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title', $product->title) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        required
                    >
                </div>



                <div class="mb-6">
                    <label for="paragraph" class="block text-gray-700 font-medium mb-2">
                        deskripsi
                    </label>
                    <textarea
                        id="id"
                        name="description"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        required
                    >{{ $product->description }}</textarea>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end mt-6">
                    <button
                        type="submit"
                        class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition"
                    >
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
