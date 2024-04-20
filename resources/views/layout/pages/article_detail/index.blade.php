@extends('layout.home-page')
@section('content')

    <meta property="og:url" content="{{URL::current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ $article->a_name }}"/>
    <meta property="og:description" content="<?php $description=strip_tags(html_entity_decode($article->a_description));
echo substr($description,0,500)?>"/>
    <meta property="og:image" content="{{url('public/uploads/'.$article->a_avartar)}}"/>

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $article->a_name }}">
    <meta name="twitter:description" content="<?php $description=strip_tags(html_entity_decode($article->a_description));
echo substr($description,0,500)?>">
    <meta name="twitter:image" content="{{url('public/uploads/'.$article->a_avartar)}}">
    <meta name="twitter:domain" content="{{URL::current()}}">
    <div id="pageway" style="border-bottom: 5px solid #e5e5e5;">
        <div class="wrp">
            <ul>
                <li><a href="/" title="Home"><b>TRANG CHỦ</b></a></li>
                <li><a href="/" title="Tin Dong ho"><b>TIN TỨC - SỰ KIỆN</b></a></li>

                <li><a href="{{ route('get.blog.detail',$article->a_slug.'-'.$article->id )}}"
                       title="{{ $article->a_menu_id }}" style="color: #288ad6">{{ $article->a_menu_id }}</a></li>
            </ul>
        </div>
    </div>
    <div class="cb"></div>
    <div id="container">
        <div class="wrp">
            <div id="newslist">
                <ul class="lstCate">
                    <li class="{{ ($article->a_menu_id ?? '' )== 'EVENT' ? 'active' : '' }}">
                        <a href="javascript:;">EVENT</a></li>
                    <li class="{{ ($article->a_menu_id ?? '' )=='KIẾN THỨC ĐỒNG HỒ' ? 'active' : '' }}"><a
                                href="/tin-tuc/c-377/Kien-thuc-dong-ho.html" title="Kiến thức đồng hồ">Kiến thức đồng
                            hồ</a></li>
                    <li class="{{ ($article->a_menu_id ?? '' )=='KIẾN THỨC KÍNH MẮT' ? 'active' : '' }}"><a
                                href="/tin-tuc/c-464/Kien-thuc-kinh-mat.html" title="Kiến thức kính mắt">Kiến thức kính
                            mắt</a></li>
                    <li class="{{ ($article->a_menu_id ?? '' )=='HỎI ĐÁP VỀ ĐỒNG HỒ' ? 'active' : '' }}"><a
                                href="/tin-tuc/c-461/Hoi-dap-ve-dong-ho.html" title="Hỏi đáp về đồng hồ">Hỏi đáp về đồng
                            hồ</a></li>
                    <li class="{{ ($article->a_menu_id ?? '' )=='BÁO CHÍ VIẾT VỀ ĐĂNG QUANG' ? 'active' : '' }}"><a
                                href="/tin-tuc/c-465/Bao-chi-viet-ve-Dang-Quang.html"
                                title="Báo chí viết về Đăng Qu ang">Báo chí viết về Đăng Quang</a></li>

                </ul>
                <div class="flex">
                    <div class="left">
                        <h1 class="titleNews">{{ $article->a_name}} </h1><br>
                        <h2 class="sapo">{{ $article->a_description}}</h2>

                        <div class="noidung">
                            {!! $article->a_content !!}

                        </div>
                        <div class="cb"></div>

                    </div>
                    <div class="right">
                        <div class="newsRight1">
                            <a href="/tin-tuc/c-461/Hoi-dap-ve-dong-ho.html" title="Hỏi đáp về đồng hồ" class="title">Hỏi
                                đáp về đồng hồ</a>
                            <ul>
                                <li>
                                    <span class="stt">1</span>
                                    <a href="/tin-tuc/586/Top-10-cau-hoi-thuong-gap-ve-dong-ho-deo-tay.html"
                                       title="Top 10 câu hỏi thường gặp về đồng hồ đeo tay">Top 10 câu hỏi thường gặp về
                                        đồng hồ đeo tay</a>
                                </li>
                                <li>
                                    <span class="stt">2</span>
                                    <a href="/tin-tuc/585/Hoi-dap-ve-dong-ho:-Mat-kinh-dong-ho-deo-tay-co-bao-nhieu-loai.html"
                                       title="Hỏi đáp về đồng hồ: Mặt kính đồng hồ đeo tay có bao nhiêu loại?">Hỏi đáp
                                        về đồng hồ: Mặt kính đồng hồ đeo tay có bao nhiêu loại?</a>
                                </li>

                            </ul>
                        </div>

                        <div class="newsRight2">
                            <a href="#" title="" class="title">Tin tức nổi bật</a>
                            <div class="main">
                                <div class="wImage">
                                    <a href="/tin-tuc/724/DANG-QUANG-WATCH-Tung-Uu-Dai-Cuc-Khung:-Giam-Gia-Len-Toi-40.html"
                                       title="ĐĂNG QUANG WATCH Tung Ưu Đãi Cực Khủng: Giảm Giá Lên Tới 40%"
                                       class="image cover">
                                        <img data-src="https://www.dangquangwatch.vn/upload/article/839623206_109923588_3126180920833574_6779568917178664605_o-1.jpg"
                                             alt="tin tuc" class="lazy" src="/view/lazy.jpg"/>
                                    </a>
                                </div>
                                <a href="/tin-tuc/724/DANG-QUANG-WATCH-Tung-Uu-Dai-Cuc-Khung:-Giam-Gia-Len-Toi-40.html"
                                   title="" class="name">ĐĂNG QUANG WATCH Tung Ưu Đãi Cực Khủng: Giảm Giá Lên Tới
                                    40%</a>
                            </div>
                            <div class="group">
                                <div class="item">
                                    <div class="wImage">
                                        <a href="/tin-tuc/723/Sale-Up-To-30---Tang-Ngay-But-Ky-Cao-Cap.html"
                                           title="Sale Up To 30% - Tặng Ngay Bút Ký Cao Cấp" class="image cover">
                                            <img data-src="https://www.dangquangwatch.vn/upload/article/954937028_khuyen_mai_dang_quang.jpg"
                                                 alt="tin tuc" class="lazy" src="/view/lazy.jpg"/>
                                        </a>
                                    </div>
                                    <a href="/tin-tuc/723/Sale-Up-To-30---Tang-Ngay-But-Ky-Cao-Cap.html" title=""
                                       class="name">Sale Up To 30% - Tặng Ngay Bút Ký Cao Cấp</a>
                                </div>
                                <div class="item">
                                    <div class="wImage">
                                        <a href="/tin-tuc/722/Tai-sao-dong-ho-Thuy-Sy-lai-co-suc-hut-lon-den-vay.html"
                                           title="Tại sao đồng hồ Thụy Sỹ lại có sức hút lớn đến vậy"
                                           class="image cover">
                                            <img data-src="https://www.dangquangwatch.vn/upload/article/468980239_dong_ho_deo_tay.jpg"
                                                 alt="tin tuc" class="lazy" src="/view/lazy.jpg"/>
                                        </a>
                                    </div>
                                    <a href="/tin-tuc/722/Tai-sao-dong-ho-Thuy-Sy-lai-co-suc-hut-lon-den-vay.html"
                                       title="" class="name">Tại sao đồng hồ Thụy Sỹ lại có sức hút lớn đến vậy</a>
                                </div>
                                <div class="item">
                                    <div class="wImage">
                                        <a href="/tin-tuc/721/Uu-dai-hè-2020:-Nhan-kinh-mat-chinh-hang-hoan-toan-mien-phi-tai-Dang-Quang-Watch.html"
                                           title="Ưu đãi hè 2020: Nhận kính mắt chính hãng hoàn toàn miễn phí tại Đăng Quang Watch"
                                           class="image cover">
                                            <img data-src="https://www.dangquangwatch.vn/upload/article/1728275126_khuyen-mai.jpg"
                                                 alt="tin tuc" class="lazy" src="/view/lazy.jpg"/>
                                        </a>
                                    </div>
                                    <a href="/tin-tuc/721/Uu-dai-hè-2020:-Nhan-kinh-mat-chinh-hang-hoan-toan-mien-phi-tai-Dang-Quang-Watch.html"
                                       title="" class="name">Ưu đãi hè 2020: Nhận kính mắt chính hãng hoàn toàn miễn phí
                                        tại Đăng Quang Watch</a>
                                </div>
                                <div class="item">
                                    <div class="wImage">
                                        <a href="/tin-tuc/720/MUA-2-TINH-TIEN-MOT---UU-DAI-TANG-KINH-MAT-6-TRIEU-DONG.html"
                                           title="MUA 2 TÍNH TIỀN MỘT - ƯU ĐÃI TẶNG KÍNH MÁT 6 TRIỆU ĐỒNG "
                                           class="image cover">
                                            <img data-src="https://www.dangquangwatch.vn/upload/article/2064580736_tin-tuc2606.jpg"
                                                 alt="tin tuc" class="lazy" src="/view/lazy.jpg"/>
                                        </a>
                                    </div>
                                    <a href="/tin-tuc/720/MUA-2-TINH-TIEN-MOT---UU-DAI-TANG-KINH-MAT-6-TRIEU-DONG.html"
                                       title="" class="name">MUA 2 TÍNH TIỀN MỘT - ƯU ĐÃI TẶNG KÍNH MÁT 6 TRIỆU
                                        ĐỒNG </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="cb"></div>
        </div>
    </div>
@stop