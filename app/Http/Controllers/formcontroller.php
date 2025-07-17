<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\admin;
use App\Models\admins;
use App\Models\buyer;
use App\Models\feedbacks;
use App\Models\hire;
use App\Models\home_latest;
use App\Models\houseier;
use App\Models\propertys;
use App\Models\property_rent;
use App\Models\registration;
use App\Models\tenant;
use App\Models\tenent;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\Exception;

class formcontroller extends Controller
{
    // ======================================= Admin ======================================

    //REGISTERTION
    public function registerv(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
            'email' => 'required|email|max:40',
            'password' => 'required|regex:/^[a-zA-Z_0-9]{8,16}+$/|confirmed',
            'password_confirmation' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required',
            // 'image'=>'required'
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
            'email.required' => 'email is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'password.required' => 'The password field is required',
            'password.regex' => 'Enter minimum 8 digit/letter ',
            'mobile.required' => 'The mobile field is required',

            // 'image.required' => 'The file field is required',
        ];
        $request->validate($rules, $custom_error);
        $reg = new registration();
        $reg->name = $request->name;
        $reg->email = $request->email;
        $reg->password = $request->password;
        $reg->mobile = $request->mobile;
        $reg->gender = $request->gender;

        $insert = $reg->save();
        if ($insert) {
            session()->flash('success', 'data is submitted');
        } else {
            session()->flash('error', 'data is not submitted');
        }

