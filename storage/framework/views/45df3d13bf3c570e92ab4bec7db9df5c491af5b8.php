<?php $__env->startSection('one_page_js'); ?>
    <script src="<?php echo e(asset('assets/js/quill.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/dropify/dist/js/dropify.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('one_page_css'); ?>
    <link href="<?php echo e(asset('assets/css/quill.snow.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/plugins/dropify/dist/css/dropify.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3><?php echo app('translator')->get('General Setting'); ?></h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('Dashboard'); ?></a></li>
                    <li class="breadcrumb-item active"><?php echo app('translator')->get('Settings'); ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<div class="card">
	<nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo app('translator')->get('Company'); ?></a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo app('translator')->get('Localisation'); ?></a>
        </div>
    </nav>
	<div class="card-body custom-padding-top-0">
		<section id="tabs" class="project-tab">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="card-body">
                                <form class="form-material form-horizontal" action="<?php echo e(route('general')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputPassword1"><?php echo app('translator')->get('Company'); ?> <b class="ambitious-crimson">*</b></label>
                                                <div class="form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                                    </div>
                                                    <input type="text" name="company_name" class="form-control <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo app('translator')->get('Enter Company Name'); ?>" value="<?php echo e(old('company_name',$company->company_name)); ?>" required>
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
                                            <div class="col-md-6">
                                                <label for="exampleInputPassword1"><?php echo app('translator')->get('Email'); ?> <b class="ambitious-crimson">*</b></label>
                                                <div class="form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" name="company_email" class="form-control <?php $__errorArgs = ['company_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo app('translator')->get('Enter Email Address'); ?>" value="<?php echo e(old('company_email',$company->company_email)); ?>" required>
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
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputPassword1"><?php echo app('translator')->get('Tax Number'); ?></label>
                                                <div class="form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    <input type="text" name="company_tax_number" class="form-control <?php $__errorArgs = ['company_tax_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo app('translator')->get('Enter Tax Number'); ?>" value="<?php echo e(old('company_tax_number',$company->company_tax_number)); ?>">
                                                    <?php $__errorArgs = ['company_tax_number'];
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
                                                <label for="exampleInputPassword1"><?php echo e(__('Phone')); ?></label>
                                                <div class="form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="text" name="company_phone" class="form-control <?php $__errorArgs = ['company_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Phone Number')); ?>" value="<?php echo e(old('company_phone',$company->company_phone)); ?>">
                                                    <?php $__errorArgs = ['company_phone'];
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?php echo e(__('Logo')); ?></label>
                                                <input id="photo" class="dropify" name="company_logo" type="file" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="1024K"/>
                                                <small id="name" class="form-text text-muted"><?php echo app('translator')->get('Leave Blank For Remain Unchanged'); ?></small>
                                                <p><?php echo app('translator')->get('Max Size: 1000kb, Allowed Format: png, jpg, jpeg'); ?></p>
                                                <?php $__errorArgs = ['company_logo'];
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
                                            <div class="col-md-6">
                                                <label><?php echo e(__('Address')); ?> <b class="ambitious-crimson">*</b></label>
                                                <div id="edit_input_address" class="form-control <?php $__errorArgs = ['company_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></div>
                                                <input type="hidden" name="company_address" id="company_address" value="<?php echo e(old('company_address',$company->company_address)); ?>">
                                                <?php $__errorArgs = ['company_address'];
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
                                    <div class="form-group">
                                        <label class="col-md-3 col-form-label"></label>
                                        <div class="col-md-8">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company-update')): ?>
                                                <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-outline btn-info btn-lg"/>
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline btn-warning btn-lg"><?php echo e(__('Cancel')); ?></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="card-body">
                                <form class="form-material form-horizontal" action="<?php echo e(route('general.localisation')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputPassword1"><?php echo app('translator')->get('Financial Year Start'); ?> </label>
                                                <div class="form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-check"></i></span>
                                                    </div>
                                                    <input type="text" name="financial_start" id="financial_start" class="form-control <?php $__errorArgs = ['financial_start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo app('translator')->get('Enter Financial Year Start'); ?>" value="<?php echo e(old('financial_start',$company->financial_start)); ?>">
                                                    <?php $__errorArgs = ['financial_start'];
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
                                                <label for="exampleInputPassword1"><?php echo app('translator')->get('Time Zone'); ?></label>
                                                <div class="form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                                    </div>
                                                    <select id="timezone" name="timezone" class="form-control <?php $__errorArgs = ['timezone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                        <?php $__currentLoopData = $timezone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($key); ?>" <?php echo e(old('timezone', $company->timezone) == $key ? 'selected' : ''); ?> ><?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php $__errorArgs = ['timezone'];
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputPassword1"><?php echo e(__('Date Format')); ?></label>
                                                <div class="form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                    </div>
                                                    <select class="form-control <?php $__errorArgs = ['date_format'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="off" id="date_format" name="date_format">
                                                        <option value="d M Y" <?php echo e(old('date_format', $company->date_format) == "d M Y" ? 'selected' : ''); ?>><?php echo e(date('d M Y')); ?></option>
                                                        <option value="d F Y" <?php echo e(old('date_format', $company->date_format) == "d F Y" ? 'selected' : ''); ?>><?php echo e(date('d F Y')); ?></option>
                                                        <option value="d m Y" <?php echo e(old('date_format', $company->date_format) == "d m Y" ? 'selected' : ''); ?>><?php echo e(date('d m Y')); ?></option>
                                                        <option value="m d Y" <?php echo e(old('date_format', $company->date_format) == "m d Y" ? 'selected' : ''); ?>><?php echo e(date('m d Y')); ?></option>
                                                        <option value="Y m d" <?php echo e(old('date_format', $company->date_format) == "Y m d" ? 'selected' : ''); ?>><?php echo e(date('Y m d')); ?></option>
                                                    </select>
                                                    <?php $__errorArgs = ['date_format'];
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
                                                <label><?php echo app('translator')->get('Date Separator'); ?></label>
                                                <div class="form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-minus"></i></span>
                                                    </div>
                                                    <select class="form-control <?php $__errorArgs = ['date_separator'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="date_separator" name="date_separator">
                                                        <option value="dash" <?php echo e(old('date_separator', $company->date_separator) == "dash" ? 'selected' : ''); ?>><?php echo e(__('general.dash')); ?> (-)</option>
                                                        <option value="slash" <?php echo e(old('date_separator', $company->date_separator) == "slash" ? 'selected' : ''); ?>><?php echo e(__('general.slash')); ?> (/)</option>
                                                        <option value="dot" <?php echo e(old('date_separator', $company->date_separator) == "dot" ? 'selected' : ''); ?>><?php echo e(__('general.dot')); ?> (.)</option>
                                                        <option value="comma" <?php echo e(old('date_separator', $company->date_separator) == "comma" ? 'selected' : ''); ?>><?php echo e(__('general.comma')); ?> (,)</option>
                                                        <option value="space" <?php echo e(old('date_separator', $company->date_separator) == "space" ? 'selected' : ''); ?>><?php echo e(__('general.space')); ?> ( )</option>
                                                    </select>
                                                    <?php $__errorArgs = ['date_separator'];
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
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputPassword1"><?php echo app('translator')->get('Percent (%) Position'); ?></label>
                                                <div class="form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    <select class="form-control <?php $__errorArgs = ['percent_position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="percent_position" name="percent_position">
                                                        <option value="before" <?php echo e(old('percent_position', $company->percent_position) == "before" ? 'selected' : ''); ?>><?php echo app('translator')->get('Before Number'); ?></option>
                                                        <option value="after" <?php echo e(old('percent_position', $company->percent_position) == "after" ? 'selected' : ''); ?>><?php echo app('translator')->get('After Number'); ?></option>
                                                    </select>
                                                    <?php $__errorArgs = ['percent_position'];
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
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-form-label"></label>
                                        <div class="col-md-8">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company-update')): ?>
                                                <input type="submit" value="<?php echo app('translator')->get('Save'); ?>" class="btn btn-outline btn-info btn-lg"/>
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline btn-warning btn-lg"><?php echo e(__('Cancel')); ?></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
    <script src="<?php echo e(asset('assets/js/custom/general.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/settings/general/index.blade.php ENDPATH**/ ?>