<?php

namespace App\Http\Controllers;

use App\Models\buyer;
use App\Models\feedbacks;
use App\Models\houseier;
use App\Models\property_rent;
use App\Models\propertys;
use App\Models\tenant;
use Illuminate\Http\Request;
use App\Models\registration;
class admincontroller extends Controller
{
    //

public function admin_dashboard()
{

    $active_count=registration::where('status','active')->where('role','normal')->count();
    $feedback= feedbacks::all()->count();
    $houseier= houseier::all()->count();
 //   $inactive_count=registration::where('status','inactive')->count();
 $soldrent= tenant::where('status','sold')->count();
 $soldbuy= buyer::where('status','sold')->count();

    $rent=property_rent::where('status','active')->count();
    $buy=propertys::where('status','active')->count();

    $data=['active'=>$active_count,'feedback'=>$feedback,'houseier'=>$houseier,'rent'=>$rent,'buy'=>$buy,'buyer'=>$soldbuy,'tenant'=>$soldrent];
    return view('admin.a_index',compact('data'));
}


public function houseier_dashboard(Request $request)
{
    $em = session()->get('email3', $request->email);
    $active_count=property_rent::where('status','active')->where('email',$em)->count();
  //  $feedback= feedbacks::all()->count();
    $rent= tenant::where('status','sold')->where('owner_of_property',$em)->count();
    $pending= tenant::where('status','pending')->where('owner_of_property',$em)->count();

 //   $inactive_count=registration::where('status','inactive')->count();


    $data=['active'=>$active_count,'rent'=>$rent,'pending'=>$pending];
    return view('user_4.h_index',compact('data'));
}
}
