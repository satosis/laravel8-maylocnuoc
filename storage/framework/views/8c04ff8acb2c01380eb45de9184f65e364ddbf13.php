
<?php $__env->startSection('content'); ?>
    <title>Sửa thông tin sản phẩm</title>
    <div class="content-wrapper">

        <section class="content-header">
            <!-- Content Header (Page header) -->
            <h1> Sửa thông tin sản phẩm</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.index')); ?>">Trang chủ</a></li>
                <li><a href="<?php echo e(route('admin.product.index')); ?>">Sản phẩm</li>
                >
                <li><a href="#" class="active">Cập nhật</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php echo $__env->make('admin.product.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </section>
        <!-- /.content -->
        </section>
        <!-- /.content-wrapper -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel8-maylocnuoc\resources\views/admin/product/update.blade.php ENDPATH**/ ?>