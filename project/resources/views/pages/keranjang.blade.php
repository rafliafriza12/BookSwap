@extends('layouts.layout')
@section('title', 'Kerajang')

@section('body')
<div class=" w-full flex flex-col items-center gap-1 pb-10 relative">
    <div class=" w-full text-left text-[#b3b3b3] font-bold py-5">
        <h1 class="text-3xl">
            Dashboard Peminjaman
        </h1>
    </div>
    <div class=" w-full">
        @include('components.bookcart')
    </div>
</div>
@endsection