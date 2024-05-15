
<?php $__env->startSection('content'); ?>
    <title>Sửa thông tin danh mục sản phẩm</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="margin-left:15px">
                Sửa thông tin danh mục sản phẩm
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.index')); ?>">Trang chủ</a></li>
                <li><a href="<?php echo e(route('admin.category.index')); ?>">Danh mục</li>
                >
                <li><a href="#">Cập nhật</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="" method="POST" role="form" class="col-md-8">
                <?php echo csrf_field(); ?>
                <div class="form-group <?php echo e($errors->first('c_name') ? ' has-error':''); ?>">
                    <label for="exampleInputEmail1">Danh mục</label>
                    <input type="text" name="c_name" class="form-control" id="exampleInputEmail1"
                           value="<?php echo e($category->c_name); ?>" aria-describedby="emailHelp">
                    <?php if($errors->first('c_name')): ?>
                        <p class="text-danger"><?php echo e($errors->first('c_name')); ?>  </p>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php echo e($errors->first('c_cate') ? ' has-error':''); ?>">
                    <label for="exampleInputPassword1">Thể loại</label>
                    <select name="c_cate" class="form-control" id="exampleInputPassword1">
                        <option value="">--Chọn thể loại sản phẩm--</option>
                        <option value="watch" <?php if($category->c_cate == 'watch'): ?> selected <?php endif; ?>>Máy lọc nước</option>
                        <option value="glass" <?php if($category->c_cate == 'glass'): ?> selected <?php endif; ?>>THIẾT BỊ LỌC NƯỚC</option>
                        <option value="accessories" <?php if($category->c_cate == 'accessories'): ?> selected <?php endif; ?>>THIẾT BỊ ĐO</option>

                    </select>
                    <?php if($errors->first('c_cate')): ?>
                        <p class="text-danger"><?php echo e($errors->first('c_cate')); ?>  </p>
                    <?php endif; ?>
                </div>
                <a href="<?php echo e(route('admin.category.index')); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Quay lại</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Thêm</button>
            </form>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\tesst\resources\views/admin/category/update.blade.php ENDPATH**/ ?>