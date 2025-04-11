<?php session_start(); ?> 

@extends('layouts.layout')
@section('content')

@php

$patientDetail=DB::table('patient_case_studies')->Where('user_id',$patientCaseStudy->user->id)->OrderBy('id','desc')->first();
$patientCasetype=DB::table('users')->Where('id',$patientCaseStudy->user->id)->OrderBy('id','desc')->first();

$patientDetails=DB::table('patient_case_studies')->Where('user_id',$patientCaseStudy->user->id)->OrderBy('id','desc')->get();

$in_charge_doctor=DB::table('users')->where('id' ,$patientCaseStudy->user->company_id)->first();

@endphp


<section class="content-header">
  
@if($patientDetail->status==5)    

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


   
@elseif($patientDetail->status==3)    

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
      @if($refinement_count>0)    
      <div class="label">Approved<p class="text-danger">Refinement</p></div>
      @else
       <div class="label">Approved</div>
      @endif
      <div class="label">Refinement</div>
    </div>
  </div>
</div>    

     
   
   
@elseif($patientDetail->status==4 || $patientDetail->status==6)    

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
      @if($refinement_count>0)   
      <div class="label">Modification Needed<p class="text-danger">Refinement</p></div> 
      @else
      <div class="label">Modification Needed</div> 
      @endif
      <div class="label">Approved</div>
      <div class="label">Refinement</div>
    </div>
  </div>
</div>    

   
   
@elseif($patientDetail->status==2)    

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
      @if($refinement_count>0)  
      <div class="label">Case Plan Waiting For Approval <p class="text-danger">Refinement</p></div>
      @else
      <div class="label">Case Plan Waiting For Approval </div>
      @endif
      <div class="label">Case Status</div>
      <div class="label">Approved</div>
      <div class="label">Refinement</div>
    </div>
  </div>
</div>    

   
    
@elseif($patientDetail->status==1)    

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
@endif    
    
    
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
                        <a href="{{ route('patient-case-studies.index') }}">@lang('Patient')</a></li>
                    <li class="breadcrumb-item active">@lang('Patient Case Study')</li>
                </ol>
            </div>
        </div>
    </div>
</section>




<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                
                
                <p class="text-left">Case Created : {{date('D-d-m-Y | h:i:s a', strtotime($patientCaseStudy->created_at) )}}</p>
                
            
                
                                    @if($patientDetail->status==6)
                                    <td><p class="text-right text-warning text-bold">Modification Needed</p></td>
                                    @elseif($patientDetail->status==5)
                                    <td><p class="text-right text-danger text-bold">Refinement Needed</p></td>
                                    @elseif($patientDetail->status==4)
                                    <td><p class="text-right text-danger text-bold">Rejected</p></td>
                                    @elseif($patientDetail->status==3)
                                    <td><p class="text-right text-success text-bold">Approved</p></td>
                                    @elseif($patientDetail->status==2)
                                    <td><p class="text-right text-primary text-bold">Waiting For Approval</p></td>
                                    @elseif($patientDetail->status==1)
                                    <td><p class="text-right text-primary text-bold">Waiting For Manufacture Case Plan</p></td>
                                    @endif
                
