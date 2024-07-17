<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //Đăng ký 
    public function register(){
        return view('auth.register');
    }
    public function register_post(Request $request){
        $request->validate(
            [
                'name' => 'required|string|max:250',
                'email' => 'required|string|max:250|unique:users,email',
                'password' => 'required|min:5',
            ]
        );
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('register')->with('success','Operation completed successfully.');

    }
// Đange Nhập 
  public function login(){
        return view('auth.login');
    }
    public function login_post(Request $request){
        $crenden = $request->validate(
            [
                'email' =>'required|email',
                'password' =>'required',
            ]
        );
        if(Auth::attempt($crenden)){
            $request->session()->regenerate();
            $user = Auth::user();
    
            // Store the authenticated user in the session
            Session::put('user', $user);
            if(Auth::attempt($crenden)){
                $user=Auth::user();
                if($user->role==1){
                 return redirect()->route("dashboard")->with('success','Thành công ');;
                }
                else{
                 return redirect()->route("home")->with('success','Bạn đã đăng nhập thành công');   
             }
         }
           
            // return redirect()->route('home')->withSuccess('Bạn đã đăng nhập thành công ');
        }
        return back()->withErrors([
            'email' => 'email của bạn đã sai ',
        ])->onlyInput('email');
    }
    // Đăng xuất
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->with('success','Bạn đã đăng xuất khỏi tài khoản ');

    }
 ////----------------------------------------------------------------Reset Qua Mail ------------------------------------------------------------

    public function showForgotPasswordForm()
    {
        return view('auth.forgot_password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('success', __($status))
                    : back()->with('error', __($status));
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', __($status))
                    : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }


    ////----------------------------------------------------------------OTP ------------------------------------------------------------
    public function showSendOtpForm()
    {
        return view('auth.send_otp_form');
    }
    public function sendOtp(Request $request)
    {
        // Validate email
        $request->validate([
            'email' => 'required|email'
        ]);
        // Generate OTP
        $otp = mt_rand(100000, 999999);
        // // Save OTP to session
        // $request->session()->put('otp', $otp);
        $request->session()->put('otp', $otp);
        $request->session()->put('email', $request->email);

        // Send email with OTP
        Mail::to($request->email)->send(new OtpEmail($otp));
        return redirect()->route('send.otp.form')->with('message', 'OTP sent successfully to ' . $request->email);
    }
    public function showVerifyOtpForm()
    {
        return view('auth.verifyotp');
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);
        
        $otp = $request->otp;
        $email = $request->session()->get('email'); // Lấy email từ session
        $user = User::where('email', $email)->first();
    
        if (!$user) {
            return back()->withErrors(['otp' => 'User not found.']);
        }
    
        // Kiểm tra OTP từ session
        $savedOtp = $request->session()->get('otp');
        if ($savedOtp == $otp) {
            // Xác nhận OTP thành công
            $user->otp = null; // Xóa OTP trong cơ sở dữ liệu sau khi xác nhận thành công
            $user->save();
    
            // Đăng nhập người dùng
            Auth::loginUsingId($user->id);
    
            // Lưu thông tin người dùng vào session
            $request->session()->put('user', $user);
    
            return redirect()->route('home')->with('success', 'OTP verified successfully.');
        } else {
            // Xác nhận OTP không thành công
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }
    }
    
    
}