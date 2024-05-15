<?php echo $__env->make('layout.component.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .d-none {
        display: none;
    }

    .updatecart {
        background-color: rgb(239, 239, 239);
        padding: 7px;
    }

    .position-relative {
        position: relative
    }

    input:enabled:read-write:-webkit-any(:focus, :hover)::-webkit-inner-spin-button {
        display: none
    }

    .js-increase {
        position: absolute;
        top: 0;
        cursor: pointer;
        font-size: 120%;
        margin-left: 20px;
    }

    .js-decrease {
        position: absolute;
        top: 0;
        cursor: pointer;
        margin: 10px;
        font-size: 150%;
        margin-left: 23px;
    }
</style>
<link rel="stylesheet" href="<?php echo e(asset('view/css/cart.css')); ?>">
<div id="pageway" >
    <div class="wrp">
        <ul>
            <li><a href="<?php echo e(route('get.home' )); ?>"><b>TRANG CHỦ</b></a></li>
            <li><a href="javascript://" style="color: #288ad6"><b>GIỎ HÀNG</b></a></li>
        </ul>
    </div>
</div>
</div>
<div id="container">
    <div class="wrp">
        <div id="product" class="cart">
            <div class="flex">
                <div class="left">
                    <div class="cart_header" style="text-align: center;color: #288ad6;">THÔNG TIN GIỎ HÀNG(
                        <span class="number"><?php echo e(\Cart::count()); ?></span> sản phẩm)
                    </div>
                    <form name="frm_cart" action="" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="tableCart">
                            <div class="row row1">
                                <div class="col col1"></div>
                                <div class="flex flex_1">
                                    <div class="col col2 dnmobile">Sản phẩm</div>
                                    <div class="flex flex_1 dnmobile">
                                        <div class="col col3">Giá</div>
                                        <div class="col col4">Số lượng</div>
                                        <div class="col col5">Thành tiền</div>
                                        <div class="col col6"></div>
                                    </div>
                                </div>
                            </div>
                            <?php $__currentLoopData = $shopping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <nav>
                                    <div class="row row2">
                                        <div class="col col1">
                                            <div class="wImage">
                                                <a href="<?php echo e(route('get.product.detail',Str::slug($cart->name).'-'.$cart->id )); ?>"
                                                   class="image">
                                                    <img src="<?php echo e($cart->options->image); ?>"/>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="flex flex_1">
                                            <div class="col col2">
                                                <a href="<?php echo e(route('get.product.detail',Str::slug($cart->name).'-'.$cart->id )); ?>"
                                                   class="fHelveticaNeueB"><?php echo e($cart->name); ?>

                                                </a>
                                            </div>
                                            <div class="col col3">
                                            <span class="fs16">
                                                <p><b><?php echo e(number_format($cart->price,0,',','.')); ?>

                                                    </b>
                                                </p>
                                                <?php if($cart->options->sale): ?>
                                                    <p
                                                            style="background: #F00;padding: 5px 5px;color: #FFF;border-radius: 25px;text-transform: uppercase;font-weight: bold;width: 80px;text-align: center;">
                                                    - <?php echo e($cart->options->sale); ?> %</p>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col col4">
                                                <span class="dn dibmobile pr4">Số lượng: </span>
                                                <div class="position-relative">
                                                    <input type="number" min="1" class="input_quantity" name="qty"
                                                           value="<?php echo e($cart->qty); ?>" id="qty"/>
                                                    <p data-price="<?php echo e($cart->price); ?>"
                                                       data-url="<?php echo e(route('ajax_get.shopping.update',$key)); ?>"
                                                       data-id-product="<?php echo e($cart->id); ?>">
                                                        <span class="js-increase">+</span>
                                                        <span class="js-decrease">-</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col col5">
                                                <span class="dn dibmobile pr4">Thành tiền: </span>
                                                <div class="fs16 fwb js-total-item">
                                                    <?php echo e(number_price($cart->price*$cart->qty ,$cart->options->sale)); ?>

                                                        <?php
                                                        $total += (($cart->price * $cart->qty) * (100 - $cart->options->sale)) / 100;
                                                        ?>
                                                </div>
                                            </div>
                                            <div class="col col6">
                                                <a href="<?php echo e(route('get.shopping.delete',$key)); ?>">
                                                    <img src="<?php echo e(asset('view/img/delete.jpg')); ?>">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="btnCartGroup tac" style="margin-top: 30px;">
                            <a href="<?php echo e(route('get.home')); ?>" class="btnCart"
                               style="background: #3498db;padding: 10px 15px;color: #FFF;border-radius: 25px;text-transform: uppercase;">Mua
                                thêm sản phẩm khác <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </form>
                </div>
                <div class="infoDatHang flex_1">
                    <div class="group">
                        <div class="c000 fSFUHelveticaCondensedBold ttu fs20 pb20"
                             style="text-align: center;color: #288ad6;">THÔNG TIN LIÊN HỆ
                        </div>
                        <p class="fsti pb10 tac">Lưu ý: Các ô có dấu <span class="cRed">(*)</span> cần điền đầy đủ thông
                            tin</p>
                        <div class="form">
                            <form class="from_cart_register" action="<?php echo e(route('post.shopping.pay')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="item">
                                    <p class="label">Họ và tên <span class="cRed">(*)</span></p>
                                    <input type="text" name="tst_name" value="<?php echo e(get_data_user('web','name')); ?>"
                                           id="tst_name" autocomplete="off" placeholder="Nhập họ tên" required/>
                                </div>
                                <div class="item">
                                    <p class="label">Điện thoại <span class="cRed">(*)</span></p>
                                    <input type="text" name="tst_phone" value="<?php echo e(get_data_user('web','phone')); ?>"
                                           id="tst_phone" autocomplete="off" placeholder="Nhập điện thoại" required/>
                                </div>
                                <div class="item">
                                    <p class="label">Địa chỉ <span class="cRed">(*)</span></p>
                                    <input type="text" name="tst_address" value="Hà Nội" id="tst_address"
                                           autocomplete="off" placeholder="Nhập địa chỉ" required/>
                                </div>
                                <div class="item">
                                    <p class="label">Email</p>
                                    <input type="text" name="tst_email" value="<?php echo e(get_data_user('web','email')); ?>"/>
                                </div>
                                <div class="item">
                                    <p class="label">Nội dung</p>
                                    <textarea name="tst_note" cols="" rows="2">Không có</textarea>
                                </div>

                                <input type="hidden" name="amount" id="amount" value="<?php echo e($total); ?>">

                                <div class="totalPrice">Thanh toán: <span id="totalPrice"
                                                                          style="font-size: 30px;color: red;margin-left: 30px;"><?php echo e(number_price($total,0)); ?></span>
                                    VNĐ
                                </div>
                                <div>
                                </div>
                                <div class="btnThanhToan" style="margin-top:10px">
                                    <button class="tac" type="submit" value="1" name="submit">
                                        <p class="ttu fHelveticaNeueB fs15">ĐẶT HÀNG THANH TOÁN SAU</p>
                                        <p>(Trả tiền khi nhận hàng tại nhà)</p>
                                    </button>

                                    <button class="tac" type="submit" value="2" name="submit">
                                        <p class="ttu fHelveticaNeueB fs15">Thanh toán online</p>
                                        <p>(MOMO)</p>
                                    </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo $__env->make('layout.component.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        $('.updatecart').on('click', function (event) {
            event.preventDefault();
            $this = $(this);
            let url = $this.attr('href');
            let qty = $("#qty").val();
            let idProduct = $this.attr('data-id-product');

            if (url) {
                $.ajax({
                    url: url,
                    data: {
                        qty: qty,
                        idProduct: idProduct
                    }
                }).done(function (results) {
                    if (results.messages) {
                        toastr.warning(results.messages);
                    } else {
                        window.location.reload();
                    }
                });
            }
        })

        $('.js-increase').click(function () {
            let $this = $(this);
            let $input = $this.parent().prev();
            let number = parseInt($input.val());
            let price = $this.parent().attr('data-price');
            let URL = $this.parent().attr('data-url');
            let IdProduct = $this.parent().attr('data-id-product');
            number = number + 1;
            var total = $('#amount').val();
            $('#amount').val(parseInt(total) + parseInt(price));
            $.ajax({
                url: URL,
                data: {
                    qty: number,
                    idProduct: IdProduct
                }
            }).done(function (results) {
                if (typeof results.totalMoney !== "underfined") {
                    $(".number").text(results.number);
                    $this.parents('nav').find(".js-total-item").text(results.totalItem + "đ");
                    $('#totalPrice').text(results.totalMoney);
                } else {
                    $input.val(number - 1);
                }

                $input.val(number);
            })
        })
        $('.js-decrease').click(function () {
            let $this = $(this);
            let $input = $this.parent().prev();
            let number = parseInt($input.val());
            let price = $this.parent().attr('data-price');
            let URL = $this.parent().attr('data-url');
            var total = $('#amount').val();
            $('#amount').val(parseInt(total) - parseInt(price));
            if (number <= 1) {
                toastr.warning("Số sản phẩm không được bằng 0");
                return false;
            }
            let IdProduct = $this.parent().attr('data-id-product');
            number = number - 1;

            $.ajax({
                url: URL,
                data: {
                    qty: number,
                    idProduct: IdProduct
                }
            }).done(function (results) {
                if (typeof results.totalMoney !== "underfined") {
                    $input.val(number);
                    $this.parents('nav').find(".js-total-item").text(results.totalItem + "đ");
                    $(".number").text(results.number);
                    $('#totalPrice').text(results.totalMoney);
                } else {
                    $input.val(number + 1);
                }
            })
        })
    })
</script>
<?php /**PATH D:\project\tesst\resources\views/layout/pages/cart/index.blade.php ENDPATH**/ ?>