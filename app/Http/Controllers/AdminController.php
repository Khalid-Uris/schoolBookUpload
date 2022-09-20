<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminView()
    {
        return view('admin.loginAdmin');
    }

    public function adminLogin(Request $request )
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        try {
            $is_email_exists=Admin::where('email',$request->email)->first();
            //$is_password_exists=Student::find($request->password)->first();
            if($is_email_exists)
            {
                if (Hash::check($request->password, $is_email_exists->password)) {
                    session([
                                'id'=>$is_email_exists->id,
                            ]);
                        return redirect()->route('dashboard.index');
                }
                else{
                    return back()->withError('Password does not match');
                }
            }else{
                return back()->withError('Email does not match');
            }
            // if ($request->email=='admin@admin.com' and $request->password=='admin') {
            //     session([
            //         'admin_id'=>$request->email,
            //     ]);
            //     return redirect()->route('student.show');
            // } else {
            //     return back()->withError('Invalid Detail');
            // }
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }


    }

    public function adminLogout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('admin.adminView');
    }


}
