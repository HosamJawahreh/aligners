<?php session_start(); ?> 
@extends('layouts.layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('patient-case-studies.index') }}">@lang('Patient Case Study')</a></li>
                    <li class="breadcrumb-item active">@lang('Add Patient Case Study')</li>
                </ol>
            </div>
        </div>
    </div>
</section>


<div class="row">
    <div class="col-12">
        <div class="card overflow-hidden">
            <div class="card-header text-center pt-3" style="background-color:#17a2b8; color:white; font-weight:bold;">
                <h6><b><i class="fas fa-plus"></i>  @lang('Add Patient Case Study')</b></h6>
            </div>
          
            <div class="card-body">
                <form id="patientForm"  id="addNewPatientCaseStudyForm" class="form-material form-horizontal" action="{{ route('patient-case-studies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <?php 
                    $users=DB::table('users')->OrderBy('id','desc')->first();
                    $Next_id=$users->id+1;
                    
                    ?>

                                                        <input type="text" id="user_id" name="user_id"  value="{{$Next_id}}" hidden>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">@lang('Name') <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('Name')" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">@lang('Status') <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-bell"></i></span>
                                    </div>
                                    <select class="form-control ambitious-form-loading @error('status') is-invalid @enderror">
                                        <option value="1" selected>@lang('Active')</option>
                                        <option value="1">@lang('Inactive')</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">@lang('Case Type') <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-bell"></i></span>
                                    </div>
                                    <select class="form-control ambitious-form-loading @error('status') is-invalid @enderror" required name="status" id="status">
                                        <option value="2" {{ old('status') === '2' ? 'selected' : '' }}>@lang('Full Case')</option>
                                        <option value="3" {{ old('status') === '3' ? 'selected' : '' }}>@lang('Devided Stages')</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">@lang('Doctor') <b class="ambitious-crimson">*</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-bell"></i></span>
                                    </div>
                                    
                                    @if(auth()->user()->id!=1)
                                    <select class="form-control ambitious-form-loading @error('status') is-invalid @enderror" required name="company_id" id="company_id">
                                    <option value="{{auth()->user()->id}}" selected>{{auth()->user()->name}}</option>
                                    </select>
                                    @else
                                    <select class="form-control ambitious-form-loading @error('status') is-invalid @enderror" required name="company_id" id="company_id">
                                            <option value="1">Line Up Admin</option>

                                            @php $doctors=DB::table('users')->select('users.id','users.name')->join('doctor_details', 'doctor_details.user_id', '=', 'users.id')->get(); @endphp
                                            @foreach($doctors as $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                            @endforeach
                                            </select>
                                    @endif

                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>   <hr class="text-danger mt-3">                     
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">@lang('Email') <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="@lang('Email')">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">@lang('Phone') <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="@lang('Phone')">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">@lang('Date of Birth') <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-check"></i></span>
                                    </div>
                                    <input type="text" name="date_of_birth" id="date_of_birth" class="form-control flatpickr @error('date_of_birth') is-invalid @enderror" placeholder="@lang('Date of Birth')" value="{{ old('date_of_birth') }}">
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">@lang('Gender') <b class="ambitious-crimson text-success text-sm"><sup>optional</sup></b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                    </div>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                                        <option value="">--@lang('Select')--</option>
                                        <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>@lang('Male')</option>
                                        <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>@lang('Female')</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        </div>                    

                    <div class="row">
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
                                    <input  type="submit" value="+ {{ __('Create Patient Case Study') }}" class="btn btn-success btn-s  rounded w-100" style="background-color:#17a2b8; color:white; font-weight:bold;"/>
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
@endsection

<?php 
// session_destroy();
// unset($_SESSION['upperFileUrl']);
// unset($_SESSION['lowerFileUrl']);
?> 
