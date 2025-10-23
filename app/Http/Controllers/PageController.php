<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $users = [
            ['username' => 'arul', 'password' => '1234'],
            ['username' => 'admin', 'password' => 'admin'],
            ['username' => 'guest', 'password' => 'guest']
        ];

        $username = $request->input('username');
        $password = $request->input('password');

        foreach ($users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                return redirect()->route('dashboard', ['username' => $username]);
            }
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Guest');
        return view('dashboard', compact('username'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username', 'Guest');
        $profile = [
            'nama' => 'Arul Pramana Bahari',
            'nim' => '242410103035',
            'program' => 'Informatika 24',
            'email' => 'arulramana10@gmail.com' 
        ];

        return view('profile', compact('username', 'profile'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username', 'Guest');
        $items = [
            ['id' => 1, 'nama' => 'Basreng Chili Oil', 'stok' => 50, 'harga' => 10000],
            ['id' => 2, 'nama' => 'Basreng Hot Lava', 'stok' => 35, 'harga' => 10000],
            ['id' => 3, 'nama' => 'Basreng Balado', 'stok' => 30, 'harga' => 10000],
        ];

        return view('pengelolaan', compact('username', 'items'));
    }
}