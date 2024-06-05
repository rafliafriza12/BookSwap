<div class=" w-full place-items-center gap-14 grid grid-cols-4 ">
    @foreach ($books as $book)
    <div class="w-full max-w-sm bg-[#212121] py-4 border-[#b3b3b3] rounded-lg shadow hover:scale-[1.03] duration-300 ">
        <a href="/selected-book/{{$book->book_id}}" class="">
            <div class=" w-full flex justify-center">
                <div class=" w-[70%] h-[300px] box-border px-3">
                    <img class=" h-full w-full object-fill rounded-t-lg" src="{{asset(url(''.$book->image_path))}}" alt="product image" />
                </div>
            </div>
            <div class="px-5 pb-5 pt-5 flex flex-col gap-2">
                <div class="flex flex-col items-start gap-2 w-full">
                    <span class="text-3xl font-bold text-[#b3b3b3] w-full overflow-hidden h-10">{{$book->judul}}</span>
                </div>
                <h5 class="text-md font-medium tracking-tight text-[#b3b3b3]">Tanggal Peminjaman : {{$book->tanggal_peminjaman}}</h5>
                <h5 class="text-md font-medium tracking-tight text-[#b3b3b3]">Tanggal Pengembalian : {{$book->tanggal_pengembalian}}</h5>
                <form method="POST" action="/kembalikan/{{$book->id}}/{{$book->book_id}}" class=" w-[30%] pt-2">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="bg-[#b3b3b3] py-1 px-4 font-semibold rounded-3xl text-[#212121] duration-300 hover:bg-[#1db954] ">Kembalikan</button>
                </form>
            </div>
        </a>
    </div>
    @endforeach
</div>