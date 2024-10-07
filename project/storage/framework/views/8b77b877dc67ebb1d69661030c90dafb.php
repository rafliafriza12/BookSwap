<?php $__env->startSection('title', 'Ganti Kata Sandi'); ?>

<?php $__env->startSection('body'); ?>
    <div class=" w-full flex mt-[5vh] flex-col items-center justify-between">
        <div class=" w-[50%] rounded-2xl bg-[#212121] py-10 flex flex-col items-center gap-14 text-[#b3b3b3] px-10">
            <h1 class="font-bold text-3xl">Ubah Kata Sandi</h1>
            <form action="/change-password/<?php echo e($user->id); ?>" method="POST" class="w-full flex flex-col items-center justify-center gap-8">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                    <input placeholder="Masukkan kata sandi lama" name="oldPassword" type="password" class="w-full bg-transparent focus:outline-none" required>
                </div>
                <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                    <input placeholder="Masukkan kata sandi baru" name="newPassword" type="password" class="w-full bg-transparent focus:outline-none" required>
                </div>
                <div class=" w-full py-2 border-b border-[#b3b3b3] px-3">
                    <input placeholder="Masukkan ulang kata sandi baru" name="confirmNewPassword" type="password" class="w-full bg-transparent focus:outline-none" required>
                </div>
                <?php if(session('error')): ?>
                <p class=" absolute text-xs bottom-11 text-red-600">Gagal Mengubah Kata Sandi</p>
                <?php endif; ?>
                <?php if(session('success')): ?>
                <p class=" absolute text-xs bottom-11 text-[#1db954]">Kata sandi berhasil di edit</p>
                <?php endif; ?>
                <button
                class=" bg-[#1db954] text-[#121212] font-medium text-lg py-1 px-8 rounded-3xl hover:scale-[1.05] duration-300">Simpan</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/whoami/Joki/BookSwap/project/resources/views/pages/ubahsandi.blade.php ENDPATH**/ ?>