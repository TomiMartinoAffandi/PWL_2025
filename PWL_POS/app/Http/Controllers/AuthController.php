<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            // jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');
            
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }
            
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }
        
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'username' => 'required|unique:m_user',
                'nama' => 'required|string|min:3|max:100',
                'password' => 'required|min:6|confirmed',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Register Gagal',
                    'errors' => $validator->errors(),
                ]);
            }

            $hashedPassword = Hash::make($request['password']);

            UserModel::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => $hashedPassword,
                'level_id' => 3,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Register Berhasil',
                'redirect' => url('/login'),
            ]);
        }
        return redirect('register');
    }
}