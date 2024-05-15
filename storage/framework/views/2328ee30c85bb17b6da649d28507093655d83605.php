
<?php $__env->startSection('profile'); ?>

    <div class="lzd-playground-right">
        <div class="breadcrumb"><a>Thông tin cá nhân</a></div>
        <div id="container" class="container">
            <div class="my-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo e(pare_url_file(Auth::user()->avatar)); ?>" style="width:100px;height:100px;border-radius: 50%;" alt="User profile picture">
                <div class="my-profile-bd">
                    <div class="my-profile-item" style="margin-top: 10px">
                        <h3 class="my-profile-item-title">Họ tên</h3>
                        <div class="my-profile-item-info"><?php echo e(Auth::user()->name); ?></div>
                    </div>
                    <div class="my-profile-item">
                        <h3 class="my-profile-item-title"><span>Địa chỉ email</span></h3>
                        <div class="my-profile-item-info"><?php echo e(Auth::user()->email); ?></div>
                    </div>
                    <div class="my-profile-item">
                        <h3 class="my-profile-item-title">Số điện thoại</h3>
                        <div class="my-profile-item-info"><span
                                    class="gray"><?php echo e(Auth::user()->phone ?? 'Vui lòng nhập số điện thoại của bạn'); ?> </span>
                        </div>
                    </div>
                    <br>
                    <div class="my-profile-item">
                        <h3 class="my-profile-item-title">Địa chỉ</h3>
                        <div class="my-profile-item-info"><span
                                    class="gray"><?php echo e(Auth::user()->address ?? 'Chưa có địa chỉ'); ?> </span>
                        </div>
                    </div>
                    <div class="my-profile-item">
                        <h3 class="my-profile-item-title">Ngày sinh</h3>
                        <div class="my-profile-item-info"><span
                                    class="gray"><?php echo e(Auth::user()->birthday); ?> </span>
                        </div>
                    </div>
                    <div class="my-profile-item">
                        <h3 class="my-profile-item-title">Giới tính</h3>
                        <div class="my-profile-item-info"><span
                                    class="gray"><?php echo e(Auth::user()->gender == 0 ? 'Nam' : 'Nữ'); ?> </span>
                        </div>
                    </div>
                    <a href="<?php echo e(route('get.user.edit')); ?>"><button type="a" class="next-btn next-btn-warning next-btn-normal next-btn-large">SỬA THÔNG TIN</button></a>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\tesst\resources\views/user/profile.blade.php ENDPATH**/ ?>