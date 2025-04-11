                                            <?php 
                                            $patientDetails=DB::table('doctor_details')->get();
                                            ?>
                                            


<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('patient-case-studies-create')): ?>
                        <h3><a href="<?php echo e(route('patient-case-studies.create')); ?>" class="btn  btn-success">+ <?php echo app('translator')->get('Add New Patient'); ?></a>
                            <span class="pull-right"></span>
                        </h3>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('Dashboard'); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo app('translator')->get('Patient Case Studies List'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color:#17a2b8; color:white; font-weight:bold;">
                    <h3 class="card-title pt-2"><i class="fas fa-list"></i> <b> <?php echo app('translator')->get('Patient Case Studies List'); ?></b></h3>
                    <div class="card-tools">
                        <button class="btn btn-dark text-light" data-toggle="collapse" href="#filter"><i class="fas fa-filter"></i> <?php echo app('translator')->get('Filter'); ?></button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="filter" class="collapse  <?php if(request()->isFilterActive): ?> show <?php endif; ?>">
                        <div class="card-body border">
                            <form action="" method="get" role="form" autocomplete="off">
                                <input type="hidden" name="isFilterActive" value="true">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Name'); ?></label>
                                            <input type="text" name="name" class="form-control" value="<?php echo e(request()->name); ?>" placeholder="<?php echo app('translator')->get('Name'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Email'); ?></label>
                                            <input type="text" name="email" class="form-control" value="<?php echo e(request()->email); ?>" placeholder="<?php echo app('translator')->get('Email'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Phone'); ?></label>
                                            <input type="text" name="phone" class="form-control" value="<?php echo e(request()->phone); ?>" placeholder="<?php echo app('translator')->get('Phone'); ?>">
                                        </div>
                                    </div>
                                    <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Doctor'); ?></label>
                                            <select class="form-control" name="doctor">
                                                
                                            <?php $__currentLoopData = $patientDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patientDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $doctor=DB::table('users')->where('id' ,$patientDetail->user_id)->first();?>
                                            <?php if($doctor): ?>
                                            <option value="<?php echo e($doctor->id); ?>" <?php if(request()->doctor==$doctor->id): ?> selected <?php endif; ?>><?php echo e($doctor->name); ?></option>  
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="col-sm-3 mt-4"><br>
                                        <button type="submit" class="btn btn-success btn-sm"><?php echo app('translator')->get('Submit'); ?></button>
                                        <?php if(request()->isFilterActive): ?>
                                            <a href="<?php echo e(route('patient-case-studies.index')); ?>" class="btn btn-dark btn-sm"><?php echo app('translator')->get('Clear'); ?></a>
                                        <?php endif; ?>
                                    </div>                                
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped text-center" id="laravel_datatable">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('Email'); ?></th>
                                <th><?php echo app('translator')->get('Phone'); ?></th>
                                <th><?php echo app('translator')->get('Doctor'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Created At'); ?></th>
                                <th data-orderable="false"><?php echo app('translator')->get('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                            <?php $unique_data=array(); ?>
                            
                           <?php $__currentLoopData = $patientCaseStudy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patientDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if(!in_array($patientDetail->user->id, $unique_data)): ?>
                            <?php $status=DB::table('patient_case_studies')->Where('user_id',$patientDetail->user_id)->OrderBy('id','desc')->first();
                            $patientDetail->status=$status->status;
                            ?>
                            <?php array_push($unique_data,$patientDetail->user->id);?>
                              
                                <tr>
                                    <td><?php echo e($patientDetail->user->name); ?></td>
                                    <td><?php echo e($patientDetail->user->email); ?></td>
                                    <td><?php echo e($patientDetail->user->phone); ?></td>
                                    <?php $in_charge_doctor=DB::table('users')->where('id' ,$patientDetail->user->company_id)->first();?>
                                    <td><?php echo e($in_charge_doctor->name); ?></td>
                                    
                                    
                                    <?php if($patientDetail->status==6): ?>
                                    <td><p class="text-right text-warning text-bold">Modification Needed</p></td>
                                    <?php elseif($patientDetail->status==5): ?>
                                    <td><p class="text-right text-warning text-bold">Refinement Needed</p></td>
                                    <?php elseif($patientDetail->status==4): ?>
                                    <td><p class="text-right text-danger text-bold">Rejected</p></td>
                                    <?php elseif($patientDetail->status==3): ?>
                                    <td><p class="text-right text-success text-bold">Approved</p></td>
                                    <?php elseif($patientDetail->status==2): ?>
                                    <td><p class="text-right text-primary text-bold">Waiting For Approval</p></td>
                                    <?php elseif($patientDetail->status==1): ?>
                                    <td><p class="text-right text-primary text-bold">Waiting For Manufacture Case Plan</p></td>
                                    <?php endif; ?>
                                    
                                    <td><?php echo e($patientDetail->user->created_at); ?></td>
                                    <td>
                                        <a style="background-color:#17a2b8;" href="<?php echo e(route('patient-case-studies.show', $patientDetail)); ?>" class="btn btn-dark  rounded btn-sm" data-toggle="tooltip" title="<?php echo app('translator')->get('View'); ?>"><b><i class="fa fa-eye ambitious-padding-btn"></i>&nbsp;Show The Case <b></a>&nbsp;&nbsp;
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('patient-case-studies-update')): ?>
                                            <a hidden href="<?php echo e(route('patient-case-studies.edit', $patientDetail)); ?>" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="<?php echo app('translator')->get('Edit'); ?>"><i class="fa fa-edit ambitious-padding-btn"></i></a>&nbsp;&nbsp;
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('patient-case-studies-delete')): ?>
                                            <a  href="#" data-href="<?php echo e(route('patient-case-studies.destroy', $patientDetail)); ?>" class="btn btn-danger text-light btn-outline btn-circle btn-lg" data-toggle="modal" data-target="#myModal" title="<?php echo app('translator')->get('Delete'); ?>"><i class="fa fa-trash ambitious-padding-btn"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($patientCaseStudy->withQueryString()->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('layouts.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/patient-case-study/index.blade.php ENDPATH**/ ?>