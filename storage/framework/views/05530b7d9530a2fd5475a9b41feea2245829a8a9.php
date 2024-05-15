<?php echo $__env->make('layout.component.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<title><?php echo e($product->pro_name); ?></title>
<div id="product">
    <div class="wrp">
        <div class="nameCate lsh">
            <a href="javascript://" class="name"><?php echo e($product->pro_name); ?> </a>
        </div>
        <div class="detailPro">
            <div class="top">
                <div class="left">
                    <div class="imgLarge">
                        <div class="img imgSmall">
                            <div class="wImage">
                                <a href="javascript://" class="image">
                                    <img src="<?php echo e($product->pro_avatar); ?>"/>
                                </a>
                            </div>
                        </div>
                        <?php if(isset($image)): ?>
                            <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="img imgSmall">
                                <div class="wImage">
                                    <a href="javascript://" class="image">
                                        <img src="<?php echo e(pare_url_file($item->al_slug)); ?>"/>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right">
                    <h1 style="position:relative"><a href="javascript://" class="namePro"><?php echo e($product->pro_name); ?></a> <i
                                class="fa fa-eye"></i>&nbsp; <?php echo e($product->pro_view); ?>

                        <a href="<?php echo e(route('ajax_get.user.favourite', $product->id)); ?>"
                           class="<?php echo e(!Auth::id() ? 'js-login' :''); ?> js-add-favourite"><i
                                    class="<?php echo e(!$user_favourite ?'fa fa-heart-o' : 'fa fa-heart red'); ?>"></i></a>&nbsp;<div
                                class="favourite"
                                style="position: absolute;bottom: 0;margin-left: 60px;"> <?php echo e($product->pro_favourite); ?></div>
                    </h1>
                    <div class="price">
                        <div class="price1">
                            <span class="text">Giá niêm yết </span>
                            <span class="numb cc4161c"><?php echo e(number_price($product->pro_price,$product->pro_sale)); ?>đ</span>
                            <?php if($product->pro_sale > 0): ?>
                                <span class="numb cc4161c"
                                      style="text-decoration: line-through;position: absolute;padding: 20px 150px;"><?php echo e(number_format($product->pro_price,0,',','.')); ?>đ</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <h3 class="descript">
                        <div class="item">
                            <span class="text">Số lượng</span>
                            <span class="num"><?php echo e($product->pro_amount); ?></span>
                        </div>
                        <div class="item">
                            <span class="text">Danh mục</span>
                            <span class="num"><?php echo e($product->category->c_name); ?></span>
                        </div>
                        <div class="item">
                            <span class="text">Nhà cung cấp</span>
                            <span class="num"><?php echo e($product->admin->name); ?></span>
                        </div>
                        <div class="item">
                            <span class="text">Đã bán</span>
                            <span class="num"><?php echo e($product->pro_pay); ?></span>
                        </div>
                    </h3>
                    <div class="btnCart" style="display: flex">
                        <a class="muangay" href="<?php echo e(route('get.shopping.add',$product->id)); ?>">
                            <span>Thêm vào giỏ </span>
                        </a>
                        <a class="muangay"  style="background: #fed700; margin-left:24px" href="<?php echo e(route('get.shopping.add',[
          'type'=> 2,
          'id'=> $product->id,
          ])); ?>">
                            <span>Mua ngay</span>
                        </a>
                    </div>

                    <?php
                        $tags=explode(",",$product->keywordseo)
                    ?>
                    <?php if(count($tags)>1): ?>
                        <legend>Từ khóa</legend>
                        <p><i class="fa fa-tag"></i>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="javascript:" style=" color: #00d4c0 !important;font-size:20px"># <?php echo e($tag); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </p>
                </div>
            </div>
            <div class="bot">
                <div class="detail">
                    <div class="otherPro slideRes">
                        <h3 class="title">Có thể bạn sẽ thích</h3>
                        <div class="group">
                            <?php $__currentLoopData = $productSuggest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('layout.pages.product_detail.product_relate',['product'=>$productList], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="dn dbTablet">
                        <div class="thongsokythuat">
                            <div class="titleR"><?php echo e($product->pro_name); ?></div>
                            <div class="group">
                                <div class="item">
                                    <p class="text1">Vật liệu</p>
                                    <p class="text2"><a href="javarscript://">Sứ</a></p>
                                </div>
                                <div class="item">
                                    <p class="text1">Kích thước</p>
                                    <p class="text2"><a href="javarscript://">D360 - R360 - C65 mm</a></p>
                                </div>
                                <div class="item">
                                    <p class="text1">Hàng có sẵn</p>
                                    <p class="text2">Xem cửa hàng trưng bày</p>
                                </div>
                                <div class="item">
                                    <p class="text1">Mã</p>
                                    <p class="text2">3*111699 </p>
                                </div>
                                <div class="item">
                                    <p class="text1">Danh mục</p>
                                    <p class="text2"><?php echo e($product->category->c_name); ?></p>
                                </div>
                                <div class="item">
                                    <p class="text1">Giao hàng</p>
                                    <p class="text2">Miễn phí trên toàn quốc</p>
                                </div>
                                <div class="item">
                                    <p class="text1">Xuất xứ</p>
                                    <p class="text2">China</p>
                                </div>
                                <div class="item">
                                    <p class="text1">Chế độ bảo hành</p>
                                    <p class="text2">Bảo hành quốc tế <b>10</b> năm</p>
                                </div>
                            </div>
                        </div>

                        <div class="box_policy">
                            <div class="fs14">
                                <img class="mr-1" src="/view/css/icon/box.png" height="17">
                                Sản phẩm Fullbox:
                            </div>
                            <div style="display: flex;padding-top: 5px;font-style: italic;">
                                <a class="name" href="javascript://"> <span>
                              Hộp đựng, thẻ bảo hành quốc tế, thẻ khách hàng thân thiết, khăn lau (đối với kính mắt)</span>
                                </a>
                            </div>
                            <div class="pt10 fs14">
                                <img class="mr-1" src="/view/css/icon/bh10.png" height="17">
                                <a class="name" href="/chinh-sach-chung/2/1.-Chinh-sach-bao-hanh.html">
                                    Chế độ bảo hành 10 năm <span>(Xem chi tiết)</span>
                                </a>
                            </div>
                            <div class="pt10 fsfs1416">
                                <img class="mr-1" src="/view/css/icon/doi.png" height="17">
                                <a class="name" href="javascript://">
                                    30 ngày đổi sản phẩm miễn phí.
                                </a>
                            </div>
                            <div class="pt10 fs14">
                                <img class="mr-1" src="/view/css/icon/ship.png" height="17">
                                <a class="name" href="javascript://">
                                    Giao miễn phí, nhận hàng kiểm tra trước khi thanh toán
                                </a>
                            </div>
                            <div class="pt10 fs14">
                                <img class="mr-1" src="/view/css/icon/vat.png" height="17">
                                <a class="name" href="javascript://">
                                    Chính hãng 100% - xuất hoá đơn VAT
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="detailRight">
                    <div class="dntablet">
                        <div class="thongsokythuat">
                            <div class="titleR"><?php echo e($product->pro_name); ?></div>
                            <div class="group">
                                <div class="item">
                                    <p class="text1">Vật liệu</p>
                                    <p class="text2"><a href="javarscript://">Sứ</a></p>
                                </div>
                                <div class="item">
                                    <p class="text1">Kích thước</p>
                                    <p class="text2"><a href="javarscript://">D360 - R360 - C65 mm</a></p>
                                </div>
                                <div class="item">
                                    <p class="text1">Hàng có sẵn</p>
                                    <p class="text2">Xem cửa hàng trưng bày</p>
                                </div>
                                <div class="item">
                                    <p class="text1">Mã</p>
                                    <p class="text2">3*111699 </p>
                                </div>
                                <div class="item">
                                    <p class="text1">Danh mục</p>
                                    <p class="text2"><?php echo e($product->category->c_name); ?></p>
                                </div>
                                <div class="item">
                                    <p class="text1">Giao hàng</p>
                                    <p class="text2">Miễn phí trên toàn quốc</p>
                                </div>
                                <div class="item">
                                    <p class="text1">Xuất xứ</p>
                                    <p class="text2">China</p>
                                </div>
                                <div class="item">
                                    <p class="text1">Chế độ bảo hành</p>
                                    <p class="text2">Bảo hành quốc tế <b>10</b> năm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="block-ud2glzu2WR1" class="pdp-block fixed-width-full  block-margin-top background-2">
    <div id="module_product_review" class="pdp-block module">
        <div class="pdp-mod-review">
            <div class="mod-title">
                <h2 class="pdp-mod-section-title outer-title">Đánh giá và nhận xét của <?php echo e($product->pro_name); ?></h2>
            </div>
            <div class="mod-rating">
                <div class="content">
                    <div class="left">
                        <div class="summary">
                            <div class="score"><span class="score-average"><?php echo e(round($product->star,2)); ?></span><span
                                        class="score-max">/5</span></div>
                            <div class="average">
                                <div class="container-star " style="width: 166.25px; height: 33.25px;">
                                    <?php if($product->star==0): ?>
                                        <img class="star"
                                             src="//laz-img-cdn.alicdn.com/tfs/TB18ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png"
                                             style="width: 33.25px; height: 33.25px;">
                                        <img class="star"
                                             src="//laz-img-cdn.alicdn.com/tfs/TB18ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png"
                                             style="width: 33.25px; height: 33.25px;">
                                        <img class="star"
                                             src="//laz-img-cdn.alicdn.com/tfs/TB18ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png"
                                             style="width: 33.25px; height: 33.25px;">
                                        <img class="star"
                                             src="//laz-img-cdn.alicdn.com/tfs/TB18ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png"
                                             style="width: 33.25px; height: 33.25px;">
                                        <img class="star"
                                             src="//laz-img-cdn.alicdn.com/tfs/TB18ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png"
                                             style="width: 33.25px; height: 33.25px;">
                                    <?php else: ?>
                                        <?php for($i=1;$i<= $product->star;$i++): ?>
                                            <img class="star"
                                                 src="//laz-img-cdn.alicdn.com/tfs/TB19ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png"
                                                 style="width: 33.25px; height: 33.25px;">
                                        <?php endfor; ?>

                                        <?php if( $product->star < 5): ?>
                                            <?php for($i=$product->star+ 1;$i<=5;$i++): ?>
                                                <img class="star"
                                                     src="//laz-img-cdn.alicdn.com/tfs/TB18ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png"
                                                     style="width: 33.25px; height: 33.25px;">
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="count"> <?php echo e($product->star); ?> đánh giá</div>
                        </div>
                        <?php $__currentLoopData = $ratingDefault; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $ageItem=0;
                                if($product->star >0)
                                $ageItem = round(($item['count_number'] / $product->star) *100,2);
                            ?>
                            <div class="detail">
                                <ul>
                                    <li>
                                        <div class="container-star progress-title"
                                             style="width: 79.8px; height: 15.96px;">
                                            <?php for($i =1;$i<=$key;$i++): ?>
                                                <img class="star"
                                                     src="//laz-img-cdn.alicdn.com/tfs/TB19ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png">
                                            <?php endfor; ?>
                                            <?php for($j=5;$j>$key;$j--): ?>
                                                <img class="star"
                                                     src="//laz-img-cdn.alicdn.com/tfs/TB18ZvEgfDH8KJjy1XcXXcpdXXa-64-64.png">
                                            <?php endfor; ?>
                                        </div>
                                        <span class="progress-wrap">
                              <div class="pdp-review-progress">
                                 <div class="bar bg"></div>
                                 <div class="bar fg" style="width: <?php echo e($ageItem); ?>%"></div>
                              </div>
                           </span>
                                        <span class="percent"> <?php echo e($item['count_number']); ?></span>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div>
                <div class="pdp-mod-filterSort">
                    <span class="title">Nhận xét về sản phẩm</span>
                    <div class="oper">
                        <span>Lọc:</span>
                        <?php
                            $number='Tất cả';
                            for($i=5;$i>=1;$i--)
                            if(Request::get('s') == $i){
                            $number =$i;
                            break;
                            }
                        ?>
                        <span class="condition"><?php echo e($number); ?> Sao</span>
                        <div class="next-menu next-overlay-inner expandInDown ">
                            <ul class="next-menu-content" style="color: black;">
                                <li class="<?php echo e(Request::get('s') ==6 ?'active' : ''); ?>"><a
                                            href="<?php echo e(route('get.product.detail',$product->pro_slug.'-'.$product->id )); ?>">Tất
                                        cả Sao</a></li>
                                <?php for($i=5;$i>=1;$i--): ?>
                                    <li class="<?php echo e(Request::get('s') == $i ?'active' : ''); ?>"><a
                                                href="<?php echo e(request()->fullUrlWithQuery(['s'=>$i])); ?>"><?php echo e($i); ?> Sao</a></li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="oper" style="margin-top:-5px"><span
                                class="lazada lazada-is-sort lazada-icon oper-icon"></span><span>Sắp xếp:</span><span
                                class="condition">Liên quan</span></div>
                </div>
            </div>
            <div class="review_list">
                <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value =>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('layout.pages.product_detail.ratings',['rating'=>$item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="pagination-link">
                    <?php echo $ratings->appends($query ?? [])->links(); ?>

                </div>
            </div>

            <?php if(isset(Auth::user()->id)): ?>
                <div id="block-review">
                    <form action="<?php echo e(route('ajax_post.user.rating.add')); ?>" class="form-question" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="item">
                            <br><br>
                            <div id="module_product_qna" class="pdp-block module">
                                <div class="mod-title">
                                    <div class="pdp-mod-section-title outer-title">Phản hồi của bạn về sản phẩm này
                                    </div>
                                    <br><br>
                                    <div class="top">
                                        <div class="container-star starCtn left" id="ratings"
                                             style="width: 223.125px; height: 16.625px;">
                                            <?php for($i=1;$i<=5;$i++): ?>
                                                <i class="fa fa-star opacity cursor" style="zoom:2" data-i=<?php echo e($i); ?>></i>
                                            <?php endfor; ?>
                                            <span id="review_text"></span>
                                            <input type="hidden" id="review_value" name="review" value="5">
                                            <input type="hidden" id="product_id" name="product_id"
                                                   value="<?php echo e($product->id); ?>">
                                        </div>
                                    </div>
                                    <div class="pdp-mod-qna">
                                        <div class="qna-ask-box-container">
                                            <div class="qna-ask-box folded">
                                                <span class="next-input next-input-single next-input-medium qna-ask-input"><input
                                                            type="text" placeholder="Viết câu hỏi của bạn ở đây"
                                                            value="" name="content" maxlength="300"
                                                            height="100%"></span>
                                                <button type="submit"
                                                        class=" cursor next-btn next-btn-primary next-btn-medium qna-ask-btn js-process-view">
                                                    ĐẶT CÂU HỎI
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
                <?php if(!$rating): ?>
                    <span class="lazada lazada-noReview lazada-icon qna-empty-icon"></span>
                    <div class="qna-empty-text">Chưa có câu hỏi cho sản phẩm này.</div>
                    <div class="qna-empty-text">Đặt câu hỏi cho nhà bán hàng và câu trả lời sẽ được hiển thị tại đây
                    </div>
                <?php else: ?>
                    <div class="qna-section-title">Câu hỏi của tôi</div>
                    <ul class="qna-list">
                        <div class="review_list_personal"></div>
                        <?php $__currentLoopData = $rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value =>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('layout.pages.product_detail.personal_rating',['rating'=>$item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $rating->links(); ?>

                        <br><br><br>
                    </ul>
                <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
</div>
</div>
</div>
</div>
<div id="SupInfo">
    <div class="wrp">
        <div class="left">
            <div class="item">
                <p class="head">Hotline </p>
                <a href="tel:18006005" class="tel">
                <i class="fa fa-phone" style="padding-right:10px"></i>1800.6005
                </a>
            </div>
            <div class="item">
                <p class="head">Gọi đặt hàng</p>
                <a href="tel:0985681189" class="tel">
                <i class="fa fa-phone" style="padding-right:10px"></i>098.568.1189
                </a>
            </div>
        </div>
        <div class="right">
            <div class="mail">
                <p class="fs17 ttu mb10">Đăng ký nhận thông tin mới</p>
                <div id="frmMail">
                    <input type="text" value="" placeholder="Nhập email của bạn tại đây"/>
                    <a href="javascript://" class="btnRegis">Đăng ký</a>
                </div>
            </div>
            <div class="social">
                <p class="fs17 ttu mb10">Kết nối mạng xã hội </p>
                <ul>
                    <li><a rel="nofollow" href="javascript:" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                    <li><a rel="nofollow" href="javascript:" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a rel="nofollow" href="javascript:" target="_blank"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layout.component.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(function () {
        $('.js-add-favourite').click(function (event) {
            event.preventDefault();
            let $this = $(this);
            let URL = $this.attr('href');
            if (URL) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: URL
                }).done(function (result) {
                    if (result.status == 1) {
                        $('.js-add-favourite i').removeClass('fa-heart-o');
                        $('.js-add-favourite i').addClass('fa-heart');
                        $('.js-add-favourite i').addClass('red');
                    } else if (result.status == 2) {
                        $('.js-add-favourite i').removeClass('fa-heart');
                        $('.js-add-favourite i').removeClass('red');
                        $('.js-add-favourite i').addClass('fa-heart-o');

                    }
                    $this.parents('h1').find('.favourite').text(result.count);

                })
            }
        });

        let $item = $("#ratings i");
        let arrTextRating = {
            1: "Rất tồi tệ",
            2: "Tồi tệ",
            3: "Tốt",
            4: "Xuất sắc",
            5: "Tuyệt vời"
        };
        $item.mouseover(function () {
            let $this = $(this);
            let $i = $this.attr('data-i');
            $("#review_value").val($i);
            $item.removeClass('r-active');
            $item.each(function (key, value) {
                if (key + 1 <= $i) {
                    $(this).addClass('r-active');
                }
            })
            $("#review_text").addClass('review_text');
            $("#review_text").text(arrTextRating[$i]);
        });
        $(".js-process-view").click(function (event) {
            event.preventDefault();
            let URL = $(this).parents('form').attr('action');
            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: URL,
                data: $('.form-question').serialize()
            }).done(function (result) {
                $('.form-question')[0].reset();
                console.log(result.html);
                if (result.html) {
                    $(".review_list").prepend(result.html);
                    $(".review_list_personal").prepend(result.personal);
                }
                swal(result.messages, "", "success");
            })
        });


        $("body").on('click', '.pagination a', function (event) {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            let URL = $(this).attr('href');
            var myurl = URL;
            var page = URL.split('page=')[1];

            getRatingList(page);
        });

        function getRatingList(page) {
            $.ajax({
                type: "GET",
                url: '?page=' + page
            })
                .success(function (results) {
                    $(".review_list_personal").html(results.html);
                });
        }
    })
</script>
<?php /**PATH D:\project\tesst\resources\views/layout/pages/product_detail/index.blade.php ENDPATH**/ ?>