<hr> 

 <div class="row text-center">
     
                    <div class="col-md-2 text-center">
                        <div class="form-group">
                        <label for="name">
                            <img src="/{{$in_charge_doctor->photo}}" alt="{{ $ApplicationSetting->item_name }}" width="100" style="border-radius:15px;"></label>
                            <p class="text-dark text-bold">{{ $in_charge_doctor->name}}</p>
                        </div>
                    </div>  
                    <div class="col-md-2 text-center">
                        <div class="form-group">
                            <label for="name">@lang('Patient')</label>
                    <p><img width="48" height="48" src="https://img.icons8.com/fluency/48/user-male-circle--v1.png" alt="user-male-circle--v1"/> {{ $patientCaseStudy->user->name }}</p>

                        </div>
                    </div>  
                    <div class="col-md-2 text-center">
                        <div class="form-group">
                            <label for="name">@lang('Case Type')</label>
                            @if($patientCasetype->status==2)
                            <p class="text-success text-bold">Full Case</p>
                            @endif
                            @if($patientCasetype->status==3)
                            <p class="text-success text-bold">Devided Stages</p>
                            @endif
                        </div>
                    </div>  
                    <div class="col-md-2 text-center">
                        <div class="form-group">
                            <label for="name">@lang('Note')</label>
                            <p class="text-success text-bold">{{ $patientCaseStudy->notes }}</p>
                        </div>
                    </div>  
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="name">@lang('Gender/Age')</label>
                    <p>{{ $patientCaseStudy->user->gender }} / {{date_diff(date_create($patientCaseStudy->user->date_of_birth), date_create('today'))->y}} Year</p>
                        </div>
                    </div>  
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="name">@lang('Contact')</label>
                            <p>{{ $patientCaseStudy->user->email }}<br>{{ $patientCaseStudy->user->phone }}</p>
                        </div>
                    </div>  

                     </div>
                     
                     <hr>
                     
                <div class="row">
                <div class="text-center col-md-12">
                    <div class="card-tools text-center mb-3">
                        <button class="btn btn-primary btn-sm" id="messages" data-toggle="collapse" href="#filter4"><i class="fas fa-comment fa-solid"></i> @lang('Messages')</button>
                        <button class="btn btn-dark btn-sm" id="data" data-toggle="collapse" href="#filter1"><i class="fas fa-file fa-solid"></i> @lang('View Case Data')</button>
                        <button class="btn btn-success btn-sm" id="manufacture"  data-toggle="collapse" href="#filter2"><i class="fas fa-play fa-solid"></i> @lang('Manufacture Case Plan')</button>
                        <button class="btn btn-warning btn-sm" id="modification" data-toggle="collapse" href="#filter3"><i class="fas fa-edit fa-solid"></i> @lang('Modification & History')</button>
                        <button class="btn btn-danger btn-sm" id="refinement" data-toggle="collapse" href="#filter"><i class="fas fa-sort fa-solid"></i> @lang('Order Refinement')</button>
                    </div>
                     
                    
                        <div id="filter" class="collapse  @if(request()->isFilterActive) show @else hide @endif">
                        <div class="card-body border">
                            <form action="{{ route('patient-case-studies.store') }}" method="post" role="form" autocomplete="off" enctype="multipart/form-data" >
                            @csrf
                            
                            <input  class="form-control" name="user_id" type="hidden" value="{{$patientCaseStudy->user->id}}">
                           <input  class="form-control" name="status" type="hidden" value="5">
                           <input  class="form-control" name="type" type="hidden" value="refinement">
                    
                         <div class="row text-left">
                        <div class="col-md-6">
                            <label for="photo" class="col-md-12 col-form-label"><h4>{{ __('Photos') }}</h4></label>
                            <div class="col-md-12">
                                <input id="photo" class="dropify" name="photo[]" value="{{ old('photo') }}" type="file" data-allowed-file-extensions="png jpg jpeg webp svg" accept=".png,.jpg,.jpeg,.webp,.svg" data-max-file-size="100000K" multiple>
                                <p>{{ __('Max Size: 100MB, Allowed Format: png, jpg, jpeg') }}</p>
                            </div>
                            @error('photo')
                                <div class="error ambitious-red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="notes">@lang('Notes')</label>
                                <div class="input-group mb-3">
                                    <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" rows="4" placeholder="@lang('Notes')">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                        <button type="submit" class="btn btn-danger btn-sm w-100" id="refinement"><i class="fas fa-sort fa-solid"></i> @lang('Order Refinement')</button>
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
                
                
                
            
                        <div id="filter1" class="collapse  @if(request()->isFilterActive) show @endif">
                        <div class="card-body border"> 

              

                    <hr>
                    <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="form-group">
                            <p class="text-dark text-bold">{{date('D-d-m-Y | h:i:s a', strtotime($patientCaseStudy->created_at) )}}</p>
                        </div>
                    </div>  
                   
                    <div class="col-md-2 text-center" hidden>
                        <div class="form-group">
                    
                        <label for="name"><img src="/{{$in_charge_doctor->photo}}" alt="{{ $ApplicationSetting->item_name }}" width="100" style="border-radius:50%;"></label>
                            <p class="text-dark text-bold">{{ $in_charge_doctor->name}}</p>
                        </div>
                    </div>  
                    <div class="col-md-3 text-center" hidden>
                        <div class="form-group">
                            <label for="name">@lang('Note')</label>
                            <p class="text-success text-bold">{{ $patientCaseStudy->notes }}</p>
                        </div>
                    </div>  
                    </div>

                     @php   
                    $photos=json_decode($patientCaseStudy->user->photo);
                    $slide=0;
                    @endphp
                    @if(is_array($photos))
                    
                    <h6 style="text-align:center" hidden>{{$patientCaseStudy->user->name}}</h6>
                    
                    
                    

 <div class="container">                    
   @foreach($photos as $photo)  
    <div class="container__img-holder">
      <img class="demo cursor" src="/{{$photo}}" style="width:100%; height:120px; width:120px; border-radius:6px;">
    </div>
    @endforeach
    
    
                      <hr>
                    <div class="card-tools">
                        <div class="row">
                        @if($patientCaseStudy->upper)
                        <div class="col-md-6 text-right">
                        <form method="get" action="{{ asset($patientCaseStudy->upper) }}" autocomplete="off">
                        <button class="btn btn-dark btn-sm">
                        <b>Download <span class="text-success">Upper</span> File</b>
                        <img width="25" height="25" src="https://img.icons8.com/wired/25/F1F1F1/download--v1.png" alt="download--v1" class="text-white text-bold"/>
                        </button></form></div>
                        @endif
                        
                        
                        @if($patientCaseStudy->lower)
                        <div class="col-md-6 text-left">
                        <form method="get" action="{{ asset($patientCaseStudy->lower) }}" autocomplete="off">
                        <button class="btn btn-dark btn-sm">
                        <b>Download <span class="text-danger">Lower</span> File</b>
                        <img width="25" height="25" src="https://img.icons8.com/wired/25/F1F1F1/download--v1.png" alt="download--v1"  style="color:white;" class="text-white text-bold"/>
                        </button></form></div>
                        @endif

                        </div></div>    
    
    
    </div>
