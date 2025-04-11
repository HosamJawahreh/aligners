<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo e(url('/')); ?>" class="nav-link"><i class="fas fa-globe"></i> <?php echo app('translator')->get('Go to website'); ?></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown nav-margin">
            <a class="nav-link dropdown-toggle profile-pic login_profile mr-2 p-0" data-toggle="dropdown" href="#">
                <img src="<?php echo e(asset($companySettings->company_logo)); ?>" alt="user-img" width="36" class="img-circle">
                <b id="ambitious-user-name-id" class="hidden-xs"><?php echo e(\Illuminate\Support\Str::limit($company_full_name, 20, '...')); ?></b>
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <?php $__currentLoopData = $companySwitchingInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('company.companyAccountSwitch', ['company_switch' => $key]  )); ?>" class="dropdown-item" <?php if($key == Session::get('companyInfo')): ?> <?php endif; ?>>
                        <i class="fas fa-building mr-2"></i> <?php echo e(\Illuminate\Support\Str::limit($value, 20, '...')); ?>

                    </a>
                    <div class="dropdown-divider"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(route('company.index')); ?>" class="dropdown-item"><i class="fa fa-sliders-h mr-2"></i> <?php echo e(__('Manage Company')); ?></a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <?php
                $locale = App::getLocale();
            ?>
            <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php $__currentLoopData = $getLang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($locale == $key): ?>
                        <span  class="flag-icon <?php echo e($flag[$key]); ?>"> </span> <span id="ambitious-flag-name-id"><?php echo e($value); ?></span> </a>
                    <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="dropdown-menu" aria-labelledby="dropdown09">
                <?php $__currentLoopData = $getLang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <a class="dropdown-item" href="<?php echo e(route('lang.index', ['language' => $key])); ?>" <?php if($key == $locale): ?> <?php endif; ?>><span class="flag-icon <?php echo e($flag[$key]); ?>"> </span>  <?php echo e($value); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </li>
        <li class="nav-item dropdown">
            <?php
                if(Auth::user()->photo == NULL)
                {
                    $photo = "assets/images/profile/male.png";
                } else {
                    $photo = Auth::user()->photo;
                }
            ?>
            <a class="nav-link dropdown-toggle profile-pic login_profile p-0" data-toggle="dropdown" href="#">
                <img src="<?php echo e(asset($photo)); ?>" alt="user-img" width="36" class="img-circle">
                <b id="ambitious-user-name-id" class="hidden-xs"><?php echo e(strtok(Auth::user()->name, " ")); ?></b>
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dw-user-box">
                    <div class="u-img"><img src="<?php echo e(asset($photo)); ?>" alt="user" /></div>
                    <div class="u-text">
                        <h4><?php echo e(Auth::user()->name); ?></h4>
                        <p class="text-muted" class="custom-padding-bottom-5"><?php echo e(\Illuminate\Support\Str::limit(Auth::user()->email, 17)); ?></p>
                        <a href="<?php echo e(route('profile.view')); ?>" class="btn btn-rounded btn-danger btn-sm"><?php echo e(__('View Profile')); ?></a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(route('profile.view')); ?>" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> <?php echo e(__('My Profile')); ?>

                </a>
                <a href="<?php echo e(route('profile.setting')); ?>" class="dropdown-item">
                    <i class="fas fa-cogs mr-2"></i> <?php echo e(__('Account Setting')); ?>

                </a>
                <a href="<?php echo e(route('profile.password')); ?>" class="dropdown-item">
                    <i class="fa fa-key mr-2"></i></i> <?php echo e(__('Change Password')); ?>

                </a>
                <div class="dropdown-divider"></div>
                <a id="header-logout" href="<?php echo e(route('logout')); ?>" class="dropdown-item"><i class="fa fa-power-off mr-2"></i> <?php echo e(__('Logout')); ?></a>
                <form id="logout-form" class="ambitious-display-none" action="<?php echo e(route('logout')); ?>" method="POST"><?php echo csrf_field(); ?></form>
            </div>
        </li>
    </ul>
</nav>
<script src="<?php echo e(asset('assets/js/custom/layouts/header.js')); ?>"></script>
<?php /**PATH /home3/etahaorg/public_html/resources/views/layouts/header.blade.php ENDPATH**/ ?>