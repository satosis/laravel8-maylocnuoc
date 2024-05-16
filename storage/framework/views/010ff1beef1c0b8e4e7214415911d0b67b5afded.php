
<?php $__env->startSection('content'); ?>
    <title>Thông tin danh mục sản phẩm</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh mục sản phẩm
                <small><a href="<?php echo e(route('admin.category.create')); ?>" class="btn btn-primary">Thêm mới</a></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.category.index')); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Danh mục</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-md-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>STT</th>
                        <th style="width: 360px;">Tên</th>
                        <th style="width: 180px;">Thể loại</th>
                        <th>Thời gian cập nhật</th>
                        <th>Thời gian tạo</th>
                        <th style="width: 200px;">Hành động</th>
                    </tr>
                    <?php if($category): ?>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($list->id); ?></td>
                                <td><?php echo e($list->c_name); ?></td>
                                <td>
                                    <?php if($list->c_cate == 'watch'): ?>
                                        Máy lọc nước
                                    <?php elseif($list->c_cate == 'watch'): ?>
                                        THIẾT BỊ LỌC NƯỚC
                                    <?php else: ?>
                                        THIẾT BỊ ĐO
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($list->updated_at); ?></td>
                                <td><?php echo e($list->created_at); ?></td>
                                <td><a href="<?php echo e(route('admin.category.update',$list->id)); ?>" class="btn btn-primary"><i
                                                class="fa fa-edit"></i> Sửa</a>

                                    <a href="<?php echo e(route('admin.category.delete',$list->id)); ?>"
                                       class="btn btn-danger js-query-confirm"><i class="fa fa-times"></i> Xóa</a></td>


                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>

            </div>
            <div class="box-footer">
                <?php echo $category->links(); ?>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\tesst\resources\views/admin/category/index.blade.php ENDPATH**/ ?>