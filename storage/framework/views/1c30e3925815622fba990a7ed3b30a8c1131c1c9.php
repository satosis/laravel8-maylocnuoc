
<?php $__env->startSection('content'); ?>
    <style>li {
            list-style: none
        }</style>
    <title>Quản lý đơn hàng</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <form class="form-inline">
                            <input type="text" class="form-control" value="<?php echo e(Request::get('id')); ?>" name="id"
                                   placeholder="ID">
                            <input type="text" class="form-control" value="<?php echo e(Request::get('email')); ?>" name="email"
                                   placeholder="Email ...">
                            <select name="status" class="form-control">
                                <option value="">Trạng thái</option>
                                <option value="1" <?php echo e(Request::get('status') == 1 ? "selected='selected'" : ""); ?>>Tiếp
                                    nhận
                                </option>
                                <option value="2" <?php echo e(Request::get('status') == 2 ? "selected='selected'" : ""); ?>>Đang
                                    vận chuyển
                                </option>
                                <option value="3" <?php echo e(Request::get('status') == 3 ? "selected='selected'" : ""); ?>>Đã bàn
                                    giao
                                </option>
                                <option value="4" <?php echo e(Request::get('status') == 4 ? "selected='selected'" : ""); ?>>Huỷ
                                    bỏ
                                </option>
                            </select>
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Tìm kiếm</button>
                            <button type="submit" name="export" value="true" class="btn btn-info">
                                <i class="fa fa-save"></i> Xuất
                            </button>
                        </form>
                    </div>
                    <table class="table">
                        <thead>
                        <th>STT</th>
                        <th>Khách hàng</th>
                        <th>Số tiền</th>
                        <th>Cổng thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                        <th>Hành động</th>
                        </thead>
                        <?php if(!count($transaction)): ?>
                            <tbody>
                            <tr>
                                <th colspan="7">Không có đơn hàng mới</th>
                            </tr>
                            </tbody>
                        <?php endif; ?>
                        <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                            <td><?php echo e($list->id); ?></td>
                            <td>
                                <div>
                                    <li>Tên :<?php echo e($list->tst_name); ?></li>
                                    <li>Email: <?php echo e($list->tst_email); ?></li>
                                    <li>Điện thoại :<?php echo e($list->tst_phone); ?></li>
                                    <li>Địa chỉ: <?php echo e($list->tst_address); ?></li>
                                    <li>Ghi chú: <?php echo e($list->tst_note); ?></li>
                                </div>
                            </td>
                            <td><?php echo e(number_format( $list->tst_total_money , 0, '.', ',')); ?> đ</td>
                            <td><?php if($list->tst_type ==1 ): ?>
                                    Trực tiếp
                                <?php elseif($list->tst_type ==2 ): ?>
                                    Momo
                                <?php endif; ?>
                            </td>
                            <td>
      <span class="<?php echo e($list->getStatus($list->tst_status)['class']); ?>">
      <?php echo e($list->getStatus($list->tst_status)['name']); ?>

      </span></td>
                            <td><?php echo e($list->created_at); ?></td>
                            <td>
                                <a data-id="<?php echo e($key); ?>" href="javascript:;"
                                   data-href="<?php echo e(route('ajax.admin.transaction.detail',$list->id)); ?>" class="label label-primary js-preview-transaction
      "><i class="fa fa-eye"></i> Xem</a>

                                <div class="btn-group">
                                    <button class="btn btn-success btn-xs">Hành động</button>
                                    <button class="btn btn-success  btn-xs dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo e(route('admin.action.transaction',['process',$list->id])); ?>"><i
                                                        class="fa fa-ban"></i>Đang bàn giao</a></li>
                                        <li><a href="<?php echo e(route('admin.action.transaction',['success',$list->id])); ?>"><i
                                                        class="fa fa-ban"></i>Đã bàn giao</a></li>
                                        <li><a href="<?php echo e(route('admin.action.transaction',['confirm',$list->id])); ?>"><i
                                                        class="fa fa-ban"></i>Người dùng đã xác nhận</a></li>
                                        <li><a href="<?php echo e(route('admin.action.transaction',['cancel',$list->id])); ?>"><i
                                                        class="fa fa-ban"></i>Hủy</a></li>
                                    </ul>
                                </div>
                            </td>
                            </tbody>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
        </section>
        <div class="box-footer">
            <?php echo $transaction->appends($query ?? [])->links(); ?>

        </div>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

    <div class="modal fade fade" id="modal-preview-transaction">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"> Chi tiết đơn hàng <b id="idTransaction">#1</b></h4>
                </div>
                <div class="modal-body">
                    <div class="content">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\tesst\resources\views/admin/transaction/index.blade.php ENDPATH**/ ?>