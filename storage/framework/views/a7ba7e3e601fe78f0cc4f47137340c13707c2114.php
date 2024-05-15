<?php if(isset($product)): ?>
    <div class="item">
        <div class="wImage">
            <a href="<?php echo e(route('get.product.detail',$product->pro_slug.'-'.$product->id)); ?>" class="image">
                <img data-src="<?php echo e($product->pro_avatar); ?>" alt="<?php echo e($product->pro_name); ?>" class="lazy"
                     src="/view/lazy.jpg"/>
            </a>
        </div>
        <h3 class="info">
            <a href="<?php echo e(route('get.product.detail',$product->pro_slug.'-'.$product->id)); ?>" class="name">
                <?php echo e($product->pro_name); ?>               </a>
            <div class="price">
                <p class="new"><?php echo e(number_price($product->pro_price,0)); ?> đ</p>
            </div>
        </h3>
    </div>
<?php endif; ?><?php /**PATH D:\project\tesst\resources\views/layout/pages/product_detail/product_relate.blade.php ENDPATH**/ ?>