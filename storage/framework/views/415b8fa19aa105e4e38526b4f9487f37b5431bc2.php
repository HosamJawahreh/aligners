<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>">
        <title><?php echo app('translator')->get('Log in'); ?> | <?php echo e($ApplicationSetting->item_name); ?></title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>" />
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>" />
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/adminlte.min.css')); ?>" />
        <!-- Ambitious CSS -->
        <link href="<?php echo e(asset('assets/css/frontend.css')); ?>" rel="stylesheet">
        <?php if(session('locale') == 'ar'): ?>
            <link href="<?php echo e(asset('assets/css/bootstrap-rtl.min.css')); ?>" rel="stylesheet">
        <?php else: ?>
            <link href="<?php echo e(asset('assets/plugins/alertifyjs/css/themes/bootstrap.min.css')); ?>" rel="stylesheet">
        <?php endif; ?>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <span class="identColor"><img src="/assets/images/logo.png" width="150px'"></span>
                </div>
                <div class="card-body">
                    <p class="login-box-msg m-0 p-0"><?php echo app('translator')->get('Sign in to start your session'); ?></p><br>

                    <form action="<?php echo e(route('login')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('Email'); ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="<?php echo app('translator')->get('Password'); ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                    <label for="remember">
                                        <?php if(session('locale') == 'ar'): ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php endif; ?>
                                        <?php echo app('translator')->get('Remember Me'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="social-auth-links text-center mt-2 mb-3">
                            <button type="submit" class="btn btn-block btn-primary"> <i class="fas fa-sign-in-alt mr-2"></i> <?php echo app('translator')->get('Log in'); ?></button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
        <!-- Bootstrap 4 -->
        <?php if(session('locale') == 'ar'): ?>
            <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
        <?php else: ?>
            <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
        <?php endif; ?>
        <!-- AdminLTE App -->
        <script src="<?php echo e(asset('assets/js/adminlte.min.js')); ?>"></script>
        <!-- Custom Js -->
        <script src="<?php echo e(asset('assets/js/custom/login.js')); ?>"></script>
    </body>
</html>
<?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/page/login.blade.php ENDPATH**/ ?>