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
            <tbody>
              <!-- Isi tabel diambil dari data produk -->
              <tr class="border-b border-blue-100 hover:bg-blue-50 transition duration-300">
                <td class="py-6 px-6 text-gray-700 font-medium">Deskripsi</td>
                <td class="py-6 px-6 text-gray-600">{{ $produk->description ?? 'Deskripsi produk tidak tersedia.' }}</td>
                <td class="py-6 px-6 flex justify-center space-x-4">
                  <button @click="showModal = true; modalContent = '{{ $produk->description }}'"
                    class="bg-secondary text-white px-6 py-2 rounded-full shadow-md hover:bg-orange-600 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    <i class="fas fa-eye mr-2"></i> Detail
                  </button>
                  <a href="#"
                    class="bg-blue-500 text-white px-6 py-2 rounded-full shadow-md hover:bg-blue-600 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <i class="fas fa-edit mr-2"></i> Edit
                  </a>
                  <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="bg-red-500 text-white px-6 py-2 rounded-full shadow-md hover:bg-red-600 transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-400">
                      <i class="fas fa-trash-alt mr-2"></i> Hapus
                    </button>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal untuk Detail Keterangan -->
  <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto"
    x-transition:enter="transition ease-out duration-300"
    x-transition:leave="transition ease-in duration-200">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 opacity-75" @click="showModal = false"></div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div class="inline-block align-bottom bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900">Detail Keterangan</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500" x-text="modalContent"></p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" @click="showModal = false"
            class="w-full inline-flex justify-center rounded-md px-4 py-2 bg-primary text-white hover:bg-blue-700 sm:ml-3 sm:w-auto sm:text-sm">
            Tutup
          </button>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- CDN Font Awesome for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>
