<?php if(isset($product)): ?>
    <div class="item">
        <div class="wImage">
            <a href="<?php echo e(route('get.product.detail',$product->pro_slug.'-'.$product->id )); ?>" class="image">
                <img src="<?php echo e($product->pro_avatar); ?>" alt="Jacques Lemans" class="lazy"/>
            </a>
        </div>
        <div class="info">
            <p>34mm | 10ATM</p>
            <a href="<?php echo e(route('get.product.detail',$product->pro_slug.'-'.$product->id )); ?>" class="name">
                <h3><?php echo e($product->pro_name); ?></h3>
            </a>
            <div style="display:flex">
                <?php
                    $age = $product->pro_review_total > 0 ? (int)(($product->pro_review_star - 5 ) / $product->pro_review_total) : $product->pro_review_star;
                ?>
                <?php for($i=1;$i<=$age;$i++): ?>
                    <img style="width:15.96px;height:15.96px"
                         src="//laz-img-cdn.alicdn.com/tfs/TB19ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png">
                <?php endfor; ?>
                <?php for($j=$age+1;$j<=5;$j++): ?>
                    <img style="width:15.96px;height:15.96px"
                         src="//laz-img-cdn.alicdn.com/tfs/TB18ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png">
                <?php endfor; ?>
            </div>
            <div class="price">
                <?php if($product->pro_sale): ?>
                    <p class="new"><?php echo e(number_format($product->pro_price - $product->pro_sale,0,',','.')); ?>đ</p>
                    <p class="old"><?php echo e(number_format($product->pro_price,0,',','.')); ?>đ</p>
                <?php else: ?>
                    <p class="new"><?php echo e(number_format($product->pro_price,0,',','.')); ?>đ</p>
                <?php endif; ?>
            </div>
            <div class="count">
                <div class="bg" style="width: <?php echo e(rand(10,70)); ?>%"></div>
                <span class="text">Còn lại <?php echo e($product->pro_amount); ?></span>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH D:\project\tesst\resources\views/layout/component/product_item.blade.php ENDPATH**/ ?>