<?php session_start(); ?> 


<?php $__env->startSection('content'); ?>

<?php

$patientDetail=DB::table('patient_case_studies')->Where('user_id',$patientCaseStudy->user->id)->OrderBy('id','desc')->first();
$patientCasetype=DB::table('users')->Where('id',$patientCaseStudy->user->id)->OrderBy('id','desc')->first();

$patientDetails=DB::table('patient_case_studies')->Where('user_id',$patientCaseStudy->user->id)->OrderBy('id','desc')->get();

$in_charge_doctor=DB::table('users')->where('id' ,$patientCaseStudy->user->company_id)->first();

?>


<section class="content-header">
  
<?php if($patientDetail->status==5): ?>    

<div class="container-fluid">
  <div class="progress-group">
    <div class="wrapper" style="min-height:0px;">
      <div class="step step01 complete">
        <progress class="progress" value="100" max="100" aria-describedby="Step 01"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step02">
        <progress class="progress" value="0" max="100" aria-describedby="Step 02"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step03">
        <progress class="progress" value="0" max="100" aria-describedby="Step 03"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step04">
        <progress class="progress" value="0" max="100" aria-describedby="Step 04"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step05">
        <progress class="progress " value="100" max="100" aria-describedby="Step 05"></progress>
        <div class="progress-circle"></div>
      </div>
    </div>
    <div class="progress-labels">
      <div class="label">Case Created</div>
      <div class="label">Case Plan Approved</div>
      <div class="label">Ready For Manufacture</div>
      <div class="label">Approved</div>
      <div class="label">Refinement</div>
    </div>
  </div>
</div>    


   
<?php elseif($patientDetail->status==3): ?>    

<div class="container-fluid">
  <div class="progress-group">
    <div class="wrapper" style="min-height:0px;">
      <div class="step step01 complete">
        <progress class="progress" value="100" max="100" aria-describedby="Step 01"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step02">
        <progress class="progress" value="100" max="100" aria-describedby="Step 02"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step03">
        <progress class="progress" value="100" max="100" aria-describedby="Step 03"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step04">
        <progress class="progress" value="100" max="100" aria-describedby="Step 04"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step05">
        <progress class="progress" value="0" max="100" aria-describedby="Step 05"></progress>
        <div class="progress-circle"></div>
      </div>
    </div>
    <div class="progress-labels">
      <div class="label">Case Created</div>
      <div class="label">Case Plan Approved</div>
      <div class="label">Ready For Manufacture</div>
      <?php if($refinement_count>0): ?>    
      <div class="label">Approved<p class="text-danger">Refinement</p></div>
      <?php else: ?>
       <div class="label">Approved</div>
      <?php endif; ?>
      <div class="label">Refinement</div>
    </div>
  </div>
</div>    

     
   
   
<?php elseif($patientDetail->status==4 || $patientDetail->status==6): ?>    

<div class="container-fluid">
  <div class="progress-group">
    <div class="wrapper" style="min-height:0px;">
      <div class="step step01 complete">
        <progress class="progress" value="100" max="100" aria-describedby="Step 01"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step02">
        <progress class="progress" value="100" max="100" aria-describedby="Step 02"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step03">
        <progress class="progress" value="50" max="100" aria-describedby="Step 03"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step04">
        <progress class="progress" value="0" max="100" aria-describedby="Step 04"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step05">
        <progress class="progress" value="0" max="100" aria-describedby="Step 05"></progress>
        <div class="progress-circle"></div>
      </div>
    </div>
    <div class="progress-labels">
      <div class="label">Case Created</div>
      <div class="label">Case Plan Waiting For Approval</div>
      <?php if($refinement_count>0): ?>   
      <div class="label">Modification Needed<p class="text-danger">Refinement</p></div> 
      <?php else: ?>
      <div class="label">Modification Needed</div> 
      <?php endif; ?>
      <div class="label">Approved</div>
      <div class="label">Refinement</div>
    </div>
  </div>
</div>    

   
   
<?php elseif($patientDetail->status==2): ?>    

<div class="container-fluid">
  <div class="progress-group">
    <div class="wrapper" style="min-height:0px;">
      <div class="step step01 complete">
        <progress class="progress" value="100" max="100" aria-describedby="Step 01"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step02">
        <progress class="progress" value="100" max="100" aria-describedby="Step 02"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step03">
        <progress class="progress" value="0" max="100" aria-describedby="Step 03"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step04">
        <progress class="progress" value="0" max="100" aria-describedby="Step 04"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step05">
        <progress class="progress" value="0" max="100" aria-describedby="Step 05"></progress>
        <div class="progress-circle"></div>
      </div>
    </div>
    <div class="progress-labels">
      <div class="label">Case Created</div>
      <?php if($refinement_count>0): ?>  
      <div class="label">Case Plan Waiting For Approval <p class="text-danger">Refinement</p></div>
      <?php else: ?>
      <div class="label">Case Plan Waiting For Approval </div>
      <?php endif; ?>
      <div class="label">Case Status</div>
      <div class="label">Approved</div>
      <div class="label">Refinement</div>
    </div>
  </div>
