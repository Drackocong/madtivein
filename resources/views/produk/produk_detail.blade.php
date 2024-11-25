<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <style>
      [x-cloak] {
        display: none !important;
      }

      .bg-pattern {
        background-image: none; /* Menghapus background SVG yang lama */
      }
    </style>
  </head>
  <body class="bg-gradient-to-br from-indigo-400 via-blue-400 to-cyan-400 min-h-screen">
    <div
      class="fixed inset-0 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 opacity-50 z-0"
    ></div>
    <div
      x-data="productPage()"
      x-cloak
      class="relative z-10 container mx-auto px-4 py-8 max-w-7xl"
    >
      <div class="flex justify-between items-center mb-8">
        <!-- Title with Back Icon -->
        <h1 class="text-4xl font-bold text-white relative flex items-center">
          <a href="{{ route('produk.produk_list') }}">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-8 h-8 mr-2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"
              />
            </svg>
          </a>
          Produk
          <span
            class="absolute -bottom-2 left-0 w-1/2 h-1 bg-yellow-300"
          ></span>
        </h1>
        <!-- Dropdown Menu -->
        <div class="relative" x-data="{ open: false }">
          <button
            @click="open = !open"
            class="text-white hover:text-yellow-300 transition-colors duration-200"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 6.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12 12a.75.75 0 100-1.5.75.75 0 000 1.5zM12 17.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
              />
            </svg>
          </button>
          <!-- Dropdown content -->
          <div
            x-show="open"
            @click.away="open = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute right-0 mt-2 w-32 bg-white shadow-lg rounded-lg py-2 z-10"
          >
            <a
              href="#versi1"
              class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition-colors duration-200"
              >Versi 1</a
            >
            <a
              href="#versi2"
              class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition-colors duration-200"
              >Versi 2</a
            >
          </div>
        </div>
      </div>

      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar -->
        <div class="lg:w-1/4">
          <div
            class="bg-white bg-opacity-90 shadow-lg rounded-lg p-6 sticky top-8 transition-all duration-300 hover:shadow-xl"
          >
            <h2 class="text-xl font-bold text-gray-800 mb-4">Detail Produk</h2>
            <nav>
              <ul class="space-y-2">
                <template x-for="(section, index) in sections" :key="index">
                  <li>
                    <a
                      :href="'#' + section.id"
                      @click="scrollToSection(index)"
                      class="text-blue-600 hover:text-blue-800 transition-colors duration-200 nav-link"
                      :class="{ 'font-bold': currentSectionIndex === index }"
                      x-text="section.title"
                    ></a>
                  </li>
                </template>
              </ul>
            </nav>
          </div>
        </div>

        <!-- Main Content -->
        <div class="lg:w-3/4">
          <div
            class="bg-white bg-opacity-90 shadow-lg rounded-lg overflow-hidden transition-all duration-300 hover:shadow-xl"
          >
            <div class="p-6">
              <template x-for="(section, index) in sections" :key="index">
                <div
                  :id="section.id"
                  class="mb-6 section"
                  x-show="currentSectionIndex === index"
                >
                  <h2
                    class="text-2xl font-bold text-gray-800 mb-4"
                    x-text="section.title"
                  ></h2>
                  <div x-html="section.content"></div>
                </div>
              </template>

              <!-- Pagination -->
              <button
              @click="prevSection"
              class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-200"
              x-show="currentSectionIndex > 0"
              x-text="' ' + sections[currentSectionIndex - 1].title"
            ></button>

            <button
            @click="nextSection"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-200"
            x-show="currentSectionIndex < sections.length - 1"
            x-text="' ' + sections[currentSectionIndex + 1].title"
          ></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      function productPage() {
        return {
          sections: [
            {
              id: "judul",
              title: "Judul",
              content: `
                <div class="flex flex-col items-start">
                  <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                  <img src="{{ Storage::url($product->logo) }}" alt="Logo Produk" class="max-w-[200px] mb-4" />
                  <h2 class="text-xl font-semibold text-gray-700 mb-4">Judul Keterangan Produk</h2>
                </div>
              `,
            },
            {
              id: "keterangan",
              title: "Keterangan",
              content: `

              `,
            },
            {
              id: "fitur",
              title: "Fitur Produk",
              content: `
                <ul class="list-disc list-inside text-gray-600">
                  <li>Fitur 1: Deskripsi singkat fitur 1</li>
                  <li>Fitur 2: Deskripsi singkat fitur 2</li>
                  <li>Fitur 3: Deskripsi singkat fitur 3</li>
                  <li>Fitur 4: Deskripsi singkat fitur 4</li>
                </ul>
              `,
            },
            {
              id: "testimoni",
              title: "Testimoni Video",
              content: `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="aspect-w-16 aspect-h-9">
                    <iframe src="/api/placeholder/300/200" frameborder="0" class="w-full h-full rounded-lg"></iframe>
                  </div>
                </div>
              `,
            },
          ],
          currentSectionIndex: 0,
          scrollToSection(index) {
            this.currentSectionIndex = index;
          },
          prevSection() {
            if (this.currentSectionIndex > 0) {
              this.currentSectionIndex--;
            }
          },
          nextSection() {
            if (this.currentSectionIndex < this.sections.length - 1) {
              this.currentSectionIndex++;
            }
          },
        };
      }
    </script>
  </body>
</html>
