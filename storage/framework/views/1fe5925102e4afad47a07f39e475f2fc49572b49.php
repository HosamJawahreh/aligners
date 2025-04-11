<?php session_start(); ?> 

<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('patient-case-studies.index')); ?>"><?php echo app('translator')->get('Patient Case Study'); ?></a></li>
                    <li class="breadcrumb-item active"><?php echo app('translator')->get('Add Patient Case Study'); ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>


<div class="row">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-header text-center pt-3" style="background-color:#17a2b8; color:white; font-weight:bold;">
                <h6><b><i class="fas fa-plus"></i>  <?php echo app('translator')->get('Add Patient Case Study'); ?></b></h6>
            </div>
          
            <div class="card-body">
                <form id="patientForm"  id="addNewPatientCaseStudyForm" class="form-material form-horizontal" action="<?php echo e(route('patient-case-studies.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    <?php 
                    $users=DB::table('users')->OrderBy('id','desc')->first();
                    $Next_id=$users->id+1;
                    
                    ?>

                                                        <input type="text" id="user_id" name="user_id"  value="<?php echo e($Next_id); ?>" hidden>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"><?php echo app('translator')->get('Name'); ?> <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo app('translator')->get('Name'); ?>" required>
                                    <?php $__errorArgs = ['name'];
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php echo app('translator')->get('Status'); ?> <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-bell"></i></span>
                                    </div>
                                    <select class="form-control ambitious-form-loading <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="1" selected><?php echo app('translator')->get('Active'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('Inactive'); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php echo app('translator')->get('Case Type'); ?> <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-bell"></i></span>
                                    </div>
                                    <select class="form-control ambitious-form-loading <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="status" id="status">
                                        <option value="2" <?php echo e(old('status') === '2' ? 'selected' : ''); ?>><?php echo app('translator')->get('Full Case'); ?></option>
                                        <option value="3" <?php echo e(old('status') === '3' ? 'selected' : ''); ?>><?php echo app('translator')->get('Devided Stages'); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php echo app('translator')->get('Doctor'); ?> <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-bell"></i></span>
                                    </div>
                                    
                                    <?php if(auth()->user()->id!=1): ?>
                                    <select class="form-control ambitious-form-loading <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="company_id" id="company_id">
                                    <option value="<?php echo e(auth()->user()->id); ?>" selected><?php echo e(auth()->user()->name); ?></option>
                                    </select>
                                    <?php else: ?>
                                    <select class="form-control ambitious-form-loading <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required name="company_id" id="company_id">
                                            <option value="1">Line Up Admin</option>

                                            <?php $doctors=DB::table('users')->select('users.id','users.name')->join('doctor_details', 'doctor_details.user_id', '=', 'users.id')->get(); ?>
                                            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                    <?php endif; ?>

                                    <?php $__errorArgs = ['status'];
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
                        </div>   <hr class="text-danger mt-3">                     
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email"><?php echo app('translator')->get('Email'); ?> <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo app('translator')->get('Email'); ?>">
                                    <?php $__errorArgs = ['email'];
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone"><?php echo app('translator')->get('Phone'); ?> <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo app('translator')->get('Phone'); ?>">
                                    <?php $__errorArgs = ['phone'];
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
                    
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth"><?php echo app('translator')->get('Date of Birth'); ?> <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-check"></i></span>
                                    </div>
                                    <input type="text" name="date_of_birth" id="date_of_birth" class="form-control flatpickr <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo app('translator')->get('Date of Birth'); ?>" value="<?php echo e(old('date_of_birth')); ?>">
                                    <?php $__errorArgs = ['date_of_birth'];
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
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender"><?php echo app('translator')->get('Gender'); ?> <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                    </div>
                                    <select name="gender" class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gender">
                                        <option value="">--<?php echo app('translator')->get('Select'); ?>--</option>
                                        <option value="male" <?php echo e(old('gender') === 'male' ? 'selected' : ''); ?>><?php echo app('translator')->get('Male'); ?></option>
                                        <option value="female" <?php echo e(old('gender') === 'female' ? 'selected' : ''); ?>><?php echo app('translator')->get('Female'); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['gender'];
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

                    <div class="row">
                        <div class="col-md-6">
                            <label for="photo" class="col-md-12 col-form-label"><h4><?php echo e(__('Photos')); ?></h4></label>
                            <div class="col-md-12">
                                <input id="photo" class="dropify" name="photo[]" value="<?php echo e(old('photo')); ?>" type="file" data-allowed-file-extensions="png jpg jpeg webp svg" accept=".png,.jpg,.jpeg,.webp,.svg" data-max-file-size="100000K" multiple>
                                <p><?php echo e(__('Max Size: 100MB, Allowed Format: png, jpg, jpeg')); ?></p>
                            </div>
                            <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="error ambitious-red">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="notes"><?php echo app('translator')->get('Notes'); ?></label>
                                <div class="input-group mb-3">
                                    <textarea name="notes" id="notes" class="form-control <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4" placeholder="<?php echo app('translator')->get('Notes'); ?>"><?php echo e(old('notes')); ?></textarea>
                                    <?php $__errorArgs = ['notes'];
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
                    

<div class="row text-center">
                        
<hr>

<div class="col-md-6">                     
<label for="upper"><h4>Please Upload <span class="text-success" style="font-size:18px;"><strong>Upper</strong></span> 3D Model  - (<span style="color:#17a2b8; font-size:18px;"> Stl , Obj , Ply </span>) <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></h4></label>
<div class="file-loading">
<input id="upper" name="upper" type="file" accept=".stl,.obj,.ply">
</div>
<input class="form-control" id="upperLink" name="upperLink" type="text"  readonly required>
<div id="upper-error" style="margin-top:10px;display:none"></div>
<div id="upper-success" class="alert alert-success" style="margin-top:10px;display:none;"></div>
</div> 

<div class="col-md-6">
<label for="lower"><h4>Please Upload <span class="text-danger" style="font-size:18px;"><strong>Lower</strong></span> 3D Model  - (<span style="color:#17a2b8; font-size:18px;">  Stl , Obj , Ply </span>) <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></h4></label>
<div class="file-loading">
<input id="lower" name="lower" type="file" accept=".stl,.obj,.ply">
</div>
<input class="form-control" id="lowerLink" name="lowerLink" type="text" readonly required>
<div id="lower-error" style="margin-top:10px;display:none"></div>
<div id="lower-success" class="alert alert-success" style="margin-top:10px;display:none"></div>
</div>
<br><br><hr> 
</div>
                   
                    
                    <div class="row" style="padding-top:20px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                </div>
                            </div>
                        </div>
                       <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                    <input  type="submit" value="+ <?php echo e(__('Create Patient Case Study')); ?>" class="btn btn-success btn-s  rounded w-100" style="background-color:#17a2b8; color:white; font-weight:bold;"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php 
// session_destroy();
// unset($_SESSION['upperFileUrl']);
// unset($_SESSION['lowerFileUrl']);
?> 

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/patient-case-study/create.blade.php ENDPATH**/ ?>