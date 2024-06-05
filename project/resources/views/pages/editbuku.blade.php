@extends('layouts.layout')
@section('title', 'Edit Buku')

@section('body')
<div class=" w-full flex justify-center items-center px-48 box-border pb-11">
    <div class=" w-full bg-[#212121] rounded-2xl flex flex-col items-center py-8 px-12 gap-5">
        <div class="font-bold text-3xl text-white">Edit Buku</div>
        <form action="/edit-buku/edit/{{$book->id}}" method="POST" enctype="multipart/form-data" class=" w-full flex items-center flex-col gap-4">
            @csrf
            @method('PUT')
            <div class="col-span-2 w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-[#b3b3b3]">Judul Buku</label>
                <input type="text" name="judul" id="name"
                    class="bg-[#535353] text-[#fff] text-sm rounded-lg focus:outline-none focus:border focus:border-white block w-full p-2.5"
                    placeholder="Type product name" required value="{{$book->judul}}">
            </div>
            <div class="col-span-2 sm:col-span-1 w-full">
                <label for="category"
                    class="block mb-2 text-sm font-medium text-[#b3b3b3]">Kategori</label>
                <select id="category" name="kategori"
                    class="bg-[#535353] text-[#b3b3b3] text-sm rounded-lg focus:outline-none focus:border focus:border-white block w-full p-2.5">
                        <option value="" disabled {{ is_null($book->kategori) ? 'selected' : '' }}>Pilih Kategori</option>
                        <option value="anak" {{ $book->kategori == 'anak' ? 'selected' : '' }}>Anak-anak</option>
                        <option value="sejarah" {{ $book->kategori == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
                        <option value="romantis" {{ $book->kategori == 'romantis' ? 'selected' : '' }}>Romantis</option>
                        <option value="edukasi" {{ $book->kategori == 'edukasi' ? 'selected' : '' }}>Edukasi</option>
                        <option value="fiksi" {{ $book->kategori == 'fiksi' ? 'selected' : '' }}>Fiksi</option>
                        <option value="Komik" {{ $book->kategori == 'komik' ? 'selected' : '' }}>Komik</option>
                </select>
            </div>
            <div class="col-span-2 w-full">
                <label for="description" class="block mb-2 text-sm font-medium text-[#b3b3b3]">Deskripsi</label>
                <textarea id="description" rows="4" name="deskripsi"
                    class="bg-[#535353] text-[#fff] text-sm rounded-lg focus:outline-none focus:border focus:border-white block w-full p-2.5"
                    placeholder="Write product description here">{{$book->deskripsi}}</textarea>
            </div>

            {{-- <div class="col-span-2 sm:col-span-1 w-full">
                <label for="category"
                    class="block mb-2 text-sm font-medium text-[#b3b3b3]">Status Buku</label>
                <select id="category" name="status"
                    class="bg-[#535353] text-[#b3b3b3] text-sm rounded-lg focus:outline-none focus:border focus:border-white block w-full p-2.5">
                    <option value="y" {{ $book->status == 'y' ? 'selected' : '' }}>Tersedia</option>
                    <option value="n" {{ $book->status == 'n' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div> --}}
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <p id="file-name" class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" name="image"/>
                </label>
            </div>

            <button type="submit"
                class=" bg-[#1db954] py-2 px-16 rounded-3xl font-semibold text-[#121212] hover:scale-[1.05] duration-300">Edit
                Buku</button>
        </form>
    </div>
</div>
<script>
    document.getElementById('dropzone-file').addEventListener('change', function(event) {
        var fileName = event.target.files[0].name; // Mendapatkan nama file
        document.getElementById('file-name').innerHTML = fileName; // Menampilkan nama file
    });
</script>
@endsection