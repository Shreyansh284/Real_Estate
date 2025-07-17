<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delete_token;
use App\Models\registration;
use Illuminate\Support\Facades\Mail;
use Exception;
use Carbon\Carbon;

class forgetcontroller extends Controller
{

    public function forget_password_form_submit(Request $req)
    {
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        delete_token::where('expiry_time', '<', $current_time)->delete();
        $rules = ['email' => 'required|email'];
        $errors = [
            'email.required' => 'Email addrss is a required field',
            'email.email' => 'Enter a valid email address'
        ];
        $req->validate($rules, $errors);
        $email = $req->email;
        $data = registration::where('email', $email)->first();
        if ($data) {
            $data1 = delete_token::where('email', $email)->first();
            if ($data1) {
                session()->flash('warning', 'A Password reset link is already sent to your mail please check. New link will be generated after old link expires');
            } else {
                date_default_timezone_set("Asia/Kolkata");
                $s_time = date("Y-m-d G:i:s");

                $token = hash('sha512', $s_time);
                $otp = mt_rand(100000, 999999);
                $data2 = array('name' => $data->fn, 'email' => $email, 'token' => $token, 'otp' => $otp);
                try {
                    Mail::send(['text' => 'mail_forget_pwd'], ["data3" => $data2], function ($message) use ($data2) {
                        $message->to($data2['email'], $data2['name'])->subject('Account Activation Link');
                        $message->from('sm2realestate284@gmail.com', 'sm2');
                    });
                } catch (Exception $ex) {
                    session()->flash('error', 'We encountered some error in sending the password reset token');
                    return redirect('forget_password_email');
                }
                $expiry_time = Carbon::now()->addMinutes(30);
                $token_ins = new delete_token();
                $token_ins->email = $email;
                $token_ins->otp = $otp;
                $token_ins->token = $token;
                $token_ins->expiry_time = $expiry_time;
                if ($token_ins->save()) {
                    session()->flash('success', 'Password reset tokens sent to your registered email address');
                }
            }
        } else {
            session()->flash('error', 'Sorry the email address you entered is not registered.');
        }
        return redirect('forget_password_email');
    }

    public function verify_forget_pwd_otp($email, $token)
    {
        date_default_timezone_set("Asia/Kolkata");
        session()->put('forget_pwd_email', $email);
        session()->put('forget_pwd_token', $token);
        $current_time = Carbon::now();
        delete_token::where('expiry_time', '<', $current_time)->delete();
        $data1 = delete_token::where('email', $email)->first();
        if ($data1) {
            return view('verify_otp_forget_pwd');
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function verify_otp_forget_password_action(Request $req)
    {

        $req->validate(['otp' => 'required|size:6'], ['otp.required' => 'OTP cannot be empty', 'otp.size' => 'OTP must have 6 digits only']);
        $otp = $req->otp;
        if (session('forget_pwd_token') && session('forget_pwd_email')) {
            $email = session()->get('forget_pwd_email');
            $token = session()->get('forget_pwd_token');
        }
        $data = delete_token::where('email', $email)->where('token', $token)->first();
        if ($data) {
            if ($data->otp == $otp) {
                return view('reset_pwd');
            } else {
                session()->flash('error', 'Incorrect OTP');
                return view('verify_otp_forget_pwd');
            }
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function reset_pwd_action(Request $req)
    {
        $rules = [
            'npwd' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/|confirmed',
            'npwd_confirmation' => 'required',
        ];
        $errors = [
            'npwd.required' => 'Password field cannot be empty',
            'npwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'npwd.confirmed' => 'Password and Confirm Password must match',
            'npwd_confirmation.required' => 'Confirm Password must not be empty'
        ];
        $req->validate($rules, $errors);
        if (session('forget_pwd_token') && session('forget_pwd_email')) {
            $email = session()->get('forget_pwd_email');
            $token = session()->get('forget_pwd_token');
        }
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        delete_token::where('expiry_time', '<', $current_time)->delete();
        $data = delete_token::where('email', $email)->where('token', $token)->first();
        if ($data) {
            $data1 = registration::where('email', $email)->update(array('password' => $req->npwd));
            if ($data1) {
                delete_token::where('email', $email)->delete();
                session()->flash('succ', 'Password changed successfully');
                return redirect('login');
            }
        } else {
            session()->flash('error', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }
}
