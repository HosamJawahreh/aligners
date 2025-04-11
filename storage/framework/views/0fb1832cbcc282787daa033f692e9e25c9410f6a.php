
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                        <h3>
                            <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-outline btn-info">+ <?php echo app('translator')->get('Add Role'); ?></a>
                            <span class="pull-right"></span>
                        </h3>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('Dashboard'); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo app('translator')->get('Role List'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo app('translator')->get('Role List'); ?></h3>
                    <div class="card-tools">
                        <button class="btn btn-default" data-toggle="collapse" href="#filter"><i class="fas fa-filter"></i> <?php echo app('translator')->get('Filter'); ?></button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="filter" class="collapse <?php if(request()->isFilterActive): ?> show <?php endif; ?>">
                        <div class="card-body border">
                            <form action="" method="get" role="form" autocomplete="off">
                                <input type="hidden" name="isFilterActive" value="true">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Role Name'); ?></label>
                                            <input type="text" name="name" class="form-control" value="<?php echo e(request()->name); ?>" placeholder="<?php echo app('translator')->get('Role Name'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Role For'); ?></label>
                                            <select class="form-control" name="role_for">
                                                <option value="">--<?php echo app('translator')->get('Select'); ?>--</option>
                                                <option value="0" <?php echo e(old('role_for', request()->role_for) === '0' ? 'selected' : ''); ?>><?php echo app('translator')->get('User'); ?></option>
                                                <option value="1" <?php echo e(old('role_for', request()->role_for) === '1' ? 'selected' : ''); ?>><?php echo app('translator')->get('Staff'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-info"><?php echo app('translator')->get('Submit'); ?></button>
                                        <?php if(request()->isFilterActive): ?>
                                            <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-secondary"><?php echo app('translator')->get('Clear'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped" id="laravel_datatable">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Id'); ?></th>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('Price'); ?></th>
                                <th><?php echo app('translator')->get('Validity'); ?></th>
                                <th><?php echo app('translator')->get('Role For'); ?></th>
                                <th><?php echo app('translator')->get('Default'); ?></th>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['role-delete', 'role-edit'])): ?>
                                    <th data-orderable="false"><?php echo app('translator')->get('Actions'); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($role->id); ?></td>
                                    <td><?php echo e($role->name); ?></td>
                                    <td><?php echo e($role->price); ?></td>
                                    <td><?php echo e($role->validity); ?></td>
                                    <td>
                                        <?php if($role->role_for == '1'): ?>
                                            <span class="badge badge-pill badge-success"><?php echo app('translator')->get('General User'); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-primary"><?php echo app('translator')->get('System User'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($role->is_default == '1'): ?>
                                            <span class="badge badge-pill badge-info"><?php echo app('translator')->get('Yes'); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-danger"><?php echo app('translator')->get('No'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-update')): ?>
                                            <a href="<?php echo e(route('roles.edit', $role)); ?>" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="<?php echo app('translator')->get('Edit'); ?>"><i class="fa fa-edit ambitious-padding-btn"></i></a>&nbsp;&nbsp;
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-delete')): ?>
                                            <a href="#" data-href="<?php echo e(route('roles.destroy', $role)); ?>" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="modal" data-target="#myModal" title="<?php echo app('translator')->get('Delete'); ?>"><i class="fa fa-trash ambitious-padding-btn"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($roles->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('layouts.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/roles/index.blade.php ENDPATH**/ ?>