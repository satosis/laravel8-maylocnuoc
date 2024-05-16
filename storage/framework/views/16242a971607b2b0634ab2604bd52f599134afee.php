
<?php $__env->startSection('profile'); ?>
<style>
    .order-item .item-quantity {
        width: 250px
    }
</style>
    <div class="lzd-playground-right">
        <div class="breadcrumb">
            <a class="first " href="//my.lazada.vn/customer/order/index/">Đơn hàng của tôi</a>
        </div>
        <div id="container" class="container">
            <div class="order-list">
                <div class="order-list-tabs">
                    <a href="<?php echo e(route('get.user.orders', ['status' => 0])); ?>"><span
                                class="order-tab-item <?php if($status == 0 ): ?> order-tab-item-active <?php endif; ?>">Tất cả(<?php echo e($allTransaction); ?>)</span></a>
                    <a href="<?php echo e(route('get.user.orders', ['status' => 1])); ?>"><span
                                class="order-tab-item <?php if($status == 1 ): ?> order-tab-item-active <?php endif; ?>">Tiếp nhận(<?php echo e($defaultTransaction); ?>)</span></a>
                    <a href="<?php echo e(route('get.user.orders', ['status' => 2])); ?>"><span
                                class="order-tab-item <?php if($status == 2 ): ?> order-tab-item-active <?php endif; ?>">Đang vận chuyển(<?php echo e($processTransaction); ?>)</span></a>
                    <a href="<?php echo e(route('get.user.orders', ['status' => 3])); ?>"><span
                                class="order-tab-item <?php if($status == 3 ): ?> order-tab-item-active <?php endif; ?>">Đã bàn giao(<?php echo e($successTransaction); ?>)</span></a>
                    <a href="<?php echo e(route('get.user.orders', ['status' => -1])); ?>"><span
                                class="order-tab-item <?php if($status == -1 ): ?> order-tab-item-active <?php endif; ?>">Đã hủy(<?php echo e($deletedTransaction); ?>)</span></a>
                </div>
            </div>
            <div class="orders">
                <?php if(!count($transaction)): ?>
                    <div class="order-list">
                        <div class="orders"></div>
                        <div class="order-no-data">
                            <div class="order-no-data-text">Không có đơn hàng</div>
                            <div class="order-no-data-btn"><a href="/" class="order-no-data-btn-text">TIẾP TỤC MUA
                                    SẮM</a></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key == 0 && isset($transaction[$key+1]) && $transaction[$key]->trans_id  === $transaction[$key+1]->trans_id || isset($transaction[$key-1]) && $transaction[$key]->trans_id  !== $transaction[$key-1]->trans_id || !isset($transaction[$key+1]) || $key == 0): ?>
                        <div class="order">
                            <div class="order-info">
                                <div class="pull-left">
                                    <div class="info-order-left-text">Đơn hàng <a
                                                class="<?php echo e(route('get.product.detail',$list->pro_slug.'-'.$list->pro_id)); ?>">
                                            #<?php echo e($list->trans_id); ?> </a></div>
                                    <p class="text info desc">Đặt lúc <?php echo e($list->time); ?> </p>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="order-item">
                                <div class="item-pic"><a
                                            href="<?php echo e(route('get.product.detail',$list->pro_slug.'-'.$list->pro_id)); ?>"><img
                                                src="<?php echo e(pare_url_file($list->pro_avatar)); ?>"
                                                style="object-fit: contain;"></a></div>
                                <div class="item-main item-main-mini">
                                    <div class="text title item-title"><?php echo e($list->pro_name); ?></div>
                                    <p class="text desc"></p>
                                    <p class="text desc bold"></p>
                                </div>
                                <div class="item-quantity"><span class="text desc info multiply">Số lượng:</span><span
                                            class="text">&nbsp;<?php echo e($list->od_qty ?? 0); ?></span></div>
                                <div class="label label-primary">
                                    <p class="capsule
                                        <?php if( $list->tst_status == 2): ?> default <?php endif; ?>
                                        <?php if( $list->tst_status == 3): ?> success <?php endif; ?>
                                        <?php if( $list->tst_status == -1): ?> error <?php endif; ?>
                                        "><?php echo e($list->getStatus($list->tst_status)['name']); ?></p>
                                </div>
                            </div>
                            <?php if($key == 0 && isset($transaction[$key+1])  && $transaction[$key]->trans_id  != $transaction[$key+1]->trans_id || isset($transaction[$key+1]) && $transaction[$key]->trans_id  !== $transaction[$key+1]->trans_id|| !isset($transaction[$key+1])  || $key == 0): ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <div class="box-footer">
        <?php echo $transaction->appends(request()->query())->links(); ?>

    </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\tesst\resources\views/user/orders.blade.php ENDPATH**/ ?>