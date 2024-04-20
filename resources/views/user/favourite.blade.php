@extends('layout.user')
@section('profile')

    <link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/checkout/1.3.17/pages/wishlist/index.css">
    <div class="lzd-playground-right">
        <div class="breadcrumb">
            <a class="first " href="#">Danh sách yêu thích (1)</a>
        </div>
        <div id="container" class="container">
            <div class="wishlist-container">
                <div class="mod-header-tab"><a href="{{route('get.user.favourite') }}" class="active">Danh sách yêu
                        thích<span>(1)</span></a> <a href="#" class="">Sản phẩm đã theo dõi</a></div>
                <div>
                    <div>
                        <div class="wishlist-mod">
                            <div class="mod-title">Danh sách theo dõi</div>
                            <div class="shops">
                                @foreach($products as $list)
                                    <div class="shop-items">
                                        <div class="mod-main">
                                            <div class="wishlist-item">
                                                <div class="info">
                                                    <div class="pic"><a
                                                                href=" {{ route('get.category.detail',$list->id)}}"
                                                                target="_blank" rel="noopener noreferrer"><img
                                                                    src="{{ $list->pro_avatar }}" width="80" height="80"
                                                                    style="object-fit:cover"></a></div>
                                                    <div><a class="title"
                                                            href="{{ route('get.category.detail',$list->id)}}">{{ $list->pro_name }}</a>
                                                    </div>
                                                    <div class="sku"></div>
                                                    <div class="oper"><span><span
                                                                    class="lazada lazada-ic-Delete lazada-icon icon-delete"></span></span>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    @if($list->pro_sale)
                                                        <div class="currPrice">
                                                            ₫ {{ number_format($list->pro_price,$list->pro_sale )}}</div>
                                                        <div class="originPrice"><span
                                                                    class="origin-price-value">₫ {{ number_format($list->pro_price,0) }}</span><span
                                                                    class="promotion">-{{ $list->pro_sale}}%</span>
                                                        </div>
                                                    @else
                                                        <div class="currPrice">
                                                            ₫ {{ number_format($list->pro_price,0)}}</div>

                                                    @endif
                                                </div>
                                                <div class="right-oper"><img
                                                            src="//laz-img-cdn.alicdn.com/tfs/TB1iUYumfDH8KJjy1XcXXcpdXXa-144-64.png"
                                                            width="72" height="32"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop