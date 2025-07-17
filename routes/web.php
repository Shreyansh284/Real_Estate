<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formcontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\demo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
return view('welcome');
});



// ============================================================================
// =============================== Admin ======================================
// ============================================================================

Route::middleware(['CheckLoginAuth'])->group(function () {

   //f Route::get('display',[demo::class,'display']);

    Route::view('master','admin.master');


    // Route::get('master',[formcontroller::class,'masterprofile']);
    //Route::view('a_index','admin.a_index');
    Route::get('a_index',[admincontroller::class,'admin_dashboard']);

    //////////////////////////////////////////////////

    //Route::view('manage_reg','admin.manage_reg');
    Route::get('manage_reg',[formcontroller::class,'showTable']);
    Route::view('register','admin.reg');
    Route::get('editreg/{email}',[formcontroller::class,'editreg']);
    Route::post('update_register_data',[formcontroller::class,'updateData']);


    Route::get('delete_user/{email}', [formcontroller::class, 'delete_user_registration']);
    Route::get('deactivate/{email}', [formcontroller::class, 'deactivate_user_registration']);
    Route::get('activate/{email}', [formcontroller::class, 'activate_user_registration']);
    Route::get('reactivate/{email}', [formcontroller::class, 'reactivate_user_registration']);




    //Route::view('manage_feedback','admin.manage_feedback');
    Route::view('reg_feedback','admin.reg_feedback');
    Route::get('manage_feedback',[formcontroller::class,'showFeedback']);
    Route::get('delete_feedback/{email}', [formcontroller::class, 'delete_feedback']);
    Route::get('deactivate_feedback/{email}', [formcontroller::class, 'deactivate_feedback']);
    Route::get('activate_feedback/{email}', [formcontroller::class, 'activate_feedback']);
    Route::get('reactivate_feedback/{email}', [formcontroller::class, 'reactivate_feedback']);
    Route::get('editfeedback/{email}',[formcontroller::class,'editfeedback']);
    Route::post('update_feedback',[formcontroller::class,'updatefeedback']);

    //Route::view('manage_hire','admin.manage_hire');
    Route::view('reg_hire','admin.reg_hire');
    Route::get('manage_hire',[formcontroller::class,'showHire']);
    Route::get('approve/{email}', [formcontroller::class, 'approve']);
    Route::get('not_approved/{email}', [formcontroller::class, 'not_approved']);
    Route::get('edithire/{email}',[formcontroller::class,'edithire']);
    Route::post('update_hire',[formcontroller::class,'updatehire']);

    //Route::view('manage_houseier','admin.manage_houseier');
    Route::view('reg_houseier','admin.reg_houseier');
    Route::get('manage_houseier',[formcontroller::class,'showHouseier']);
    Route::get('delete_houseier/{email}', [formcontroller::class, 'delete_houseier']);
    Route::get('deactivate_houseier/{email}', [formcontroller::class, 'deactivate_houseier']);
    Route::get('activate_houseier/{email}', [formcontroller::class, 'activate_houseier']);
    Route::get('reactivate_houseier/{email}', [formcontroller::class, 'reactivate_houseier']);
    Route::get('uactivate_houseier/{email}', [formcontroller::class, 'uactivate_houseier']);
    Route::get('manage_house_from_houseier',[formcontroller::class,'show_rent_house_table']);
    Route::get('delete_hproperty_rent/{id}', [formcontroller::class, 'delete_hproperty_rent']);
    Route::get('deactivate_hproperty_rent/{id}', [formcontroller::class, 'deactivate_hproperty_rent']);
    Route::get('activate_hproperty_rent/{id}', [formcontroller::class, 'activate_hproperty_rent']);
    Route::get('reactivate_hproperty_rent/{id}', [formcontroller::class, 'reactivate_hproperty_rent']);

    Route::get('buyer_approved/{property_id}', [formcontroller::class, 'buyer_approved']);
    // Route::view('manage_buyer','admin.manage_buyer');

  Route::get('manage_buyer',[formcontroller::class,'showbuyer']);
  Route::get('manage_tenant',[formcontroller::class,'ashowtenant']);
    Route::view('reg_buyer','admin.reg_buyer');

    //Route::view('manage_tenant','admin.manage_tenant');
    //Route::view('reg_tenant','admin.reg_tenant');

    //Route::view('manage_house_from_houseier','admin.manage_house_from_houseier');
    //Route::view('editadmin','admin.editadmin');

    Route::get('editadmin',[formcontroller::class,'show_profile_info_admin']);




    // validation For Admin

    Route::post('registerv', [formcontroller::class, 'registerv']);
    Route::post('regfeedback', [formcontroller::class, 'regfeedback']);
    Route::post('reghouseier', [formcontroller::class, 'reghouseier']);
    Route::post('regtenant', [formcontroller::class, 'regtenant']);
    Route::post('regbuy', [formcontroller::class, 'regbuy']);
    Route::post('reghire', [formcontroller::class, 'reghire']);


    Route::post('edit_admin', [formcontroller::class, 'edit_admin']);


    // =============================== Dynamic Table Admin ===========================

    Route::view('manage_home_slider','admin.manage_home_slider');
    //Route::view('manage_home_latest_property','admin.manage_home_latest_property');
    Route::get('manage_home_latest_property',[formcontroller::class,'show_latest']);
    Route::get('deactivate_latest_buy/{id}', [formcontroller::class, 'deactivate_latest_buy']);
    Route::get('activate_latest_buy/{id}', [formcontroller::class, 'activate_latest_buy']);

    Route::view('manage_home_feedback','admin.manage_home_feedback');
    Route::view('manage_buy_house','admin.manage_buy_house');
    Route::view('manage_rent_house','admin.manage_rent_house');



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    //Route::view('manage_property_detail_buy','admin.manage_property_detail_buy');
    Route::view('reg_buy_single','admin.reg_buy_single');
    Route::post('buy_single', [formcontroller::class, 'reg_buy_single']);
    Route::get('manage_property_detail_buy',[formcontroller::class,'show_reg_buy_table']);
    //Route::view('manage_property_detail_houseier','admin.manage_property_detail_houseier');
    Route::get('delete_property_buy/{id}', [formcontroller::class, 'delete_property_buy']);
    Route::get('deactivate_property_buy/{id}', [formcontroller::class, 'deactivate_property_buy']);
    Route::get('activate_property_buy/{id}', [formcontroller::class, 'activate_property_buy']);
    Route::get('reactivate_property_buy/{id}', [formcontroller::class, 'reactivate_property_buy']);










    Route::get('logout',[formcontroller::class,"logoutadmin"]);;



    Route::get('activateuser/{email}', [formcontroller::class, 'activate_user']);


    Route::view('manage_about','admin.manage_about');
    Route::get('manage_about',[formcontroller::class,'showAbout']);


    Route::view('reg_about','admin.reg_about');
    Route::post('regabout', [formcontroller::class, 'regabout']);

    Route::get('delete_user_about/{email}', [formcontroller::class, 'delete_about']);
    Route::get('deactivate_about/{email}', [formcontroller::class, 'deactivate_about']);
    Route::get('activate_about/{email}', [formcontroller::class, 'activate_about']);
    Route::get('reactivate_about/{email}', [formcontroller::class, 'reactivate_about']);

});

// =============================== Fetch Table Admin ===========================





// ============================================================================
// =============================== USER_4(HOUSEIER) ===========================
// ============================================================================
Route::middleware(['hlogin'])->group(function () {
Route::view('hmaster','user_4.hmaster');
//Route::view('hmanage_tenant','user_4.hmanage_tenant');
Route::view('hreg_tenant','user_4.hreg_tenant');
//Route::view('hmanage_house_from_houseier','user_4.hmanage_house_from_houseier');
//Route::view('h_index','user_4.h_index');
//Route::view('edithouseier','user_4.edithouseier');

Route::get('h_index',[admincontroller::class,'houseier_dashboard']);


Route::get('hchange_password',[formcontroller::class,'hchange_password_info']);
Route::post('change_password_u4', [formcontroller::class, 'change_password_u4']);

Route::get('hlogout',[formcontroller::class,"hlogout"]);

Route::get('houseier_approved/{property_id}', [formcontroller::class, 'houseier_approved']);


Route::get('hmanage_tenant',[formcontroller::class,"hshowtenant"]);


Route::get('edithouseier',[formcontroller::class,'show_profile_info_houseier']);

Route::post('edit_houseier', [formcontroller::class, 'edit_houseier']);

//Route::view('reg_rent_property','user_4.reg_rent_property');
Route::get('reg_rent_property', [formcontroller::class, 'show_reg_rent']);
Route::post('reg_rent_u4', [formcontroller::class, 'reg_rent_u4']);
Route::get('hmanage_house_from_houseier',[formcontroller::class,'show_reg_rent_table']);

Route::get('delete_property_rent/{id}', [formcontroller::class, 'delete_property_rent']);
Route::get('deactivate_property_rent/{id}', [formcontroller::class, 'deactivate_property_rent']);
Route::get('activate_property_rent/{id}', [formcontroller::class, 'activate_property_rent']);
Route::get('reactivate_property_rent/{id}', [formcontroller::class, 'reactivate_property_rent']);
});

// ============================================================================
// ================================= User-1 ===================================
// ============================================================================


///////////////////////////////////////////////////////////

Route::get('index',[formcontroller::class,'showhomefeedback']);
// Form View Route
Route::get('about',[formcontroller::class,'showAbouth']);
Route::view('login', 'user_1.login');
Route::view('registration', 'user_1.reg');
Route::view('forget_password', 'user_1.forget_password');
Route::view('forget_password_email', 'user_1.forget_password_email');

// Route::view('forget_password_form', 'forget_password_form');
// Route::post('forget_password_form_submit', [forgetcontroller::class, 'forget_password_form_submit']);
// Route::get('verify_forget_pwd_otp/{email}/{token}', [forgetcontroller::class, 'verify_forget_pwd_otp']);
// Route::post('verify_otp_forget_password_action', [forgetcontroller::class, 'verify_otp_forget_password_action']);
// Route::post('reset_pwd_action', [forgetcontroller::class, 'reset_pwd_action']);


// Page View Route

//Route::view('index','user_1.index');

//Route::view('about','user_1.about');
//Route::view('buy','user_1.buy');
//Route::view('rent','user_1.rent');
Route::view('contact','user_1.contact');


Route::get('buy',[formcontroller::class,'showbuy_u1']);
Route::get('rent',[formcontroller::class,'showrent_u1']);



// Master View Route

Route::view('nav_master','user_1.nav_master_view');



// validation For User-1

Route::post('registerv_u1', [formcontroller::class, 'registerv_u1']);
Route::post('regfeedback_u1', [formcontroller::class, 'regfeedback_u1']);
Route::post('reghouseier_u1', [formcontroller::class, 'reghouseier_u1']);
Route::post('regtenant_u1', [formcontroller::class, 'regtenant_u1']);
Route::post('regbuy_u1', [formcontroller::class, 'regbuy_u1']);
Route::post('reghire_u1', [formcontroller::class, 'reghire_u1']);
Route::post('login_validate', [formcontroller::class, 'login_validate']);






// ============================================================================
// ================================= User-2 ===================================
// ============================================================================


// Form View Route


Route::middleware(['login'])->group(function () {

   // Route::view('feedbacku2','user_2.reg_feedback');
    Route::get('feedbacku2',[formcontroller::class,'showregfeedback']);


    Route::get('send_emailbuyer_to_houseier/{id}/{email}', [FormController::class, 'send_emailbuyer_to_houseier']);
    // Page View Route
    Route::get('send_emailbuyer_to_admin/{id}', [FormController::class, 'send_emailbuyer_to_admin']);
    Route::get('buyer/{id}', [formcontroller::class, 'buyer']);
    Route::get('searchbuy', [formcontroller::class, 'searchbuy']);
    //Route::view('index_u2','user_2.index_u2');
    Route::get('index_u2',[formcontroller::class,'showhomeu2']);
    //Route::view('buy_u2','user_2.buy_u2');
    // Route::view('rent_u2','user_2.rent_u2');
    Route::view('profile_u2','user_2.profile_u2');
    //Route::view('buy_property_single','user_2.buy_property_single');
    Route::get('rent_property_single/{id}',[formcontroller::class,'show_property_rent']);
    Route::get('buy_property_single/{id}',[formcontroller::class,'show_property_buy']);
    //Route::view('rent_property_single','user_2.rent_property_single');
    // Route::view('edit_profile_u2','user_2.edit_profile_u2');
    Route::view('houseier_u2','user_2.houseier_u2');
    Route::view('designer_u2','user_2.designer_u2');
    //Route::view('change_password','user_2.change_password');
    Route::get('logout_u2',[formcontroller::class,"logout"]);;
    Route::view('buyu2','user_2.reg_buyer');
    Route::view('rentu2','user_2.reg_tenant');
    Route::view('hireu2','user_2.reg_hire');
    //Route::view('houseieru2','user_2.reg_houseier');
    Route::get('houseieru2',[formcontroller::class,'showreghouseier']);

    // dropdown route
    // Route::get('rent_u2', [formcontroller::class, 'city'])->name('dropdownView');
    Route::get('rent_u2',[formcontroller::class,'showrent']);
    Route::get('buy_u2',[formcontroller::class,'showbuy']);
    Route::get('edit_profile_u2',[formcontroller::class,'show_profile_info']);


    Route::get('get-states', [formcontroller::class, 'getStates'])->name('getStates');
    Route::get('get-cities', [formcontroller::class, 'getCities'])->name('getCities');

    Route::get('change_password',[formcontroller::class,'change_password_info'])->name('password.update');

    // Master View Route

   Route::view('nav_master_view_u2','user_2.nav_master_view_u2');



    // validation For User-2

    Route::post('registerv_u2', [formcontroller::class, 'registerv_u2']);
    Route::post('regfeedback_u2', [formcontroller::class, 'regfeedback_u2']);
    Route::post('reghouseier_u2', [formcontroller::class, 'reghouseier_u2']);
    Route::post('regtenant_u2', [formcontroller::class, 'regtenant_u2']);
    Route::post('regbuy_u2', [formcontroller::class, 'regbuy_u2']);
    Route::post('reghire_u2', [formcontroller::class, 'reghire_u2']);
    Route::post('edit_u2', [formcontroller::class, 'edit_u2']);
    Route::post('change_password_u2', [formcontroller::class, 'change_password_u2']);
});


///////////////////////////////////////                    ///MAILER                      //////////////////////////////////




Route::post('send_emailreg', [FormController::class, 'send_emailreg']);
Route::post('send_emailhouseier', [FormController::class, 'send_emailhouseier']);
Route::post('send_emailhire', [FormController::class, 'send_emailhire']);
//Route::get('send_hireapprove/{email}', [FormController::class, 'send_hireapprove']);
Route::post('send_emailregu1', [FormController::class, 'send_emailregu1']);
Route::post('send_emailhireu1', [FormController::class, 'send_emailhireu1']);