@endif                   
                    
 <div class="img-popup" style="z-index:10000000;">
  <img src="" alt="Popup Image">
  <div class="close-btn">
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
</div>                

                    
               
                    
                    
@if($refinement_count>0)             
@foreach($refinement as $patientCaseStudy)
<hr>
           <div class="row">
               
               
                        <div class="col-md-4 text-left">
                        <div class="form-group">
                            <h6 class="text-danger"><b>Refinement</b></h6>
                            <p class="text-dark text-bold">{{date('D-d-m-Y | h:i:s a', strtotime($patientCaseStudy->created_at))}}</p>
                        </div></div>
                        
                        <div class="col-md-4 text-center">
                        <div class="form-group">
                            <h6 class="text-dark"><b>Note</b></h6>
                            <p class="text-success text-bold">{{ $patientCaseStudy->notes }}</p>
                        </div></div>
                        

          </div>  
                   

@php   
$photos=json_decode($patientCaseStudy->photo);
@endphp                    
 @if($photos)                   
 <div class="container">                    
   @foreach($photos as $photo)  
    <div class="container__img-holder">
      <img class="demo cursor" src="/{{$photo}}" style="width:100%; height:120px; width:120px; border-radius:6px;">
    </div>
    @endforeach
    </div>

 <div class="img-popup" style="z-index:10000000;">
  <img src="" alt="Popup Image">
  <div class="close-btn">
    <div class="bar"></div>
    <div class="bar"></div>
  </div>
</div>                   
 @endif                   
                    
                      <hr>
                    <div class="card-tools">
                        <div class="row">
                        @if($patientCaseStudy->upper)
                        <div class="col-md-6 text-right">
                        <form method="get" action="{{ asset($patientCaseStudy->upper) }}" autocomplete="off">
                        <button class="btn btn-dark btn-sm" >
                        <b>Download <span class="text-success">Upper</span> File</b>
                        <img width="25" height="25" src="https://img.icons8.com/wired/25/F1F1F1/download--v1.png" alt="download--v1" class="text-white text-bold"/>
                        </button></form></div>
                        @endif
                        
                        
                        @if($patientCaseStudy->lower)
                        <div class="col-md-6 text-left">
                        <form method="get" action="{{ asset($patientCaseStudy->lower) }}" autocomplete="off">
                        <button class="btn btn-dark btn-sm">
                        <b>Download <span class="text-danger">Lower</span> File</b>
                        <img width="25" height="25" src="https://img.icons8.com/wired/25/F1F1F1/download--v1.png" alt="download--v1"  style="color:white;" class="text-white text-bold"/>
                        </button></form></div>
                        @endif

                        </div></div>  
