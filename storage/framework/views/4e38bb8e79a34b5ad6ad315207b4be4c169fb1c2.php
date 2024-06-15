<link rel="stylesheet" href="<?php echo e(asset('view/css/style.css')); ?>">

<div class="row">
    <form action="" role="form" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="col-md-8">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin cơ bản</h3>
                </div>
                <div class="box-body">
                    <div class="form-group <?php echo e($errors->first('pro_name') ?'has-error' : ''); ?>"><label for="email">Tên sản
                            phẩm</label>
                        <input type="text" class="form-control" name="pro_name" id="email"
                               value="<?php echo e($product->pro_name ?? old('pro_name')); ?>" placeholder="Iphone 5s..."
                               autocomplete="off">
                        <?php if($errors->first('pro_name')): ?>
                            <p class="text-danger"><?php echo e($errors->first('pro_name')); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group <?php echo e($errors->first('pro_price') ?'has-error':''); ?>">
                                <label for="pass">Giá sản phẩm</label>
                                <input type="text" class="form-control"
                                       value="<?php echo e($product->pro_price ?? old('pro_price')); ?>" name="pro_price" id="pass"
                                       placeholder="2.000.000" autocomplete="off">
                                <?php if($errors->first('pro_price')): ?>
                                    <p class="text-danger"><?php echo e($errors->first('pro_price')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="pass">Giảm giá</label>
                                <input type="number" class="form-control" name="pro_sale" id="pass"
                                       value="<?php echo e($product->pro_sale ?? old('pro_sale',0)); ?>" placeholder="10"
                                       autocomplete="off">
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="col-md-12" style="margin-bottom:20px">
                            <?php if(isset($image)): ?>
                                <div class="row">
                                    <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-sm-2 position-relative" style="margin: 10px;">
                                            <div class="remove" style="width: 25px;height: 25px;background: red;border-radius: 50%;color: black;position: absolute;display: flex;justify-content: center;margin-top: -10px;margin-left: -15px;cursor:poiter">
                                            <a href="<?php echo e(route('admin.product.delete_image',$item->id)); ?>">
                                                    <i class="fa fa-trash-o" style="color: white;padding-top:5px"></i>
                                            </a>
                                            </div>
                                            <a
                                                    href="javascript:;"
                                                    style="display:block">
                                                <img src="<?php echo e(pare_url_file($item->al_slug)); ?>"
                                                     style="width:100px;height:100px;object-fit:cover"></a></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            <div class="box-header with-border">
                                <h3 class="box-title">Album ảnh</h3>
                                <input type="file" class="file" name="file[]" id="images" multiple>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="da">Từ khóa mới</label><br>
                                <input type="text" data-role="tagsinput" class="form-control" id="da" name="keywordseo"
                                       value="<?php echo e($product->keywordseo ?? old('keywordseo','')); ?>">

                            </div>
                        </div>
                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="fs" class="control-label">Từ khóa có sẵn <b class="col-red">(*)</b></label>
                                <select name="keywords[]" id="fs" class="form-control js-select2-keyword" multiple="">

                                    <?php $__currentLoopData = $keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($listcate->id); ?>" <?php echo e(in_array($listcate->id,$keywordOld) ? "selected='selected'" : ""); ?>>
                                            <?php echo e($listcate ->k_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group <?php echo e($errors->first('pro_description') ?'has-error':''); ?>">
                                <label for="des">Mô tả</label>
                                <textarea name="pro_description" id="des" cols="5" rows="2" autocomplete="off"
                                          class="form-control"><?php echo e($product->pro_description ?? old('pro_description',"Đang cập nhật")); ?></textarea>
                                <?php if($errors->first('pro_description')): ?>
                                    <p class="text-danger"><?php echo e($errors->first('pro_description')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fs" class="control-label">Danh mục <b class="col-red">(*)</b></label>
                        <select name="pro_category" id="fs" class="form-control">
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($listcate->id); ?>" <?php echo e(($product->pro_category ?? '') == $listcate->id ? "selected='selected'" :""); ?>>
                                    <?php echo e($listcate ->c_name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->first('pro_category')): ?>
                            <p class="text-danger"><?php echo e($errors->first('pro_category')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Nội dung</h3>
                </div>
                <div class="box-body">
                    <div class="form-group <?php echo e($errors->first('pro_content')); ?>">
                        <textarea name="pro_content"
                                  id="content"><?php echo e($product->pro_content ?? old('pro_content',"Content")); ?></textarea>
                        <?php if($errors->first('pro_content')): ?>
                            <p class="text-danger"><?php echo e($errors->first('pro_content')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Ảnh đại diện</h3>
                </div>
                <div class="box-body block-images">
                    <div style="margin-bottom: 10px" class="image-area">
                        <img src="<?php echo e($product->pro_avatar ?? asset('view/img/no-image.png')); ?>" class="img-thumbnail">
                    </div>
                    <!-- <div style="position:relative;"> <a class="btn btn-primary" href="javascript:;"> Chọn ảnh...
                    <input type="file" name="pro_avatar" size="40" class="d-none js-upload"> </a> &nbsp; <span class="label label-info" id="upload-file-info"></span> </div> -->
                    <label for="thumbnail-stage" class="btn btn-primary">Chọn ảnh...</label>
                    <input class="imageID d-none" type="file" id="thumbnail-stage" name="thumbnail_stage"
                           accept="image/*">
                </div>
            </div>
        </div>
        <div class="col-sm-12 clearfix">
            <div class="box-footer text-center">
                <a href="<?php echo e(route('admin.product.index')); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i>Quay lại</a>
                <button type="submit" class="btn btn-success"><i
                            class="fa fa-save"></i><?php echo e(isset($product) ?" Cập nhật" :" Thêm mới"); ?></button>
            </div>
    </form>
</div>
<script src="<?php echo e(asset('view/js/script.js')); ?>"></script>
<?php /**PATH D:\laravel8-maylocnuoc\resources\views/admin/product/form.blade.php ENDPATH**/ ?>