<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminDashboard()
    {
        $user = Auth::guard('admin')->user();
        if($user) {
            $admin = DB::table("admins")->where('id', $user->id)->first();
            return view('Admin.admin-dashboard', ['admin' => $admin]);
        }
        return redirect('admin/login')->with('status', 'Bạn phải đăng nhập trước');
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
            'name' => 'required|max:200',
            'mail_address' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors(($validator))->withInput();
        }

        Admin::create([
            'name' => $request->name,
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
        return view('Admin.admin-profile');
    }
}
