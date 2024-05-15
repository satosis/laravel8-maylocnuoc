
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layout.component.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <title><?php echo e($title_page ?? $title_page); ?></title>
    <br>

    <div class="product">
        <div class="wrp">
            <a href="javascript://" title="" class="titleHead">Sản phẩm bán chạy </a>
            <div class="tabs">
                <ul class="tab-links">
                    <li class="active"><a href="#tab1" title="">MÁY LỌC NƯỚC</a></li>
                    <li><a href="#tab2" title="">THIẾT BỊ LỌC NƯỚC</a></li>
                    <li><a href="#tab3" title="">THIẾT BỊ ĐO</a></li>
                </ul>
                <div class="tabContent">
                    <div id="tab1" class="tab active">
                        <div class="group slide">
                            <?php if(isset($productsWatch)): ?>
                                <?php $__currentLoopData = $productsWatch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('layout.component.product_item',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div id="tab2" class="tab">
                        <div class="group slide">
                            <?php if(isset($productsGlass)): ?>
                                <?php $__currentLoopData = $productsGlass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('layout.component.product_item',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="btnXemthem dn">
                            <a href="javascript://" title="xem them" class="xemthem" rel="nofollow">
                                <span>Xem thêm <i class="fa fa-chevron-down"></i></span>
                            </a>
                            <a href="/kinh-mat-thoi-trang.html" title="Kính mắt" class="thugon">
                                <span>Xem tất cả <i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div id="tab3" class="tab">
                        <div class="group slide">
                            <?php if(isset($productsAccessoriess)): ?>
                                <?php $__currentLoopData = $productsGlass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('layout.component.product_item',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="btnXemthem dn">
                            <a href="javascript://" title="" class="xemthem" rel="nofollow">
                                <span>Xem thêm <i class="fa fa-chevron-down"></i></span>
                            </a>
                            <a href="/phu-kien-dong-ho.html" title="Phu kien dong ho" class="thugon">
                                <span>Xem tất cả <i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="countCate" class="dn dbmobile-l">
        <div class="wrp">
            <div class="group">
                <a href="/phu-kien-dong-ho.html" title="THIẾT BỊ ĐO" class="item">
                    <span class="ttu"><b>THIẾT BỊ ĐO</b></span>
                    <span><b>178</b></span>
                </a>
            </div>
        </div>
    </div>

    
    <div class="product">
        <div class="wrp">
            <h2 class="titleCate">
                <a href="/san-pham/may-loc-nuoc-nong-lanh-3" title="MÁY LỌC NƯỚC RO">
                    <span class="icon"><img data-src="/view/img/icon1.png" alt="MÁY LỌC NƯỚC RO" class="lazy"
                                            src="/view/lazy.jpg"/></span>
                    MÁY LỌC NƯỚC RO
                </a>
            </h2>
            <div class="group slide">
                <?php $__currentLoopData = $listProduct1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('layout.component.list_product',['list'=>$list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
    <div class="product pb20">
        <div class="wrp">
            <h2 class="titleCate">
                <a href="/sp/dong-ho-diamond-d.html" title="MÁY LỌC NƯỚC ĐIỆN GIẢI ION">
                    <span class="icon"><img data-src="/view/img/icon1.png" alt="MÁY LỌC NƯỚC ĐIỆN GIẢI ION" class="lazy"
                                            src="/view/lazy.jpg"/></span>MÁY LỌC NƯỚC ĐIỆN GIẢI ION
                </a>
            </h2>
            <div class="group slide">
                <?php $__currentLoopData = $listProduct2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('layout.component.list_product',['list'=>$list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>

    <div class="product product3">
        <div class="wrp">
            <div class="bannerMain">
                <div class="wImage dnTablet-l">
                    <a href="/san-pham/may-loc-nuoc-ro-1" title="Máy lọc nước nóng lạnh" class="image cover">
                        <img data-src="/view/img/EP246.jpg" class="lazy" src="/view/lazy.jpg"/>
                    </a>
                </div>
                <div class="wImage dn dbtablet-l">
                    <a href="/san-pham/may-loc-nuoc-ro-1" title="Epos" class="image cover">
                        <img data-src="/view/img/EP246M.jpg" class="lazy" src="/view/lazy.jpg"/>
                    </a>
                </div>
                <h2 class="info">
                    <a href="/san-pham/may-loc-nuoc-ro-1" title="Máy lọc nước nóng lạnh" class="name">
                        <span>Máy lọc nước</span> <span class="dn dbtablet-l"> </span>
                        <span>nóng lạnh</span>
                    </a>
                    <a href="/san-pham/may-loc-nuoc-ro-1" title="Máy lọc nước nóng lạnh" class="viewAll">Xem tất cả <i
                                class="fa fa-chevron-right"></i></a>
                </h2>
            </div>
            <div class="group slide3">
                <?php $__currentLoopData = $listProduct3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('layout.component.list_product',['list'=>$list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    <div class="product pt10">
        <div class="wrp">
            <h2 class="titleCate">
                <a href="/san-pham/giuong-ngu-2" title="Thiết bị lọc nước">
                    <span class="icon"><img data-src="/view/img/icon1.png" class="lazy" src="/view/lazy.jpg"/></span>
                    Thiết bị lọc nước
                </a>
            </h2>
            <div class="group slide">
                <?php $__currentLoopData = $listProduct4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('layout.component.list_product',['list'=>$list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
    </div>
    <div class="product pb20">
        <div class="wrp">
            <h2 class="titleCate">
                <a href="/san-pham/may-loc-nuoc-nano-5" title="MÁY LỌC NƯỚC NANO" class="">
                    <span class="icon"><img data-src="/view/img/icon1.png" alt="AG" class="lazy" src="/view/lazy.jpg"/></span>
                    MÁY LỌC NƯỚC NANO
                </a>
            </h2>
            <div class="group slide">
                <?php $__currentLoopData = $listProduct5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('layout.component.list_product',['list'=>$list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
    </div>
    <div class="product product3">
        <div class="wrp">
            <div class="bannerMain">
                <div class="wImage dnTablet-l">
                    <a href="/san-pham/may-loc-nuoc-nano-5" title="Atlantic Swiss" class="image cover">
                        <img data-src="/view/img/AT1.jpg" alt="Atlantic" class="lazy" src="/view/lazy.jpg"/>
                    </a>
                </div>
                <div class="wImage dn dbtablet-l">
                    <a href="/san-pham/may-loc-nuoc-nano-5" title="Epos" class="image cover">
                        <img data-src="/view/img/AT2.jpg" alt="Atlantic" class="lazy" src="/view/lazy.jpg"/>
                    </a>
                </div>
                <h3 class="info">
                    <a href="/san-pham/may-loc-nuoc-nano-5" title="Atlantic Swiss" class="name">
                        <span>MÁY LỌC NƯỚC</span> <span class="dn dbtablet-l"> </span>
                        <span>NANO</span>
                    </a>
                    <a href="/san-pham/may-loc-nuoc-nano-5" title="Atlantic Swiss" class="viewAll">Xem tất cả <i
                                class="fa fa-chevron-right"></i></a>
                </h3>
            </div>
            <div class="group slide3">
                <?php $__currentLoopData = $listProduct6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('layout.component.list_product',['list'=>$list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>

    <div id="SupInfo">
        <div class="wrp">
            <div class="left">
                <div class="item">
                    <p class="head">Hotline</p>
                    <a href="tel:18006005" title="Hotline" class="tel">
                        <i class="fa fa-phone" style="padding-right:10px"></i>1800.6005
                    </a>
                </div>
                <div class="item">
                    <p class="head">Gọi đặt hàng</p>
                    <a href="tel:0985681189" title="Hotline" class="tel">
                    <i class="fa fa-phone" style="padding-right:10px"></i>098.568.1189
                    </a>
                </div>
            </div>
            <div class="right">
                <div class="mail">
                    <p class="fs17 ttu mb10">Đăng ký nhận thông tin mới</p>
                    <div id="frmMail">
                        <input type="text" value="" placeholder="Nhập email của bạn tại đây"/>
                        <a href="javascript://" title="" class="btnRegis">Đăng ký</a>
                    </div>
                </div>
                <div class="social">
                    <p class="fs17 ttu mb10">Kết nối mạng xã hội </p>
                    <ul>
                        <li><a rel="nofollow" href="javascript:" title="facebook" target="_blank"><i
                                        class="fa fa-facebook"></i></a></li>
                        <li><a rel="nofollow" href="javascript:" title="Instagram" target="_blank"><i
                                        class="fa fa-instagram"></i></a></li>
                        <li><a rel="nofollow" href="javascript:" title="youtube" target="_blank"><i
                                        class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.home-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\tesst\resources\views/welcome.blade.php ENDPATH**/ ?>