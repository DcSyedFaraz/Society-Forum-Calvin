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
use Session;

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
    public function markAllAsRead()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'All notifications marked as read.');
    }
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
        $data['request'] = Property::orderBy('access')
            ->get();

        // dd($data);
        return view('request.index', $data);
    }
    public function artchitectural()
    {
        $data['request'] = Architect::orderBy('access')
            ->get();

        // dd($data);
        return view('request.arch', $data);
    }
    public function artchitectural_approved($id)
    {
        $user = Architect::find($id);

        $user->access = 'approved';
        $user->save();

        // Notification
        $admin = auth()->user();
        $user = User::findOrFail($user->user_id);
        $message = "📢 Exciting news! Your Request #{$id} has been approved.";
        Notification::send($user, new UserNotification($admin, $message, 'Request Approved'));

        return redirect()->back()->with('success', 'Request Accepted Successfully');
    }
    public function artchitectural_decline($id)
    {
        $user = Architect::find($id);


        $user->access = 'declined';
        $user->save();

        // Notification
        $admin = auth()->user();
        $user = User::findOrFail($user->user_id);
        $message = "📢 Your Request #{$id} has been declined.";
        Notification::send($user, new UserNotification($admin, $message, 'Request Declined'));

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
        $property = Property::find($id);

        $property->access = 'approved';
        $property->save();

        // Notification
        $admin = auth()->user();
        $user = User::findOrFail($property->user_id);
        $message = "📢 Exciting news! Your Request #{$id} has been approved.";
        Notification::send($user, new UserNotification($admin, $message, 'Request Approved'));

        return redirect()->back()->with('success', 'Request Accepted Successfully');
    }
    public function request_decline($id)
    {
        $property = Property::find($id);


        $property->access = 'declined';
        $property->save();

        // Notification
        $admin = auth()->user();
        $user = User::findOrFail($property->user_id);
        $message = "📢 Your Request #{$id} has been declined.";
        Notification::send($user, new UserNotification($admin, $message, 'Request Declined'));

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
        $excludedRoleIds = Role::whereIn('name', ['agent'])->pluck('id');

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
            'username' => ['regex:/^[^\s]+$/', 'required', 'string', 'max:10', 'unique:users,username,' . $id],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $this->validate($request, $rules);

        $user = User::find($id);
        $input = $request->except('image', 'username');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');

            $imageName = basename($imagePath);

            $user->update(['image' => $imageName]);
        } else {
            $input['image'] = $user->image;
        }
        if ($request->username) {

            $user->update(['username' => $request->username]);
        } else {
            $input['username'] = $user->username;
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

}
