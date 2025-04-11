
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor-detail-create')): ?>
                        <h3>
                            <a href="<?php echo e(route('doctor-details.create')); ?>" class="btn btn-outline btn-info">
                                + <?php echo app('translator')->get('Add Doctor'); ?>
                            </a>
                            <span class="pull-right"></span>
                        </h3>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('Dashboard'); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo app('translator')->get('Doctor List'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo app('translator')->get('Doctor List'); ?></h3>
                    <div class="card-tools">
                        <a class="btn btn-primary" target="_blank" href="<?php echo e(route('doctor-details.index')); ?>?export=1">
                            <i class="fas fa-cloud-download-alt"></i> <?php echo app('translator')->get('Export'); ?>
                        </a>
                        <button class="btn btn-default" data-toggle="collapse" href="#filter">
                            <i class="fas fa-filter"></i> <?php echo app('translator')->get('Filter'); ?>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="filter" class="collapse <?php if(request()->isFilterActive): ?> show <?php endif; ?>">
                        <div class="card-body border">
                            <form action="" method="get" role="form" autocomplete="off">
                                <input type="hidden" name="isFilterActive" value="true">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Name'); ?></label>
                                            <input type="text" name="name" class="form-control" value="<?php echo e(request()->name); ?>" placeholder="<?php echo app('translator')->get('Name'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Email'); ?></label>
                                            <input type="text" name="email" class="form-control" value="<?php echo e(request()->email); ?>" placeholder="<?php echo app('translator')->get('Email'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Phone'); ?></label>
                                            <input type="text" name="phone" class="form-control" value="<?php echo e(request()->phone); ?>" placeholder="<?php echo app('translator')->get('Phone'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-info"><?php echo app('translator')->get('Submit'); ?></button>
                                        <?php if(request()->isFilterActive): ?>
                                            <a href="<?php echo e(route('doctor-details.index')); ?>" class="btn btn-secondary"><?php echo app('translator')->get('Clear'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped" id="laravel_datatable">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('ID'); ?></th>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('Email'); ?></th>
                                <th><?php echo app('translator')->get('Phone'); ?></th>
                                <th><?php echo app('translator')->get('Department'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th data-orderable="false"><?php echo app('translator')->get('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $doctorDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctorDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($doctorDetail->user->id); ?></td>
                                    <td><?php echo e($doctorDetail->user->name); ?></td>
                                    <td><?php echo e($doctorDetail->user->email); ?></td>
                                    <td><?php echo e($doctorDetail->user->phone); ?></td>
                                    <td><?php echo e($doctorDetail->hospitalDepartment->name); ?></td>
                                    <td>
                                        <?php if($doctorDetail->user->status == 1): ?>
                                            <span class="badge badge-pill badge-success"><?php echo app('translator')->get('Active'); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-danger"><?php echo app('translator')->get('Inactive'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('doctor-details.show', $doctorDetail)); ?>" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="<?php echo app('translator')->get('View'); ?>"><i class="fa fa-eye ambitious-padding-btn"></i></a>&nbsp;&nbsp;
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor-detail-update')): ?>
                                            <a href="<?php echo e(route('doctor-details.edit', $doctorDetail)); ?>" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="<?php echo app('translator')->get('Edit'); ?>"><i class="fa fa-edit ambitious-padding-btn"></i></a>&nbsp;&nbsp;
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor-detail-delete')): ?>
                                            <a href="#" data-href="<?php echo e(route('doctor-details.destroy', $doctorDetail)); ?>" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="modal" data-target="#myModal" title="<?php echo app('translator')->get('Delete'); ?>"><i class="fa fa-trash ambitious-padding-btn"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($doctorDetails->withQueryString()->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('layouts.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/doctor-detail/index.blade.php ENDPATH**/ ?>