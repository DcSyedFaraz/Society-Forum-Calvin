<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AgentDetails;
use App\Models\MemberDetails;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register_form()
    {
        return view('auth.register');
    }
    public function registeration(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm-password'],
            'permission' => 'required',
        ]);

        // dd($data['phone']);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('member');

        $details = new MemberDetails;
        $details->user_id = $user->id;
        $details->address = $data['address'];
        $details->position = $data['position'];

        if ($data['position'] == 'rent') {
            $details->landlord_address = $data['landlord_address'];
            $details->landlord_name = $data['landlord_name'];
            $details->landlord_phone_number = $data['landlord_phone_number'];
            $details->landlord_email_address = $data['landlord_email_address'];
        }
        if ($data['position'] == 'owner') {
            $details->date_of_purchase = $data['date'];
        }
        $details->save();
        return redirect()->route('login')->with('success', 'Successfully Registered');
    }
    public function agent_register_form()
    {
        return view('auth.agent_register');
    }
    public function agent_registeration(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm-password'],
            'license' => 'required|integer',
            'company_name' => 'required|string',
            'physical_address' => 'required|string',
            'company_mailing_address' => 'required|string',
            'company_phone_number' => 'required|string',
            'company_email' => 'required|email',
            'company_website' => 'nullable|url', // Assuming it's optional
        ]);


        // dd($data['phone']);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('agent');

        $details = new AgentDetails;
        $details->user_id = $user->id;
        $details->company_name = $data['company_name'];
        $details->physical_address = $data['physical_address'];
        $details->license = $data['license'];
        $details->company_mailing_address = $data['company_mailing_address'];
        $details->company_phone_number = $data['company_phone_number'];
        $details->company_email = $data['company_email'];
        $details->company_website = $data['company_website'];

        $details->save();
        return redirect()->route('login')->with('success', 'Successfully Registered');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm-password'],
            'roles' => 'required',
            'permission' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole($data['roles']);
        return $user;
    }



}