        return redirect('manage_reg');
    }
    public function showTable(Request $req)
    {

     //  $search=$req->input('search');
        $std = registration::all();

        //return $std;
        return view('admin.manage_reg', compact('std'));
    }

    public function editreg($email)
    {
        $std = registration::where('email', $email)->get();
        $std = DB::where('email', $email)->get();

        return view('admin.editreg', compact('std'));
    }

    public function updateData(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
            'email' => 'required|email|max:40',
            'password' => 'required|regex:/^[a-zA-Z_0-9]{8,16}+$/',

            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required',
            // 'image'=>'required'
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
            'email.required' => 'email is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'password.required' => 'The password field is required',
            'password.regex' => 'Enter minimum 8 digit/letter ',
            'mobile.required' => 'The mobile field is required',

            // 'image.required' => 'The file field is required',
        ];

        $request->validate($rules, $custom_error);
        $data = registration::where('email', $request->email)->first();
        $idata = houseier::where('email', $request->email)->first();

        if ($request->hasFile('image')) {
            $file_name = 'image/' . $data['image'];
            if (File::exists($file_name)) {
                File::delete($file_name);

                $pic_name = uniqid() . $request->file('image')->getClientOriginalName();
                $request->image->move('image/', $pic_name);
                $data->where('email', $request->email)->update(['name' => $request->name, 'email' => $request->email, 'password' => $request->password, 'mobile' => $request->mobile, 'gender' => $request->gender, 'image' => $pic_name]);
//$idata->where('email', $request->email)->update(['name' => $request->name,  'mobile' => $request->mobile ]);
            }
        } else {
            $data->where('email', $request->email)->update(['name' => $request->name, 'email' => $request->email, 'password' => $request->password, 'mobile' => $request->mobile, 'gender' => $request->gender]);
          //  $idata->where('email', $request->email)->update(['name' => $request->name,  'mobile' => $request->mobile]);

        }

        return redirect('manage_reg');
    }

    public function delete_user_registration($email)
    {
        $data = registration::where('email', $email)->update(['status' => 'deleted']);
        if ($data) {
            return redirect('manage_reg');
        }
    }
    public function deactivate_user_registration($email)
    {
        $data = registration::where('email', $email)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('manage_reg');
        }
    }
    public function activate_user_registration($email)
    {
        $data = registration::where('email', $email)->update(['status' => 'active']);
        if ($data) {
            return redirect('manage_reg');
        }
    }

    public function activate_user($email)
    {
        $data = registration::where('email', $email)->update(['status' => 'active']);
        // return $data;
        if ($data) {
            return redirect('login');
        }
    }
    public function reactivate_user_registration(Request $request,$email)
    {

        // if ($this->send_emailreg($email))
        // {

        $data = registration::where('email', $email)->update(['status' => 'inactive']);
        if ($data) {
            $data = ['email' => $request->email, 'name' => $request->name];
            Mail::send('admin.reg_mailer', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);

                $message->from('sm2realestate284@gmail.com', 'sm2');

                $message->subject('Reactivate Now');
            });

        // if ($data) {
            return redirect('manage_reg');
        // }
    // }
    // else{echo "nion";}
    }

    //     public function join()
    //     {
    //         return DB::table('registrations')
    //         ->join('stu','stu.id','=','collage.stu_id')

    //         ->get();
    //     }
    }
    public function regabout(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{2,40}+$/',
            'email' => 'required|email|max:40',
            'description' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'image' => 'required',
        ];
        $request->validate($rules);

        $reg = new about();
        $reg->name = $request->name;
        $reg->post = $request->post;
        $reg->email = $request->email;
        $reg->description = $request->description;
        $reg->mobile = $request->mobile;
        $img_name = uniqid() . $request->file('image')->getClientOriginalName();
        $request->image->move('image', $img_name);

        $reg->image = $img_name;

        $insert = $reg->save();
        if ($insert) {
            session()->flash('success', 'data is submitted');
        } else {
            session()->flash('error', 'data is not submitted');
        }

        return redirect('manage_about');
    }

    public function showAbout()
    {
        $std = about::all();

        //return $std;
        return view('admin.manage_about', compact('std'));
    }



    public function delete_about($email)
    {
        $data = about::where('email', $email)->update(['status' => 'deleted']);
        if ($data) {
            return redirect('manage_about');
        }
    }
    public function deactivate_about($email)
    {
        $data = about::where('email', $email)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('manage_about');
        }
    }
    public function activate_about($email)
    {
        $data = about::where('email', $email)->update(['status' => 'active']);
        if ($data) {
            return redirect('manage_about');
        }
    }
    public function reactivate_about($email)
    {
        $data = about::where('email', $email)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('manage_about');
        }
    }


    // HIRE

    public function reghire(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{2,40}+$/',
            'email' => 'required|email|max:40',
            'experience' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 8 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);

        $reg = new hire();
        $reg->name = $request->name;
        $reg->email = $request->email;
        $reg->experience = $request->experience;
        $reg->mobile = $request->mobile;
        $reg->gender = $request->gender;
        $insert = $reg->save();
        if ($insert) {
            session()->flash('success', 'data is submitted');
        } else {
            session()->flash('error', 'data is not submitted');
        }

        return redirect('manage_hire');
    }

    public function showHire()
    {
        $std = hire::all();

        //return $std;
        return view('admin.manage_hire', compact('std'));
    }

    public function edithire($email)
    {
        $std = hire::where('email', $email)->get();

        return view('admin.edithire', compact('std'));
    }

    public function updatehire(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{2,40}+$/',
            'email' => 'required|email|max:40',
            'experience' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 8 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);

        $data = hire::where('email', $request->email)->first();
        $data->where('email', $request->email)->update(['name' => $request->name, 'email' => $request->email, 'experience' => $request->experience, 'mobile' => $request->mobile, 'gender' => $request->gender]);
        return redirect('manage_hire');
    }
    public function approve(Request $request, $email)
    {
        $data = hire::where('email', $email)->update(['status' => 'approved']);

        if ($data) {
            $data = ['email' => $request->email, 'name' => $request->name];
            Mail::send('admin.hireapprove_mailer', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);

                $message->from('sm2realestate284@gmail.com', 'sm2');

                $message->subject('Job Application');
            });
            return redirect('manage_hire');
        }
    }
    public function not_approved($email)
    {
        $data = hire::where('email', $email)->update(['status' => 'not approved']);
        if ($data) {
            return redirect('manage_hire');
        }
    }

    public function regfeedback(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{2,40}+$/',
            'email' => 'required|email|max:40',
            'review' => 'required',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 8 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
        ];
        $request->validate($rules, $custom_error);
        $reg = new feedbacks();
        $reg->name = $request->name;
        $reg->email = $request->email;
        $reg->feedback = $request->review;
        $insert = $reg->save();
        if ($insert) {
            session()->flash('success', 'data is submitted');
        } else {
            session()->flash('error', 'data is not submitted');
        }

        return redirect('manage_feedback');
    }

    public function showFeedback()
    {
        $std = feedbacks::all();

        //return $std;
        return view('admin.manage_feedback', compact('std'));
    }
    public function editfeedback($email)
    {
        $std = feedbacks::where('email', $email)->get();

        return view('admin.editfeedback', compact('std'));
    }

    public function updatefeedback(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{2,40}+$/',
            'email' => 'required|email|max:40',
            'review' => 'required',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 8 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
        ];
        $request->validate($rules, $custom_error);

        $data = feedbacks::where('email', $request->email)->first();
        $data->where('email', $request->email)->update(['name' => $request->name, 'email' => $request->email, 'feedback' => $request->review]);
        return redirect('manage_feedback');
    }

    public function delete_feedback($email)
    {
        $data = feedbacks::where('email', $email)->update(['status' => 'deleted']);
        if ($data) {
            return redirect('manage_feedback');
        }
    }
    public function deactivate_feedback($email)
    {
        $data = feedbacks::where('email', $email)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('manage_feedback');
        }
    }
    public function activate_feedback($email)
    {
        $data = feedbacks::where('email', $email)->update(['status' => 'active']);
        if ($data) {
            return redirect('manage_feedback');
        }
    }
    public function reactivate_feedback($email)
    {
        $data = feedbacks::where('email', $email)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('manage_feedback');
        }
    }

    public function reghouseier(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{2,40}+$/',
            'email' => 'required|email|max:40',
            'password' => 'required|regex:/^[a-zA-Z_0-9]{8,16}+$/|confirmed',
            'password_confirmation' => 'required',
            'mobile' => 'required|numeric|digits:10',
            //  'date' => 'required',
            // 'time' => 'required',
            //    'picture' => 'required|mimes:jpg,png,jpeg',
            // 'state' => 'required',

            // 'hobbies' => 'required',
            // 'message' => 'required',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 8 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'password.required' => 'The password field is required',
            'password.regex' => 'Enter minimum 8 digit/letter ',
            'mobile.required' => 'The mobile field is required',
            //  'date' => 'The date field is required',
            // 'time' => 'The time field is required',
            // 'picture' => 'The file field is required',
            // 'picture.mimes' => 'You can only upload jpg , png and jpeg files',
            // 'state' => 'Please choose the state',
            // 'message' => 'Please Enter the message',
        ];
        $request->validate($rules, $custom_error);
        return redirect('manage_houseier');
    }

    public function showHouseier()
    {
        $std = houseier::all();

        //return $std;
        return view('admin.manage_houseier', compact('std'));
    }

    public function delete_houseier($email)
    {
        $data = houseier::where('email', $email)->update(['status' => 'deleted']);
        if ($data) {
            return redirect('manage_houseier');
        }
    }
    public function deactivate_houseier($email)
    {
        $data = houseier::where('email', $email)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('manage_houseier');
        }
    }
    public function activate_houseier($email)
    {
        $data = houseier::where('email', $email)->update(['status' => 'active']);
        if ($data) {
            return redirect('manage_houseier');
        }
    }


    public function uactivate_houseier($email)
    {
        $data = houseier::where('email', $email)->update(['status' => 'active']);
        if ($data) {
            return redirect('login');
        }
    }
    public function reactivate_houseier($email)
    {
        $data = houseier::where('email', $email)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('manage_houseier');
        }
    }

    public function show_rent_house_table()
    {
        // $reg_data = DB::table('properti')->where('id', 1);
        $reg_data = property_rent::all();
        // return $reg_data;
        return view('admin.manage_house_from_houseier', compact('reg_data'));
    }

    public function delete_hproperty_rent($id)
    {
        $data = property_rent::where('id', $id)->update(['status' => 'deleted']);
        if ($data) {
            return redirect('manage_house_from_houseier');
        }
    }
    public function deactivate_hproperty_rent($id)
    {
        $data = property_rent::where('id', $id)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('manage_house_from_houseier');
        }
    }
    public function activate_hproperty_rent($id)
    {
        $data = property_rent::where('id', $id)->update(['status' => 'active']);
        if ($data) {
            return redirect('manage_house_from_houseier');
        }
    }
    public function reactivate_hproperty_rent($id)
    {
        $data = property_rent::where('id', $id)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('manage_house_from_houseier');
        }
    }
    public function regtenant(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{2,40}+$/',
            'email' => 'required|email|max:40',
            'housename' => 'required',
            'mobile' => 'required|numeric|digits:10',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 8 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);
        return redirect('manage_tenant');
    }
    public function regbuy(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{2,40}+$/',
            'email' => 'required|email|max:40',
            'housename' => 'required',
            'mobile' => 'required|numeric|digits:10',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 8 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);
        return redirect('manage_buyer');
    }


    public function reg_buy_single(Request $req){
        $rules = [
            //'picture' => 'required',
            'price' => 'required|numeric',
            'bed'=>'required|numeric',
            'bath'=>'required|numeric',
            'area'=>'required|numeric',
         //   'benifits'=>'required',
            'location'=>'required',
            'city'=>'required',
            'address' => 'required',
            'property_des' => 'required'

        ];
        $custom_error = [
            //'picture.required' => 'The picture field cannot be empty',
            'price.required' => 'The price field cannot be empty',
            'price.numeric' => 'only numbers can entered',
            'bed.required' => 'The bed field cannot be empty',
            'bed.numeric' => 'only numbers can entered',
            'bath.required' => 'The bath field cannot be empty',
            'bath.numeric' => 'only numbers can entered',
            'area.required' => 'The area field cannot be empty',
            'area.numeric' => 'only numbers can entered',
           // 'benifits.required' => 'The benifits field cannot be empty',
            'location.required' => 'The location field cannot be empty',
            'city.required' => 'The city field cannot be empty',
            'address.required' => 'The address field cannot be empty',
            'property_des.required' => 'The property description field cannot be empty',

        ];
      $req->validate($rules, $custom_error);


            $pic = array();
            if ($files = $req->file('pict')){
                foreach ($files as $file) {
                    $picture_name = uniqid() . $req->file('picture');
                    $ext = strtolower($file->getClientOriginalExtension());
                    $picture_full_name = $picture_name.'.'.$ext;
                    $upload_path = 'image/property_picture_buy/';
                    $picture_url = $upload_path.$picture_full_name;
                    $file->move($upload_path,$picture_full_name);
                    $pic[] = $picture_url;
                }
            }

        $reg = new propertys();

        $reg->picture = implode('|', $pic);
        $reg->price = $req->price;
        $reg->bed = $req->bed;
        $reg->bath = $req->bath;
        $reg->area = $req->area;
     //   $reg->benifits = $benifits;
        $reg->location = $req->location;
        $reg->city = $req->city;
        $reg->address = $req->address;
        $reg->property_description = $req->property_des;



        $home=new home_latest;
        $home->picture = implode('|', $pic);
        $home->price = $req->price;
        $home->bed = $req->bed;
        $home->area = $req->area;
        $home->location = $req->location;
        $home->city = $req->city;
        $home->address = $req->address;


        $home->save();



        // $reg1 = DB::table('countries')->where('name', '!=', $req->city)->first();
        // if ($reg1) {
        //     $reg1->name = $req->city;
        // }
        // $reg1->save();


        // $req2 = DB::table('states')->where('name', '!=', $req->location)->first();
        // if($req2){
        //     $reg2->name = $req->location;210000
        //     $reg2->country_id = $req1->id;
        // }

        if ($reg->save()) {
            session()->flash('success', 'Registration Success');
        } else {
            session()->flash('error', 'Registration Failed');
        }
        return redirect('manage_property_detail_buy');

    }

    public function show_reg_buy_table()
    {
        // $reg_data = DB::table('properti')->where('id', 1);
        $reg_data = propertys::all();
        // return $reg_data;
        return view('admin.manage_property_detail_buy', compact('reg_data'));
    }
    public function show_latest()
    {
        // $reg_data = DB::table('properti')->where('id', 1);
        $reg_data = home_latest::all();
        // return $reg_data;
        return view('admin.manage_home_latest_property', compact('reg_data'));
    }
    public function deactivate_latest_buy($id)
    {
        $data = home_latest::where('id', $id)->update(['status' => 'inactive']);

        if ($data) {


            return redirect('manage_home_latest_property');
        }
    }
    public function activate_latest_buy($id)


    {
           $d=propertys::where('status','active')->where('id',$id)->get();
           if($d)
           {
        $data = home_latest::where('id', $id)->update(['status' => 'active']);
           }
           else{

            return back()->withErrors([ 'Parent Property Is Not Active']);
           }


        if ($data) {
            return redirect('manage_home_latest_property');
        }
    }
    public function delete_property_buy($id)
    {
        $data = propertys::where('id', $id)->update(['status' => 'deleted']);
        if ($data) {
            return redirect('manage_property_detail_buy');
        }
    }





    public function deactivate_property_buy($id)
    {
        $data = propertys::where('id', $id)->update(['status' => 'inactive']);
            $d=home_latest::where('id',$id)->update(['status'=>'inactive']);
            if($data and $d)
            {
            return redirect('manage_property_detail_buy');
            }

    }
    public function activate_property_buy($id)
    {
        $data = propertys::where('id', $id)->update(['status' => 'active']);
        if ($data) {
            return redirect('manage_property_detail_buy');
        }
    }
    public function reactivate_property_buy($id)
    {
        $data = propertys::where('id', $id)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('manage_property_detail_buy');
        }
    }










    // ======================================= User-4 ======================================

    public function reg_rent_u4(Request $req){
        $rules = [
            'picture' => 'required',
           // 'email'=>'required'
            'price' => 'required|numeric',
            'bed'=>'required|numeric',
            'bath'=>'required|numeric',
            'area'=>'required|numeric',
           // 'benifits'=>'required',
            'location'=>'required',
            'city'=>'required',
            'address' => 'required',
            'property_des' => 'required'

        ];
        $custom_error = [
            'picture.required' => 'The picture field cannot be empty',
            'price.required' => 'The price field cannot be empty',
            'price.numeric' => 'only numbers can entered',
            'bed.required' => 'The bed field cannot be empty',
            'bed.numeric' => 'only numbers can entered',
            'bath.required' => 'The bath field cannot be empty',
            'bath.numeric' => 'only numbers can entered',
            'area.required' => 'The area field cannot be empty',
            'area.numeric' => 'only numbers can entered',
           // 'benifits.required' => 'The benifits field cannot be empty',
            'location.required' => 'The location field cannot be empty',
            'city.required' => 'The city field cannot be empty',
            'address.required' => 'The address field cannot be empty',
            'property_des.required' => 'The property description field cannot be empty',

        ];
       // $req->validate($rules, $custom_error);

            $pic = array();
            if ($files = $req->file('pict')){
                foreach ($files as $file) {
                    $picture_name = uniqid() . $req->file('picture');
                    $ext = strtolower($file->getClientOriginalExtension());
                    $picture_full_name = $picture_name.'.'.$ext;
                    $upload_path = 'image/property_picture/';
                    $picture_url = $upload_path.$picture_full_name;
                    $file->move($upload_path,$picture_full_name);
                    $pic[] = $picture_url;
                }
            }



        $reg = new property_rent();
        $reg->email = $req->email;
        $reg->picture = implode('|', $pic);
        $reg->price = $req->price;
        $reg->bed = $req->bed;
        $reg->bath = $req->bath;
        $reg->area = $req->area;
      //  $reg->benifits = $benifits;
        $reg->location = $req->location;
        $reg->city = $req->city;
        $reg->address = $req->address;
        $reg->property_description = $req->property_des;






        // $reg1 = DB::table('countries')->where('name', '!=', $req->city)->first();
        // if ($reg1) {
        //     $reg1->name = $req->city;
        // }
        // $reg1->save();


        // $req2 = DB::table('states')->where('name', '!=', $req->location)->first();
        // if($req2){
        //     $reg2->name = $req->location;210000
        //     $reg2->country_id = $req1->id;
        // }


        if ($reg->save()) {
            session()->flash('success', 'Registration Success');
        } else {
            session()->flash('error', 'Registration Failed');
        }




        return redirect('hmanage_house_from_houseier');

    }

    public function show_reg_rent_table(Request $request)
    {
        // $reg_data = DB::table('properti')->where('id', 1);
        $em = session()->get('email3', $request->email);
        // echo $em;

       // $data = houseier::where('email',$em)->get();
        $reg_data = property_rent::where('email',$em)->get();
        // return $reg_data;
        return view('user_4.hmanage_house_from_houseier', compact('reg_data'));
    }

    public function show_reg_rent(Request $request)
    {

        $em = session()->get('email3', $request->email);
        // echo $em;

        $data = houseier::where('email',$em)->get();
        return view('user_4.reg_rent_property', compact('data'));
    }

    // public function city()
    // {
    //     $countries = DB::table('countries')
    //         ->get();

    //     return view('user_2.rent_u2', compact('countries'));
    // }

    public function getStates(Request $request)
    {
        $states = DB::table('states')
            ->where('country_id', $request->country_id)
            ->get();

        if (count($states) > 0) {
            return response()->json($states);
        }
    }


    public function delete_property_rent($id)
    {
        $data = property_rent::where('id', $id)->update(['status' => 'deleted']);
        if ($data) {
            return redirect('hmanage_house_from_houseier');
        }
    }
    public function deactivate_property_rent($id)
    {
        $data = property_rent::where('id', $id)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('hmanage_house_from_houseier');
        }
    }
    public function activate_property_rent($id)
    {
        $data = property_rent::where('id', $id)->update(['status' => 'active']);
        if ($data) {
            return redirect('hmanage_house_from_houseier');
        }
    }
    public function reactivate_property_rent($id)
    {
        $data = property_rent::where('id', $id)->update(['status' => 'inactive']);

        if ($data) {
            return redirect('hmanage_house_from_houseier');
        }
    }






    public function show_profile_info_admin(Request $request){

        $em = session()->get('email2', $request->email);
        $idata = admin::where('email',$em)->get();



            return view('admin.editadmin', compact('idata'));

    }
    public function edit_admin(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
           // 'mobile' => 'required|numeric|digits:10',
            // 'image'=>'required'
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
           // 'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);

        $em = session()->get('email2', $request->email);
        // echo $em;


       $data = admin::where('email',$em)->first();
        if ($request->hasFile('image')) {
            $file_name = 'image/' . $data['image'];
            if (File::exists($file_name)) {
                File::delete($file_name);

                $pic_name = uniqid() . $request->file('image')->getClientOriginalName();
                $request->image->move('image/', $pic_name);
                $data->where('email',$em)->update(['name' => $request->name,  'image' => $pic_name]);
                   // return $data;

            }
        } else {
            $data->where('email',$em)->update(['name' => $request->name]);
       //  return $data;
        }


    return redirect('editadmin');
    }












    // ======================================= User-1 ======================================

    public function registerv_u1(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
            'email' => 'required|email|max:40',
            'password' => 'required|regex:/^[a-zA-Z_0-9]{8,16}+$/|confirmed',
            'password_confirmation' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
            'email.required' => 'email is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'password.required' => 'The password field is required',
            'password.regex' => 'Enter minimum 8 digit/letter ',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);
        $reg = new registration();
        $reg->name = $request->name;
        $reg->email = $request->email;
        $reg->password = $request->password;
        $reg->mobile = $request->mobile;
        $reg->gender = $request->gender;
        $img_name = uniqid() . $request->file('image')->getClientOriginalName();
        $request->image->move('image', $img_name);
         $reg->image = $img_name;

        $insert = $reg->save();
        if ($insert) {
            session()->flash('success', 'data is submitted');
        } else {
            session()->flash('error', 'data is not submitted');
        }




        return redirect('login');
    }

    public function reghire_u1(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{2,40}+$/',
            'email' => 'required|email|max:40',
            'experience' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 8 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);
        // $request->validate($rules, $custom_error);
        $reg = new hire();
        $reg->name = $request->name;
        $reg->email = $request->email;
        $reg->experience = $request->experience;
        $reg->mobile = $request->mobile;
        $reg->gender = $request->gender;
        $insert = $reg->save();
        if ($insert) {
            session()->flash('success', 'data is submitted');
        } else {
            session()->flash('error', 'data is not submitted');
        }

        return redirect('login');
    }

    public function login_validate(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email Field is required',
            ],
        );

        // $register = new registration();
        $userExists1 = registration::where('email', $request->email)
            ->where('password', $request->password)->where('status', 'active')
            ->count();
         $userExists3 = houseier::where('email', $request->email)
            ->where('password', $request->password)->where('status', 'active')
            ->count();
        $userExists2 = admin::where('email', $request->email)
            ->where('password', $request->password)->count();

        if($userExists1 == 1){
            session()->put('email1', $request->email);
            session()->put('password1', $request->password);
             session()->flash('success', 'data is submitted');
            return redirect('index_u2');
        } else if($userExists2 == 1){
            session()->put('email2', $request->email);
            session()->put('password2', $request->password);
             session()->flash('success', 'data is submitted');


            return redirect('a_index');
        }
        elseif($userExists3 == 1)
        {
            session()->put('email3', $request->email);
            session()->put('password3', $request->password);
                         session()->flash('success', 'data is submitted');

            return redirect('h_index');
        }
        else{
            return redirect('login');
        }


        // if ($userExists1 == 1) {
        //     $result = registration::where('email', $request->email)->first();
        //     // if($result->status=="inactive")
        //     // {

        //     // }



        //     if($result->role == 'admin'){
        //         session()->put('email', $request->email);
        //         session()->put('password', $request->password);
        //         return redirect('a_index');
        //     }
        // //     return redirect('h_index');
        //     else
        //              session()->put('user', $request->email);
        //             session()->put('password', $request->password);
        //         return redirect('index_u2');

        // }else{
        //     return redirect('login');
        // }
    }



     public function logout()
    {
        session()->forget('email1');
        session()->forget('password1');
        session()->flash('success', 'Your account was logged out successfully');
        return redirect('login');
    }

    public function logoutadmin()
    {
        session()->forget('email2');
        session()->forget('password2');
        session()->flash('success', 'Your account was logged out successfully');
        return redirect('login');
    }

    public function hlogout()
    {
        session()->forget('email3');
        session()->forget('password3');
        session()->flash('success', 'Your account was logged out successfully');
        return redirect('login');
    }


    // ======================================= User-2 ======================================

    public function reghire_u2(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
            'email' => 'required|email|max:40',
            'experiance' => 'required',
            'mobile' => 'required|numeric|digits:10',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);

        return redirect('index_u2');
    }

    public function regfeedback_u2(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
            'email' => 'required|email|max:40',
            'review' => 'required',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
        ];
        $request->validate($rules, $custom_error);
        $reg = new feedbacks();
        $reg->name = $request->name;
        $reg->email = $request->email;
        $reg->feedback = $request->review;
        $insert = $reg->save();
        if ($insert) {
            session()->flash('success', 'data is submitted');
        } else {
            session()->flash('error', 'data is not submitted');
        }

        return redirect('index_u2');
    }

    public function showregfeedback(Request $request)

    {

        $em = session()->get('email1', $request->email);

        $std = registration::where('email',$em)->get();

        //return $std;
        return view('user_2.reg_feedback', compact('std'));
    }

    public function reghouseier_u2(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
            'email' => 'required|email|max:40',
            'password' => 'required|regex:/^[a-zA-Z_0-9]{8,16}+$/|confirmed',
            'password_confirmation' => 'required',
            'mobile' => 'required|numeric|digits:10',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'password.required' => 'The password field is required',
            'password.regex' => 'Enter minimum 8 digit/letter ',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);
        $em = session()->get('email1', $request->email);
        $idata = registration::where('email', $em)->first();

        $reg = new houseier();
        $reg->name = $request->name;
        if($request->password == $idata->password){

            return back()->withErrors([ 'password' =>'Entered password and Resgistration password cannot be same']);
        }
        else{

            $reg->password = $request->password;
        }
        $reg->email = $request->email;
        $reg->mobile = $request->mobile;
        $insert = $reg->save();
        if ($insert) {
            session()->flash('success', 'data is submitted');
        } else {
            session()->flash('error', 'data is not submitted');
        }

        return redirect('index_u2');
    }

    public function showreghouseier(Request $request)
    {        $em = session()->get('email1', $request->email);
        $std = registration::where('status','active')->where('email',$em)->get();

         return view('user_2.reg_houseier', compact('std'));
    }

    public function regtenant_u2(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
            'email' => 'required|email|max:40',
            'housename' => 'required',
            'mobile' => 'required|numeric|digits:10',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);

        return redirect('rent_u2');
    }

    public function regbuy_u2(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
            'email' => 'required|email|max:40',
            'housename' => 'required',
            'mobile' => 'required|numeric|digits:10',
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
            'email.required' => 'The email field is required',
            'email.max' => 'The email maxmimum length is 40 characters',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);

        return redirect('index_u2');
    }

    public function edit_u2(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
            'mobile' => 'required|numeric|digits:10',
            // 'image'=>'required'
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);

        $em = session()->get('email1', $request->email);

      //  return $em;

      $idata = houseier::where('email',$em)->first();
        $data = registration::where('status','active')->where('email',$em)->first();
        if ($request->hasFile('image')) {
            $file_name = 'image/' . $data['image'];
            if (File::exists($file_name)) {
                File::delete($file_name);

                $pic_name = uniqid() . $request->file('image')->getClientOriginalName();
                $request->image->move('image/', $pic_name);
                $data->where('email',$em)->update(['name' => $request->name, 'email' => $em, 'mobile' => $request->mobile,  'image' => $pic_name]);
                $idata->where('email',$em)->update(['name' => $request->name,  'mobile' => $request->mobile]);
// return $data;

            }
        } else {
            $data->where('email',$em)->update(['name' => $request->name, 'email' => $em,  'mobile' => $request->mobile]);
                        $idata->where('email',$em)->update(['name' => $request->name,  'mobile' => $request->mobile]);

        }


      return redirect('edit_profile_u2');
    }



    public function show_profile_info(Request $request){

        $em = session()->get('email1', $request->email);
        $idata = registration::where('status','active')->where('email',$em)->get();



            return view('user_2.edit_profile_u2', compact('idata'));

    }



    public function show_profile_info_houseier(Request $request){

        $em = session()->get('email3', $request->email);
        $idata = houseier::where('email',$em)->get();



            return view('user_4.edithouseier', compact('idata'));

    }


    public function edit_houseier(Request $request)
    {
        $rules = [
            'name' => 'required|regex:/^[A-Za-z_]{3,40}+$/',
            'mobile' => 'required|numeric|digits:10',
            // 'image'=>'required'
        ];
        $custom_error = [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => 'Enter minimum 3 letter and maximum 40 letter ',
            'mobile.required' => 'The mobile field is required',
        ];
        $request->validate($rules, $custom_error);

        $em = session()->get('email3', $request->email);
        // echo $em;


       $data = houseier::where('email',$em)->first();
       $idata=registration::where('email',$em)->first();
        if ($request->hasFile('image')) {
            $file_name = 'image/' . $data['image'];
            if (File::exists($file_name)) {
                File::delete($file_name);

                $pic_name = uniqid() . $request->file('image')->getClientOriginalName();
                $request->image->move('image/', $pic_name);
                $data->where('email',$em)->update(['name' => $request->name,  'mobile' => $request->mobile,  'image' => $pic_name]);
                $idata->where('email',$em)->update(['name' => $request->name,  'mobile' => $request->mobile]);

            }
        } else {
            $data->where('email',$em)->update(['name' => $request->name,'mobile' => $request->mobile]);
            $idata->where('email',$em)->update(['name' => $request->name,  'mobile' => $request->mobile]);
       //  return $data;
        }


    return redirect('edithouseier');
    }


    public function change_password_u2(Request $request)
    {
        $rules = [
            'password' => 'required|regex:/^[a-zA-Z_0-9]{8,16}+$/',
            'new_password' => 'required|regex:/^[a-zA-Z_0-9]{8,16}+$/|',
            'new_password_confirmation' => 'required',
        ];
        $custom_error = [
            'password.required' => 'The password field is required',
            'password.regex' => 'Enter minimum 8 digit/letter ',
            'new_password.required' => 'The new password field is required',
            'new_password.regex' => 'Enter minimum 8 digit/letter ',
        ];
        //  $request->validate($rules, $custom_error);

        $em = session()->get('email1', $request->email);
        $idata = registration::where('email', $em)->first();

        // return $idata->password;
        // return $request->password;

        if( $idata->password == $request->password){
            if($request->password != $request->new_password){
                if($request->new_password == $request->confirm_new_password){
                    $idata->where('email', $em)->update(['password' => $request->new_password]);
                }
                else{
                    return back()->withErrors([ 'new_password_confirmation' =>'Confirm password is not match']);
                }
            }
            else{
                return back()->withErrors([ 'new_password' =>'ola password and new password are same']);
            }
        }
        else{
            return back()->withErrors([ 'password' => 'old password is not match']);
        }

        return redirect('edit_profile_u2');
    }

    public function change_password_info(Request $request){
        $em = session()->get('email1',$request->email);
        $idata = registration::where('status','active')->where('email',$em)->get();
         return view('user_2.change_password',compact('idata'));
    }
    public function change_password_u4(Request $request)
    {
        $rules = [
            'password' => 'required|regex:/^[a-zA-Z_0-9]{8,16}+$/',
            'new_password' => 'required|regex:/^[a-zA-Z_0-9]{8,16}+$/|',
            'new_password_confirmation' => 'required',
        ];
        $custom_error = [
            'password.required' => 'The password field is required',
            'password.regex' => 'Enter minimum 8 digit/letter ',
            'new_password.required' => 'The new password field is required',
            'new_password.regex' => 'Enter minimum 8 digit/letter ',
        ];
       //  $request->validate($rules, $custom_error);

        $em = session()->get('email3', $request->email);
        $idata = houseier::where('email', $em)->first();
      //  $data = registration::where('email', $em)->first();


        // return $idata->password;
        // return $request->password;

        if( $idata->password == $request->password){

            if($request->password != $request->new_password){

                // if($request->new_password == $data->password)
                // {
                //     return back()->withErrors([ 'password' =>'Entered password and Resgistration password cannot be same']);
                // }

                if($request->new_password == $request->confirm_new_password){
                    $idata->where('email', $em)->update(['password' => $request->new_password]);
                }
                else{
                    return back()->withErrors([ 'new_password_confirmation' =>'Confirm password is not match']);
                }
            }
            else{
                return back()->withErrors([ 'new_password' =>'ola password and new password are same']);
            }
        }
        else{
            return back()->withErrors([ 'password' => 'old password is not match']);
        }

        return redirect('edit_houseier');
    }

    public function hchange_password_info(Request $request){
        $em = session()->get('email3',$request->email);
        $idata = houseier::where('status','active')->where('email',$em)->get();
         return view('user_4.hchange_password',compact('idata'));
    }
