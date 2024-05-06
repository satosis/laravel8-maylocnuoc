<!DOCTYPE html>
<html lang="vi" xml:lang="vi">
<head>
    <!--CSS-->
    <title>{{ $title_page ?? 'Đồng hồ Thụy Sỹ, đồng hồ nam, đồng hồ nữ chính hãng cao cấp' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('view/css/display.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('view/css/chat.css') }}" rel="stylesheet"/>
    <link href="{{ asset('view/css/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('view/js/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('view/js/Lightbox/lightbox.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('view/js/slick/slick.css') }}" rel="stylesheet"/>
    <link href="{{ asset('view/css/Common.css') }}" rel="stylesheet"/>
    <!--CSS Responsive-->
    <link href="{{ asset('view/css/css_rwd_common.css') }}" rel="stylesheet"/>
    <link href="{{ asset('view/css/css_rwd.min.css') }}" rel="stylesheet"/>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <link href="{{ asset('view/css/dqw.css') }}" rel="stylesheet"/>
    <link href="{{ asset('view/css/news_css_rwd.css') }}" rel="stylesheet"/>
    <!-- toastr -->
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <!-- jquery -->
    <script src="{{ asset('view/js/jquery-1.9.1.min.js') }}"></script>

    <script src="{{ asset('view/js/stv_new.js') }}"></script>
    <link rel="shortcut icon" href="https://www.dangquangwatch.vn/view/favicon.ico" type="image/x-icon"/>
    @if(session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{session('toastr.type') }}";
            var MESSAGE = "{{session('toastr.message') }}";

        </script>
    @endif
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
</script>

<!-- Your Chat plugin code -->
<div class="fb-customerchat"
     attribution="page_inbox"
     page_id="103980634638551">
</div>
@include('layout.component.chat')
<div id='status'></div>
<div id='loader'></div>
<div id="header">
    <img src="{{ asset('view/img/logo.png') }}" alt="Logo" class="logo"/>
    <div class="wrp">
        <div id="menuMain">
            <ul>

            <li>
                 <a href="/" title="Home" class="logo" >TRANG CHỦ</a>
</li>
                <li class="hasChild">
                    <a href="javascript:" title="Máy lọc nước">MÁY LỌC NƯỚC</a>
                    <ul>
                        <li>
                            <div class="subMenu" style="width: 250px;">
                                <div class="group">
                                    <div class="item">
                                        @foreach($category as $listcate)
                                            @if($listcate->c_cate == 'watch')
                                                <a href="{{ route('get.category.detail',$listcate->c_slug.'-'.$listcate->id) }}">{{ $listcate->c_name}}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="hasChild">
                    <a href="javascript:" title="THIẾT BỊ LỌC NƯỚC">THIẾT BỊ LỌC NƯỚC</a>
                    <ul>
                        <li>
                            <div class="subMenu" style="width: 250px;">
                                <div class="group">
                                    <div class="item">
                                        @foreach($category as $listcate)
                                            @if($listcate->c_cate == 'glass')
                                                <a href="{{ route('get.category.detail',$listcate->c_slug.'-'.$listcate->id) }}">{{ $listcate->c_name}}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="hasChild">
                    <a href="javascript:" title="THIẾT BỊ ĐO">THIẾT BỊ ĐO</a>
                    <ul>
                        <li>
                            <div class="subMenu" style="width: 250px;">
                                <div class="group">
                                    <div class="item">
                                        @foreach($category as $listcate)
                                            @if($listcate->c_cate == 'accessories')
                                                <a href="{{ route('get.category.detail',$listcate->c_slug.'-'.$listcate->id) }}">{{ $listcate->c_name}}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

<div>
        <form action="{{ route('get.product.index') }}" class="frmSearch" method="get">
            <div class="flex">
                <input type="text" name="keyword" id="keyword" value="{{ Request('keyword') }}"
                       placeholder="Nhập từ khóa tìm kiếm..."/>
                <button class="btnSearch"><i class="fa fa-search"></i></button>
            </div>
        </form>
</div>

<div  id="menuMain">
        <ul class="menuRight dnTablet-l">
            @if (Auth::check())
            <li class="hasChild">
                <a href="{{ route('get.user.profile')}}">
                    <img class="profile-user-img img-responsive img-circle" src="{{ pare_url_file(Auth::user()->avatar) }}" style="width:50px;height:50px;border-radius: 50%;" alt="User profile picture">
                </a>
                    <ul>
                        <li>
                            <div class="subMenu" style="width: 250px;width: 160px;padding: 15px;">
                                <div class="group">
                                    <div class="item">
                                        <a href="{{ route('get.user.profile')}}">{{Auth::user()->name}}</a>
                                        <a href="{{ route('get.user.orders', ['status' => 0]) }}" title="Home">Đơn hàng</a>
                                        <a href="{{ route('get.user.favourite') }}" title="Home">Sản phẩm yêu thích</a>
                                        <a href="{{ route('get.logout') }}">Đăng xuất</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('get.login') }}">Đăng nhập</a></li>
                <li><a href="{{ route('get.register') }}">Đăng ký</a></li>
            @endif
        </ul>
    </div>
        <div class="right">
            <a href="{{ route('get.shopping.index')}}" class="btnCart" >
                <i class="fa fa-shopping-cart"></i>
                <span class="number">{{  Cart::count() }}</span>
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
