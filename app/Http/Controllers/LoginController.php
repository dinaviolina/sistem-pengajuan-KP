<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request) {
        // dd($request->all());
        $request->validate([
            'id' => 'required',
            'password'=> 'required' 
         ]);

        if (Auth::guard('mahasiswa')->attempt(['nim_mhs' => $request->id, 'password' => $request->password])) {
            return redirect('/home');
        } elseif (Auth::guard('dosen_wali')->attempt(['nip_dpa' => $request->id, 'password' => $request->password])) {
            return redirect('/dpa');
        } elseif (Auth::guard('kaprodi')->attempt(['nipKaprodi' => $request->id, 'password' => $request->password])) {
            return redirect('/prodi/home');
        } elseif (Auth::guard('fakultas')->attempt(['nipDekan' => $request->id, 'password' => $request->password])) {
            return redirect('/fakultas');
        } elseif (Auth::guard('admin')->attempt(['id_admin' => $request->id, 'password' => $request->password])) {
            return redirect('/admin');
        } 
        else {
            return redirect('/')->with('wrong', 'Invalid Id and Password !');
        }
    }

    public function logout() {
        if (Auth::guard("mahasiswa")->check()){
            Auth::guard("mahasiswa")->logout();
        } elseif (Auth::guard("kaprodi")->check()){
            Auth::guard("kaprodi")->logout();
        } elseif (Auth::guard("dosen_wali")->check()){
            Auth::guard("dosen_wali")->logout();
        } elseif (Auth::guard("fakultas")->check()){
            Auth::guard("fakultas")->logout();
        } elseif (Auth::guard("admin")->check()){
            Auth::guard("admin")->logout();
        }
        return redirect('/');
    }
}