</div>    

   
    
<?php elseif($patientDetail->status==1): ?>    

<div class="container-fluid">
  <div class="progress-group">
    <div class="wrapper" style="min-height:0px;">
      <div class="step step01 complete">
        <progress class="progress" value="100" max="100" aria-describedby="Step 01"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step02">
        <progress class="progress" value="50" max="100" aria-describedby="Step 02"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step03">
        <progress class="progress" value="0" max="100" aria-describedby="Step 03"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step04">
        <progress class="progress" value="0" max="100" aria-describedby="Step 04"></progress>
        <div class="progress-circle"></div>
      </div>
      <div class="step step05">
        <progress class="progress" value="0" max="100" aria-describedby="Step 05"></progress>
        <div class="progress-circle"></div>
      </div>
    </div>
    <div class="progress-labels">
      <div class="label">Case Created</div>
      <div class="label">Waiting For Manufactured Case Plan</div>
      <div class="label">Case Status</div>
      <div class="label">Approved</div>
      <div class="label">Refinement</div>
    </div>
  </div>
</div>    
<?php endif; ?>    
    
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                
                
    <div id="viewer"  style="" hidden>
    </div>

    <div class="center" hidden>
      <span id="name">Sample 01</span>
      <span id="loading"></span>
    </div>

    <div class="center" hidden>
      <button class="button" id="sample-1-button">
        obj 1
      </button>
      <button class="button" id="sample-2-button">
        obj 2a
      </button>
      <button class="button" id="sample-3-button">
        obj 3
      </button>
      <button class="button" id="sample-4-button">
        obj 4
      </button>
      
    </div>

    <div class="center" hidden>
      <input class="mr2" id="grid-button" type="checkbox" checked>
        Grid
      </input>
      <button class="button" id="fullscreen-button">
        Go Full Screen
      </button>
    </div>
                
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('patient-case-studies.index')); ?>"><?php echo app('translator')->get('Patient'); ?></a></li>
                    <li class="breadcrumb-item active"><?php echo app('translator')->get('Patient Case Study'); ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>




<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                
                
                <p class="text-left">Case Created : <?php echo e(date('D-d-m-Y | h:i:s a', strtotime($patientCaseStudy->created_at) )); ?></p>
                
            
                
                                    <?php if($patientDetail->status==6): ?>
                                    <td><p class="text-right text-warning text-bold">Modification Needed</p></td>
                                    <?php elseif($patientDetail->status==5): ?>
                                    <td><p class="text-right text-danger text-bold">Refinement Needed</p></td>
                                    <?php elseif($patientDetail->status==4): ?>
                                    <td><p class="text-right text-danger text-bold">Rejected</p></td>
                                    <?php elseif($patientDetail->status==3): ?>
                                    <td><p class="text-right text-success text-bold">Approved</p></td>
                                    <?php elseif($patientDetail->status==2): ?>
                                    <td><p class="text-right text-primary text-bold">Waiting For Approval</p></td>
                                    <?php elseif($patientDetail->status==1): ?>
                                    <td><p class="text-right text-primary text-bold">Waiting For Manufacture Case Plan</p></td>
                                    <?php endif; ?>
                
