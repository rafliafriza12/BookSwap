<?php

namespace App\Http\Controllers;

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

    public function changePasswordPage(){
        return view('pages.ubahsandi');
    }

    public function logout(Request $request){
        Auth::logout();
        Session::forget('conversations');
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/signin');
    }
}
