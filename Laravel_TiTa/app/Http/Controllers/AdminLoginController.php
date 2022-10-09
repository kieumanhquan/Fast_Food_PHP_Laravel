<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use Auth;
class AdminLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getlogin()
    {
        if (!Auth::check()){
            return view('TiTa.Trangchu.login');
        }else{
            return redirect('login');
        }
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required:email',
            'password' => 'required'
        ];
        $message = [
            'email.required' => 'ID là trường hợp bắt buộc',
            'password.required' => 'Mật khẩu là trường hợp bắt buộc'
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            if (Auth::attempt(['email'=>$email,'password'=>$password,'chucvu' => 2])) {
                return redirect()->route('trangchu');
            } else {
                return redirect()->back();
            }
        }
    }
    public function getSignOut() {
        Auth::logout();
        return Redirect::route('adminlogin');

    }
}