<hr> 

 <div class="row text-center">
     
                    <div class="col-md-2 text-center">
                        <div class="form-group">
                        <label for="name">
                            <img src="/<?php echo e($in_charge_doctor->photo); ?>" alt="<?php echo e($ApplicationSetting->item_name); ?>" width="100" style="border-radius:15px;"></label>
                            <p class="text-dark text-bold"><?php echo e($in_charge_doctor->name); ?></p>
                        </div>
                    </div>  
                    <div class="col-md-2 text-center">
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('Patient'); ?></label>
                    <p><img width="48" height="48" src="https://img.icons8.com/fluency/48/user-male-circle--v1.png" alt="user-male-circle--v1"/> <?php echo e($patientCaseStudy->user->name); ?></p>

                        </div>
                    </div>  
                    <div class="col-md-2 text-center">
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('Case Type'); ?></label>
                            <?php if($patientCasetype->status==2): ?>
                            <p class="text-success text-bold">Full Case</p>
                            <?php endif; ?>
                            <?php if($patientCasetype->status==3): ?>
                            <p class="text-success text-bold">Devided Stages</p>
                            <?php endif; ?>
                        </div>
                    </div>  
                    <div class="col-md-2 text-center">
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('Note'); ?></label>
                            <p class="text-success text-bold"><?php echo e($patientCaseStudy->notes); ?></p>
                        </div>
                    </div>  
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('Gender/Age'); ?></label>
                    <p><?php echo e($patientCaseStudy->user->gender); ?> / <?php echo e(date_diff(date_create($patientCaseStudy->user->date_of_birth), date_create('today'))->y); ?> Year</p>
                        </div>
                    </div>  
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('Contact'); ?></label>
                            <p><?php echo e($patientCaseStudy->user->email); ?><br><?php echo e($patientCaseStudy->user->phone); ?></p>
                        </div>
                    </div>  

                     </div>
                     
                     <hr>
                     
                <div class="row">
                <div class="text-center col-md-12">
                    <div class="card-tools text-center mb-3">
                        <button class="btn btn-primary btn-sm" id="messages" data-toggle="collapse" href="#filter4"><i class="fas fa-comment fa-solid"></i> <?php echo app('translator')->get('Messages'); ?></button>
                        <button class="btn btn-dark btn-sm" id="data" data-toggle="collapse" href="#filter1"><i class="fas fa-file fa-solid"></i> <?php echo app('translator')->get('View Case Data'); ?></button>
                        <button class="btn btn-success btn-sm" id="manufacture"  data-toggle="collapse" href="#filter2"><i class="fas fa-play fa-solid"></i> <?php echo app('translator')->get('Manufacture Case Plan'); ?></button>
                        <button class="btn btn-warning btn-sm" id="modification" data-toggle="collapse" href="#filter3"><i class="fas fa-edit fa-solid"></i> <?php echo app('translator')->get('Modification & History'); ?></button>
                        <button class="btn btn-danger btn-sm" id="refinement" data-toggle="collapse" href="#filter"><i class="fas fa-sort fa-solid"></i> <?php echo app('translator')->get('Order Refinement'); ?></button>
                    </div>
                     
                    
                        <div id="filter" class="collapse  <?php if(request()->isFilterActive): ?> show <?php else: ?> hide <?php endif; ?>">
                        <div class="card-body border">
                            <form action="<?php echo e(route('patient-case-studies.store')); ?>" method="post" role="form" autocomplete="off" enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>
                            
                            <input  class="form-control" name="user_id" type="hidden" value="<?php echo e($patientCaseStudy->user->id); ?>">
                           <input  class="form-control" name="status" type="hidden" value="5">
                           <input  class="form-control" name="type" type="hidden" value="refinement">
                    
                         <div class="row text-left">
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
   
 
                        
<hr>

<div class="col-md-6 text-center">                     
<label for="refUpper"><h4>Please Upload <span class="text-success" style="font-size:18px;"><strong>Upper</strong></span> 3D Model  - (<span style="color:#17a2b8; font-size:18px;"> Stl , Obj , Ply </span>) <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></h4></label>
<div class="file-loading">
<input id="refUpper" name="refUpper" type="file" accept=".stl,.obj,.ply">
</div>
<input class="form-control" id="refUpperLink" name="refUpperLink" type="text"  readonly>
<div id="refUpper-error" style="margin-top:10px;display:none"></div>
<div id="refUpper-success" class="alert alert-success" style="margin-top:10px;display:none;"></div>
</div> 

