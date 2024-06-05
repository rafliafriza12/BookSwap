<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('style/style.css')); ?>">
    <title>BookSwap | Sign in</title>
</head>
<body>
    <div class=" w-screen h-screen overflow-hidden flex flex-col justify-center items-center relative bg-[#121212] font-poppins text-white">
        <form class=" w-[35%] py-8 px-10 bg-[#212121] flex flex-col items-center rounded-lg gap-9" method="POST" action="/signin/auth">
            <?php echo csrf_field(); ?>
            <div>
                <h1 class=" font-bold text-3xl">Sign In</h1>
            </div>
            <div class=" w-full flex flex-col gap-10 font-medium relative">
                <input value="<?php echo e(old('email')); ?>" placeholder="Email" name="email" type="text" class=" w-full h-10 rounded-lg bg-[#535353] focus:outline-none focus:border-[2px] focus:border-[#fff] px-3 placeholder:text-[#b3b3b3]" required>
                <div class="h-10 relative">
                    <input placeholder="Password" name="password" id="password" type="password" class=" w-full h-full rounded-lg bg-[#535353] focus:outline-none focus:border-[2px] focus:border-[#fff] px-3 placeholder:text-[#b3b3b3]" required>
                    <button type="button" id="togglePassword" class=" w-[1.7vw] h-[3vh] absolute top-[20%] right-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b3b3b3" class="w-[1.7vw] h-[3vh] mr-[0vh] text-black hover:text-red-800" id="eye-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
                <?php if(session('error')): ?>
                    <p class=" absolute text-xs left-[15%] bottom-[-20%] text-red-600">Email atau password yang anda masukkan salah</p>
                <?php endif; ?>
            </div>
            <div class=" w-full flex justify-center">
                <button class="bg-[#1db954] px-20 font-semibold text-lg py-3 rounded-md hover:scale-[1.05] duration-[0.4s]">Sign in</button>
            </div>
            <div class=" w-full flex items-center justify-center gap-1 font-semibold text-[#b3b3b3]">
                <h1>Belum Punya Akun ? </h1><a href="/signup">Daftar</a>
            </div>
        </form>
    </div>

    <script src="<?php echo e(asset('js/index.js')); ?>"></script>
</body>
</html><?php /**PATH /home/whoami/Joki/BookSwap/project/resources/views/pages/signin.blade.php ENDPATH**/ ?>