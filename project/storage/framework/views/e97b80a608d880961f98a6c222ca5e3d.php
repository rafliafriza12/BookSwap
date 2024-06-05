<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('style/style.css')); ?>">
    <title>Book Swap | <?php echo $__env->yieldContent('title'); ?></title>
</head>

<body
    class=" bg-[#121212] font-poppins w-screen overflow-x-hidden h-screen px-5 py-5 flex flex-col items-center gap-5 scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar-thin scrollbar-thumb-[#b3b3b3]">
    <div class="w-full relative">
        <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('components.listchat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->yieldContent('body'); ?>
    <script src="<?php echo e(asset('js/index.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
<?php /**PATH /home/whoami/Joki/BookSwap/project/resources/views/layouts/layout.blade.php ENDPATH**/ ?>