<div class="col-md-6 text-center">
<label for="refLower"><h4>Please Upload <span class="text-danger" style="font-size:18px;"><strong>Lower</strong></span> 3D Model  - (<span style="color:#17a2b8; font-size:18px;">  Stl , Obj , Ply </span>) <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></h4></label>
<div class="file-loading">
<input id="refLower" name="refLower" type="file" accept=".stl,.obj,.ply">
</div>
<input class="form-control" id="refLowerLink" name="refLowerLink" type="text" readonly>
<div id="refLower-error" style="margin-top:10px;display:none"></div>
<div id="refLower-success" class="alert alert-success" style="margin-top:10px;display:none"></div>
</div>
<br><br><hr> 
                   
                    
                    
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
                        <button type="submit" class="btn btn-danger btn-sm w-100" id="refinement"><i class="fas fa-sort fa-solid"></i> <?php echo app('translator')->get('Order Refinement'); ?></button>
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
                            
                        </div></div></div>
                
                
                
            
                        <div id="filter1" class="collapse  <?php if(request()->isFilterActive): ?> show <?php endif; ?>">
                        <div class="card-body border"> 

              

                    <hr>
                    <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="form-group">
                            <p class="text-dark text-bold"><?php echo e(date('D-d-m-Y | h:i:s a', strtotime($patientCaseStudy->created_at) )); ?></p>
                        </div>
                    </div>  
                   
                    <div class="col-md-2 text-center" hidden>
                        <div class="form-group">
                    
                        <label for="name"><img src="/<?php echo e($in_charge_doctor->photo); ?>" alt="<?php echo e($ApplicationSetting->item_name); ?>" width="100" style="border-radius:50%;"></label>
                            <p class="text-dark text-bold"><?php echo e($in_charge_doctor->name); ?></p>
                        </div>
                    </div>  
                    <div class="col-md-3 text-center" hidden>
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('Note'); ?></label>
                            <p class="text-success text-bold"><?php echo e($patientCaseStudy->notes); ?></p>
                        </div>
                    </div>  
                    </div>

                     <?php   
                    $photos=json_decode($patientCaseStudy->user->photo);
                    $slide=0;
                    ?>
                    <?php if(is_array($photos)): ?>
                    
                    <h6 style="text-align:center" hidden><?php echo e($patientCaseStudy->user->name); ?></h6>
                    
                    
                    

 <div class="container">                    
   <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
    <div class="container__img-holder">
      <img class="demo cursor" src="/<?php echo e($photo); ?>" style="width:100%; height:120px; width:120px; border-radius:6px;">
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
                      <hr>
                    <div class="card-tools">
                        <div class="row">
                        <?php if($patientCaseStudy->upper): ?>
                        <div class="col-md-6 text-right">
                        <form method="get" action="<?php echo e(asset($patientCaseStudy->upper)); ?>" autocomplete="off">
                        <button class="btn btn-dark btn-sm">
                        <b>Download <span class="text-success">Upper</span> File</b>
                        <img width="25" height="25" src="https://img.icons8.com/wired/25/F1F1F1/download--v1.png" alt="download--v1" class="text-white text-bold"/>
                        </button></form></div>
                        <?php endif; ?>
                        
                        
                        <?php if($patientCaseStudy->lower): ?>
                        <div class="col-md-6 text-left">
                        <form method="get" action="<?php echo e(asset($patientCaseStudy->lower)); ?>" autocomplete="off">
                        <button class="btn btn-dark btn-sm">
                        <b>Download <span class="text-danger">Lower</span> File</b>
                        <img width="25" height="25" src="https://img.icons8.com/wired/25/F1F1F1/download--v1.png" alt="download--v1"  style="color:white;" class="text-white text-bold"/>
                        </button></form></div>
                        <?php endif; ?>

                        </div></div>    
    
    
    </div>
<?php endif; ?>                   
                    
 <div class="img-popup" style="z-index:10000000;">
  <img src="" alt="Popup Image">
  <div class="close-btn">
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
</div>                

                    
               
                    
                    
<?php if($refinement_count>0): ?>             
<?php $__currentLoopData = $refinement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patientCaseStudy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<hr>
           <div class="row">
               
               
                        <div class="col-md-4 text-left">
                        <div class="form-group">
                            <h6 class="text-danger"><b>Refinement</b></h6>
                            <p class="text-dark text-bold"><?php echo e(date('D-d-m-Y | h:i:s a', strtotime($patientCaseStudy->created_at))); ?></p>
                        </div></div>
                        
                        <div class="col-md-4 text-center">
                        <div class="form-group">
                            <h6 class="text-dark"><b>Note</b></h6>
                            <p class="text-success text-bold"><?php echo e($patientCaseStudy->notes); ?></p>
                        </div></div>
                        

          </div>  
                   

<?php   
$photos=json_decode($patientCaseStudy->photo);
?>                    
 <?php if($photos): ?>                   
 <div class="container">                    
   <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
    <div class="container__img-holder">
      <img class="demo cursor" src="/<?php echo e($photo); ?>" style="width:100%; height:120px; width:120px; border-radius:6px;">
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

 <div class="img-popup" style="z-index:10000000;">
  <img src="" alt="Popup Image">
  <div class="close-btn">
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
</div>                   
 <?php endif; ?>                   
                    
                      <hr>
                    <div class="card-tools">
                        <div class="row">
                        <?php if($patientCaseStudy->upper): ?>
                        <div class="col-md-6 text-right">
                        <form method="get" action="<?php echo e(asset($patientCaseStudy->upper)); ?>" autocomplete="off">
                        <button class="btn btn-dark btn-sm" >
                        <b>Download <span class="text-success">Upper</span> File</b>
                        <img width="25" height="25" src="https://img.icons8.com/wired/25/F1F1F1/download--v1.png" alt="download--v1" class="text-white text-bold"/>
                        </button></form></div>
                        <?php endif; ?>
                        
                        
                        <?php if($patientCaseStudy->lower): ?>
                        <div class="col-md-6 text-left">
                        <form method="get" action="<?php echo e(asset($patientCaseStudy->lower)); ?>" autocomplete="off">
                        <button class="btn btn-dark btn-sm">
                        <b>Download <span class="text-danger">Lower</span> File</b>
                        <img width="25" height="25" src="https://img.icons8.com/wired/25/F1F1F1/download--v1.png" alt="download--v1"  style="color:white;" class="text-white text-bold"/>
                        </button></form></div>
                        <?php endif; ?>

                        </div></div>  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?> 

                    </div> 
                    
         
                    
                    
                    
                    
                </div></div>
 
 
               
