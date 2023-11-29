<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request) {
        $request->validate([
            'id' => 'required',
            'password'=> 'required' 
         ]);


        if (Auth::guard('mahasiswa')->attempt($request->only('id','password'))) {
            return redirect('/home');
        } elseif (Auth::guard('dosen_wali') -> attempt ($request->only('id','password'))) {
            return redirect('/dpa');
        } elseif (Auth::guard('kaprodi') -> attempt ($request->only('id','password'))) {
            return redirect('/kaprodi');
        } elseif (Auth::guard('fakultas') -> attempt ($request->only('id','password'))) {
            return redirect('/fakultas');
        } elseif (Auth::guard('admin') -> attempt ($request->only('id','password'))) {
            return redirect('/admin');
        } 
        else {
            return redirect('/')->with('wrong', 'Invalid Id and Password ! Try Again !');
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
