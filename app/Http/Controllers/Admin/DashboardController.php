<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Architect;
use Illuminate\Http\Request;
use Auth;
use Hash;
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

        return view('admin.dashboard');
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
        return redirect()->back()->withSuccess("Announcement deleted successfully");
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
            'phone' => 'required|integer',
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
            $imagePath = $request->file('image')->store('images'); // Store the image in the 'images' directory
            $architect->image = $imagePath;
        }
        $architect->user_id = Auth::user()->id;
        $architect->save();

        return redirect()->back()->with('success', 'Request added successfully!');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
        ]);

        $input = $request->all();

        $user = User::find($id);
        $user->update($input);

        session::flash('success', 'Record Updated Successfully');
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
