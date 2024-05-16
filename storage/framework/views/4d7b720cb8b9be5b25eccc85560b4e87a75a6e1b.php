
<?php $__env->startSection('content'); ?>
    <title>Thông tin sản phẩm</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sản phẩm
                <small><a href="<?php echo e(route('admin.product.create')); ?>" class="btn btn-success">Thêm mới</a></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                <li class="active">Sản phẩm</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <table class="table">
                <thead>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th style="width: 150px;">Giá</th>
                <th>Giảm giá</th>
                <th>Ảnh</th>
                <th>Lượt mua</th>
                <th>Hot</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
                </thead>
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                    <td><?php echo e(((Request::get('page') ?? 1) - 1) * 10 + $key + 1); ?></td>
                    <td><?php echo e($list->pro_name); ?></td>
                    <td><?php echo e($list->pro_price); ?></td>
                    <td><?php echo e($list->pro_sale); ?></td>
                    <td><img src="<?php echo e($list->pro_avatar); ?>" style="width:80px;height:100px"></td>
                    <td><?php echo e($list->pro_pay); ?></td>
                    <td>
                        <?php if($list->pro_hot == 1): ?>
                            <a href="<?php echo e(route('admin.product.hot',$list->id)); ?>" class="btn btn-primary">Hot</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('admin.product.hot',$list->id)); ?>" class="btn btn-success">Không</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($list->pro_active == 0): ?>
                            <a href="<?php echo e(route('admin.product.active',$list->id)); ?>" class="btn btn-success">Ẩn</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('admin.product.active',$list->id)); ?>" class="btn btn-primary">Hiện</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.product.update',$list->id)); ?>" class="btn btn-primary"><i
                                    class="fa fa-edit"></i> Sửa</a>
                        <a href="<?php echo e(route('admin.product.delete',$list->id)); ?>"
                           class="btn btn-danger js-query-confirm"><i class="fa fa-times"></i> Xóa</a>
                    </td>
                    </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </section>
        <div class="box-footer">
            <?php echo $product->links(); ?>

        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\tesst\resources\views/admin/product/index.blade.php ENDPATH**/ ?>