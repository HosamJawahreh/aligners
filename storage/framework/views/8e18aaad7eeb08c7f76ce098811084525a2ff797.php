
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company-create')): ?>
                        <h3>
                            <a href="<?php echo e(route('company.create')); ?>" class="btn btn-outline btn-info">+ <?php echo e(__('Add Company')); ?></a>
                            <span class="pull-right"></span>
                        </h3>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('Company List')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('Company List')); ?></h3>
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Company Name'); ?></label>
                                            <input type="text" name="company_name" class="form-control" value="<?php echo e(request()->company_name); ?>" placeholder="<?php echo app('translator')->get('Company Name'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Company Domain'); ?></label>
                                            <input type="text" name="company_domain" class="form-control" value="<?php echo e(request()->company_domain); ?>" placeholder="<?php echo app('translator')->get('Company Domain'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Company Email'); ?></label>
                                            <input type="text" name="company_email" class="form-control" value="<?php echo e(request()->company_email); ?>" placeholder="<?php echo app('translator')->get('Company Email'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-info"><?php echo app('translator')->get('Submit'); ?></button>
                                        <?php if(request()->isFilterActive): ?>
                                            <a href="<?php echo e(route('company.index')); ?>" class="btn btn-secondary"><?php echo app('translator')->get('Clear'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped compact table-width" id="laravel_datatable">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Id')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Domain')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Created')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th data-orderable="false"><?php echo e(__('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($company->id); ?></td>
                                    <td><?php echo e($company->company_name); ?></td>
                                    <td><?php echo e($company->domain); ?></td>
                                    <td><?php echo e($company->company_email); ?></td>
                                    <td><?php echo e(date($company->date_format, strtotime($company->created_at))); ?></td>
                                    <td>
                                        <?php if($company->enabled == '1'): ?>
                                            <span class="badge badge-pill badge-success"><?php echo app('translator')->get('Enabled'); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-danger"><?php echo app('translator')->get('Disabled'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company-update')): ?>
                                            <a href=" <?php echo e(route('company.edit', $company)); ?>" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="<?php echo app('translator')->get('Edit'); ?>"><i class="fa fa-edit ambitious-padding-btn"></i></a>&nbsp;&nbsp;
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company-delete')): ?>
                                            <a href="#" data-href="<?php echo e(route('company.destroy', $company)); ?>" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="modal" data-target="#myModal" title="<?php echo app('translator')->get('Delete'); ?>"><i class="fa fa-trash ambitious-padding-btn"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($companies->withQueryString()->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('layouts.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/companies/index.blade.php ENDPATH**/ ?>