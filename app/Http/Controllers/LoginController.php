<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Prodi;
use App\Models\DPA;
use App\Models\Mahasiswa;
use App\Models\Fakultas;

class LoginController extends Controller
{
    public function postLogin(Request $request){
        $role = $request['role'];
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $user = null;
    
        switch ($role) {
            case 'admin':
                $user = Admin::where('username', $credentials['username'])->first();
                if ($user && $user->password === $credentials['password']) {
                    Auth::guard($role)->login($user);
                    session(['username' => $credentials['username']]);
                }
                break;
            case 'prodi':
                $user = Prodi::where('NIPkaprodi', $credentials['username'])->first();
                if ($user && $user->password_prodi === $credentials['password']) {
                    Auth::guard($role)->login($user);
                    session(['username' => $credentials['username']]);
                }
                break;
            case 'dpa':
                $user = DPA::where('nip_dpa', $credentials['username'])->first();
                if ($user && $user->password_dpa === $credentials['password']) {
                    Auth::guard($role)->login($user);
                    session(['username' => $credentials['username']]);
                }
                break;
            case 'mahasiswa':
                $user = Mahasiswa::where('nim_mhs', $credentials['username'])->first();
                if ($user && $user->password_mhs === $credentials['password']) {
                    Auth::guard($role)->login($user);
                    session(['username' => $credentials['username']]);
                }
                break;
            case 'fakultas':
                $user = Fakultas::where('NIPdekan', $credentials['username'])->first();
                if ($user && $user->password_fakultas === $credentials['password']) {
                    Auth::guard($role)->login($user);
                    session(['username' => $credentials['username']]);
                }
                break;
            default:
                break;
        }
    
        if ($user) {
            $request->session()->regenerate();
            return redirect()->intended("/$role/home");
        }
        
        return back()->with('loginError', 'Login failed');
    }
    
    
     public function logout(Request $request){
         Auth::logout();
 
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return redirect('/login-page');
     }
}
