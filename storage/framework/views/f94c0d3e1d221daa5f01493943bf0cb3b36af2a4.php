
<?php $__env->startSection('content'); ?>
    <title>Thông tin từ khóa</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Từ khóa
                <small><a href="<?php echo e(route('admin.keyword.create')); ?>" class="btn btn-success">Thêm mới</a></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                <li class="active">Từ khóa</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <table class="table text-center">
                <thead>
                <td>#</td>
                <td>Từ khóa</td>
                <td>Mô tả</td>
                <td>Hot</td>
                <td>Status</td>
                <td>Hành động</td>
                </thead>
                <?php $__currentLoopData = $keyword; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                    <td><?php echo e($list->id); ?></td>
                    <td><?php echo e($list->k_name); ?></td>
                    <td><?php echo e($list->k_description); ?></td>
                    <td>
                        <?php if($list->k_hot == 1): ?>
                            <a href="<?php echo e(route('admin.keyword.hot',$list->id)); ?>" class="btn btn-primary">Hot</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('admin.keyword.hot',$list->id)); ?>" class="btn btn-success">Không</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($list->k_active == 1): ?>
                            <a href="<?php echo e(route('admin.keyword.active',$list->id)); ?>" class="btn btn-success">Ẩn</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('admin.keyword.active',$list->id)); ?>" class="btn btn-primary">Hiện</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.keyword.update',$list->id)); ?>" class="btn btn-primary"><i
                                    class="fa fa-edit"></i> Sửa</a>
                        <a href="<?php echo e(route('admin.keyword.delete',$list->id)); ?>"
                           class="js-query-confirm btn btn-danger"><i class="fa fa-times"></i> Xóa</a>
                    </td>
                    </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </section>
        <div class="box-footer">
            <?php echo $keyword->links(); ?>

        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\tesst\resources\views/admin/keyword/index.blade.php ENDPATH**/ ?>