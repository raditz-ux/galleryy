<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function proseslogin(Request $request)
    {
        $user = User::where('Username', $request->username)
                    ->where('Password', $request->password)
                    ->first();

        if ($user) {
            session([
                'login'  => true,
                'UserID' => $user->UserID,
                'role'   => $user->role
            ]);

            if ($user->role == 'admin') {
                return redirect('/admin');
            }

            return redirect('/');
        }

        return back()->with('error', 'Login gagal! Username atau Password salah.');
    }

    public function prosesregister(Request $request)
    {
        User::create([
            'Username'    => $request->username,
            'Password'    => $request->password, 
            'Email'       => $request->email,
            'NamaLengkap' => $request->nama,
            'Alamat'      => $request->alamat,
            'role'        => 'user' 
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil, silakan login!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}