//    public function masterprofile(Request $request)
//    {

//     $em = session()->get('email', $request->email);

//     //  return $em;


//       $data = registration::where('status','active')->where('email',$em)->get();

//       return view('admin.master', compact('data'));

//    }


    // ======================================= ALL MAILER======================================
    public function send_emailhouseier(Request $req)
    {
        if ($this->reghouseier_u2($req)) {
            $data = ['email' => $req->email, 'name' => $req->name];
            Mail::send('admin.house_mailer', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);

                $message->from('sm2realestate284@gmail.com', 'sm2');

                $message->subject('Registertion As Houseier Info ');
            });

            return redirect('index_u2');
        }
    }
    public function send_emailreg(Request $req)
    {
        if ($this->registerv($req)) {
            $data = ['email' => $req->email, 'name' => $req->name];
            Mail::send('admin.reg_mailer', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);

                $message->from('sm2realestate284@gmail.com', 'sm2');

                $message->subject('Registertion Info ');
            });

            return redirect('manage_reg');
        }
    }

    public function send_emailhire(Request $req)
    {
        if ($this->reghire($req)) {
            $data = ['email' => $req->email, 'name' => $req->name];
            Mail::send('admin.reghire_mailer', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);

                $message->from('sm2realestate284@gmail.com', 'sm2');

                $message->subject('Job Application');
            });

            return redirect('manage_hire');
        }
    }

    public function send_emailregu1(Request $req)
    {
        if ($this->registerv_u1($req)) {
            $data = ['email' => $req->email, 'name' => $req->name];
            Mail::send('admin.reg_mailer', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);

                $message->from('sm2realestate284@gmail.com', 'sm2');

                $message->subject('Registertion Info ');
            });

            return redirect('index');
        }
    }

    public function send_emailhireu1(Request $req)
    {
        if ($this->reghire_u1($req)) {
            $data = ['email' => $req->email, 'name' => $req->name];
            Mail::send('admin.reghire_mailer', ['data' => $data], function ($message) use ($data)
            {

                $message->to($data['email'], $data['name']);

                $message->from('sm2realestate284@gmail.com', 'sm2');

                $message->subject('Job Application');

            });

            return redirect('index');
        }
    }
    //===================================================================================================

    ///////                           DYNAMIC pages             //////////////////////////

    //====================================================================================================
    public function showhomefeedback()
    {
        $std = feedbacks::where('status', 'active')->get();
        $pr=property_rent::where('status', 'active')->get();
        $pb=home_latest::where('status', 'active')->get();

        //return $std;
        return view('user_1.index', compact('std','pr','pb'));
    }

    public function showhomeu2()
    {
        $std = feedbacks::where('status', 'active')->get();
        $pr=property_rent::where('status', 'active')->get();
        $pb=home_latest::where('status', 'active')->get();

        //return $std;
        return view('user_2.index_u2', compact('std','pr','pb'));
    }

    public function showrent_u1(Request $request)
    {
        $search= $request->input('search');

        $data = property_rent::where('status', 'active')
        ->where(function ($query) use ($search) {
            $query->where('city', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%');
        })
        ->get();

            return view('user_1.rent',compact('data'));


    }

    public function showbuy_u1(Request $request)
{
    $search = $request->input('search');
    $data = propertys::where('status', 'active')
        ->where(function ($query) use ($search) {
            $query->where('city', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%');
        })
        ->get();

    return view('user_1.buy', compact('data'));
}

    public function showAbouth()
    {
        $std = about::where('status','active')->get();

        //return $std;
        return view('user_1.about', compact('std'));
    }

////////////////////////////////

    public function showbuy(Request $request)
    {
        $search= $request->input('search');
        $data = propertys::where('status', 'active')
        ->where(function ($query) use ($search) {
            $query->where('city', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%');
        })
        ->get();
    //    $data = propertys::where('status','active')->get();

        // $data= DB::table('propertys')->where('status','active')->orwhere('bed','like','%' . $search . '%')
        // ->orwhere('city','like','%' . $search . '%')
        // ->orwhere('location','like','%' . $search .'%')->get()
        // ;



        //$countries = DB::table('propertys');

           return view('user_2.buy_u2',compact('data'));


    }

    // public function searchbuy(Request $request)
    // {
    //     $search= $request->input('search');
    //     //return $search;
    //      $data = propertys::where('status','active')->orwhere('bed','like','%' . $search . '%')
    //      ->orwhere('city','like','%' . $search . '%')
    //      ->orwhere('location','like','%' . $search .'%')->get();
    //    return view('user_2.buy_u2',compact('data'));
    // }




    public function show_property_buy($id)
    {
        // $reg_data = DB::table('properti')->where('id', 1);
        $reg_data = propertys::where('status','active')->where('id',$id)->get();

        // $images=explode('|',$reg_data->picture);

        // return $reg_data;
        return view('user_2.buy_property_single', compact('reg_data'));
    }


    public function showrent(Request $request)
    {    $search= $request->input('search');

        $data = property_rent::where('status', 'active')
        ->where(function ($query) use ($search) {
            $query->where('city', 'like', '%' . $search . '%')
                ->orWhere('location', 'like', '%' . $search . '%');
        })
        ->get();
            return view('user_2.rent_u2',compact('data'));


    }

    public function show_property_rent($id)
    {
        // $reg_data = DB::table('properti')->where('id', 1);
        $reg_data = property_rent::where('status','active')->where('id',$id)->get();
        // $images = property_rent::where('status','active')->where('id',$id)->get();

        // $images=explode('|',$reg_data->picture);

        // return $reg_data;
        return view('user_2.rent_property_single', compact('reg_data'));
    }




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////BUYER RENTER////////////////////////////////////////////////////////////////////////////


public function buyer(Request $request,$id){

    $em = session()->get('email1', $request->email);
    $user = registration::where('email',$em)->first();
    $pr=propertys::where('id',$id)->first();

   // return $user->name;

    $reg=new buyer();

    $reg->property_id = $pr->id;
    $reg->name = $user->name;
    $reg->email = $user->email;
    $reg->mobile = $user->mobile;

 $reg->save();
        return redirect('index_u2');
}


public function showbuyer(Request $request){


    $idata = buyer::all();



        return view('admin.manage_buyer', compact('idata'));

}

public function buyer_approved(Request $request, $property_id)
{
    $data = buyer::where('property_id', $property_id)->update(['status' => 'sold']);
    $datai = buyer::where('property_id', $property_id)->first();
    $pr=propertys::where('id', $property_id)->update(['status'=>'inactive']);
    $pri=home_latest::where('id', $property_id)->update(['status'=>'inactive']);

   // $em = session()->get('email1', $request->email);
  //  return $data;
   // echo $data;
    if (($data) and ($pr) and ($pri)) {
        $data = ['email' => $datai->email,'name'=>$datai->name];
     //   return $datai;
        Mail::send('admin.admin_to_buyer', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'], $data['name']);
            $message->from('sm2realestate284@gmail.com', 'sm2');


            $message->subject('CONGRTS');
        });
        return redirect('manage_buyer');
    }
}

    public function send_emailbuyer_to_admin(Request $req,$id)
    {
        if ($this->buyer($req,$id)) {
             $em = session()->get('email1', $req->email);
    $user = registration::where('email',$em)->first();
            $data = ['email' => $user->email, 'name' => $user->name ,'id'=>$id];

            //return $data;
            Mail::send('admin.buyer_to_admin', ['data' => $data], function ($message) use ($data)
            {
                $message->to('sm2realestate284@gmail.com', 'sm2');

                $message->from($data['email'], $data['name']);


                $message->subject('Property Buy Request');

            });

            return redirect('index_u2');
        }
    }


    ///////////                          ////// TENENT    ////// / / /  / // / // / / / / / / / / //

    public function tenant(Request $request,$id){

        $em = session()->get('email1', $request->email);
        $user = registration::where('email',$em)->first();
        $pr=property_rent::where('id',$id)->first();

       // return $user->name;

        $reg=new tenant();

        $reg->property_id = $pr->id;
        $reg->owner_of_property = $pr->email;
        $reg->name = $user->name;
        $reg->email = $user->email;
        $reg->mobile = $user->mobile;

     $reg->save();
            return redirect('index_u2');
    }


    public function hshowtenant(Request $request){

        $em = session()->get('email3', $request->email);
        $idata = tenant::where('owner_of_property',$em)->get();



            return view('user_4.hmanage_tenant', compact('idata'));

    }
    public function ashowtenant(Request $request){


        $idata = tenant::all();



            return view('admin.manage_tenant', compact('idata'));

    }
    public function send_emailbuyer_to_houseier(Request $req,$id,$email)
    {
        if ($this->tenant($req,$id)) {
             $em = session()->get('email1', $req->email);
    $user = registration::where('email',$em)->first();
            $data = ['email' => $user->email, 'name' => $user->name ,'id'=>$id];

            $pr=property_rent::where('id',$id)->where('email',$email)->first();
           $hdata=['email' => $pr->email ,'id'=>$id];

            //return $data;
            Mail::send('admin.tenant_to_houseier', ['data' => $data], function ($message) use ($data,$hdata)
            {
                $message->to($hdata['email'], "Houseier");

                $message->from($data['email'], $data['name']);


                $message->subject('Property Rent Request');

            });

            return redirect('index_u2');
        }
    }


public function houseier_approved(Request $request, $property_id)
{
    $data = tenant::where('property_id', $property_id)->update(['status' => 'sold']);
    $datai = tenant::where('property_id', $property_id)->first();
    $pr=property_rent::where('id', $property_id)->update(['status'=>'inactive']);
   // $pri=home_latest::where('id', $property_id)->update(['status'=>'inactive']);

   // $em = session()->get('email1', $request->email);
  //  return $data;
   // echo $data;
    if (($data) and ($pr) ) {
        $data = ['email' => $datai->email,'name'=>$datai->name];
     //   return $datai;
        Mail::send('admin.admin_to_buyer', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'], $data['name']);
            $message->from('sm2realestate284@gmail.com', 'sm2');


            $message->subject('CONGRTS');
        });
        return redirect('hmanage_tenant');
    }
}
}


