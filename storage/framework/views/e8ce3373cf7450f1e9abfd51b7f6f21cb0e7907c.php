
<?php $__env->startSection('content'); ?>
    <title>Thông tin sản phẩm</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Người dùng
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                <li class="active">Người dùng</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <table class="table">
                <thead>
                <th>STT</th>
                <th>Tên người dùng</th>
                <th>Điện thoại</th>
                <th>Đăng nhập bằng</th>
                <th>Tạo ngày</th>
                </thead>
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                    <td><?php echo e($list->id); ?></td>
                    <td><?php echo e($list->name); ?></td>
                    <td><?php echo e($list->phone); ?></td>
                    <td><?php echo e($list->provider ?? "Trực tiếp"); ?></td>
                    <td><?php echo e($list->created_at); ?></td>

                    </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </section>
        <div class="box-footer">
            <?php echo $user->links(); ?>

        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\tesst\resources\views/admin/user/index.blade.php ENDPATH**/ ?>