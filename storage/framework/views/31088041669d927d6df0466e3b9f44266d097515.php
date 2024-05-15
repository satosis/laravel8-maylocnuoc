<div class="item">
    <div class="wImage">
        <a href="<?php echo e(route('get.product.detail',$list->pro_slug.'-'.$list->id)); ?>" class="image">
            <img data-src="<?php echo e($list->pro_avatar); ?>" alt="<?php echo e($list->pro_name); ?>" class="lazy" src="/view/lazy.jpg"/>
        </a>
    </div>
    <div class="info">
        <a href="<?php echo e(route('get.product.detail',$list->pro_slug.'-'.$list->id)); ?>" class="name"><?php echo e($list->pro_name); ?></a>
        <div style="display:flex">

        </div>
        <div class="price">
            <p class="new"><?php echo e(number_format($list->pro_price)); ?> đ</p>
        </div>
        <div class="count">
            <div class="bg" style="width: <?php echo e(rand(10,100)); ?>%"></div>
            <span class="text">Còn lại <?php echo e($list->pro_amount ?? 0); ?></span>
        </div>
    </div>
</div>
<?php /**PATH D:\project\tesst\resources\views/layout/component/list_product.blade.php ENDPATH**/ ?>