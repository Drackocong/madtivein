<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halaman Keterangan Produk Medisy</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
  <style>
    .animate-float {
      animation: float 3s ease-in-out infinite;
    }
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }
    .bg-glass {
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.18);
    }
  </style>

<head>
    <style>
    .mainmenubtn {
        background-color: skyblue;
        color: white;
        border: none;
        cursor: pointer;
        padding:20px;
        margin-top:20px;
    }
    .mainmenubtn:hover {
        background-color: blue;
        }
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropdown-child {
        display: none;
        background-color: skyblue;
        min-width: 200px;
    }
    .dropdown-child a {
        color: blue;
        padding: 20px;
        text-decoration: none;
        display: block;
    }
    .dropdown:hover .dropdown-child {
        display: block;
    }
    </style>

</head>
<body class="font-sans bg-gradient-to-br from-blue-100 via-indigo-200 to-purple-100 min-h-screen">
<main x-data="{ showModal: false, modalContent: '' }">
  <section class="py-20">
    <div class="container mx-auto px-4">
      <!-- Nama Produk dan Logo Produk -->
      <div class="flex items-center justify-between mb-12">
        <div class="flex items-center animate__animated animate__fadeInLeft">
          <img src="{{ asset('storage/' . $produk->logo) }}" alt="Logo Produk"
            class="w-20 h-20 mr-4 rounded-full border-4 border-white shadow-lg transform hover:scale-110 transition duration-300 animate-float" />
          <h2 class="text-4xl font-bold text-gray-800 bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
            {{ $produk->name }}
          </h2>
        </div>
        <a href="{{ route('produk.tambah_keterangan') }}" class="bg-gradient-to-r from-primary to-secondary text-white px-8 py-3 rounded-full shadow-lg hover:shadow-xl transition transform hover:scale-105 animate__animated animate__fadeInRight">
          Tambah
        </a>

        <a href="{{ route('produk.tambah_version') }}" class="bg-gradient-to-r from-primary to-secondary text-white px-8 py-3 rounded-full shadow-lg hover:shadow-xl transition transform hover:scale-105 animate__animated animate__fadeInRight">
            Tambah version
          </a>
          <div class="dropdown">
            <button class="mainmenubtn">VERSION</button>
            <div class="dropdown-child">
 @foreach ($version as $item)


              <a href="">{{ $item->name }}</a>
              @endforeach
            </div>
          </div>

      </div>

      <h1 class="text-5xl md:text-6xl font-bold text-center text-gray-800 mb-16 animate__animated animate__fadeInDown animate__delay-1s">
        Keterangan Produk
      </h1>

      <!-- Tabel Keterangan Produk -->
      <div class="overflow-x-auto animate__animated animate__fadeInUp animate__delay-2s">
        <div class="bg-glass rounded-2xl overflow-hidden shadow-2xl">
          <table class="min-w-full">
            <thead class="bg-gradient-to-r from-primary to-blue-500 text-white">
              <tr>
                <th class="py-4 px-6 text-left font-semibold text-lg">Judul Keterangan</th>
                <th class="py-4 px-6 text-left font-semibold text-lg">Keterangan Produk</th>
                <th class="py-4 px-6 text-center font-semibold text-lg">Aksi</th>
              </tr>
            </thead>

            @foreach ($Keterangan as $product )

            <tbody>
              <!-- Isi tabel diambil dari data produk -->
              <tr class="border-b border-blue-100 hover:bg-blue-50 transition duration-300">

                <td class="py-6 px-6 text-gray-700 font-medium">{{ $product->title }}</td>

                <td class="py-6 px-6 text-gray-600">{{ $product->description}}</td>


                <td class="py-6 px-6 flex justify-center space-x-4">
                    <a href="{{ route('produk.detail', $product->id) }}"
                    class="bg-blue-500 text-white px-6 py-2 rounded-full shadow-md hover:bg-blue-600 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <i class="fas fa-detail mr-2"></i> Detail
                  </a>

                  <a href="{{ route('produk.edit', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition hover-scale flex items-center">
                    <i class="fas fa-edit mr-2 "></i>
                      Edit
                    </a>
                  <form action="{{ route('produk.destroy', $product->title) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="bg-red-500 text-white px-6 py-2 rounded-full shadow-md hover:bg-red-600 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-400">
                      <i class="fas fa-trash-alt mr-2"></i> Hapus
                    </button>

                </form>
                @endforeach
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>


      </div>
    </div>
  </div>
</main>

<!-- CDN Font Awesome for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>
