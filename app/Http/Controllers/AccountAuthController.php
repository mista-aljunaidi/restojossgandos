<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // cari user berdasarkan username
        $account = Account::where('username', $credentials['username'])->first();

        if ($account && Hash::check($credentials['password'], $account->password)) {
            // Simpan session manual
            session([
                'account_id' => $account->id,
                'account_name' => $account->name,
                'account_username' => $account->username,
            ]);
            return redirect('/dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }
    public function logout(Request $request)
    {
        // hapus session login manual
        $request->session()->forget(['account_id', 'account_name', 'account_username']);

        // invalidate & regenerate untuk amankan CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')
            ->with('success', 'Berhasil logout');
    }
}
