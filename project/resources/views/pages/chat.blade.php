<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <title>BookSwap | Chat</title>
</head>
<body class=" w-screen h-screen flex flex-col px-5 justify-between py-4 overflow-hidden bg-[#121212]">

    <div class=" w-full h-[8%] bg-[#212121] flex items-center rounded-xl px-4 gap-5">
        <a href="/">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b3b3b3" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
        </a>
        <div class=" flex items-center gap-3">
            <div class=" w-[35px] h-[35px] overflow-hidden">
                <img src="{{asset(url(''.$receiver->image_path))}}" alt="" class=" w-full h-full object-cover rounded-full">
            </div>
            <h1 class=" text-[#b3b3b3] font-bold text-xl">{{$receiver->name}}</h1>
        </div>
    </div>
    <form action="/send-message/{{$receiver->id}}" method="POST" class="w-full h-[90%] flex flex-col justify-between">
        @csrf
        <div id="all-chats-container" class=" w-full h-[90%] flex py-4 px-5 flex-col gap-5 overflow-x-hidden scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar-thin scrollbar-thumb-[#b3b3b3] rounded-lg">
            @if ($chats!=null)
            @foreach ($chats as $chat)
                @if ($chat->sender_id == auth()->user()->id)
                <div class=" w-full flex justify-end gap-5 items-center">
                    <p class=" whitespace-pre-line py-1 px-5 max-w-[40%] bg-[#212121] text-[#b3b3b3] font-medium rounded-lg duration-200 hover:bg-[#1db954] hover:text-[#212121]">{{$chat->message}}</p>
                    <div class=" w-[25px] h-[25px] overflow-hidden">
                        <img src="{{asset(url(''.auth()->user()->image_path))}}" alt="" class=" w-full h-full object-cover rounded-full">
                    </div>
                </div>
                @else
                <div class=" w-full flex justify-start gap-5 items-center">
                    <div class=" w-[25px] h-[25px] overflow-hidden">
                        <img src="{{asset(url(''.$receiver->image_path))}}" alt="" class=" w-full h-full object-cover rounded-full">
                    </div>
                    <p class=" whitespace-pre-line py-1 px-5 max-w-[40%] bg-[#212121] text-[#b3b3b3] font-medium rounded-lg duration-200 hover:bg-[#1db954] hover:text-[#212121]">{{$chat->message}}</p>
                </div>
                @endif
            @endforeach
            @endif
        </div>
        <div class=" w-full h-[7%] flex justify-between">
            <input autocomplete="off" type="text" name="message" class=" w-[92%] h-full bg-transparent focus:outline-none border border-[#b3b3b3] rounded-3xl px-5 text-[#b3b3b3] focus:border-[#1db954] placeholder:text-[#b3b3b3]/60" placeholder="Isi pesan disini" required>
            <button type="submit" class=" w-[5%] h-full" onclick="scrollChat()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1db954" class="h-full w-full">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                  </svg>
            </button>
        </div>
    </form>
    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>