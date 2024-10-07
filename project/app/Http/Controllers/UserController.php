<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        return view('pages.signin');
    }

    public function registerPage(){
        return view('pages.signup');
    }

    public function register(Request $request){
        $credential = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        } catch (\Throwable $th) {
            return redirect('/signup')->withInput($request->only('name', 'email'))->with('error', 'Registrasi gagal. Silakan coba lagi.');
        }

        return redirect('/signin')->withInput($request->only('email'));
    }

    public function authenticate(Request $request){
        $credential = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect('/');
        }

        return redirect('/signin')->withInput($request->only('email'))->with('error', 'Login gagal. Silakan coba lagi.');
    }

    public function profilePage($id){
        $user = User::where('id',$id)->first();
        return view('pages.profile', compact('user'));
    }


    public function editProfile(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        try {
            $user = User::where('id',$id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->whatsapp = $request->whatsapp;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->extension(); 
                $image->move(public_path('images'), $imageName);
                $user->image_path = 'images/'.$imageName;
            }
            $user->save();
        } catch (\Throwable $th) {
            return redirect('/profile/'.auth()->user()->id)->with('error','gagal');
        }
        return redirect('/profile/'.auth()->user()->id)->with('success', 'sukses');
    }

    public function changePasswordPage($id){
        $user = User::where('id', $id)->first();
        return view('pages.ubahsandi', compact('user'));
    }

    public function changePassword(Request $request,$id){
        try {
            $request->validate([
                'newPassword' => 'required',
            ]);
        
            // Jika validasi berhasil, lakukan proses penggantian password
            $user = User::where('id', $id)->first();
            $user->password = Hash::make($request->newPassword);
            $user->save();
        
        } catch (\Throwable $th) {
            // Mengarahkan kembali dengan pesan error jika terjadi kesalahan
            return redirect('/change-password/'.auth()->user()->id)->with('error', 'Gagal mengubah password.');
        }
        
        // Mengarahkan kembali ke halaman profil jika password berhasil diubah
        return redirect('/profile/'.auth()->user()->id);
    }

    public function logout(Request $request){
        Auth::logout();
        Session::forget('conversations');
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/signin');
    }
}
