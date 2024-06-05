@extends('layouts.layout')
@section('title', 'Buku Saya')

@section('body')
<div class=" w-full flex flex-col items-center gap-4 pb-10 relative">
    <div class=" w-full text-left text-[#b3b3b3] font-bold py-8">
        <h1 class="text-3xl">
            Buku Saya
        </h1>
    </div>
    <div class=" w-full">
        @include('components.bukusaya')
    </div>
</div>
@endsection