@endforeach
@endif 

                    </div> 
                    
         
                    
                    
                    
                    
                </div></div>
 
 
               
<div id="filter2" class="collapse">
<div class="card-body border"> 
<div class="row">
                   
 <div class="col-md-12 text-center">
                        <div class="form-group">

                            @if($allcaseplans)
                            <div class="text-center row">
                            @php $first=1;@endphp
                            @foreach($allcaseplans as $allcaseplans)
                            
                            <div class="text-center col-md-2 mb-5 mt-5" style="margin-left:60px;">

                            <form id="patientForm" class="form-material form-horizontal"  method="GET" enctype="multipart/form-data" autocomplete="off">
                                    <input  class="form-control" name="view" type="hidden" value="{{$allcaseplans->id}}">
                                    
                                    
                                    
                                    
                                    @if(empty($_GET['view']))
                                    
                                    @if($first==1) 
                                    <span style="padding:15px;"><input  style="border:3px solid black;" type="submit" value="Active | {{date('D d-m h:i A', strtotime($allcaseplans->created_at))}}" class="btn  rounded btn-success btn-sm"/></span>
                                    @else
                                    <span style="padding:15px;"><input type="submit" value="{{date('D d-m h:i A', strtotime($allcaseplans->created_at))}}" class="btn rounded btn-warning btn-sm"/></span>
                                    @endif
                                    
                                    @else
                                    
                                    @if($first==1)
                                    <span style="padding:15px;"><input @if($_GET['view']==$allcaseplans->id) style="border:3px solid black;" @endif type="submit" value="Active | {{date('D d-m h:i A', strtotime($allcaseplans->created_at))}}" class="btn  rounded btn-success btn-sm"/></span>
                                    @else
                                    <span style="padding:15px;"><input @if($_GET['view']==$allcaseplans->id)style="border:3px solid black;"@endif type="submit" value="{{date('D d-m h:i A', strtotime($allcaseplans->created_at))}}" class="btn rounded btn-warning btn-sm"/></span>
                                    @endif
                                    @endif
                                    
                                    
                                    
                                    
                             </form>                             
                             </div>
                             @php $first++;@endphp 
                            @endforeach
                            </div>
                            @endif
                            
                            
                            @if(!empty($_GET['view']))
                            
                           <?php $view_id=$_GET['view']; $view=DB::table('patient_case_studies')->Where('id',$view_id)->first();?>
                            <embed type="text/html" src="{{ asset($view->link) }}" width="100%" height="750">
                            @else
                            @if(!empty($newcaseplan->link))
                            <embed type="text/html" src="{{ asset($newcaseplan->link) }}" width="100%" height="750">
                            @elseif(!empty($PatientCaseStudysec->link))
                            <embed type="text/html" src="{{ asset($PatientCaseStudysec->link) }}" width="100%" height="750">
                            @endif
                            @endif
                            
                        </div>
                    </div>                     
                    
</div><hr> 

@php 
$activePlan=DB::table('patient_case_studies')->Where('user_id',$user->id)->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->first();
@endphp
                             
@foreach($stages as $stage)
 
 @if(!empty($_GET['view']))

                            @if($stage->others==$_GET['view'])
                            
                            <div class="text-center col-md-2 mb-5 mt-5">
                            <input type="submit" value="Steps From {{$stage->notes}} Are Manufactured" class="btn  rounded btn-success btn-sm"/>
                            </div>
                              
                             @endif
                             
                             
                             @else

                            @if($stage->others==$activePlan->id)
                            
                            <div class="text-center col-md-2 mb-5 mt-5">
                            <input type="submit" value="Steps From {{$stage->notes}} Are Manufactured" class="btn  rounded btn-success btn-sm"/>
                            </div>
                              
                             @endif

                             @endif 
                             
                             @endforeach    

    
