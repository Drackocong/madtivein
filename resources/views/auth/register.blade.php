<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  </head>
  <body class="bg-gradient-to-r from-blue-400 to-purple-500 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-md transform hover:scale-105 transition-transform duration-300" x-data="{ showPassword: false }">
      <h2 class="text-3xl font-bold mb-6 text-center text-gray-800 animate-pulse">Daftar Akun</h2>
      <form action="{{ route('register.submit') }}" method="POST">
        @csrf
        <div class="mb-4">
          <label for="username" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-user mr-2"></i>Username</label>
          <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300" required />
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700 text-sm font-bold mb-2"><i class="fas fa-lock mr-2"></i>Kata Sandi</label>
          <div class="relative">
            <input :type="showPassword ? 'text' : 'password'" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300" required />
            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5" @click="showPassword = !showPassword">
              <i :class="{'fa-eye-slash': showPassword, 'fa-eye': !showPassword}" class="fas"></i>
            </button>
          </div>
        </div>
        <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-2 px-4 rounded-md hover:from-blue-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 transform hover:scale-105">Daftar</button>
      </form>
      <p class="mt-4 text-center text-sm text-gray-600">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk di sini</a>
      </p>
    </div>
  </body>
</html>
