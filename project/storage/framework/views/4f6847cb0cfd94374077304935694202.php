<?php $__env->startSection('title', 'Profil'); ?>

<?php $__env->startSection('body'); ?>
    <div class=" w-full flex justify-center items-center px-48 box-border">
        <div class=" w-full bg-[#212121] rounded-2xl flex py-20">
            <div class=" w-[40%] h-[450px] p-7">
                <img src="<?php echo e(asset(url(''.$user->image_path))); ?>" alt=""
                    class=" w-full h-full object-cover rounded-full border border-[#b3b3b3]">
            </div>
            <div class=" w-[60%] py-7 px-24 flex flex-col gap-6 justify-center items-center text-[#b3b3b3]">
                <div class="font-bold text-3xl">Akun</div>
                <form action="/profile/edit/<?php echo e(auth()->user()->id); ?>" method="POST" enctype="multipart/form-data"
                    class="w-full flex flex-col items-center justify-center gap-8 relative">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                        <input name="name" type="text" class="w-full bg-transparent focus:outline-none" value="<?php echo e($user->name); ?>">
                    </div>
                    <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                        <input name="email" type="text" class="w-full bg-transparent focus:outline-none" value="<?php echo e($user->email); ?>">
                    </div>
                    <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                        <input name="whatsapp" type="text" class="w-full bg-transparent focus:outline-none" value="<?php echo e($user->whatsapp); ?>">
                    </div>
                    <div class=" w-full">
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-16 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer">
                                <div class="flex flex-col items-center justify-center pt-5 pb-5">
                                    <p id="file-name" class="text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                </div>
                                <input id="dropzone-file" name="image" type="file" class="hidden" />
                            </label>
                        </div>
                    </div>
                    <?php if(session('error')): ?>
                    <p class=" absolute text-xs bottom-11 text-red-600">Gagal mengedit profil</p>
                    <?php endif; ?>
                    <?php if(session('success')): ?>
                    <p class=" absolute text-xs bottom-11 text-[#1db954]">Profil berhasil di edit</p>
                    <?php endif; ?>
                    <button
                        class=" bg-[#1db954] text-[#121212] font-medium text-lg py-1 px-8 rounded-3xl hover:scale-[1.05] duration-300">Edit
                        Profil</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('dropzone-file').addEventListener('change', function(event) {
            var fileName = event.target.files[0].name; // Mendapatkan nama file
            document.getElementById('file-name').innerHTML = fileName; // Menampilkan nama file
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/whoami/Joki/BookSwap/project/resources/views/pages/profile.blade.php ENDPATH**/ ?>