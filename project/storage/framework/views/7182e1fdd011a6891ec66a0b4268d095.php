<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('body'); ?>
<div class=" w-full flex flex-col items-center gap-4 relative">
    <div class="w-full h-14 flex items-start gap-4">
        <div class=" h-full relative">
            <div  id="dropdownButton" class="cursor-pointer w-44 h-[70%] bg-[#212121] rounded-2xl flex items-center justify-center font-semibold text-[#b3b3b3] hover:bg-[#1db954] hover:text-[#121212] duration-200">Filter</div>
            <div id="dropdown" class="hidden absolute bottom-[-1] mt-3 z-10 bg-[#212121] divide-y divide-gray-100 rounded-xl shadow w-44">
                <ul class="text-sm text-white font-semibold" aria-labelledby="dropdownDefaultButton">
                    <li class="text-[#b3b3b3] hover:bg-[#1db954] hover:text-[#121212] rounded-t-xl">
                        <a href="/books/all" class="block px-4 py-2 ">Semua</a>
                    </li>
                    <li class="hover:bg-[#1db954] hover:text-[#121212] text-[#b3b3b3]">
                        <a href="/books/anak" class="block px-4 py-2 ">Anak-anak</a>
                    </li>
                    <li class="hover:bg-[#1db954] hover:text-[#121212] text-[#b3b3b3]">
                        <a href="/books/sejarah" class="block px-4 py-2 ">Sejarah</a>
                    </li>
                    <li class="hover:bg-[#1db954] hover:text-[#121212] text-[#b3b3b3]">
                        <a href="/books/romantis" class="block px-4 py-2 ">Romantis</a>
                    </li>
                    <li class="hover:bg-[#1db954] hover:text-[#121212] text-[#b3b3b3]">
                        <a href="/books/edukasi" class="block px-4 py-2 ">Edukasi</a>
                    </li>
                    <li class="hover:bg-[#1db954] hover:text-[#121212] text-[#b3b3b3]">
                        <a href="/books/fiksi" class="block px-4 py-2 ">Fiksi</a>
                    </li>
                    <li class="hover:bg-[#1db954] hover:text-[#121212] text-[#b3b3b3] rounded-b-xl">
                        <a href="/books/komik" class="block px-4 py-2 ">Komik</a>
                    </li>
                </ul>
            </div>
        </div>
        <input id="search" placeholder="Search" class="w-[25%] text-[#b3b3b3] h-[70%] bg-[#212121] rounded-2xl px-3 font-semibold placeholder:text-[#b3b3b3]"></input>
    </div>
    <div id="books-container" class=" w-full pb-10">
        <?php echo $__env->make('components.books', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/whoami/Joki/BookSwap/project/resources/views/pages/home.blade.php ENDPATH**/ ?>