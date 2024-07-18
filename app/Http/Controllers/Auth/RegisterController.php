<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AgentDetails;
use App\Models\ExecutiveDetails;
use App\Models\MemberDetails;
use App\Notifications\UserNotification;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Notification;

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
        // dd($data);

        $validatedData = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['regex:/^[^\s]+$/', 'required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm_password'],
            'position' => 'required|string|in:rent,owner',
            'phone' => 'required|string',
            'landlord_name' => 'nullable|required_if:position,rent|string|max:255',
            'landlord_phone_number' => 'nullable|required_if:position,rent|string',
            'landlord_email_address' => 'nullable|required_if:position,rent|string|email|max:255',
            'landlord_address' => 'nullable|required_if:position,rent|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'nullable|max:2048',
            'date' => 'nullable|required_if:position,owner|date_format:Y-m-d',
        ]);
        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()->all()], 422);
        }
        // dd($data['phone']);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->username = $data['username'];

        if ($request->hasFile('image')) {
            // Store the image in the storage/app/public directory
            $imagePath = $request->file('image')->store('public/images');

            $imageName = basename($imagePath);
            $user->image = $imageName;
        }
        $user->password = Hash::make($data['password']);

        $user->save();
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
        $this->notification($user);
        return response()->json(['message' => 'Successfully Registered', 'success' => true], 200);

    }
    public function executive_registration(Request $request)
    {
        $data = $request->all();
        // dd($data);



        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => ['regex:/^[^\s]+$/', 'required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm_password'],
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'parkaddress' => 'required|string|max:255',
            'hoaaddress' => 'nullable|string|max:255',
            'designation' => 'required|string|max:255',
        ]);
        // dd($data);
        // dd($data['phone']);
        try {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->username = $data['username'];
            $user->phone = $data['phoneNumber'];

            if ($request->hasFile('image')) {
                // Store the image in the storage/app/public directory
                $imagePath = $request->file('image')->store('public/images');

                $imageName = basename($imagePath);
                $user->image = $imageName;
            }
            $user->password = Hash::make($data['password']);

            $user->save();
            $user->assignRole('executive');

            $details = new ExecutiveDetails;
            $details->user_id = $user->id;
            $details->address = $data['address'];
            $details->parkaddress = $data['parkaddress'];
            $details->hoaaddress = isset($data['customCheck1']) && $data['customCheck1'] ? $data['parkaddress'] : $data['hoaaddress'];

            $details->designation = $data['designation'];

            $details->save();
            $this->notification($user);
            return redirect()->route('executive_login')->with('success', 'Successfully Registered');
        } catch (Exception $e) {
            // return back()->withErrors(['error' => $e->getMessage()]);
            throw $e;
        }


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
            'name' => 'required|string|max:255',
            'username' => ['regex:/^[^\s]+$/', 'required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm_password'],
            'license' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'companyname' => 'required|string|max:255',
            'companyphone' => 'nullable|string|max:255',
            'companymailadd' => 'required|string|max:255',
            'companyemail' => 'required|email|max:255',
            'companyweb' => 'nullable|max:255',
            'landaddress' => 'required|string|max:255',
        ]);


        // dd($data['phone']);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->username = $data['username'];
        $user->phone = $data['phoneNumber'];

        if ($request->hasFile('image')) {
            // Store the image in the storage/app/public directory
            $imagePath = $request->file('image')->store('public/images');

            $imageName = basename($imagePath);
            $user->image = $imageName;
        }
        $user->password = Hash::make($data['password']);

        $user->save();
        $user->assignRole('agent');

        $details = new AgentDetails;
        $details->user_id = $user->id;
        $details->company_name = $data['companyname'];
        $details->physical_address = $data['landaddress'];
        $details->license = $data['license'];
        $details->company_mailing_address = $data['companymailadd'];
        $details->company_phone_number = $data['companyphone'] ?? null;
        $details->company_email = $data['companyemail'];
        $details->company_website = $data['companyweb'] ?? null;

        $details->save();
        $this->notification($user);
        return redirect()->route('estate_login')->with('success', 'Successfully Registered');
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
            'username' => ['regex:/^[^\s]+$/', 'required', 'string', 'max:15', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm-password'],
            'roles' => 'required',
            'permission' => 'required',
        ]);
    }
    protected function notification($user)
    {
        $admin = User::role('admin')->get();
        // Send the notification to eligible users
        $message = "👤 New user registered! Please review and take necessary actions as needed.";
        Notification::send($admin, new UserNotification($user, $message, 'New User'));
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
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole($data['roles']);
        return $user;
    }



}
