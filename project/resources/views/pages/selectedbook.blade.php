@extends('layouts.layout')
@section('title', 'Selected Book')

@section('body')
<div class=" w-full flex justify-center items-center px-48 pb-11 box-border">
    <div class=" w-full bg-[#212121] rounded-2xl flex py-20 items-center">
        <div class=" w-[40%] h-[450px] p-7">
            <img src="{{ asset(url(''.$book->image_path)) }}" alt=""
                class=" w-full h-full object-cover border border-[#b3b3b3]">
        </div>
        <div class=" w-[60%] py-7 px-24 flex flex-col gap-6 justify-center items-center text-[#b3b3b3]">
            @if ($user->id !== auth()->user()->id)
            <div class=" w-full flex items-center justify-between gap-3">
                <div class="w-full flex gap-5 items-center">
                    <div class=" w-[40px] h-[40px] overflow-hidden rounded-full">
                        <img src="{{asset(url(''.$user->image_path))}}" alt="" class=" w-full h-full object-cover">
                    </div>
                    <h1 class=" text-lg font-semibold">{{$user->name}}</h1>
                </div>
                <div>
                    <a href="/chat/{{$user->id}}" class=" py-1 px-6 bg-[#b3b3b3] text-[#121212] rounded-3xl font-semibold hover:bg-[#1db954] hover:text-white duration-200">Chat</a>
                </div>
            </div>
            @endif
            <div action="" enctype="multipart/form-data"
                class="w-full flex flex-col items-center justify-center gap-8">
                <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                    <h1 class="w-full bg-transparent text-xl font-bold">{{$book->judul}}</h1>
                </div>
                <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                    <h1  class="w-full bg-transparent font-medium">{{$book->deskripsi}}</h1>
                </div>
                <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                    <h1  class="w-full bg-transparent font-medium">{{$book->kategori}}</h1>
                </div>
                <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                    @if ($book->status === 'y')
                    <h1 class="w-full bg-transparent text-[#1db954] font-semibold focus:outline-none">Tersedia</h1>
                    @else
                    <h1 class="w-full bg-transparent font-semibold focus:outline-none">Tidak Tersedia</h1>
                    @endif
                </div>
                @if ($user->id != auth()->user()->id)
                    @if ($book->status == 'y')
                    <div id="pinjam-button"
                        class=" cursor-pointer bg-[#1db954] text-[#121212] font-semibold text-lg py-1 px-8 rounded-3xl hover:scale-[1.05] duration-300">
                        Pinjam</div>
                    @else
                        <div id="tidak-pinjam"
                            class="cursor-pointer bg-[#1db954] text-[#121212] font-semibold text-lg py-1 px-8 rounded-3xl hover:scale-[1.05] duration-300">
                            Pinjam</div>

                    @endif
                @endif
            </div>
        </div>
    </div>
    <div id="crud-modal-tdk" tabindex="-1" aria-hidden="true"
        class="hidden z-50 overflow-y-auto overflow-x-hidden flex bg-transparent backdrop-blur-[5px] absolute top-0  justify-center items-center w-full md:inset-0 h-[calc(100%)-1rem] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-[#212121] rounded-lg shadow border border-white">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-center py-1 px-4 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-[#b3b3b3]">
                        Informasi
                    </h3>
                    <button type="button" id="close-modal-tdk"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="py-3 px-5 font-medium text-[#b3b3b3]">
                    Anda tidak bisa meminjam buku ini, karena sudah dipinjam user lain
                </div>
                <!-- Modal body -->
                <div class="py-5 px-5">
                    <button id="button-tdk"
                        class="text-[#212121] inline-flex items-center bg-[#b3b3b3] hover:bg-[#1db954] hover:text-[#212121] focus:outline-none font-semibold rounded-lg text-sm px-5 py-2.5 text-center duration-300">
                        Oke
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="crud-modal-borrow" tabindex="-1" aria-hidden="true"
        class="hidden z-50 overflow-y-auto overflow-x-hidden flex bg-transparent backdrop-blur-[5px] absolute top-0  justify-center items-center w-full md:inset-0 h-[calc(100%)-1rem] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-[#212121] rounded-lg shadow border border-white">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-center py-1 px-4 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-[#b3b3b3]">
                        Informasi
                    </h3>
                    <button type="button" id="close-modal-borrow"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form method="POST" action="/pinjam/{{$book->id}}" class=" w-full px-5 py-2 flex flex-col gap-2">
                    @csrf
                    <div class=" py-2 w-full border-b border-[#b3b3b3] flex flex-col gap-1">
                        <h1 class=" font-semibold text-[#b3b3b3]">Tanggal Peminjaman</h1>
                        <input type="date" name="tanggal_peminjaman" class=" w-full bg-transparent text-[#b3b3b3] focus:outline-none">
                    </div>
                    <div class=" py-2 w-full border-b border-[#b3b3b3] flex flex-col gap-1">
                        <h1 class=" font-semibold text-[#b3b3b3]">Tanggal Pengembalian</h1>
                        <input type="date" name="tanggal_pengembalian" class=" w-full bg-transparent text-[#b3b3b3] focus:outline-none">
                    </div>
                    <div class="py-5">
                        <button type="submit"
                            class="text-[#212121] inline-flex items-center bg-[#b3b3b3] hover:bg-[#1db954] hover:text-[#212121] focus:outline-none font-semibold rounded-lg text-sm px-5 py-2.5 text-center duration-300">
                            Lanjutkan Peminjaman
                        </button>
                    </div>
                </form>
                <!-- Modal body -->
            </div>
        </div>
    </div>
</div>
@endsection