
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
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('company.index')); ?>"><?php echo e(__('Company List')); ?></a></li>
                    <li class="breadcrumb-item active"><?php echo e(__('Edit Company')); ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3><?php echo e(__('Edit Company')); ?></h3>
            </div>
            <div class="card-body">
                <form class="form-material form-horizontal" action="<?php echo e(route('company.update', $company)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label class="col-md-12">
                                <h4><?php echo e(__('Company Name')); ?> <b class="ambitious-crimson">*</b></h4>
                            </label>
                            <div class="col-md-12">
                                <input class="form-control ambitious-form-loading <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="company_name" id="company_name" type="text" value="<?php echo e(old('company_name',$company->company_name)); ?>" placeholder="<?php echo e(__('Enter Name')); ?>" required>
                                <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-md-12">
                                <h4><?php echo e(__('Company Email')); ?> <b class="ambitious-crimson">*</b></h4>
                            </label>
                            <div class="col-md-12">
                                <input class="form-control ambitious-form-loading <?php $__errorArgs = ['company_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="company_email" id="company_email" type="email" value="<?php echo e(old('company_email', $company->company_email)); ?>" placeholder="<?php echo e(__('Enter Company Email')); ?>" required>
                                <?php $__errorArgs = ['company_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12">
                                <h4><?php echo e(__('Domain')); ?> <b class="ambitious-crimson">*</b></h4>
                            </label>
                            <div class="col-md-12">
                                <input class="form-control ambitious-form-loading <?php $__errorArgs = ['domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="domain" id="domain" type="text" value="<?php echo e(old('domain', $company->domain)); ?>" placeholder="<?php echo e(__('Enter Domain')); ?>" required>
                                <?php $__errorArgs = ['domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-md-12"><h4><?php echo e(__('Photo')); ?> </h4></label>
                            <div class="col-md-12">
                                <input id="photo" class="dropify <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="photo" value="<?php echo e(old('photo')); ?>" type="file" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="1024K"/>
                                <small id="name" class="form-text text-muted"><?php echo e(__('Leave Blank For Remain Unchanged')); ?>

                                </small>
                                <p><?php echo e(__('Max Size: 1000kb, Allowed Format: png, jpg, jpeg')); ?></p>
                                <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12"><h4><?php echo e(__('Address')); ?></h4></label>
                            <div class="col-md-12">
                                <div id="edit_input_address" class="form-control description-min-height <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                </div>
                                <input type="hidden" name="address" id="address" value="<?php echo e(old('address',$company->company_address)); ?>">
                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="col-md-12"><h4><?php echo e(__('Enabled')); ?> <b class="ambitious-crimson">*</b></h4></label>
                            <div class="col-md-12">
                                <select class="form-control ambitious-form-loading" name="enabled" id="enabled">
                                    <option value="1" <?php echo e(old('enabled', $company->enabled) == 1 ? 'selected' : ''); ?>><?php echo e(__('Yes')); ?></option>
                                    <option value="0" <?php echo e(old('enabled', $company->enabled) == 0 ? 'selected' : ''); ?>><?php echo e(__('No')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <label class="col-md-3 col-form-label"></label>
                            <div class="col-md-8">
                                <input type="submit" value="<?php echo e(__('Submit')); ?>" class="btn btn-outline btn-info btn-lg"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('assets/js/custom/company/edit.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/companies/edit.blade.php ENDPATH**/ ?>