@role('Doctor')
@if($PatientCaseStudysec && $patientDetail->status!=3)
<div class="row">
    
    <div class="col-12 text-center">
            
                <form id="approve" class="form-material form-horizontal" action="{{ route('patient-case-studies.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <input  class="form-control" name="user_id" type="hidden" value="{{$patientCaseStudy->user->id}}">
                    <div class="row">
                        
                        <div class="col-md-4 text-center"></div>
                        
                        <div class="col-md-4 text-center">
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-12">
                                    <input type="submit" onclick="return confirm('Are You Sure You Want To Approve Case Treatment Plan And Start Manufacture ?');" name="approve" value="{{ __('Approve And Start Manufacture') }}" class="btn rounded btn-success btn-md w-100"/>
                                </div>
                            </div>
                        </div>                           
                        <div class="col-md-4 text-center"></div>
                    </div>


                </form>
        </div>
    </div>
    @endif
@endrole   
    
                    
                @role('Super Admin')

                 <form id="patientForm" class="form-material form-horizontal" action="{{ route('patient-case-studies.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                          
                    <div class="row">
                        
                        <div class="col-md-6">
                            <label for="" class="col-md-6 col-form-label"><h4>{{ __('Link') }}</h4></label>
                            <div class="col-md-12">
                                
                          <input  class="form-control" name="user_id" type="hidden" value="{{$patientCaseStudy->user->id}}">
                           <input  class="form-control" name="status" type="hidden" value="2">
                           <input  class="form-control" name="type" type="hidden" value="newcaseplan">
                           <input  class="form-control" name="case" type="hidden" value="{{$patientDetail->status}}">

                                <input  class="form-control" name="link" type="url" />
                            </div>
                            @error('file')
                                <div class="error ambitious-red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>                        

                        
                                 <div class="col-md-6"><br>
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" value="{{ __('+ Add Active Case Plan') }}" class="btn rounded btn-success btn-md"/>

                                </div>
                            </div>
                        </div>               
                    </div>

 </div>


                </form>

@if(!empty($PatientCaseStudysec))
                
                 <form id="patientForm" class="form-material form-horizontal" action="{{ route('patient-case-studies.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                          
                    <div class="row">
                        
                        <div class="col-md-6">
                            <label for="file" class="col-md-6 col-form-label"><h4>{{ __('Step Number (from-to)') }}</h4></label>
                            <div class="col-md-12">
                                
                           <input  class="form-control" name="others" type="hidden" value="{{$newcaseplan->id}}">
                           <input  class="form-control" name="user_id" type="hidden" value="{{$patientCaseStudy->user->id}}">
                           <input  class="form-control" name="status" type="hidden" value="{{$patientDetail->status}}">
                           <input  class="form-control" name="type" type="hidden" value="newstage">
                           <input  class="form-control" name="type" type="hidden" value="newstage">
                           <input  class="form-control" name="case" type="hidden" value="{{$patientDetail->status}}">
                           <input  class="form-control" name="notes" type="text" />
                            </div>
                            @error('file')
                                <div class="error ambitious-red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>                        

                        
                                 <div class="col-md-6"><br>
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" value="{{ __('+ New Steps Done') }}" class="btn rounded btn-success btn-md"/>

                                </div>
                            </div>
                        </div>               
                    </div> 

 </div>


                </form>
@endif      

                @endrole 
                    
</div></div>

<div id="filter3" class="collapse  @if(request()->isFilterActive) show @endif">
<div class="card-body border"> 

 
@if(!empty($modify))
@foreach($modify as $note)

