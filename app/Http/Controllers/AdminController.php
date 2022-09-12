<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\City;
use App\Models\Province;
use App\Models\Ward;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminDashboard()
    {
        $admin = Auth::guard('admin')->user();
        return view('Admin.admin-dashboard', ['admin' => $admin]);
    }

    public function showLoginForm() 
    {
        return view("Admin.admin-login");
    }

    public function showRegisterForm() 
    {
        return view("Admin.admin-signup");
    }

    public function adminRegister(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:200',
            'lastname' => 'required|max:200',
            'mail_address' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors(($validator))->withInput();
        }

        Admin::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'mail_address' => $request->mail_address,
            'password' => $request->password,
        ]);

        return redirect('/admin/login');
    }
    
    public function adminLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'mail_address' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = ['mail_address' => $request->mail_address, 'password' => $request->password];
        if (Auth::guard("admin")->attempt($credentials)) {
            return redirect("/");
        }
        return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
    }

    public function logout(Request $request) {
        Auth::logout();
    
        session()->flush();
    
        return redirect('/admin/login');
    }

    public function showAdminProfile() {
        $admin = Auth::guard('admin')->user();
        $city = City::all();
        $province = Province::all();
        $ward = Ward::all();
        return view('Admin.admin-profile', [
            'admin' => $admin, 
            'citys' => $city, 
            'provinces' => $province, 
            'wards' => $ward 
        ]);
    }

    public function updateAdminProfile(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'string|max:255',
            'lastname' => 'string|max:255',
            'tel' => 'min:10|max:12',
            'address' => 'string|max:255',
            'mail_address' => 'string|max:255',
            'password' => 'string|max:255|nullable',
            'password_confirm' => 'string|nullable|max:255',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request) {
            $city_id = explode('.', $request->city)[0];
            $city = explode('.', $request->city)[1];
            $province_id = explode('.', $request->province)[0];
            $province = explode('.', $request->province)[1];
            $ward_id = explode('.', $request->ward)[0];
            $ward = explode('.', $request->ward)[1];

            $admin = Admin::where('id', $request->id)->first();
            $admin->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'mail_address' => $request->mail_address,
                'city_id' => $city_id,
                'city_name' => $city,
                'province_id' => $province_id,
                'province_name' => $province,
                'ward_id' => $ward_id,
                'ward_name' => $ward,
                'address' => $request->address,
                'tel' => $request->tel,
                'password' => $request->password
            ]);

            if($request->hasFile('avatar')){
                $filename = $request->avatar->getClientOriginalName();
                $request->avatar->storeAs('avatar',$filename,'public');
                Auth::guard("admin")->user()->update(['avatar'=>$filename]);
            }
            return redirect()->back();
        });
        return redirect('/admin/profile')->with('success', 'Cập nhật thông tin thành công');
    }

    public function adminGetProvinceInfo(Request $request) {
        $data = $request->all();
        $user = Auth::guard('admin')->user();

        $province = DB::table("province")->select('*')->where("province.city_id", '=', $data["cityCode"])->get();
        $returnView = view("Admin.admin-get-province")->with(['options' => $province, 'admin' => $user])->render();
        return response()->json(["html" => $returnView], 200);
    }

    public function adminGetWardInfo(Request $request) {
        $data = $request->all();
        $user = Auth::guard('admin')->user();

        $ward = DB::table("ward")->select('*')->where("ward.province_id", '=', $data["provinceCode"])->get();
        $returnView = view("Admin.admin-get-ward")->with(['options' => $ward, 'admin' => $user])->render();
        return response()->json(["html" => $returnView], 200);
    }
    
}