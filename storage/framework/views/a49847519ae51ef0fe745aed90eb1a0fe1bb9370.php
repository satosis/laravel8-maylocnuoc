
<?php $__env->startSection('content'); ?>
    <title>Phản hồi từ khách hàng</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Phản hồi từ khách hàng
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.rating')); ?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Danh sách</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <th style="width:100px">STT</th>
                    <th>Người đăng</th>
                    <th style="width:350px">Sản phẩm</th>
                    <th style="width:150px">Đánh giá</th>
                    <th>Nội dung</th>
                    <th>Phản hồi lúc</th>
                    </thead>
                    <tbody>
                    <?php if($rating): ?>
                        <?php $__currentLoopData = $rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($list->id); ?></td>
                            <td><?php echo e($list->user->name); ?>(#<?php echo e($list->r_user_id); ?>)</td>
                            <td><?php echo e($list->product->pro_name); ?>(#<?php echo e($list->r_product_id); ?>)</td>
                            <td><?php for($i=1 ;$i <=$list->r_number;$i++): ?>
                                    <i class="fa fa-star"></i>
                                <?php endfor; ?></td>
                            <td><?php echo e($list->r_content); ?></td>
                            <td><?php echo e($list->created_at); ?></td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="box-footer">
                    <?php echo $rating->links(); ?>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\tesst\resources\views/admin/rating/index.blade.php ENDPATH**/ ?>