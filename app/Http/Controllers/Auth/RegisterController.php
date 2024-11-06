<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Pastikan model User sudah ada
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register'); // Sesuaikan dengan path view kamu
    }

    // Proses pendaftaran
    public function register(Request $request)
    {
        // Validasi data input
        $this->validator($request->all())->validate();

        // Buat pengguna baru
        $user = $this->create($request->all());

        // (Opsional) Login pengguna setelah registrasi
        auth()->login($user);

        return redirect()->route('home'); // Ganti dengan route yang diinginkan setelah registrasi
    }

    // Validasi data
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Pastikan ada field password_confirmation di form
        ]);
    }

    // Membuat pengguna baru
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            // Tambahkan field lain jika diperlukan
        ]);
    }
}
