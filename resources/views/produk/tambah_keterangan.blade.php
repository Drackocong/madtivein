<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>tambah Keterangan Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .floating-label input:not(:placeholder-shown) + label,
      .floating-label textarea:not(:placeholder-shown) + label,
      .floating-label select:focus + label {
        transform: translateY(-150%) scale(0.85);
        color: #2563eb;
      }

      .floating-label input:focus + label,
      .floating-label textarea:focus + label {
        transform: translateY(-150%) scale(0.85);
        color: #2563eb;
      }

      .upload-field {
        display: none;
      }
    </style>
  </head>
  <body
    class="bg-gradient-to-r from-blue-500 to-purple-500 min-h-screen flex items-center justify-center"
  >
    <div
      class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md transform transition hover:scale-105"
    >
      <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">
        Tambah Keterangan Produk
      </h1>
      <form action="{{ route('produk.tambah_keterangan') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Input Field untuk Judul Keterangan dengan floating label -->
        <div class="mb-4 relative floating-label">
          <input
            type="text"
            id="title"
            name="title"
            placeholder=" "
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
            value="{{ old('title') }}"
          />
          <label
            for="title"
            class="absolute top-3 left-3 text-gray-600 transition-all duration-300"
            >Judul Keterangan</label
          >
        </div>

        <!-- Input Field untuk Keterangan Produk dengan floating label -->
        <div class="mb-4 relative floating-label">


        <textarea
          id="description"
          name="description"
          rows="14"
          placeholder=" "
          class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg"
          required
        >{{ old('description') }}</textarea>
          <label
            for="description"
            class="absolute top-3 left-3 text-gray-600 transition-all duration-300"
            >Keterangan Produk</label
          >
        </div>

        <!-- Pilihan Jenis Keterangan dengan select dan floating label -->
        <div class="mb-4 relative floating-label">
          <select
            id="jenisKeterangan"
            name="jenisKeterangan"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            <option value="" disabled selected></option>
            <option value="video" {{ old('jenisKeterangan') == 'video' ? 'selected' : '' }}>Video</option>
            <option value="photo" {{ old('jenisKeterangan') == 'photo' ? 'selected' : '' }}>Foto</option>
          </select>
          <label
            for="jenisKeterangan"
            class="absolute top-3 left-3 text-gray-600 transition-all duration-300"
            >Jenis Keterangan</label
          >
        </div>

        <!-- Upload File (Video/Foto) -->
        <div id="uploadField" class="mb-4 upload-field">
          <label
            id="uploadLabel"
            for="fileUpload"
            class="block text-gray-700 text-sm font-bold mb-2"
            >Upload File</label
          >
          <input
            type="file"
            id="fileUpload"
            name="fileUpload"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            accept="video/*, image/*"
          />
        </div>

        <!-- Tombol Submit -->
      <form action="{{ route('produk.simpan_keterangan') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Input fields di sini -->
    <button type="submit">Simpan</button>
   </form>

      </form>
    </div>

    <script>
      document
        .getElementById("jenisKeterangan")
        .addEventListener("change", function () {
          const uploadField = document.getElementById("uploadField");
          const fileUpload = document.getElementById("fileUpload");
          const uploadLabel = document.getElementById("uploadLabel");

          if (this.value === "video" || this.value === "photo") {
            uploadField.style.display = "block";
            uploadLabel.textContent = `Upload ${
              this.value === "video" ? "Video" : "Foto"
            }`;
            fileUpload.accept = this.value === "video" ? "video/*" : "image/*";
          } else {
            uploadField.style.display = "none";
          }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'content' );
  </script>
  </body>
</html>
