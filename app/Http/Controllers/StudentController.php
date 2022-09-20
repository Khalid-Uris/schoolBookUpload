<?php

namespace App\Http\Controllers;

use App\Models\LogSession;
use App\Models\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.addStudent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'contact_number'=>'required|numeric',
            'cnic'=>'required|numeric|unique:students',
            'email'=>'required|email|unique:students',
            'password'=>'required|min:7',
            'retype_password' => 'required|same:password',
        ]);
        try {
            $obj = new Student();
            $obj->first_name=$request->first_name;
            $obj->last_name=$request->last_name;
            $obj->contact_number=$request->contact_number;
            $obj->cnic=$request->cnic;
            $obj->email=$request->email;
            $obj->password=bcrypt($request->password);

            if ($request->session()->exists('id')) {
                // $obj->status = $request->status;
                $obj->status = 'active';
            }else
            {
                $obj->status = 'inactive';
            }
            $obj->save();

            // return $obj;
            //return redirect()->route('student.show');
            if ($request->session()->exists('id')) {
                return redirect()->route('student.show')->with('message', 'Student has been Register Successfully.');
            } else {
                return redirect()->route('student.loginView')->with('message', 'Your Registration form submit to admin. You signin if admin accept your request');
            }



        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $show=Student::all();
        return view('student.showStudent')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Student::find($id);
        return view('student.editStuden')->with('edit',$edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'contact_number'=>'required|numeric',
            'cnic'=>'required|numeric',
            'email'=>'required|email'
            //'unique_code'=>'required|email'
        ]);

        try {
            $obj=Student::find($id);
            $obj->first_name=$request->first_name;
            $obj->last_name=$request->last_name;
            $obj->contact_number=$request->contact_number;
            $obj->status = $request->status;
            $obj->cnic=$request->cnic;
            $obj->email=$request->email;
            // $obj->unique_code=$request->unique_code;
            $obj->save();

            return redirect()->route('student.show');

        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy=Student::find($id)->delete();
        return redirect()->route('student.show');
    }

    // Login Student
    public function loginView()
    {
        return view('student.loginStudent');
    }
    public function loginStudent(Request $request)
    {

        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        try {
            $is_email_exists=Student::where('email',$request->email)->first();
            //$is_password_exists=Student::find($request->password)->first()
            if($is_email_exists)
            {
                if (Hash::check($request->password, $is_email_exists->password)) {
                    if ($is_email_exists->status == 'active') {
                    session([
                                'admin_id'=>$is_email_exists->id,
                            ]);

                        $log_session = new LogSession();
                        $log_session->firstname = $is_email_exists->first_name;
                        $log_session->email = $is_email_exists->email;
                        $log_session->user_id= $is_email_exists->id;
                        $log_session->type = 'Login';
                        $log_session->created_at = Carbon::now('PKT');
                        $log_session->save();

                        return redirect()->route('book.show');
                    } else {
                        return back()->withError('You Are Block Please Contact To Admin.');
                    }
                }
                else{
                    return back()->withError('Password does not match');
                }
            }else{
                return back()->withError('Email does not match');
            }

        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }


    }
    public function logoutStudent(Request $request)
    {
        //return session('admin_id');
        $is_email_exists = Student::where('id',session('admin_id'))->first();
        $log_session = new LogSession();
        $log_session->firstname = $is_email_exists->first_name;
        $log_session->email = $is_email_exists->email;
        $log_session->user_id = $is_email_exists->id;
        $log_session->type = 'Logout';
        $log_session->created_at = Carbon::now('PKT');
        $log_session->save();


        $request->session()->flush();
        return redirect()->route('student.loginView');
    }



    public function test()
    {
        return bcrypt('admin123');
    }
}
