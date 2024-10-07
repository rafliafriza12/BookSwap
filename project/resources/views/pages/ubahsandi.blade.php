@extends('layouts.layout')
@section('title', 'Ganti Kata Sandi')

@section('body')
    <div class=" w-full flex mt-[5vh] flex-col items-center justify-between">
        <div class=" w-[50%] rounded-2xl bg-[#212121] py-10 flex flex-col items-center gap-14 text-[#b3b3b3] px-10">
            <h1 class="font-bold text-3xl">Ubah Kata Sandi</h1>
            <form action="" method="POST" class="w-full flex flex-col items-center justify-center gap-8">
                @csrf
                @method('PUT')
                <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                    <input placeholder="Masukkan kata sandi lama" name="oldPassword" type="password" class="w-full bg-transparent focus:outline-none" required>
                </div>
                <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                    <input placeholder="Masukkan kata sandi baru" name="newPassword" type="password" class="w-full bg-transparent focus:outline-none" required>
                </div>
                <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                    <input placeholder="Masukkan ulang kata sandi baru" name="confirmNewPassword" type="password" class="w-full bg-transparent focus:outline-none" required>
                </div>
                @if (session('error'))
                <p class=" absolute text-xs bottom-11 text-red-600">Gagal mengedit profil</p>
                @endif
                @if (session('success'))
                <p class=" absolute text-xs bottom-11 text-[#1db954]">Profil berhasil di edit</p>
                @endif
                <button
                class=" bg-[#1db954] text-[#121212] font-medium text-lg py-1 px-8 rounded-3xl hover:scale-[1.05] duration-300">Simpan</button>
            </form>
        </div>
    </div>
@endsection