<div id="filter2" class="collapse">
<div class="card-body border"> 
<div class="row">
                   
 <div class="col-md-12 text-center">
                        <div class="form-group">

                            <?php if($allcaseplans): ?>
                            <div class="text-center row">
                            <?php $first=1;?>
                            <?php $__currentLoopData = $allcaseplans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allcaseplans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="text-center col-md-2 mb-5 mt-5" style="margin-left:60px;">

                            <form id="patientForm" class="form-material form-horizontal"  method="GET" enctype="multipart/form-data" autocomplete="off">
                                    <input  class="form-control" name="view" type="hidden" value="<?php echo e($allcaseplans->id); ?>">
                                    
                                    
                                    
                                    
                                    <?php if(empty($_GET['view'])): ?>
                                    
                                    <?php if($first==1): ?> 
                                    <span style="padding:15px;"><input  style="border:3px solid black;" type="submit" value="Active | <?php echo e(date('D d-m h:i A', strtotime($allcaseplans->created_at))); ?>" class="btn  rounded btn-success btn-sm"/></span>
                                    <?php else: ?>
                                    <span style="padding:15px;"><input type="submit" value="<?php echo e(date('D d-m h:i A', strtotime($allcaseplans->created_at))); ?>" class="btn rounded btn-warning btn-sm"/></span>
                                    <?php endif; ?>
                                    
                                    <?php else: ?>
                                    
                                    <?php if($first==1): ?>
                                    <span style="padding:15px;"><input <?php if($_GET['view']==$allcaseplans->id): ?> style="border:3px solid black;" <?php endif; ?> type="submit" value="Active | <?php echo e(date('D d-m h:i A', strtotime($allcaseplans->created_at))); ?>" class="btn  rounded btn-success btn-sm"/></span>
                                    <?php else: ?>
                                    <span style="padding:15px;"><input <?php if($_GET['view']==$allcaseplans->id): ?>style="border:3px solid black;"<?php endif; ?> type="submit" value="<?php echo e(date('D d-m h:i A', strtotime($allcaseplans->created_at))); ?>" class="btn rounded btn-warning btn-sm"/></span>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    
                                    
                                    
                             </form>                             
                             </div>
                             <?php $first++;?> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
                            
                            
                            <?php if(!empty($_GET['view'])): ?>
                            
                           <?php $view_id=$_GET['view']; $view=DB::table('patient_case_studies')->Where('id',$view_id)->first();?>
                            <embed type="text/html" src="<?php echo e(asset($view->link)); ?>" width="100%" height="750">
                            <?php else: ?>
                            <?php if(!empty($newcaseplan->link)): ?>
                            <embed type="text/html" src="<?php echo e(asset($newcaseplan->link)); ?>" width="100%" height="750">
                            <?php elseif(!empty($PatientCaseStudysec->link)): ?>
                            <embed type="text/html" src="<?php echo e(asset($PatientCaseStudysec->link)); ?>" width="100%" height="750">
                            <?php endif; ?>
                            <?php endif; ?>
                            
                        </div>
                    </div>                     
                    
</div><hr> 

<?php 
$activePlan=DB::table('patient_case_studies')->Where('user_id',$user->id)->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->first();
?>
                             
