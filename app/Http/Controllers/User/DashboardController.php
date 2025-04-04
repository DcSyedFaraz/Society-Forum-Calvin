<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Session;
use Stripe;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('executive.dashboard');
    }
    public function member()
    {
        return view('member.dashboard');
    }
    public function financial()
    {
        $data['file'] = 'financial';
        return view('executive.financial',$data);
    }
    public function realstate()
    {
        // return Auth::user();

        return view('real_estate.dashboard');
    }

    public function profile()
    {
        return view('user.profile');
    }



    public function UserProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'nullable',
        ]);

        $password = Hash::make($request->password);

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = isset($password) ? $password : $user->password;
        $user->save();

        session::flash('success','profile Updated Successfully');
        return redirect()->back();

    }



    public function UserEditProfile(Request $request){

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->paypal_email = $request->paypal_email;
        $user->venmo_number = $request->venmo_number;
        $user->connect_to_facebook = $request->connect_to_facebook;
        $user->save();

        session::flash('success','profile deatail Updated Successfully');
        return redirect()->back();
    }
    public function UserBankDetail(Request $request){

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->account_number = $request->account_number;
        $user->rout_number = $request->route_number;
        $user->save();

        session::flash('success','Bank Detail Updated Successfully');
        return redirect()->back();
    }

    public function change_password()
    {
        return view('auth.change-password');
    }
    public function store_change_password(Request $request)
    {
        $user = Auth::user();
        $userPassword = $user->password;

        $validator =Validator::make($request->all(),[
          'oldpassword' => 'required',
          'newpassword' => 'required|same:password_confirmation|min:6',
          'password_confirmation' => 'required',
        ]);

        if(Hash::check($request->oldpassword, $userPassword))
        {
            return back()->with(['error'=>'old password not match']);
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }


}
