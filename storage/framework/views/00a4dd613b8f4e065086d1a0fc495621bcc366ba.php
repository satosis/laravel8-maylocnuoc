<?php echo $__env->make('layout.component.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<title><?php echo e(isset($login) ? 'Đăng nhập' : ''); ?> <?php echo e(isset($register) ? 'Đăng ký  ' : ''); ?></title>
<style>
    .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .container {
        width: 40%;
        margin: 0 auto;
    }

    .btn-danger {
        background-color: #d9534f;
    }

    .btn-primary {
        background-color: #3c8dbc;
    }

    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 50px;
    }

    label {
        font-size: 18px;
        font-weight: 500;
        line-height: 32px;
        color: inherit;
    }

    .red {
        color: red
    }

    .has-error {
        color: red
    }

    .has-error input {
        border: 1px solid red
    }

    .d-none {
        display: none
    }

    .login {
        width: 70%;
        text-align: center;
        margin: 0 auto;
        color: white !important
    }

    .login h1 {
        font-size: 25px;
        border-bottom: 2px solid black;
        color: black !important
    }
</style>
<div class="container" >
    <form action="" method="POST" role="form" class="col-md-8" style="margin:50px 0">
        <?php echo csrf_field(); ?>

        <?php if($errors->first('msg')): ?>
            <p class="red"><?php echo e($errors->first('msg')); ?>  </p>
        <?php endif; ?>
        <div class="form-group <?php echo e($errors->first('name') ? ' has-error':''); ?> <?php echo e(isset($reset) ? 'd-none' :''); ?> <?php echo e(isset($login) ?'d-none' : ''); ?> ">
            <label for="exampleInputEmail1">Name <b class="red">(*)</b> </label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                   value="<?php echo e(isset($login->name) ?? old('name','')); ?>" autocomplete="off">
            <?php if($errors->first('name')): ?>
                <p class="text-danger"><?php echo e($errors->first('name')); ?>  </p>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo e($errors->first('email') ? ' has-error':''); ?>">
            <label for="xampleInputEmail1">Email <b class="red">(*)</b> </label>
            <input type="text" name="email" class="form-control" id="xampleInputEmail1" value="user@gmail.com"
                   autocomplete="off">
            <?php if($errors->first('email')): ?>
                <p class="text-danger"><?php echo e($errors->first('email')); ?>  </p>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo e(isset($reset) ? 'd-none' :''); ?> <?php echo e($errors->first('password') ? ' has-error':''); ?>">
            <label for="xampleInputEmai1">Password <b class="red">(*)</b> </label>
            <input type="password" name="password" value="123456789" class="form-control" id="xampleInputEmai1"
                   autocomplete="off">
            <?php if($errors->first('password')): ?>
                <p class="text-danger"><?php echo e($errors->first('password')); ?>  </p>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo e(isset($reset) ? 'd-none' :''); ?> <?php echo e($errors->first('phone') ? ' has-error':''); ?>  <?php echo e(isset($login) ?'d-none' : ''); ?>">
            <label for="ampleInputphone1">Điện thoại <b class="red">(*)</b> </label>
            <input type="text" name="phone" class="form-control" id="ampleInputphone1" autocomplete="off">
            <?php if($errors->first('phone')): ?>
                <p class="text-danger"><?php echo e($errors->first('phone')); ?>  </p>
            <?php endif; ?>
        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" style="padding: 10px 50px"> <?php echo e(isset($login) ? 'Đăng nhập' : 'Đăng ký'); ?></button>
        </div>

        <div class="d-flex" style="display:flex;margin-top:20px">
        <a class="<?php echo e(isset($login) ? 'd-none' :''); ?>" href="<?php echo e(route('get.login')); ?>">Đăng nhập</a><br>
        <a class="<?php echo e(isset($register) ? 'd-none' :''); ?>" href="<?php echo e(route('get.register')); ?>">Đăng ký</a><br>
        </div>
        <hr>
        <a href="<?php echo e(url('/auth/redirect/google')); ?>" class="btn btn-danger" style="width: 100%;color:white">
            <i class="fa fa-google"></i> GOOGLE
        </a>
    </form>
    <br>

</div>
<?php echo $__env->make('layout.component.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\project\tesst\resources\views/auth/app.blade.php ENDPATH**/ ?>