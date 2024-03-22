<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Architect;
use App\Models\Property;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Http\Response;
use Notification;
use Spatie\Permission\Models\Role;
use Validator;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\GameDeposit;
use App\Models\GameWithdraw;
use App\Models\Redeem;
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
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['request'] = User::whereNull('access')
            ->orWhere('access', '!=', 'approved')->with('member')
            ->orderByDesc('created_at')
            ->get();
        return view('admin.dashboard', $data);
    }
    public function request()
    {
        $data['request'] = Property::whereNull('access')
            ->orWhere('access', '!=', 'approved')
            ->orderByDesc('created_at')
            ->get();

        // dd($data);
        return view('request.index', $data);
    }
    public function artchitectural()
    {
        $data['request'] = Architect::whereNull('access')
            ->orWhere('access', '!=', 'approved')
            ->orderByDesc('created_at')
            ->get();

        // dd($data);
        return view('request.arch', $data);
    }
    public function artchitectural_approved($id)
    {
        $user = Architect::find($id);

        $user->access = 'approved';
        $user->save();


        return redirect()->back()->with('success', 'Request Accepted Successfully');
    }
    public function artchitectural_decline($id)
    {
        $user = Architect::find($id);


        $user->access = 'declined';
        $user->save();


        return redirect()->back()->with('warning', 'Request Declined Successfully');
    }
    public function User_approved($id)
    {
        $user = User::find($id);

        $user->access = 'approved';
        $user->save();


        return redirect()->back()->with('success', 'Request Accepted Successfully');
    }
    public function User_decline($id)
    {
        $user = User::find($id);


        $user->access = 'declined';
        $user->save();


        return redirect()->back()->with('warning', 'Request Declined Successfully');
    }
    public function request_approved($id)
    {
        $user = Property::find($id);

        $user->access = 'approved';
        $user->save();


        return redirect()->back()->with('success', 'Request Accepted Successfully');
    }
    public function request_decline($id)
    {
        $user = Property::find($id);


        $user->access = 'declined';
        $user->save();


        return redirect()->back()->with('warning', 'Request Declined Successfully');
    }
    public function announcements()
    {
        $data['announcements'] = Announcement::orderby('created_at', 'desc')->get();
        return view('member.pages.announcements', $data);
    }
    public function announcementDelete(Announcement $announcement)
    {
        // dd($announcement);
        $announcement->delete();
        Session::flash('success', 'Announcement deleted successfully');

        // Send 200 HTTP response to the API
        return response()->json(['message' => 'Announcement deleted successfully'], Response::HTTP_OK);
    }
    public function markasread($id)
    {
        // dd($id);
        if ($id) {
            auth()->user()->notifications->where('id', $id)->markasread();
            // Send 200 HTTP response to the API
            return response()->json(['message' => 'Marked as read'], Response::HTTP_OK);
        }

    }
    public function waiting()
    {
        // dd(auth()->user()->access);
        if (!auth()->user()->access == "approved") {
            return view('waiting');
        } else {
            return redirect('/');
        }
    }
    public function announcementSave(Request $request)
    {
        // dd($request->all());
        $validatedData = $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $announcement = new Announcement();
        $announcement->title = $validatedData['title'];
        $announcement->description = $validatedData['description'];
        $announcement->user_id = auth()->user()->id;
        $announcement->save();

        // Notification
        $user = auth()->user();
        $excludedRoleIds = Role::whereIn('name', ['real_estate'])->pluck('id');

        // Get the users except the authenticated user and those with the excluded roles
        $usersExceptCreatorAndRealEstate = User::where('id', '!=', $user->id)
            ->whereDoesntHave('roles', function ($query) use ($excludedRoleIds) {
                $query->whereIn('id', $excludedRoleIds);
            })
            ->get();

        // Send the notification to eligible users
        $message = "📢 Exciting news! Check out the latest announcement.";
        Notification::send($usersExceptCreatorAndRealEstate, new UserNotification($user, $message, 'Announcement'));

        return redirect()->back()->withSuccess("Announcement has been added successfully");


    }
    public function architectural()
    {

        return view('member.pages.architectural');
    }
    public function forum()
    {

        return view('member.pages.forum');
    }
    public function architecturalSave(Request $request)
    {
        // dd($request->all());
        $validatedData = $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'requestedchange' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);
        $architect = new Architect();
        $architect->name = $validatedData['name'];
        $architect->phone = $validatedData['phone'];
        $architect->email = $validatedData['email'];
        $architect->requestedchange = $validatedData['requestedchange'];

        // Handle image upload if necessary
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $storagePath = str_replace('public/', '', $imagePath);
            $architect->image = $storagePath;
        }
        $architect->user_id = Auth::user()->id;
        $architect->save();

        // Notification
        $user = auth()->user();
        $usersWithRoles = User::role(['admin', 'executive'])->get();
        $message = "🏗️ We have a new architectural request waiting for your review.";

        Notification::send($usersWithRoles, new UserNotification($user, $message, 'Architectural'));

        return redirect()->back()->with('success', 'Request added successfully!');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $id = Auth::id();

        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $this->validate($request, $rules);

        $user = User::find($id);
        $input = $request->except('image');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');

            $imageName = basename($imagePath);

            $user->update(['image' => $imageName]);
        } else {
            $input['image'] = $user->image;
        }

        $user->update($input);

        session()->flash('success', 'Profile Updated Successfully');
        return redirect()->back();
    }

    public function change_password()
    {
        return view('auth.change-password');
    }
    public function store_change_password(Request $request)
    {
        // dd($request->oldpassword);
        $user = Auth::user();
        $userPassword = $user->password;

        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required',
            'newpassword' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required',
        ]);

        if (Hash::check($request->oldpassword, $userPassword)) {
            return back()->with(['error' => 'Old password not match']);
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully !");
    }


    //      Wallet Customer User List:-
    public function walletUserList()
    {
        $users = User::with('wallet')->where('role', 3)->get();
        return view('admin.wallet.wallet_user_list', ["users" => $users]);
    }

    public function walletdeposit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.wallet.deposit', ["users" => $users]);
    }

    public function createdeposite(Request $request)
    {

        // dd($request->all());
        $id = $request->user_id;
        $deposit_amount = $request->dep_amount;
        $users = User::where('id', $id)->first();
        $users->deposit($deposit_amount);


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $request->dep_amount,
            "currency" => "USD",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of techsolutionstuff",
        ]);


        // dd($users);
        return redirect()->back()->with('success', 'Wallet Amount Deposit Has been submitted successfully');
    }

    public function walletwithdraw($id)
    {
        $users = User::findOrFail($id);
        return view('admin.wallet.withdraw', ["users" => $users]);
    }
    public function createdewithdraw(Request $req)
    {
        $id = $req->user_id;
        $withdraw_amount = $req->drw_amount;
        $users = User::where('id', $id)->first();
        $users->forceWithdraw($withdraw_amount);
        return redirect()->back()->with('success', ' Withdraw Amount wallet Has been detected Successfully');
    }
}
