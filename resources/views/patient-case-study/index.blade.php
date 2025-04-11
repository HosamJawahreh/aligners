                                            @php 
                                            $patientDetails=DB::table('doctor_details')->get();
                                            @endphp
                                            

@extends('layouts.layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @can('patient-case-studies-create')
                        <h3><a href="{{ route('patient-case-studies.create') }}" class="btn  btn-success">+ @lang('Add New Patient')</a>
                            <span class="pull-right"></span>
                        </h3>
                    @endcan
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Dashboard')</a></li>
                        <li class="breadcrumb-item active">@lang('Patient Case Studies List')</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color:#17a2b8; color:white; font-weight:bold;">
                    <h3 class="card-title pt-2"><i class="fas fa-list"></i> <b> @lang('Patient Case Studies List')</b></h3>
                    <div class="card-tools">
                        <button class="btn btn-dark text-light" data-toggle="collapse" href="#filter"><i class="fas fa-filter"></i> @lang('Filter')</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="filter" class="collapse  @if(request()->isFilterActive) show @endif">
                        <div class="card-body border">
                            <form action="" method="get" role="form" autocomplete="off">
                                <input type="hidden" name="isFilterActive" value="true">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>@lang('Name')</label>
                                            <input type="text" name="name" class="form-control" value="{{ request()->name }}" placeholder="@lang('Name')">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>@lang('Email')</label>
                                            <input type="text" name="email" class="form-control" value="{{ request()->email }}" placeholder="@lang('Email')">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>@lang('Phone')</label>
                                            <input type="text" name="phone" class="form-control" value="{{ request()->phone }}" placeholder="@lang('Phone')">
                                        </div>
                                    </div>
                                    @role('Super Admin')
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>@lang('Doctor')</label>
                                            <select class="form-control" name="doctor">
                                                
                                            @foreach($patientDetails as $patientDetail)
                                            @php $doctor=DB::table('users')->where('id' ,$patientDetail->user_id)->first();@endphp
                                            @if($doctor)
                                            <option value="{{$doctor->id}}" @if(request()->doctor==$doctor->id) selected @endif>{{$doctor->name}}</option>  
                                            @endif
                                            @endforeach
                                            
                                            </select>
                                        </div>
                                    </div>
                                    @endrole
                                    <div class="col-sm-3 mt-4"><br>
                                        <button type="submit" class="btn btn-success btn-sm">@lang('Submit')</button>
                                        @if(request()->isFilterActive)
                                            <a href="{{ route('patient-case-studies.index') }}" class="btn btn-dark btn-sm">@lang('Clear')</a>
                                        @endif
                                    </div>                                
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped text-center" id="laravel_datatable">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Phone')</th>
                                <th>@lang('Doctor')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Created At')</th>
                                <th data-orderable="false">@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                            @php $unique_data=array(); @endphp
                            
                           @foreach ($patientCaseStudy as $patientDetail)
                            
                            @if (!in_array($patientDetail->user->id, $unique_data))
                            @php $status=DB::table('patient_case_studies')->Where('user_id',$patientDetail->user_id)->OrderBy('id','desc')->first();
                            $patientDetail->status=$status->status;
                            @endphp
                            @php array_push($unique_data,$patientDetail->user->id);@endphp
                              
                                <tr>
                                    <td>{{ $patientDetail->user->name }}</td>
                                    <td>{{ $patientDetail->user->email }}</td>
                                    <td>{{ $patientDetail->user->phone }}</td>
                                    @php $in_charge_doctor=DB::table('users')->where('id' ,$patientDetail->user->company_id)->first();@endphp
                                    <td>{{$in_charge_doctor->name}}</td>
                                    
                                    
                                    @if($patientDetail->status==6)
                                    <td><p class="text-right text-warning text-bold">Modification Needed</p></td>
                                    @elseif($patientDetail->status==5)
                                    <td><p class="text-right text-warning text-bold">Refinement Needed</p></td>
                                    @elseif($patientDetail->status==4)
                                    <td><p class="text-right text-danger text-bold">Rejected</p></td>
                                    @elseif($patientDetail->status==3)
                                    <td><p class="text-right text-success text-bold">Approved</p></td>
                                    @elseif($patientDetail->status==2)
                                    <td><p class="text-right text-primary text-bold">Waiting For Approval</p></td>
                                    @elseif($patientDetail->status==1)
                                    <td><p class="text-right text-primary text-bold">Waiting For Manufacture Case Plan</p></td>
                                    @endif
                                    
                                    <td>{{ $patientDetail->user->created_at }}</td>
                                    <td>
                                        <a style="background-color:#17a2b8;" href="{{ route('patient-case-studies.show', $patientDetail) }}" class="btn btn-dark  rounded btn-sm" data-toggle="tooltip" title="@lang('View')"><b><i class="fa fa-eye ambitious-padding-btn"></i>&nbsp;Show The Case <b></a>&nbsp;&nbsp;
                                        @can('patient-case-studies-update')
                                            <a hidden href="{{ route('patient-case-studies.edit', $patientDetail) }}" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="@lang('Edit')"><i class="fa fa-edit ambitious-padding-btn"></i></a>&nbsp;&nbsp;
                                        @endcan
                                        @can('patient-case-studies-delete')
                                            <a  href="#" data-href="{{ route('patient-case-studies.destroy', $patientDetail) }}" class="btn btn-danger text-light btn-outline btn-circle btn-lg" data-toggle="modal" data-target="#myModal" title="@lang('Delete')"><i class="fa fa-trash ambitious-padding-btn"></i></a>
                                        @endcan
                                    </td>
                                </tr>

                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{ $patientCaseStudy->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@include('layouts.delete_modal')
@endsection