<?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
 <?php if(!empty($_GET['view'])): ?>

                            <?php if($stage->others==$_GET['view']): ?>
                            
                            <div class="text-center col-md-2 mb-5 mt-5">
                            <input type="submit" value="Steps From <?php echo e($stage->notes); ?> Are Manufactured" class="btn  rounded btn-success btn-sm"/>
                            </div>
                              
                             <?php endif; ?>
                             
                             
                             <?php else: ?>

                            <?php if($stage->others==$activePlan->id): ?>
                            
                            <div class="text-center col-md-2 mb-5 mt-5">
                            <input type="submit" value="Steps From <?php echo e($stage->notes); ?> Are Manufactured" class="btn  rounded btn-success btn-sm"/>
                            </div>
                              
                             <?php endif; ?>

                             <?php endif; ?> 
                             
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    

    
<?php if(auth()->check() && auth()->user()->hasRole('Doctor')): ?>
<?php if($PatientCaseStudysec && $patientDetail->status!=3): ?>
<div class="row">
    
    <div class="col-12 text-center">
            
                <form id="approve" class="form-material form-horizontal" action="<?php echo e(route('patient-case-studies.store')); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <input  class="form-control" name="user_id" type="hidden" value="<?php echo e($patientCaseStudy->user->id); ?>">
                    <div class="row">
                        
                        <div class="col-md-4 text-center"></div>
                        
                        <div class="col-md-4 text-center">
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-12">
                                    <input type="submit" onclick="return confirm('Are You Sure You Want To Approve Case Treatment Plan And Start Manufacture ?');" name="approve" value="<?php echo e(__('Approve And Start Manufacture')); ?>" class="btn rounded btn-success btn-md w-100"/>
                                </div>
                            </div>
                        </div>                           
                        <div class="col-md-4 text-center"></div>
                    </div>


                </form>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>   
    
                    
                <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>

                 <form id="patientForm" class="form-material form-horizontal" action="<?php echo e(route('patient-case-studies.store')); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php echo csrf_field(); ?>
                          
                    <div class="row">
                        
                        <div class="col-md-6">
                            <label for="" class="col-md-6 col-form-label"><h4><?php echo e(__('Link')); ?></h4></label>
                            <div class="col-md-12">
                                
                          <input  class="form-control" name="user_id" type="hidden" value="<?php echo e($patientCaseStudy->user->id); ?>">
                           <input  class="form-control" name="status" type="hidden" value="2">
                           <input  class="form-control" name="type" type="hidden" value="newcaseplan">
                           <input  class="form-control" name="case" type="hidden" value="<?php echo e($patientDetail->status); ?>">

                                <input  class="form-control" name="link" type="url" />
                            </div>
                            <?php $__errorArgs = ['file'];
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

                        
                                 <div class="col-md-6"><br>
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" value="<?php echo e(__('+ Add Active Case Plan')); ?>" class="btn rounded btn-success btn-md"/>

                                </div>
                            </div>
                        </div>               
                    </div>

 </div>


                </form>

<?php if(!empty($PatientCaseStudysec)): ?>
                
                 <form id="patientForm" class="form-material form-horizontal" action="<?php echo e(route('patient-case-studies.store')); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php echo csrf_field(); ?>
                          
                    <div class="row">
                        
                        <div class="col-md-6">
                            <label for="file" class="col-md-6 col-form-label"><h4><?php echo e(__('Step Number (from-to)')); ?></h4></label>
                            <div class="col-md-12">
                                
                           <input  class="form-control" name="others" type="hidden" value="<?php echo e($newcaseplan->id); ?>">
                           <input  class="form-control" name="user_id" type="hidden" value="<?php echo e($patientCaseStudy->user->id); ?>">
                           <input  class="form-control" name="status" type="hidden" value="<?php echo e($patientDetail->status); ?>">
                           <input  class="form-control" name="type" type="hidden" value="newstage">
                           <input  class="form-control" name="type" type="hidden" value="newstage">
                           <input  class="form-control" name="case" type="hidden" value="<?php echo e($patientDetail->status); ?>">
                           <input  class="form-control" name="notes" type="text" />
                            </div>
                            <?php $__errorArgs = ['file'];
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

                        
                                 <div class="col-md-6"><br>
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" value="<?php echo e(__('+ New Steps Done')); ?>" class="btn rounded btn-success btn-md"/>

                                </div>
                            </div>
                        </div>               
                    </div> 

 </div>


                </form>
<?php endif; ?>      

                <?php endif; ?> 
                    
</div></div>

