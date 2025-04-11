<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\PatientCaseStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\EmailCampaignLog;
use Illuminate\Support\Facades\Mail;


class PatientCaseStudyController extends Controller
{
    /**
     * Constructor
     */
    function __construct()
    {
        $this->middleware('permission:patient-case-studies-read|patient-case-studies-create|patient-case-studies-update|patient-case-studies-delete', ['only' => ['index','show']]);
        $this->middleware('permission:patient-case-studies-create', ['only' => ['create','store']]);
        $this->middleware('permission:patient-case-studies-update', ['only' => ['edit','update']]);
        $this->middleware('permission:patient-case-studies-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patientCaseStudy = $this->filter($request)->paginate(100);
        

        return view('patient-case-study.index', compact('patientCaseStudy'));
    }

    /**
     * Filter function
     *
     * @param Request $request
     * @return Illuminate\Database\Eloquent\Builder
     */
     
    private function filter(Request $request)
    {
        $query = PatientCaseStudy::whereHas('user', function($q) use ($request) {
            if(auth()->user()->id!=1)
             $q->where('company_id', auth()->user()->id);
            //if (auth()->user()->hasRole('Doctor'))
           

            //if (auth()->user()->hasRole('Doctor'))
               // $q->where('id', auth()->id());

            if ($request->name)
                    $q->where('name', 'like', $request->name.'%');

            if ($request->phone)
                $q->where('phone', 'like', $request->phone.'%');

            if ($request->email)
                $q->where('email', 'like', $request->email.'%');
                
            if ($request->doctor)
                $q->where('company_id', $request->doctor);
                
        });

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patientInfo = User::role('Patient')->where('company_id', auth()->user()->id)->where('status', '1')->select(['id', 'name'])->pluck('name', 'id');
        return view('patient-case-study.create', compact('patientInfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        if(!empty($patientCaseStudy)){
        $link="https://doctor.lineup-aligners.com/patient-case-studies/".$patientCaseStudy->id;
        }else{
        $link="https://doctor.lineup-aligners.com/patient-case-studies/";
        }
        
        $link.="\n\n\n Phone: +962790914797 ";
        $link.="\n Email:info@lineup-aligners.com ";
        $link.="\n Website:www.lineup-aligners.com ";
        $link.="\n Address: Amman , Jordan ";
        
        
        if(PatientCaseStudy::where('user_id', $request['user_id'])->exists()){
            
        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        
        $user=User::Where('id',$request['user_id'])->first();
        if($user)
        $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
        }
 
        if($request['type']=="newstage"){ 


        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        $user=User::Where('id',$patientCaseStudy->user_id)->first();
        $PatientCaseStudysec=PatientCaseStudy::Where('user_id',$user->id)->Where('status',2)->first();
        $PatientCaseStudythird=PatientCaseStudy::Where('user_id',$user->id)->Where('status',3)->first();
        $PatientCaseStudyforth=PatientCaseStudy::Where('user_id',$user->id)->Where('status',4)->first();
        $newcaseplan=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newcaseplan')->orderBy('id','desc')->first();
        $allcaseplans=PatientCaseStudy::Where('user_id',$user->id)->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->get();
        $notes=PatientCaseStudy::Where('user_id',$user->id)->Where('type','notes')->get();
        $refinement=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->get();         
        $refinement_count=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->count();
        $modify=PatientCaseStudy::Where('user_id',$user->id)->Where('type','modify')->get();
        $stages=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newstage')->get();


            $request['status']=3;
            $patientCaseStudy = $request->only(['type','status','upper','lower','notes','user_id','food_allergy','heart_disease','high_blood_pressure','diabetic','surgery','accident','others','family_medical_history','current_medication','pregnancy','breastfeeding','health_insurance']);


            DB::transaction(function () use ($patientCaseStudy) {
                PatientCaseStudy::create($patientCaseStudy);
            });
            

///////////////////////////////////////////Send Email ////////////////////////////////////////////////////////////////////////////////      
            $message="New Step Manufactured Successfully \n" .$request['notes']."\n Link: ".$link;
            $logData = [];
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user) {
            $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to($in_charge_doctor->email)
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);
///////////////////////////////////////////End Send Email ////////////////////////////////////////////////////////////////////////////////


        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();

        return view('patient-case-study.show', compact('refinement_count','modify','stages','refinement','patientCaseStudy','user','PatientCaseStudysec','PatientCaseStudythird','newcaseplan','allcaseplans','notes','PatientCaseStudyforth'));
        
            
      
  }
 
 
        if($request['type']=="modify"){

            

            $patientCaseStudy = $request->only(['type','status','upper','lower','notes','user_id','food_allergy','heart_disease','high_blood_pressure','diabetic','surgery','accident','others','family_medical_history','current_medication','pregnancy','breastfeeding','health_insurance']);
           
            $logoUrl = "";
            if($request->upper)
            {
                $logo = $request->upper;
                $logoNewName = time().$logo->getClientOriginalName();
                $logo->move('lara/patient-case-studies/',$logoNewName);
                $logoUrl = 'lara/patient-case-studies/'.$logoNewName;
                $patientCaseStudy['upper'] = $logoUrl;
            }


            DB::transaction(function () use ($patientCaseStudy) {
                PatientCaseStudy::create($patientCaseStudy);
            });
            
        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        $user=User::Where('id',$patientCaseStudy->user_id)->first();
        $PatientCaseStudysec=PatientCaseStudy::Where('user_id',$user->id)->Where('status',2)->first();
        $PatientCaseStudythird=PatientCaseStudy::Where('user_id',$user->id)->Where('status',3)->first();
        $PatientCaseStudyforth=PatientCaseStudy::Where('user_id',$user->id)->Where('status',4)->first();
        $newcaseplan=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newcaseplan')->orderBy('id','desc')->first();
        $allcaseplans=PatientCaseStudy::Where('user_id',$user->id)->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->get();
        $notes=PatientCaseStudy::Where('user_id',$user->id)->Where('type','notes')->get();
        $refinement=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->get();
        $refinement_count=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->count();
        $modify=PatientCaseStudy::Where('user_id',$user->id)->Where('type','modify')->get();
        $stages=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newstage')->get();

///////////////////////////////////////////Send Email ////////////////////////////////////////////////////////////////////////////////      
            $message="New Modification Required \n" .$request['notes']."\n Link: ".$link;
            $logData = [];
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user) {
                $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to("info@lineup-aligners.com")
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);
///////////////////////////////////////////End Send Email ////////////////////////////////////////////////////////////////////////////////


        return view('patient-case-study.show', compact('refinement_count','modify','stages','refinement','patientCaseStudy','user','PatientCaseStudysec','PatientCaseStudythird','newcaseplan','allcaseplans','notes','PatientCaseStudyforth'));
        }
        
        
        if($request['approve']){

            
            $request['status']=3;
            
            $patientCaseStudy = $request->only(['type','status','upper','lower','notes','user_id','food_allergy','heart_disease','high_blood_pressure','diabetic','surgery','accident','others','family_medical_history','current_medication','pregnancy','breastfeeding','health_insurance']);


            DB::transaction(function () use ($patientCaseStudy) {
                PatientCaseStudy::create($patientCaseStudy);
            });
            
        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        $user=User::Where('id',$patientCaseStudy->user_id)->first();
        $PatientCaseStudysec=PatientCaseStudy::Where('user_id',$user->id)->Where('status',2)->first();
        $PatientCaseStudythird=PatientCaseStudy::Where('user_id',$user->id)->Where('status',3)->first();
        $PatientCaseStudyforth=PatientCaseStudy::Where('user_id',$user->id)->Where('status',4)->first();
        $newcaseplan=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newcaseplan')->orderBy('id','desc')->first();
        $allcaseplans=PatientCaseStudy::Where('user_id',$user->id)->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->get();
        $notes=PatientCaseStudy::Where('user_id',$user->id)->Where('type','notes')->get();
                $refinement=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->get();         $refinement_count=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->count();
        $modify=PatientCaseStudy::Where('user_id',$user->id)->Where('type','modify')->get();
        $stages=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newstage')->get();

///////////////////////////////////////////Send Email ////////////////////////////////////////////////////////////////////////////////      
            $message="Case Plan Approved \n" .$request['notes']."\n Link: ".$link;

            $logData = [];
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user) {
                $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to("info@lineup-aligners.com")
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);
///////////////////////////////////////////End Send Email ////////////////////////////////////////////////////////////////////////////////


        return view('patient-case-study.show', compact('refinement_count','modify','stages','refinement','patientCaseStudy','user','PatientCaseStudysec','PatientCaseStudythird','newcaseplan','allcaseplans','notes','PatientCaseStudyforth'));
        }
        