<div class="row">
    <div class="col-md-12">
        
        
       
        @if($note->others=="LineUp Notes")
        <div class="card card-info card-outline">
            <div class="card-body box-profile" style="padding-top:0px; padding-bottom:0px;">
            <div class="card-header">
                <div class="row"><div class="col-md-2">
                <img class="mt-0" src="{{ asset('assets/images/Untitled-2-01-01.png') }}" alt="{{ $ApplicationSetting->item_name }}" width="150"></div>
                <div class="col-md-6 mt-3"><p class="text-left" >{{date('D-d-m-Y | h:i:s a', strtotime($note->created_at))}}</p></div>
                <div class="col-md-6 mt-3"><p class="text-right" >{{date('D-d-m-Y | H:i:s s', strtotime($note->created_at))}}</p></div>                </div>
            </div>
            @else
        <div class="card card-warning card-outline">
            <div class="card-body box-profile">
            <div class="card-header">
                
                <div class="row"><div class="col-md-2 text-center">
                <label for="name"><img src="/{{$in_charge_doctor->photo}}" alt="{{ $ApplicationSetting->item_name }}" width="100" style="border-radius:50%;"></label>
                <p class="text-dark text-bold">{{ $in_charge_doctor->name}}</p></div>
                <div class="col-md-5 mt-3"><p class="text-left" >{{date('D-d-m-Y | h:i:s a', strtotime($note->created_at))}}</p></div>
                <div class="col-md-5 mt-3">                <p class="text-right text-danger text-bold">Required Modification</p></div> 
                </div>   

            </div>
        @endif
        

                     <div class="row mt-3">
                     <div class="col-md-6">
                        <div class="form-group">
                            
                           <textarea readonly class="form-control rounded text-center" rows="2" cols="50">
                               {{ $note->notes }}
                           </textarea>
                        </div>
                    </div>  
                    
                   @if($note->upper)
                    <div class="col-md-6 text-center">
                        <div class="form-group">
                            <form method="get" action="{{ asset($note->upper) }}" autocomplete="off">
                            <button type="submit" class="btn btn-dark mt-1"><i class="fa fa-download"></i> Download Attachment</button>
                            </form>


                        </div>
                    </div> 
                    @endif
                    </div>
            </div>
        </div>
    </div>
</div>  
@endforeach                
                
                
                @role('Super Admin')

                 <form id="patientForm" class="form-material form-horizontal" action="{{ route('patient-case-studies.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                          
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="col-md-12" hidden>
                                
                          <input  class="form-control" name="user_id" type="hidden" value="{{$patientCaseStudy->user->id}}">
                           <input  class="form-control" name="status" type="hidden" value="2">
                           <input  class="form-control" name="type" type="hidden" value="newcaseplan">
                           <input  class="form-control" name="case" type="hidden" value="{{$patientDetail->status}}">

                            </div>
                            @error('file')
                                <div class="error ambitious-red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>                        

                        
                                 <div class="col-md-12"><br>
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                                                        <input type="submit" value="{{ __('Modify Completed') }}" class="btn rounded btn-success btn-md"/>

                                </div>
                            </div>
                        </div>               
                    </div>

 </div>


                </form>
                @endrole
               
               
               