<div id="filter3" class="collapse  <?php if(request()->isFilterActive): ?> show <?php endif; ?>">
<div class="card-body border"> 

 
<?php if(!empty($modify)): ?>
<?php $__currentLoopData = $modify; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row">
    <div class="col-md-12">
        
        
       
        <?php if($note->others=="LineUp Notes"): ?>
        <div class="card card-info card-outline">
            <div class="card-body box-profile" style="padding-top:0px; padding-bottom:0px;">
            <div class="card-header">
                <div class="row"><div class="col-md-2">
                <img class="mt-0" src="<?php echo e(asset('assets/images/Untitled-2-01-01.png')); ?>" alt="<?php echo e($ApplicationSetting->item_name); ?>" width="150"></div>
                <div class="col-md-6 mt-3"><p class="text-left" ><?php echo e(date('D-d-m-Y | h:i:s a', strtotime($note->created_at))); ?></p></div>
                <div class="col-md-6 mt-3"><p class="text-right" ><?php echo e(date('D-d-m-Y | H:i:s s', strtotime($note->created_at))); ?></p></div>                </div>
            </div>
            <?php else: ?>
        <div class="card card-warning card-outline">
            <div class="card-body box-profile">
            <div class="card-header">
                
                <div class="row"><div class="col-md-2 text-center">
                <label for="name"><img src="/<?php echo e($in_charge_doctor->photo); ?>" alt="<?php echo e($ApplicationSetting->item_name); ?>" width="100" style="border-radius:50%;"></label>
                <p class="text-dark text-bold"><?php echo e($in_charge_doctor->name); ?></p></div>
                <div class="col-md-5 mt-3"><p class="text-left" ><?php echo e(date('D-d-m-Y | h:i:s a', strtotime($note->created_at))); ?></p></div>
                <div class="col-md-5 mt-3">                <p class="text-right text-danger text-bold">Required Modification</p></div> 
                </div>   

            </div>
        <?php endif; ?>
        

                     <div class="row mt-3">
                     <div class="col-md-6">
                        <div class="form-group">
                            
                           <textarea readonly class="form-control rounded text-center" rows="2" cols="50">
                               <?php echo e($note->notes); ?>

                           </textarea>
                        </div>
                    </div>  
                    
                   <?php if($note->upper): ?>
                    <div class="col-md-6 text-center">
                        <div class="form-group">
                            <form method="get" action="<?php echo e(asset($note->upper)); ?>" autocomplete="off">
                            <button type="submit" class="btn btn-dark mt-1"><i class="fa fa-download"></i> Download Attachment</button>
                            </form>


                        </div>
                    </div> 
                    <?php endif; ?>
                    </div>
            </div>
        </div>
    </div>
</div>  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                
                
                <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>

                 <form id="patientForm" class="form-material form-horizontal" action="<?php echo e(route('patient-case-studies.store')); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php echo csrf_field(); ?>
                          
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="col-md-12" hidden>
                                
                          <input  class="form-control" name="user_id" type="hidden" value="<?php echo e($patientCaseStudy->user->id); ?>">
                           <input  class="form-control" name="status" type="hidden" value="2">
                           <input  class="form-control" name="type" type="hidden" value="newcaseplan">
                           <input  class="form-control" name="case" type="hidden" value="<?php echo e($patientDetail->status); ?>">

                            </div>
                            <?php $__errorArgs = ['file'];
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

                        
                                 <div class="col-md-12"><br>
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                                                        <input type="submit" value="<?php echo e(__('Modify Completed')); ?>" class="btn rounded btn-success btn-md"/>

                                </div>
                            </div>
                        </div>               
                    </div>

 </div>


                </form>
                <?php endif; ?>
               
               
               
<?php if($patientDetail->status!=3  && $patientDetail->status!=1 && $patientDetail->status!=4): ?> 

                <?php if(auth()->check() && auth()->user()->hasRole('Doctor')): ?>

             <form id="patientForm" class="form-material form-horizontal" action="<?php echo e(route('patient-case-studies.store')); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php echo csrf_field(); ?>
                          
                    <div class="row">
                        
                        
                          <input  class="form-control" name="user_id" type="hidden" value="<?php echo e($patientCaseStudy->user->id); ?>">
                           <input  class="form-control" name="status" type="hidden" value="6">
                           <input  class="form-control" name="type" type="hidden" value="modify">

                             <div class="col-md-4">
                            <div class="form-group">
                                <label for="address"><?php echo app('translator')->get('Your Message'); ?></label>
                                <div class="input-group mb-3">
                                    <textarea required name="notes" id="notes" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4" placeholder="<?php echo app('translator')->get('Notes'); ?>"><?php echo e(old('Notes')); ?></textarea>
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

                        <div class="col-md-4" >
                            <label for="file" class="col-md-6 col-form-label"><h4><?php echo e(__('Upload Attachment')); ?></h4></label>
                            <div class="col-md-12">
                                <input  class="dropify" name="upper" type="file" data-allowed-file-extensions="png jpg jpeg pdf stl obj" data-max-file-size="50000K" />
                                <p><?php echo e(__('Max Size: 50mb, Allowed Format: png, jpg, jpeg, pdf, stl, obj')); ?></p>
                            </div>
                            <?php $__errorArgs = ['file'];
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

                        
                                 <div class="col-md-4"><br>
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" value="<?php echo e(__('Modify Case Plan Request')); ?>" class="btn rounded btn-primary btn-md mt-5"/>
                                </div>
                            </div>
                        </div>               
                    </div>



                </form>
                <?php endif; ?>
                <?php endif; ?>
                
                
            </div>
        </div>
    </div>
</div>  
<?php endif; ?>                   
                    
           
</div></div>

<div id="filter4" class="collapse  <?php if(request()->isFilterActive): ?> show <?php endif; ?>">
<div class="card-body border"> 


              

