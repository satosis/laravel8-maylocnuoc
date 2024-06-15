
<?php $__env->startSection('profile'); ?>

    <link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/checkout/1.3.17/pages/wishlist/index.css">
    <div class="lzd-playground-right">
        <div class="breadcrumb">
            <a class="first " href="#">Danh sách yêu thích (<?php echo e(count($products)); ?>)</a>
        </div>
        <div id="container" class="container">
            <div class="wishlist-container">
                    <div>
                        <div class="wishlist-mod">
                            <div class="shops">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="shop-items">
                                        <div class="mod-main">
                                            <div class="wishlist-item">
                                                <div class="info">
                                                    <div class="pic"><a
                                                                href=" <?php echo e(route('get.category.detail',$list->id)); ?>"
                                                                target="_blank" rel="noopener noreferrer"><img
                                                                    src="<?php echo e($list->pro_avatar); ?>" width="80" height="80"
                                                                    style="object-fit:cover"></a></div>
                                                    <div><a class="title"
                                                            href="<?php echo e(route('get.category.detail',$list->id)); ?>"><?php echo e($list->pro_name); ?></a>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <?php if($list->pro_sale): ?>
                                                        <div class="currPrice">
                                                            ₫ <?php echo e(number_format($list->pro_price,$list->pro_sale )); ?></div>
                                                        <div class="originPrice"><span
                                                                    class="origin-price-value">₫ <?php echo e(number_format($list->pro_price,0)); ?></span><span
                                                                    class="promotion">-<?php echo e($list->pro_sale); ?>%</span>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="currPrice">
                                                            ₫ <?php echo e(number_format($list->pro_price,0)); ?></div>

                                                    <?php endif; ?>
                                                </div>
                                                <div class="right-oper" style="padding: 5px;margin-left: 100px;">
                                                    <a href="<?php echo e(route('ajax_get.get.user.favourite', $list->id)); ?>">
                                                        <i class="fa fa-heart red" style="font-size:25px"></i>
                                                    </a>
                                                </div>
                                                <div class="right-oper">
                                                    <a class="muangay" href="<?php echo e(route('get.shopping.add',$list->id)); ?>">
                                                    <img src="//laz-img-cdn.alicdn.com/tfs/TB1iUYumfDH8KJjy1XcXXcpdXXa-144-64.png"
                                                            width="72" height="32">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel8-maylocnuoc\resources\views/user/favourite.blade.php ENDPATH**/ ?>