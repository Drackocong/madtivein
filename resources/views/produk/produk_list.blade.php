<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="font-sans bg-gradient-to-br from-indigo-400 via-blue-400 to-cyan-400">
    <main>
        <section class="py-20">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12 animate__animated animate__fadeInDown">
                    Produk Unggulan Kami
                </h1>
                <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto animate__animated animate__fadeIn animate__delay-1s font-bold">
                    Kami menyediakan solusi terbaik untuk kebutuhan Anda. Setiap produk kami dirancang dengan mempertimbangkan kualitas dan inovasi.
                </p>

                <!-- Menampilkan jumlah produk yang sedang dilihat -->
             
                <!-- Pagination Atas -->
              <!-- Pagination Atas -->
              <div class="mt-4 flex justify-start animate__animated animate__zoomIn animate__delay-1s">
              {{ $products->links('pagination::simple-tailwind') }}
               </div>
               <br>
                <!-- Grid Produk -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($products as $product)
                    <article class="flex flex-col justify-between bg-white rounded-lg shadow-lg p-6 transition transform hover:scale-105 hover:shadow-xl animate__animated animate__zoomIn animate__delay-1s">
                        <div>
                            <div class="bg-primary rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                                <img src="{{ Storage::url($product->logo) }}" alt="Logo {{ $product->name }}" class="w-12 h-12" />
                            </div>
                            <h2 class="text-2xl font-semibold mb-2 text-center">{{ $product->name }}</h2>
                            <!-- Paragraf dengan fitur scroll -->
                            <p class="text-center text-gray-700 overflow-y-auto max-h-20">{{ $product->paragraph }}</p>
                        </div>
                        <a href="{{ route('produk.show', $product->id) }}" class="bg-primary text-white py-2 px-4 rounded hover:bg-primary-dark transition duration-300 block text-center mt-4">
                            Lihat selengkapnya
                        </a>
                    </article>
                    @endforeach
                </div>
        </section>
    </main>
</body>
</html>
