
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('roles.index')); ?>"><?php echo app('translator')->get('Role List'); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo app('translator')->get('Update Role'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3><?php echo app('translator')->get('Update Role'); ?></h3>
                </div>
                <div class="card-body">
                    <form class="form-material form-horizontal" action="<?php echo e(route('roles.update', $role)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group row mb-0">
                            <label class="col-md-2 col-form-label ambitious-center"><h4 class="ambitious-role-margin ambitious-center"><?php echo app('translator')->get('Role Name'); ?> <b class="ambitious-crimson">*</b></h4></label>
                            <div class="col-md-8">
                                <input class="form-control ambitious-form-loading <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" id="name" type="text" placeholder="<?php echo app('translator')->get('Role Name'); ?>" value="<?php echo e(old('name', $role->name)); ?>" >
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
                        <div class="form-group row mb-0">
                            <label class="col-md-2 col-form-label ambitious-center"><h4><?php echo app('translator')->get('Role For'); ?></h4></label>
                            <div class="col-md-8">
                                <select class="form-control ambitious-form-loading <?php $__errorArgs = ['role_for'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="role_for" id="role_for">
                                    <option value="1" <?php echo e(old('role_for', $role->role_for) == 1 ? 'selected' : ''); ?>><?php echo app('translator')->get('General User'); ?></option>
                                    <option value="0" <?php echo e(old('role_for', $role->role_for) == 0 ? 'selected' : ''); ?>><?php echo app('translator')->get('System User'); ?></option>
                                </select>
                                <?php $__errorArgs = ['role_for'];
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
                        <div id="user_block">
                            <div class="form-group row mb-0">
                                <label class="col-md-2 col-form-label ambitious-center"><h4 class="ambitious-role-margin"><?php echo app('translator')->get('Price'); ?> <b class="ambitious-crimson">*</b></h4></label>
                                <div class="col-md-8">
                                    <input class="form-control ambitious-form-loading <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" id="price" type="text" placeholder="<?php echo app('translator')->get('Role Price'); ?>" value="<?php echo e(old('price', $role->price)); ?>">
                                    <?php $__errorArgs = ['price'];
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
                            <div class="form-group row mb-0">
                                <label class="col-md-2 col-form-label ambitious-center"><h4 class="ambitious-role-margin"><?php echo app('translator')->get('Validity Day'); ?> <b class="ambitious-crimson">*</b></h4></label>
                                <div class="col-md-8">
                                    <input class="form-control ambitious-form-loading <?php $__errorArgs = ['validity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="validity" id="validity" type="text" placeholder="<?php echo app('translator')->get('Validity Day'); ?>" value="<?php echo e(old('validity', $role->validity)); ?>" >
                                    <?php $__errorArgs = ['validity'];
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
                        <div class="form-group row mb-0">
                            <label class="col-md-2 col-form-label ambitious-center"><h4 class="ambitious-role-margin"><?php echo app('translator')->get('Permissions'); ?></h4></label>
                            <div class="col-md-10">
                                <div class="form-control-plaintext">
                                    <?php
                                        $lastName = '';
                                    ?>
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($lastName != $permission->display_name): ?>
                                            <?php
                                                $lastName = $permission->display_name;
                                            ?>
                                            <div role="checkbox" class="custom-padding-top-5">
                                                <h4 class="ambitious-role-margin-extra"><?php echo e($lastName); ?></h4>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                            $pname = explode("-", $permission->name);
                                            $display = end($pname);
                                        ?>
                                        <?php if($display == 'read'): ?>
                                            <div class="role-form-ambi checkbox checkbox-info">
                                                <input name="permission[]" id="permission_<?php echo e($permission->id); ?>" type="checkbox" value="<?php echo e($permission->id); ?>" <?php if(is_array(old('permission', $rolePermissions)) && in_array($permission->id, old('permission', $rolePermissions))): ?> checked <?php endif; ?>>
                                                <label class="ambitious-capital" for="permission_<?php echo e($permission->id); ?>">
                                                    <?php echo e($display); ?>

                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($display == 'create'): ?>
                                            <div class="role-form-ambi checkbox checkbox-primary">
                                                <input name="permission[]" id="permission_<?php echo e($permission->id); ?>" type="checkbox" value="<?php echo e($permission->id); ?>" <?php if(is_array(old('permission', $rolePermissions)) && in_array($permission->id, old('permission', $rolePermissions))): ?> checked <?php endif; ?>>
                                                <label class="ambitious-capital" for="permission_<?php echo e($permission->id); ?>">
                                                    <?php echo e($display); ?>

                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($display == 'update'): ?>
                                            <div class="role-form-ambi checkbox checkbox-warning">
                                                <input name="permission[]" id="permission_<?php echo e($permission->id); ?>" type="checkbox" value="<?php echo e($permission->id); ?>" <?php if(is_array(old('permission', $rolePermissions)) && in_array($permission->id, old('permission', $rolePermissions))): ?> checked <?php endif; ?>>
                                                <label class="ambitious-capital" for="permission_<?php echo e($permission->id); ?>">
                                                    <?php echo e($display); ?>

                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($display == 'delete'): ?>
                                            <div class="role-form-ambi checkbox checkbox-danger">
                                                <input name="permission[]" id="permission_<?php echo e($permission->id); ?>" type="checkbox" value="<?php echo e($permission->id); ?>" <?php if(is_array(old('permission', $rolePermissions)) && in_array($permission->id, old('permission', $rolePermissions))): ?> checked <?php endif; ?>>
                                                <label class="ambitious-capital" for="permission_<?php echo e($permission->id); ?>">
                                                    <?php echo e($display); ?>

                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <label class="col-md-2 col-form-label"></label>
                            <div class="col-md-8">
                                <input type="submit" value="<?php echo app('translator')->get('Submit'); ?>" class="btn btn-outline btn-info btn-lg"/>
                            </div>
                        </div>
                        <br>
                    </form>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
    <script src="<?php echo e(asset('assets/js/custom/roles/edit.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/roles/edit.blade.php ENDPATH**/ ?>