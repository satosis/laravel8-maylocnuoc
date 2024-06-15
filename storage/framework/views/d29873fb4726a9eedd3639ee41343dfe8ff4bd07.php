<table class="table table-condensed">
    <tbody>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
    </tr>

    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th>#<?php echo e($list->id); ?></th>
            <th><?php echo e($list->product->pro_name ?? "[N\A]"); ?></th>
            <th><img style="height:80px;width:80px" src="<?php echo e($list->product->pro_avatar); ?>" alt=""></th>
            <th><?php echo e(number_price($list->od_price,0,',','.')); ?>đ</th>
            <th><?php echo e($list->od_qty); ?></th>
            <th><?php echo e(number_price($list->od_price *$list->od_qty ,0,',','.')); ?>đ</th>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>
<?php /**PATH D:\laravel8-maylocnuoc\resources\views/component/transaction.blade.php ENDPATH**/ ?>