<?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row">
    <div class="col-md-12">
        
        
       
        <?php if($note->others=="LineUp Notes"): ?>
        <div class="card card-info card-outline">
            <div class="card-body box-profile" style="padding-top:0px; padding-bottom:0px;">
            <div class="card-header">
                <div class="row"><div class="col-md-2">
                <img class="mt-0" src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="<?php echo e($ApplicationSetting->item_name); ?>" width="85" style="border-radius:50%;"></div>
                

                <div class="col-md-6 mt-3"><p class="text-left" ><?php echo e(date('D-d-m-Y | h:i:s a', strtotime($note->created_at))); ?></p></div></div>
            </div>
            <?php else: ?>
        <div class="card card-warning card-outline">
            <div class="card-body box-profile">
            <div class="card-header">
                
                <div class="row"><div class="col-md-2 text-center">
                                        <label for="name"><img src="/<?php echo e($in_charge_doctor->photo); ?>" alt="<?php echo e($ApplicationSetting->item_name); ?>" width="100" style="border-radius:50%;"></label>
                            <p class="text-dark text-bold"><?php echo e($in_charge_doctor->name); ?></p>
                
                </div>
                <div class="col-md-6 mt-3"><p class="text-left" ><?php echo e(date('D-d-m-Y | h:i:s a', strtotime($note->created_at))); ?></p></div></div>   

            </div>
        <?php endif; ?>
        

                     <div class="row mt-3">
                     <div class="col-md-6">
                        <div class="form-group">
                            
                           <textarea readonly class="form-control rounded text-left" rows="2" cols="50">
                               <?php echo e($note->notes); ?>

                           </textarea> 
                        </div>
                    </div>  
                    
                   <?php if($note->upper): ?>
                    <div class="col-md-6 text-center">
                        <div class="form-group">
                            <form method="get" action="<?php echo e(asset($note->upper)); ?>" autocomplete="off">
                            <button type="submit" class="btn btn-dark mt-1"><i class="fa fa-download"></i> Download Attachment</button>
                            </form>


                        </div>
                    </div> 
                    <?php endif; ?>
                    </div>
            </div>
        </div>
    </div></div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    
</div></div>


            
            
<div class="row" style="padding:17px;">
    <div class="col-md-12">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title"><?php echo app('translator')->get('New Message'); ?></h3>
            </div>
            <div class="card-body box-profile">
                <form id="patientForm" class="form-material form-horizontal" action="<?php echo e(route('patient-case-studies.store')); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <input  class="form-control" name="user_id" type="hidden" value="<?php echo e($patientCaseStudy->user->id); ?>">
                    <input  class="form-control" name="type" type="hidden" value="notes">
                    <input  class="form-control" name="user_type" type="hidden" value="<?php echo e(Auth::user()->getRoleNames()); ?>">
                    <input  class="form-control" name="status" type="hidden" value="<?php echo e($patientDetail->status); ?>">

                    <div class="row">


                        <div class="col-4">
                            <div class="form-group">
                                <label for="address"><?php echo app('translator')->get('Your Message'); ?></label>
                                <div class="input-group mb-3">
                                    <textarea required name="notes" id="notes" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4" placeholder="<?php echo app('translator')->get('Message'); ?>"><?php echo e(old('Notes')); ?></textarea>
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

                        <div class="col-4" >
                            <label for="file" class="col-form-label"><h4><?php echo e(__('Upload Attachment')); ?></h4></label>
                            <div class="input-group mb-3">
                                <input  class="dropify" name="upper" type="file" data-allowed-file-extensions="png jpg jpeg pdf stl obj" data-max-file-size="50000K" />
                                <p><?php echo e(__('Max Size: 50mb, Allowed Format: png, jpg, jpeg, pdf, stl, obj')); ?></p>
                            </div>
                            <?php $__errorArgs = ['file'];
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
                        
                        
                        
                            <div class="col-4">
                            <div class="form-group">
                                <label class="form-label"></label>
                                <div class="text-center">
                                    <input type="submit" value="<?php echo e(__('Send Message')); ?>" class="btn btn-success btn-sm rounded mt-5 w-100"/>
                                </div>
                            </div>
                        </div>               
                    </div>

 </div>


                </form>
            </div>
        </div>
    </div>
</div>


                
</div>

</div></div>





<?php $__env->stopSection(); ?>


 


<?php 
if(request()->segment(count(request()->segments()))=='patient-case-studies'){
$Full_Url=url()->full()."/".$patientCaseStudy->id;
header('Location: '.$Full_Url);
}
 ?>
<script>


if ( window.history.replaceState ) {
  window.history.replaceState( window.history.state, null, window.location.href);
}
$(window).load(function() {
  $("html, body").animate({ scrollTop: $(document).height() }, 1000);
});    
</script>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/patient-case-study/show.blade.php ENDPATH**/ ?>