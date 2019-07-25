<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        foreach($user as $vaule)
        {
            echo $vaule;
        }
    }
    public function Login()
    {
        return view('login');
    }
    public function Register()
    {
        return view('register');
    }
    public function CheckLogin(Request $request)
    {
        $this -> validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $pw = $request->input('password');
        //$user = DB::table('users')->where(['email'=>$email])->get();
        $user = User::where('email', '=', $email)->first();
        $check = Hash::check($pw, $user->password);
        // $hashed = Hash::make($pw);
        // $checkLogin = DB::table('users')->where(['email'=>$email,'password'=>$hashed])->get(); count($checkLogin)>0
        if($check == true)
        {
            echo "Login Successful";
        }
        else
        {
            return back()->with('error', 'Wrong email or password');
        }

    }
    public function Create(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $check = $request->input('check');
        if($check)
        {
            $user = new User();
            $pw = $request->input('password');
            $hashed = Hash::make($pw);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $hashed;
            $user->save();
            return redirect('login');
        }
        else {
            return back()->with('error', 'Agree the terms');
        }
    }
}
