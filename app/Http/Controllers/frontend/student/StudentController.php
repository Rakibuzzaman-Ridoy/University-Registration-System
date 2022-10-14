<?php

namespace App\Http\Controllers\frontend\student;
use DB;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StudentController extends Controller
{
    public function studentRegisterFormOpen()
    {
        return view('studentAuth/register');
    }

    public function studentRegisterFormSubmit(Request $request)
    {
        // printResult($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($student));

        Auth::login($student);
        $notification = array("message"=>"Registered Successfully!","alert-type"=>"success");
        return view('studentAuth/login')->with($notification);
    }

                            //Login
    public function studentLoginFormOpen()
    {
        return view('studentAuth/login');
    }

    public function studentLoginFormSubmit(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $student = $request->all();
        if(Auth::guard('student')->attempt(['email'=>$student['email'],"password"=>$student['password']]))
        {
            return redirect('/dashboardOpen')->with('success','Login Succssful');;
        }
        else{
            return redirect()->back()->with('error','Email or Password does not match!');
        }
    }

                                        //Logout
    public function studentLogout(Request $request)
    {
        Auth::guard('student')->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/student/studentLoginFormOpen');
    }

                                    //Password Change
    public function passwordChangeFormOpen()
    {
        return view('studentAuth/passwordChange');
    }

    public function passwordChangeFormSubmit(Request $request)
    {
        $request->validate([
            "current_password"=>"required",
            "password"=>"required|min:8|max:16|confirmed",
            "password_confirmation"=>"required",
        ]);

        $user = Auth::guard('student')->user();
       
        if(Hash::check($request->current_password,$user->password))
        {
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::guard('student')->logout();
            $notification = array("message"=>"Password Changed Successfully!","alert-type"=>"success");
            return redirect('/student/studentLoginFormOpen')->with($notification);
            //return redirect()->back()->with('success','Password Change Successful!');
        }
        else
        {
            return redirect()->back()->with('error','Failed to change password!');
        }
    }
}
