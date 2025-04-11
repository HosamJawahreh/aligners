<?php $__env->startSection('one_page_js'); ?>
    <script src="<?php echo e(asset('assets/js/quill.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/dropify/dist/js/dropify.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('one_page_css'); ?>
    <link href="<?php echo e(asset('assets/css/quill.snow.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/plugins/dropify/dist/css/dropify.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('Account Setting Title')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3><?php echo e(__('Account Setting Title')); ?></h3>
                </div>
                <div class="card-body">
                    <form class="form-material form-horizontal" action="<?php echo e(route('profile.updateSetting')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-md-3 ambitious-center">
                                <h4><?php echo e(__('Name')); ?> <b class="ambitious-crimson">*</b></h4>
                            </label>
                            <div class="col-md-8">
                                <input class="form-control ambitious-form-loading" name="name" id="name" value="<?php echo e($user->name); ?>" type="text" placeholder="<?php echo e(__('Type Your Name Here')); ?>" required>
                            </div>
                            <?php if($errors->has('name')): ?>
                                <?php echo e(Session::flash('error',$errors->first('name'))); ?>

                            <?php endif; ?>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 ambitious-center">
                                <h4><?php echo e(__('Email')); ?> <b class="ambitious-crimson">*</b></h4>
                            </label>
                            <div class="col-md-8">
                                <input class="form-control ambitious-form-loading" name="email" id="email" value="<?php echo e($user->email); ?>" type="email" placeholder="<?php echo e(__('Type Your Email Here')); ?>" required>
                            </div>
                            <?php if($errors->has('email')): ?>
                                <?php echo e(Session::flash('error',$errors->first('email'))); ?>

                            <?php endif; ?>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 ambitious-center"><h4><?php echo e(__('Photo')); ?> </h4></label>
                            <div class="col-md-9">
                                <?php echo e(__('Max Dimension: 200 x 200, Max Size: 100kb, Allowed format: png, jpg, jpeg')); ?>

                                <input id="photo" class="dropify" name="photo" value="<?php echo e(old('photo')); ?>" type="file" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="5120K"/><small id="name" class="form-text text-muted"><?php echo e(__('Leave Blank For Remain Unchanged')); ?></small>
                            </div>
                            <?php if($errors->has('photo')): ?>
                                <div class="error ambitious-red"><?php echo e($errors->first('photo')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 ambitious-center"><h4><?php echo e(__('Phone')); ?></h4></label>
                            <div class="col-md-8">
                                <input class="form-control ambitious-form-loading" name="phone" value="<?php echo e($user->phone); ?>" id="phone" type="text" placeholder="<?php echo e(__('Type Your Phone Here')); ?>">
                            </div>
                            <?php if($errors->has('phone')): ?>
                                <?php echo e(Session::flash('error',$errors->first('phone'))); ?>

                            <?php endif; ?>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 ambitious-center"><h4><?php echo e(__('Address')); ?></h4></label>
                            <div class="col-md-8">
                                <div id="edit_input_address">
                                </div>
                                <input type="hidden" name="address" id="address" value="<?php echo e($user->address); ?>">
                            </div>
                            <?php if($errors->has('address')): ?>
                                <?php echo e(Session::flash('error',$errors->first('address'))); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                    <div class="card-footer">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"></label>
                            <div class="col-md-8">
                                <input type="submit" value="<?php echo e(__('Submit')); ?>" class="btn btn-outline btn-info btn-lg"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('assets/js/custom/setting.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/auth/profile/setting.blade.php ENDPATH**/ ?>