@if($patientDetail->status!=3  && $patientDetail->status!=1 && $patientDetail->status!=4) 

                @role('Doctor')

             <form id="patientForm" class="form-material form-horizontal" action="{{ route('patient-case-studies.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                          
                    <div class="row">
                        
                        
                          <input  class="form-control" name="user_id" type="hidden" value="{{$patientCaseStudy->user->id}}">
                           <input  class="form-control" name="status" type="hidden" value="6">
                           <input  class="form-control" name="type" type="hidden" value="modify">

                             <div class="col-md-4">
                            <div class="form-group">
                                <label for="address">@lang('Your Message')</label>
                                <div class="input-group mb-3">
                                    <textarea required name="notes" id="notes" class="form-control @error('address') is-invalid @enderror" rows="4" placeholder="@lang('Notes')">{{ old('Notes') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" >
                            <label for="file" class="col-md-6 col-form-label"><h4>{{ __('Upload Attachment') }}</h4></label>
                            <div class="col-md-12">
                                <input  class="dropify" name="upper" type="file" data-allowed-file-extensions="png jpg jpeg pdf stl obj" data-max-file-size="50000K" />
                                <p>{{ __('Max Size: 50mb, Allowed Format: png, jpg, jpeg, pdf, stl, obj') }}</p>
                            </div>
                            @error('file')
                                <div class="error ambitious-red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>              

                        
                                 <div class="col-md-4"><br>
                            <div class="form-group">
                                <label class="col-md-3 col-form-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" value="{{ __('Modify Case Plan Request') }}" class="btn rounded btn-primary btn-md mt-5"/>
                                </div>
                            </div>
                        </div>               
                    </div>



                </form>
                @endrole
                @endif
                
                
            </div>
        </div>
    </div>
</div>  
@endif                   
                    
           
</div></div>

<div id="filter4" class="collapse  @if(request()->isFilterActive) show @endif">
<div class="card-body border"> 


              

@foreach($notes as $note)

<div class="row">
    <div class="col-md-12">
        
        
       
        @if($note->others=="LineUp Notes")
        <div class="card card-info card-outline">
            <div class="card-body box-profile" style="padding-top:0px; padding-bottom:0px;">
            <div class="card-header">
                <div class="row"><div class="col-md-2">
                <img class="mt-0" src="{{ asset('assets/images/logo.png') }}" alt="{{ $ApplicationSetting->item_name }}" width="85" style="border-radius:50%;"></div>
                

                <div class="col-md-6 mt-3"><p class="text-left" >{{date('D-d-m-Y | h:i:s a', strtotime($note->created_at))}}</p></div></div>
            </div>
            @else
        <div class="card card-warning card-outline">
            <div class="card-body box-profile">
            <div class="card-header">
                
                <div class="row"><div class="col-md-2 text-center">
                                        <label for="name"><img src="/{{$in_charge_doctor->photo}}" alt="{{ $ApplicationSetting->item_name }}" width="100" style="border-radius:50%;"></label>
                            <p class="text-dark text-bold">{{ $in_charge_doctor->name}}</p>
                
                </div>
                <div class="col-md-6 mt-3"><p class="text-left" >{{date('D-d-m-Y | h:i:s a', strtotime($note->created_at))}}</p></div></div>   

            </div>
        @endif
        

                     <div class="row mt-3">
                     <div class="col-md-6">
                        <div class="form-group">
                            
                           <textarea readonly class="form-control rounded text-left" rows="2" cols="50">
                               {{ $note->notes }}
                           </textarea> 
                        </div>
                    </div>  
                    
                   @if($note->upper)
                    <div class="col-md-6 text-center">
                        <div class="form-group">
                            <form method="get" action="{{ asset($note->upper) }}" autocomplete="off">
                            <button type="submit" class="btn btn-dark mt-1"><i class="fa fa-download"></i> Download Attachment</button>
                            </form>


                        </div>
                    </div> 
                    @endif
                    </div>
            </div>
        </div>
    </div></div>

@endforeach

                    
                    
</div></div>


            
            
<div class="row" style="padding:17px;">
    <div class="col-md-12">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">@lang('New Message')</h3>
            </div>
            <div class="card-body box-profile">
                <form id="patientForm" class="form-material form-horizontal" action="{{ route('patient-case-studies.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <input  class="form-control" name="user_id" type="hidden" value="{{$patientCaseStudy->user->id}}">
                    <input  class="form-control" name="type" type="hidden" value="notes">
                    <input  class="form-control" name="user_type" type="hidden" value="{{Auth::user()->getRoleNames()}}">
                    <input  class="form-control" name="status" type="hidden" value="{{$patientDetail->status}}">

                    <div class="row">


                        <div class="col-4">
                            <div class="form-group">
                                <label for="address">@lang('Your Message')</label>
                                <div class="input-group mb-3">
                                    <textarea required name="notes" id="notes" class="form-control @error('address') is-invalid @enderror" rows="4" placeholder="@lang('Message')">{{ old('Notes') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-4" >
                            <label for="file" class="col-form-label"><h4>{{ __('Upload Attachment') }}</h4></label>
                            <div class="input-group mb-3">
                                <input  class="dropify" name="upper" type="file" data-allowed-file-extensions="png jpg jpeg pdf stl obj" data-max-file-size="50000K" />
                                <p>{{ __('Max Size: 50mb, Allowed Format: png, jpg, jpeg, pdf, stl, obj') }}</p>
                            </div>
                            @error('file')
                                <div class="error ambitious-red">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        
                        
                            <div class="col-4">
                            <div class="form-group">
                                <label class="form-label"></label>
                                <div class="text-center">
                                    <input type="submit" value="{{ __('Send Message') }}" class="btn btn-success btn-sm rounded mt-5 w-100"/>
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





@endsection


 


@php 
if(request()->segment(count(request()->segments()))=='patient-case-studies'){
$Full_Url=url()->full()."/".$patientCaseStudy->id;
header('Location: '.$Full_Url);
}
 @endphp
<script>


if ( window.history.replaceState ) {
  window.history.replaceState( window.history.state, null, window.location.href);
}
$(window).load(function() {
  $("html, body").animate({ scrollTop: $(document).height() }, 1000);
});    
</script>