        if($request['reject']){

            
            $request['status']=4;
            
            $patientCaseStudy = $request->only(['type','status','upper','lower','notes','user_id','food_allergy','heart_disease','high_blood_pressure','diabetic','surgery','accident','others','family_medical_history','current_medication','pregnancy','breastfeeding','health_insurance']);


            DB::transaction(function () use ($patientCaseStudy) {
                PatientCaseStudy::create($patientCaseStudy);
            });
        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        $user=User::Where('id',$patientCaseStudy->user_id)->first();
        $PatientCaseStudysec=PatientCaseStudy::Where('user_id',$user->id)->Where('status',2)->first();
        $PatientCaseStudythird=PatientCaseStudy::Where('user_id',$user->id)->Where('status',3)->first();
        $PatientCaseStudyforth=PatientCaseStudy::Where('user_id',$user->id)->Where('status',4)->first();
        $newcaseplan=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newcaseplan')->orderBy('id','desc')->first();
        $allcaseplans=PatientCaseStudy::Where('user_id',$user->id)->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->get();
        $notes=PatientCaseStudy::Where('user_id',$user->id)->Where('type','notes')->get();
        $stages=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newstage')->get();


///////////////////////////////////////////Send Email ////////////////////////////////////////////////////////////////////////////////      
            $message="Case Plan Rejected \n" .$request['notes']."\n Link: ".$link;
            $logData = [];
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user) {
                $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to("info@lineup-aligners.com")
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);
///////////////////////////////////////////End Send Email ////////////////////////////////////////////////////////////////////////////////



