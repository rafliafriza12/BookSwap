<div class=" w-full place-items-center gap-14 grid grid-cols-4 ">
    @foreach ($books as $book)
    <div class="w-full max-w-sm bg-[#212121] py-4 border-[#b3b3b3] rounded-lg shadow hover:scale-[1.03] duration-300 relative">
        <a href="/selected-book/{{$book->id}}" class="">
            <div class=" w-full flex justify-center">
                <div class=" w-[70%] h-[300px] box-border px-3">
                    <img class=" h-full w-full object-fill rounded-t-lg" src="{{asset(url(''.$book->image_path))}}" alt="product image" />
                </div>
            </div>
            <div class="px-5 pb-5 pt-5 flex flex-col gap-2">
                <div class="flex flex-col items-start gap-2">
                    <span class="text-3xl font-bold text-[#b3b3b3] w-full overflow-hidden h-10 ">{{$book->judul}}</span>
                </div>
                @if ($book->status === 'y')
                <a href="#">
                    <h5 class="text-md font-medium tracking-tight text-[#1db954]">Tersedia</h5>
                </a>
                @else
                <a href="#">
                    <h5 class="text-md font-medium tracking-tight text-[#b3b3b3]">Tidak Tersedia</h5>
                </a>
                @endif
                <div class=" w-full flex justify-end items-center gap-3 font-semibold">
                    <a href="/edit-buku/{{$book->id}}" class="text-[#212121] rounded-2xl bg-[#b3b3b3] py-1 px-6 hover:bg-[#1db954] duration-300">Edit</a>
                    <button id="delete-{{$book->id}}" onclick="deleteMyBook('{{$book->id}}')" class="text-[#212121] bg-[#b3b3b3] py-1 px-4 rounded-2xl hover:bg-red-500 duration-300">Hapus</button>
                </div>
            </div>
        </a>
        <div id="crud-modal-delete-{{$book->id}}" tabindex="-1" aria-hidden="true"
            class="hidden z-[10] overflow-y-auto overflow-x-hidden flex bg-transparent backdrop-blur-[5px] absolute justify-center items-center w-full md:inset-0 h-[calc(100%)-1rem] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-[#212121] rounded-lg shadow border border-white">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-center py-1 px-4 border-b rounded-t">
                        <h3 class="text-lg font-semibold text-[#b3b3b3]">
                            Informasi
                        </h3>
                        <button type="button" id="close-modal-delete-{{$book->id}}"
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
                        Yakin ingin menghapus buku ini ?
                    </div>
                    <!-- Modal body -->
                    <div class="py-5 px-5">
                        <form action="/hapus-buku/{{$book->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" font-semibold text-[#212121] bg-[#b3b3b3] py-1 px-4 rounded-2xl hover:bg-red-500 duration-300">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endforeach
</div>