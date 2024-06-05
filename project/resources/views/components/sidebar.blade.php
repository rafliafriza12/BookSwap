<div id="side" class="hidden w-[30%] h-[80vh] bg-[#212121] absolute bottom-[-1] mt-2 rounded-xl flex items-center flex-col gap-7 py-10 px-7 box-border z-40 border border-white">
    <div class=" w-[150px] h-[150px] overflow-hidden rounded-full relative border-white border-[2px]">
        <img src="{{asset(url(''.auth()->user()->image_path))}}" alt="adfadf" class=" h-full w-full object-cover">
    </div>
    <div class=" w-full text-left flex flex-col items-start gap-1 text-[#b3b3b3] font-semibold">
        <a href="/profile/{{auth()->user()->id}}" class="py-2 w-[50%] hover:bg-[#b3b3b3] hover:text-[#121212] px-2 rounded-lg">
            Profil
        </a>
        <a href="/" class="py-2 w-[50%] hover:bg-[#b3b3b3] hover:text-[#121212] px-2 rounded-lg">
            Dashboard
        </a>
        <a href="/buku-saya/{{auth()->user()->id}}" class="py-2 w-[50%] hover:bg-[#b3b3b3] hover:text-[#121212] px-2 rounded-lg">
            Buku Saya
        </a>
        <a href="/tambah-buku" class="py-2 w-[50%] hover:bg-[#b3b3b3] hover:text-[#121212] px-2 rounded-lg">
            Tambah Buku
        </a>
        <a href="/list-peminjaman/{{auth()->user()->id}}" class="py-2 w-[50%] hover:bg-[#b3b3b3] hover:text-[#121212] px-2 rounded-lg">
            Peminjaman
        </a>
        <button id="chat-button" class="py-2 w-[50%] hover:bg-[#b3b3b3] hover:text-[#121212] px-2 rounded-lg text-left">
            Chat
        </button>
        <div class=" w-full">
            <form action="/logout" method="POST" class="w-[50%] py-2 hover:bg-[#b3b3b3] hover:text-[#121212] px-2 rounded-lg">
                @csrf
                <button type="submit" class="">Log out</button>
            </form>
        </div>
    </div>
</div>