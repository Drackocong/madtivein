<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#0066CC",
                        secondary: "#FF6600",
                    },
                    fontFamily: {
                        sans: ["Poppins", "sans-serif"],
                    },
                },
            },
        };
    </script>
    <style>
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
        .gradient-bg {
            background: linear-gradient(120deg, #8684fa 0%, #8fd3f4 100%);
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <header class="bg-white shadow-md animate__animated animate__fadeInDown">
        <nav class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <a href="#" class="text-2xl font-bold text-primary">Produk</a>
            </div>
        </nav>
    </header>

    <main class="gradient-bg min-h-screen">
        <section class="py-20">
            <div class="container mx-auto px-4">
                <div class="flex justify-end mb-8 space-x-4 animate__animated animate__fadeInRight animate__delay-0.3s">
                    <button class="bg-secondary text-white px-4 py-2 rounded-md hover:bg-blue-600 transition hover-scale flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        <a href="{{ route('produk.create') }}">Tambah Produk</a>
                    </button>
                    <button>
                    <a href="{{ route('produk.produk_list') }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-300 block text-center">
                    <i class="fas fa-globe mr-2"></i>halaman pengunjung
                     </a>
                    </button>
                    <button class="bg-primary text-white px-4 py-2 rounded-md hover:bg-orange-700 transition hover-scale flex items-center">
                        <i class="fas fa-user-plus mr-2"></i>
                        <a href="{{ route('register') }}">Tambah Akses</a>
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                      @csrf
                <button type="submit" id="logoutBtn" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition hover-scale flex items-center">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </button>
            </form>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12 animate__animated animate__fadeInUp animate__delay-0.5s">
                    Produk Kami
                </h1>

                <div class="overflow-x-auto shadow-xl rounded-lg animate__animated animate__fadeIn animate__">
                <div class="mt-4 flex justify-start  animate__animated animate__fadeIn animate__">
                 {{ $products->links('pagination::simple-tailwind') }}
                  </div>
                  <br>
                    <table class="min-w-full bg-white overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-3 px-6 text-left font-semibold">Logo</th>
                                <th class="py-3 px-6 text-left font-semibold">Nama Produk</th>
                                <th class="py-3 px-6 text-center font-semibold"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr class="border-b hover:bg-gray-100 transition animate__animated animate__fadeInUp animate__delay-0.5s">
                                    <td class="py-4 px-6">
                                        <img src="{{ asset('storage/' . $product->logo) . '?' . time() }}" alt="{{ $product->name }}" alt="{{ $product->name }}" class="w-16 h-16 rounded-full border-2 border-primary" />
                                    </td>
                                    <td class="py-4 px-6 text-gray-700 font-medium">{{ $product->name }}</td>
                                    <td class="py-4 px-6 flex justify-center space-x-4">
                                        <a href="{{ route('produk.show',['id'=>$product->id,'product'=>$product->name]) }}" class="btn btn-primary bg-secondary text-white px-4 py-2 rounded-md hover:bg-orange-600 transition hover-scale flex items-center">
                                            <i class="fas fa-eye mr-2"></i> Detail
                                          </a>
                                   <a href="{{ route('produk.edit', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition hover-scale flex items-center">
                                    <i class="fas fa-edit mr-2 "></i>
                                      Edit
                                    </a>
                                        <form action="{{ route('produk.destroy', $product->id) }}" method="POST" style="display:inline;">
                                         @csrf
                                         @method('DELETE')
                                       <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');"><i class="fas fa-trash-alt mr-2"></i>Hapus</button>
                                     </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
