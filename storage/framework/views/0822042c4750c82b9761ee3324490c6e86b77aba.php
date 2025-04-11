
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('Dashboard'); ?></a></li>
                    <li class="breadcrumb-item active"><?php echo app('translator')->get('Profile'); ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php
                        if($user->photo == null) {
                            $photo = "assets/images/profile/male.png";
                        } else {
                            $photo = $user->photo;
                        }
                    ?>
                    <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset($photo)); ?>" alt="" />
                </div>
                <h3 class="profile-username text-center"><?php echo e(strtok(Auth::user()->name, " ")); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo app('translator')->get('Profile Info'); ?></h3>
                <div class="card-tools">
                    <a href="<?php echo e(route('profile.setting')); ?>" class="btn btn-info"><?php echo app('translator')->get('Edit'); ?></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('Name'); ?></label>
                            <p><?php echo e($user->name); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone"><?php echo app('translator')->get('Phone'); ?></label>
                            <p><?php echo e($user->phone); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email"><?php echo app('translator')->get('Email'); ?></label>
                            <p><?php echo e($user->email); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address"><?php echo app('translator')->get('Address'); ?></label>
                            <p><?php echo e($user->address); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/auth/profile/view.blade.php ENDPATH**/ ?>