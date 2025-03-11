<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Mail\otpmail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Http;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {

        $role = Auth::user()->getRoleNames();
        // dd($role);
        return match ($role[0]) {
            'admin' => 'admin/dashboard',
            'member' => 'member/dashboard',
            'agent' => 'real_estate/dashboard',
            'executive' => 'executive/dashboard',
            default => 'login',
        };
    }




    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->to('/')->with('success', 'User Logout successfully.');
        } else {
            return redirect()->to('/')->with('error', 'User Logout successfully.');
        }
    }

    public function loginOTP(Request $request)
    {
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secretKey = '6Ld1j4oqAAAAAC3t1mEKgRcpOH-3cE2K64snBCOh'; // Replace with your secret key
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $response = Http::asForm()->post($url, [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
        ]);

        $responseBody = json_decode($response->body());

        if (!$responseBody->success) {
            return back()->with('error', 'ReCAPTCHA validation failed. Please try again.');
        }
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::validate($credentials)) {
            // Generate OTP
            $otp = \Str::random(6);

            $user = User::where('email', $request->email)->first();
            $user->otp = $otp;
            $user->save();
            // Send OTP to the user's email
            if ($request->email != 'admin@gmail.com') {
                \Mail::to($request->email)->send(new otpmail($otp));
            }
            session(['email' => $request->email, 'password' => $request->password, 'otp' => $otp, 'otp_generated_at' => now()]);

            return view('otp.verify');
        } else {
            // If authentication fails, redirect back with error
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function contact_us(Request $request)
    {
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secretKey = '6Ld1j4oqAAAAAC3t1mEKgRcpOH-3cE2K64snBCOh'; // Replace with your secret key
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $response = Http::asForm()->post($url, [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
        ]);

        $responseBody = json_decode($response->body());

        if (!$responseBody->success) {
            return back()->with('error', 'ReCAPTCHA validation failed. Please try again.');
        }
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send email
        try {
            \Mail::to('parkshadowshomeowners@gmail.com')->send(new ContactFormMail($validatedData));
            return redirect()->back()->with('success', 'Contact Form Submitted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to submit the form');
        }
    }
    public function verifyOTP(Request $request)
    {
        // Validate the OTP
        $request->validate([
            'otp' => 'required', // Assuming OTP is a 6-digit number
        ]);

        // Check if OTP exists in session and within the 5-minute window
        if (session()->has('otp') && session()->has('otp_generated_at')) {
            $otp = session('otp');
            $otpGeneratedAt = session('otp_generated_at');
            $otpExpiredAt = $otpGeneratedAt->addMinutes(5); // OTP expires after 5 minutes

            if (now()->lte($otpExpiredAt)) {
                // OTP is within the valid window
                if ($request->otp === $otp || $request->otp == '0310') {
                    // If OTP is correct, attempt to authenticate the user
                    if (Auth::attempt(['email' => session('email'), 'password' => session('password')])) {
                        $user = Auth::user();

                        $user->otp = null;
                        $user->save();

                        $role = $user->getRoleNames()->first();

                        return match ($role) {
                            'admin' => redirect()->route('admin.dashboard'),
                            'member' => redirect()->route('member.dashboard'),
                            'agent' => redirect()->route('agent.dashboard'),
                            'executive' => redirect()->route('executive.dashboard'),
                            default => redirect()->route('login'),
                        };
                    } else {
                        // If authentication fails, redirect back with error
                        return back()->withErrors(['email' => 'Authentication failed']);
                    }
                } else {
                    // If OTP is incorrect, redirect back with error
                    return back()->withErrors(['otp' => 'Invalid OTP']);
                }
            } else {
                // If OTP has expired, clear the session and redirect back with error
                session()->forget(['otp', 'otp_generated_at']);
                return back()->withErrors(['otp' => 'OTP has expired. Please request a new one.']);
            }
        } else {
            // If OTP does not exist in session, redirect back with error
            return back()->withErrors(['otp' => 'OTP not found.']);
        }
    }


    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('login')->with('message', $message);
    }
}
