<!DOCTYPE html>
<html lang="vi" xml:lang="vi">
<head>
    <!--CSS-->
    <title><?php echo e($title_page ?? 'Hệ thống phân phối và bán lẻ máy lọc nước cao cấp'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="<?php echo e(asset('view/css/display.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('view/css/chat.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('view/css/animate.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('view/js/owl.carousel.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('view/js/Lightbox/lightbox.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('view/js/slick/slick.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('view/css/Common.css')); ?>" rel="stylesheet"/>
    <!--CSS Responsive-->
    <link href="<?php echo e(asset('view/css/css_rwd_common.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('view/css/css_rwd.min.css')); ?>" rel="stylesheet"/>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <link href="<?php echo e(asset('view/css/dqw.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('view/css/news_css_rwd.css')); ?>" rel="stylesheet"/>
    <!-- toastr -->
    <link rel="stylesheet" href="<?php echo e(asset('toastr/toastr.min.css')); ?>">
    <!-- jquery -->
    <script src="<?php echo e(asset('view/js/jquery-1.9.1.min.js')); ?>"></script>

    <script src="<?php echo e(asset('view/js/stv_new.js')); ?>"></script>
    <link rel="shortcut icon" href="https://www.dangquangwatch.vn/view/favicon.ico" type="image/x-icon"/>
    <?php if(session('toastr')): ?>
        <script>
            var TYPE_MESSAGE = "<?php echo e(session('toastr.type')); ?>";
            var MESSAGE = "<?php echo e(session('toastr.message')); ?>";

        </script>
    <?php endif; ?>
    <script>
        $(function () {
            $(".js-login").on('click', function (event) {
                event.preventDefault();
                toastr.warning('Bạn cần đăng nhập');
            })
            $(window).bind("load", function () {
                jQuery("#status").fadeOut();
                jQuery("#loader").fadeOut();
            });
        })
    </script>
</head>

<body>
<!-- Messenger Chat plugin Code -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v10.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    $(function(){
        $(".logo").on("click", function() {
            window.location.href="/"
        })
    })
</script>

<!-- Your Chat plugin code -->
<div class="fb-customerchat"
     attribution="page_inbox"
     page_id="103980634638551">
</div>
<?php echo $__env->make('layout.component.chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id='status'></div>
<div id='loader'></div>
<div id="header">
    <img src="<?php echo e(asset('view/img/logo.png')); ?>" alt="Logo" class="logo"/>
    <div class="wrp">
        <div id="menuMain">
            <ul>

            <li>
                 <a href="/" title="Home" class="logo" >TRANG CHỦ</a>
</li>
                <li>
                    <a href="javascript:" title="Máy lọc nước">MÁY LỌC NƯỚC</a>
                    <ul>
                        <li>
                            <div class="subMenu" style="width: 250px;">
                                <div class="group">
                                    <div class="item">
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($listcate->c_cate == 'watch'): ?>
                                                <a href="<?php echo e(route('get.category.detail',$listcate->c_slug.'-'.$listcate->id)); ?>"><?php echo e($listcate->c_name); ?></a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:" title="THIẾT BỊ LỌC NƯỚC">THIẾT BỊ LỌC NƯỚC</a>
                    <ul>
                        <li>
                            <div class="subMenu" style="width: 250px;">
                                <div class="group">
                                    <div class="item">
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($listcate->c_cate == 'glass'): ?>
                                                <a href="<?php echo e(route('get.category.detail',$listcate->c_slug.'-'.$listcate->id)); ?>"><?php echo e($listcate->c_name); ?></a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:" title="THIẾT BỊ ĐO">THIẾT BỊ ĐO</a>
                    <ul>
                        <li>
                            <div class="subMenu" style="width: 250px;">
                                <div class="group">
                                    <div class="item">
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($listcate->c_cate == 'accessories'): ?>
                                                <a href="<?php echo e(route('get.category.detail',$listcate->c_slug.'-'.$listcate->id)); ?>"><?php echo e($listcate->c_name); ?></a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

<div>
        <form action="<?php echo e(route('get.product.index')); ?>" class="frmSearch" method="get">
            <div class="flex">
                <input type="text" name="keyword" id="keyword" value="<?php echo e(Request('keyword')); ?>"
                       placeholder="Nhập từ khóa tìm kiếm..."/>
                <button class="btnSearch"><i class="fa fa-search"></i></button>
            </div>
        </form>
</div>

<div  id="menuMain">
        <ul class="menuRight dnTablet-l">
            <?php if(Auth::check()): ?>
            <li>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo e(pare_url_file(Auth::user()->avatar)); ?>" style="width:50px;height:50px;border-radius: 50%;cursor: pointer" alt="User profile picture">
                    <ul>
                        <li>
                            <div class="subMenu" style="width: 160px;">
                                <div class="group">
                                    <div class="item">
                                        <a href="<?php echo e(route('get.user.profile')); ?>"><?php echo e(Auth::user()->name); ?></a>
                                        <a href="<?php echo e(route('get.user.orders', ['status' => 0])); ?>" title="Home">Đơn hàng</a>
                                        <a href="<?php echo e(route('get.user.favourite')); ?>" title="Home">Sản phẩm yêu thích</a>
                                        <a href="<?php echo e(route('get.logout')); ?>">Đăng xuất</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="<?php echo e(route('get.login')); ?>">Đăng nhập</a></li>
                <li><a href="<?php echo e(route('get.register')); ?>">Đăng ký</a></li>
            <?php endif; ?>
        </ul>
    </div>
        <div class="right">
            <a href="<?php echo e(route('get.shopping.index')); ?>" class="btnCart" >
                <i class="fa fa-shopping-cart"></i>
                <span class="number"><?php echo e(Cart::count()); ?></span>
            </a>
        </div>
    </div>
</div>
<div class="zalo-chat-widget" data-oaid="3317742618024098879" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="300"> </div>

<script src="https://sp.zalo.me/plugins/sdk.js"> </script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v10.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="setup_tool"
     page_id="103980634638551">
</div>
<?php /**PATH D:\project\tesst\resources\views/layout/component/header.blade.php ENDPATH**/ ?>