        return view('patient-case-study.show', compact('refinement_count','modify','patientCaseStudy','user','PatientCaseStudysec','PatientCaseStudythird','newcaseplan','allcaseplans','notes','PatientCaseStudyforth'));
        }

        if($request['type']=="notes"){

            $userType=$request['user_type'];
            if($userType=='["Super Admin"]'){
             $request['others']="LineUp Notes";    
            }else{
             $request['others']="Doctor Notes";    
            }
            
            $patientCaseStudy = $request->only(['type','status','upper','lower','notes','user_id','food_allergy','heart_disease','high_blood_pressure','diabetic','surgery','accident','others','family_medical_history','current_medication','pregnancy','breastfeeding','health_insurance']);

            $logoUrl = "";
            if($request->upper)
            {
                $logo = $request->upper;
                $logoNewName = time().$logo->getClientOriginalName();
                $logo->move('lara/patient-case-studies/',$logoNewName);
                $logoUrl = 'lara/patient-case-studies/'.$logoNewName;
                $patientCaseStudy['upper'] = $logoUrl;
            }

            DB::transaction(function () use ($patientCaseStudy) {
                PatientCaseStudy::create($patientCaseStudy);
            });
            
        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        $user=User::Where('id',$patientCaseStudy->user_id)->first();
        $PatientCaseStudysec=PatientCaseStudy::Where('user_id',$user->id)->Where('status',2)->first();
        $PatientCaseStudythird=PatientCaseStudy::Where('user_id',$user->id)->Where('status',3)->first();
        $PatientCaseStudyforth=PatientCaseStudy::Where('user_id',$user->id)->Where('status',4)->first();
        $newcaseplan=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newcaseplan')->orderBy('id','desc')->first();
        $allcaseplans=PatientCaseStudy::Where('user_id',$user->id)->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->get();
        $notes=PatientCaseStudy::Where('user_id',$user->id)->Where('type','notes')->get();
        $modify=PatientCaseStudy::Where('user_id',$user->id)->Where('type','modify')->get();
                $refinement=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->get();         $refinement_count=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->count();
        $stages=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newstage')->get();

///////////////////////////////////////////Send Email ////////////////////////////////////////////////////////////////////////////////      
       
            
            $message="New Message \n" .$request['notes']."\n Link: ".$link;
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user) {
                $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to($in_charge_doctor->email)
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." - New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);


            $message="New Message \n" .$request['notes'];
            $logData = [];
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user) {
                $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to("info@lineup-aligners.com")
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." - New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);
///////////////////////////////////////////End Send Email ////////////////////////////////////////////////////////////////////////////////


        return view('patient-case-study.show', compact('refinement_count','modify','stages','refinement','patientCaseStudy','user','PatientCaseStudysec','PatientCaseStudythird','newcaseplan','allcaseplans','notes','PatientCaseStudyforth'));
        }
 
        if($request['type']=="newcaseplan"){


         $request['status']=2;
         
         if($request['case']==6){
             
            $request['type']='modifided';
         
///////////////////////////////////////////Send Email ////////////////////////////////////////////////////////////////////////////////      
            $message="Modifieded Case Plan Ready \n" .$request['notes']."\n Link: ".$link;

            $logData = [];
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user) {
                $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to($in_charge_doctor->email)
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);
///////////////////////////////////////////End Send Email ////////////////////////////////////////////////////////////////////////////////         
            }else{
///////////////////////////////////////////Send Email ////////////////////////////////////////////////////////////////////////////////      
            $message="Case Plan Are Ready \n" .$request['notes']."\n Link: ".$link;
            $logData = [];
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user) {
                $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to($in_charge_doctor->email)
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);
///////////////////////////////////////////End Send Email ////////////////////////////////////////////////////////////////////////////////         
            }

            $patientCaseStudy = $request->only(['type','status','upper','lower','notes','link','user_id','food_allergy','heart_disease','high_blood_pressure','diabetic','surgery','accident','others','family_medical_history','current_medication','pregnancy','breastfeeding','health_insurance']);

            $logoUrl = "";
            if($request->upper)
            {
                $logo = $request->upper;
                $logoNewName = time().$logo->getClientOriginalName();
                $logo->move('lara/patient-case-studies/',$logoNewName);
                $logoUrl = 'lara/patient-case-studies/'.$logoNewName;
                $patientCaseStudy['upper'] = $logoUrl;
            }

            DB::transaction(function () use ($patientCaseStudy) {
                PatientCaseStudy::create($patientCaseStudy); 
            });
            
        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        $user=User::Where('id',$patientCaseStudy->user_id)->first();
        $PatientCaseStudysec=PatientCaseStudy::Where('user_id',$user->id)->Where('status',2)->first();
        $PatientCaseStudythird=PatientCaseStudy::Where('user_id',$user->id)->Where('status',3)->first();
        $PatientCaseStudyforth=PatientCaseStudy::Where('user_id',$user->id)->Where('status',4)->first();
        $newcaseplan=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newcaseplan')->orderBy('id','desc')->first();
        $allcaseplans=PatientCaseStudy::Where('user_id',$user->id)->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->get();
        $notes=PatientCaseStudy::Where('user_id',$user->id)->Where('type','notes')->get();
                $refinement=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->get();         $refinement_count=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->count();
        $modify=PatientCaseStudy::Where('user_id',$user->id)->Where('type','modify')->get();
        $stages=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newstage')->get();

        return view('patient-case-study.show', compact('refinement_count','modify','stages','refinement','patientCaseStudy','user','PatientCaseStudysec','PatientCaseStudythird','newcaseplan','allcaseplans','notes','PatientCaseStudyforth'));
        }
 
         if($request['type']=="refinement"){
             
            $patientCaseStudy = $request->only(['photo','type','status','upper','lower','notes','link','user_id','food_allergy','heart_disease','high_blood_pressure','diabetic','surgery','accident','others','family_medical_history','current_medication','pregnancy','breastfeeding','health_insurance']);

            $logoUrl = "";
            if($request->upper)
            {
                $logo = $request->upper;
                $logoNewName = time().$logo->getClientOriginalName();
                $logo->move('lara/patient-case-studies/',$logoNewName);
                $logoUrl = 'lara/patient-case-studies/'.$logoNewName;
                $patientCaseStudy['upper'] = $logoUrl;
            }else{
                $patientCaseStudy['upper'] =$request->refUpperLink;
            }
            
            $logoUrl = "";

            if($request->lower)
            {
                $logo = $request->lower;
                $logoNewName = time().$logo->getClientOriginalName();
                $logo->move('lara/patient-case-studies/',$logoNewName);
                $logoUrl = 'lara/patient-case-studies/'.$logoNewName;
                $patientCaseStudy['lower'] = $logoUrl;
            }else{
                $patientCaseStudy['lower'] =$request->refLowerLink;
            }
            
            
        
        if($files=$request->file('photo')){
        foreach($files as $file){
            $name=time() .$file->getClientOriginalName();
            $file->move('lara/patient/', $name);
            $fileName = "lara/patient/".$name;
            $images[]=$fileName;
        }$patientCaseStudy['photo'] = json_encode($images??null); 
    }           
            
            DB::transaction(function () use ($patientCaseStudy) {
                PatientCaseStudy::create($patientCaseStudy); 
            });
        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        $user=User::Where('id',$patientCaseStudy->user_id)->first();
        $PatientCaseStudysec=PatientCaseStudy::Where('user_id',$user->id)->Where('status',2)->first();
        $PatientCaseStudythird=PatientCaseStudy::Where('user_id',$user->id)->Where('status',3)->first();
        $PatientCaseStudyforth=PatientCaseStudy::Where('user_id',$user->id)->Where('status',4)->first();
        $newcaseplan=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newcaseplan')->orderBy('id','desc')->first();
        $allcaseplans=PatientCaseStudy::Where('user_id',$user->id)->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->get();
        $notes=PatientCaseStudy::Where('user_id',$user->id)->Where('type','notes')->get();
                $refinement=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->get();         $refinement_count=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->count();
        $modify=PatientCaseStudy::Where('user_id',$user->id)->Where('type','modify')->get();
        $stages=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newstage')->get();

///////////////////////////////////////////Send Email ////////////////////////////////////////////////////////////////////////////////      
            $message="Refinement Required \n" .$request['notes']."\n Link: ".$link;
            $logData = [];
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user) {
                $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to("info@lineup-aligners.com")
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);
///////////////////////////////////////////End Send Email //////////////////////////////////////////////////////////////////////////////// 


        return view('patient-case-study.show', compact('refinement_count','modify','stages','refinement','patientCaseStudy','user','PatientCaseStudysec','PatientCaseStudythird','newcaseplan','allcaseplans','notes','PatientCaseStudyforth'));
        
         }
         
        if($request['status']==2 && !empty($user)){


            $patientCaseStudy = $request->only(['status','upper','lower','notes','link','user_id','food_allergy','heart_disease','high_blood_pressure','diabetic','surgery','accident','others','family_medical_history','current_medication','pregnancy','breastfeeding','health_insurance']);

            $logoUrl = "";
            if($request->upper)
            {
                $logo = $request->upper;
                $logoNewName = time().$logo->getClientOriginalName();
                $logo->move('lara/patient-case-studies/',$logoNewName);
                $logoUrl = 'lara/patient-case-studies/'.$logoNewName;
                $patientCaseStudy['upper'] = $logoUrl;
            }

            DB::transaction(function () use ($patientCaseStudy) {
                PatientCaseStudy::create($patientCaseStudy);
            });
            
        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        $user=User::Where('id',$request['user_id'])->first();
        $PatientCaseStudysec=PatientCaseStudy::Where('user_id',$request['user_id'])->Where('status',2)->first();
        $PatientCaseStudythird=PatientCaseStudy::Where('user_id',$request['user_id'])->Where('status',3)->first();
        $PatientCaseStudyforth=PatientCaseStudy::Where('user_id',$request['user_id'])->Where('status',4)->first();
        $newcaseplan=PatientCaseStudy::Where('user_id',$request['user_id'])->Where('type','newcaseplan')->orderBy('id','desc')->first();
        $allcaseplans=PatientCaseStudy::Where('user_id',$request['user_id'])->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->get();
        $notes=PatientCaseStudy::Where('user_id',$request['user_id'])->Where('type','notes')->get();
        $refinement=PatientCaseStudy::Where('user_id',$request['user_id'])->Where('type','refinement')->get();         
        $refinement_count=PatientCaseStudy::Where('user_id',$request['user_id'])->Where('type','refinement')->count();
        $modify=PatientCaseStudy::Where('user_id',$request['user_id'])->Where('type','modify')->get();
        $stages=PatientCaseStudy::Where('user_id',$request['user_id'])->Where('type','newstage')->get();



///////////////////////////////////////////Send Email ////////////////////////////////////////////////////////////////////////////////      
            $message=$request['notes']."\n Link: ".$link;
            $user=User::Where('id',$request['user_id'])->first();
            $logData = [];
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user) {
                $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to("info@lineup-aligners.com")
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);
///////////////////////////////////////////End Send Email //////////////////////////////////////////////////////////////////////////////// 

        return view('patient-case-study.show', compact('refinement_count','modify','stages','refinement','patientCaseStudy','user','PatientCaseStudysec','PatientCaseStudythird','newcaseplan','allcaseplans','notes','PatientCaseStudyforth'));
        
            
        }

        $this->validation($request);
        $userData = $request->only(['name','email','phone','address','gender','blood_group','status','company_id']);
        $userData['company_id'] =$request['company_id'];
        $userData['password'] = bcrypt($request->password);



        
        if($files=$request->file('photo')){
        foreach($files as $file){
            $name=time() .$file->getClientOriginalName();
            $file->move('lara/patient/', $name);
            $fileName = "lara/patient/".$name;
            $images[]=$fileName;
        }$userData['photo'] = json_encode($images??null);
    }


        if ($request->date_of_birth) {
            $userData['date_of_birth'] = Carbon::parse($request->date_of_birth);
        }
        
        $userData['company_id'] =$request['company_id'];
        DB::transaction(function () use ($userData){
            $user = User::create($userData);
            $role = Role::where('name', 'Patient')->first();
            $user->assignRole([$role->id]);
            $user->companies()->attach($userData['company_id']);
        });
        $insertedId=User::OrderBy('id',"desc")->first();
        
        $patient = PatientCaseStudy::where('user_id', '=', $insertedId->id)->first();
        $request->user_id=$insertedId->id;
        $patientCaseStudy['user_id']=$insertedId->id;
        if ($patient === null) {
            $patientCaseStudy = $request->only(['upper','lower','notes','user_id','food_allergy','heart_disease','high_blood_pressure','diabetic','surgery','accident','others','family_medical_history','current_medication','pregnancy','breastfeeding','health_insurance']);

            $logoUrl = "";
            if($request->upper)
            {
                $logo = $request->upper;
                $logoNewName = time().$logo->getClientOriginalName();
                $logo->move('lara/patient-case-studies/',$logoNewName);
                $logoUrl = 'lara/patient-case-studies/'.$logoNewName;
                $patientCaseStudy['upper'] = $logoUrl;
            }else{
               $patientCaseStudy['upper'] =$request->upperLink;
            }
            
            $logoUrl = "";

            if($request->lower)
            {
                $logo = $request->lower;
                $logoNewName = time().$logo->getClientOriginalName();
                $logo->move('lara/patient-case-studies/',$logoNewName);
                $logoUrl = 'lara/patient-case-studies/'.$logoNewName;
                $patientCaseStudy['lower'] = $logoUrl;
            }else{
                $patientCaseStudy['lower'] =$request->lowerLink;
            }

            DB::transaction(function () use ($patientCaseStudy) {
                PatientCaseStudy::create($patientCaseStudy);
            });
            
///////////////////////////////////////////Send Email ////////////////////////////////////////////////////////////////////////////////      
            $message="New Patient Added \n" .$request['notes']."\n Link: ".$link;

        $patientCaseStudy=PatientCaseStudy::Where('user_id',$request['user_id'])->first();
        $user=User::Where('id',$insertedId->id)->first();
        $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
            $logData = [];
            $text = str_replace('#NAME#', $user->name, $message);
            $text = str_replace('#PHONE#', $user->phone, $text);
            $text = str_replace('#Email_ADDRESS#', $user->email, $text);

            Mail::send([], [], function ($message) use ($text, $user){
                $user=User::OrderBy('id',"desc")->first();
                $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();
                $message->to("info@lineup-aligners.com")
                    ->subject("DR ".$in_charge_doctor->name."-".$user->name." New Update From lineUp")
                    ->setBody($text);
            });
            $logData[] = [
                'user_id' => $user->id,
                'email_campaign_id' => 1,
                'smtp_configuration_id' => 1,
                'status' => (count(Mail::failures()) > 0) ? '0' : '1',
                'created_at' => now(),
                'updated_at' => now()
            ];
            EmailCampaignLog::insert($logData);
///////////////////////////////////////////End Send Email //////////////////////////////////////////////////////////////////////////////// 
            
            
            return redirect()->route('patient-case-studies.index')->with('success', trans('Patient Case Study Added Successfully'));
        } else {
            return redirect()->route('patient-case-studies.create')->with('warning', trans('For This Patient Case Study Added Before'))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientCaseStudy  $patientCaseStudy
     * @return \Illuminate\Http\Response
     */
    public function show(PatientCaseStudy $patientCaseStudy)
    {
        $user=User::Where('id',$patientCaseStudy->user_id)->first();
        $PatientCaseStudysec=PatientCaseStudy::Where('user_id',$user->id)->Where('status',2)->first();
        $PatientCaseStudythird=PatientCaseStudy::Where('user_id',$user->id)->Where('status',3)->first();
        $PatientCaseStudyforth=PatientCaseStudy::Where('user_id',$user->id)->Where('status',4)->first();
        $newcaseplan=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newcaseplan')->orderBy('id','desc')->first();
        $allcaseplans=PatientCaseStudy::Where('user_id',$user->id)->Where('status','2')->Where('link','!=',null)->orderBy('id','desc')->get();
        $notes=PatientCaseStudy::Where('user_id',$user->id)->orderBy('id','desc')->Where('type','notes')->get();
        $refinement=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->get();         $refinement_count=PatientCaseStudy::Where('user_id',$user->id)->Where('type','refinement')->count();
        $modify=PatientCaseStudy::Where('user_id',$user->id)->Where('type','modify')->get();
        $stages=PatientCaseStudy::Where('user_id',$user->id)->Where('type','newstage')->get();
        $in_charge_doctor=DB::table('users')->where('id' ,$user->company_id)->first();

        if(auth()->user()->id!=1){
        if(auth()->user()->id!=$in_charge_doctor->id){
        return view('dashboards.common-dashboard');
        }}


        return view('patient-case-study.show', compact('refinement_count','modify','stages','refinement','patientCaseStudy','user','PatientCaseStudysec','PatientCaseStudythird','newcaseplan','allcaseplans','notes','PatientCaseStudyforth'));
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientCaseStudy  $patientCaseStudy
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientCaseStudy $patientCaseStudy)
    {
        $patientInfo = User::role('Patient')->where('company_id', auth()->user()->id)->where('status', '1')->select(['id', 'name'])->pluck('name', 'id');
        return view('patient-case-study.edit',compact('patientCaseStudy','patientInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientCaseStudy  $patientCaseStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientCaseStudy $patientCaseStudy)
    {
        $this->validation($request, $patientCaseStudy->id);
        $patient = PatientCaseStudy::where('user_id', '=', $request->user_id)->first();
        if($patientCaseStudy->user_id == $request->user_id) {
            $patient = null;
        }
        if ($patient === null) {
            $data = $request->only(['user_id','food_allergy','heart_disease','high_blood_pressure','diabetic','surgery','accident','others','family_medical_history','current_medication','pregnancy','breastfeeding','health_insurance']);

            $logoUrl = "";
            if($request->file)
            {
                $logo = $request->file;
                $logoNewName = time().$logo->getClientOriginalName();
                $logo->move('lara/patient-case-studies/',$logoNewName);
                $logoUrl = 'lara/patient-case-studies/'.$logoNewName;
                $data['file'] = $logoUrl;
            }

            DB::transaction(function () use ($patientCaseStudy, $data) {
                $patientCaseStudy->update($data);
            });
            return redirect()->route('patient-case-studies.index')->with('success', trans('Patient Case Study Update Successfully'));
        } else {
            return redirect()->route('patient-case-studies.edit', $patientCaseStudy->id)->with('warning', trans('For This Patient Case Study Added Before'))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientCaseStudy  $patientCaseStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientCaseStudy $patientCaseStudy)
    {
        $patientCaseStudy->where('user_id',$patientCaseStudy->user_id)->delete();
        return redirect()->route('patient-case-studies.index')->with('success', trans('Patient Case Study Deleted Successfully'));
    }

    /**
     * validation check for create & edit
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    private function validation(Request $request, $id = 0)
    {
        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'food_allergy' => ['nullable', 'string', 'max:255'],
            'heart_disease' => ['nullable', 'string', 'max:255'],
            'high_blood_pressure' => ['nullable', 'string', 'max:255'],
            'diabetic' => ['nullable', 'string', 'max:255'],
            'surgery' => ['nullable', 'string', 'max:255'],
            'accident' => ['nullable', 'string', 'max:255'],
            'others' => ['nullable', 'string', 'max:255'],
            'family_medical_history' => ['nullable', 'string', 'max:255'],
            'current_medication' => ['nullable', 'string', 'max:255'],
            'pregnancy' => ['nullable', 'string', 'max:255'],
            'breastfeeding' => ['nullable', 'string', 'max:255'],
            'file' => ['nullable', 'mimes:jpeg,png,jpg,pdf', 'max:5120'],
            'health_insurance' => ['nullable', 'string', 'max:255']
        ]);
    }
}
