<div id="chat" class="hidden w-[30%] h-[80vh] bg-[#212121] absolute bottom-[-1] mt-2 rounded-xl flex items-center flex-col gap-7 py-10 px-7 box-border z-40 overflow-x-hidden scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar-thin scrollbar-thumb-[#b3b3b3]">
    <div class=" text-[#b3b3b3] w-full text-left px-3">
        <button id="close-chat" class=" flex items-center gap-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
              <h1>close</h1>
        </button>
    </div>
    <div class=" w-full text-left flex flex-col items-start gap-8 text-[#b3b3b3] font-semibold">
        {{-- @dd($conversations) --}}
        @foreach (session('conversations') as $conversation)
        {{-- {{$conversation}} --}}
            @if ($conversation->sender_id == auth()->user()->id)
            <a href="/chat/{{$conversation->receiver_id}}" class=" w-full flex items-center gap-5 py-2 hover:bg-[#1db954] hover:text-[#121212] rounded-xl px-3">
                <div class=" w-[40px] h-[40px] overflow-hidden rounded-full border border-[#212121]">
                    <img src="{{asset(url(''.$conversation->receiver->image_path))}}" alt="" class=" w-full h-full object-cover">
                </div>
                <div>
                    <h1>{{$conversation->receiver->name}}</h1>
                </div>
            </a>
            @else
            <a href="/chat/{{$conversation->sender_id}}" class=" w-full flex items-center gap-5 py-2 hover:bg-[#1db954] hover:text-[#121212] rounded-xl px-3">
                <div class=" w-[40px] h-[40px] overflow-hidden rounded-full border border-[#212121]">
                    <img src="{{asset(url(''.$conversation->sender->image_path))}}" alt="" class=" w-full h-full object-cover">
                </div>
                <div>
                    <h1>{{$conversation->sender->name}}</h1>
                </div>
            </a>
            @endif
        @endforeach
    </div>
</div>