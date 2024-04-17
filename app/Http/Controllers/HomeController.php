<?php

namespace App\Http\Controllers;

use App\Models\FloorPlan;
use App\Models\Gallery;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\VeriantSize;
use App\Models\PageCategory;
use App\Models\PageSections;
use App\Models\VeriantColor;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function executive_login()
    {
        return view('executive');
    }
    public function executive_signup()
    {
        return view('executive_signup');
    }
    public function estate_login()
    {
        return view('estate');
    }
    public function estate_signup()
    {
        return view('estate_signup');
    }

    public function about_us()
    {
        return view('about');
    }
    public function realstate()
    {
        $data['property'] = Property::where('access', 'approved')->orderby('created_at', 'desc')->get();
        $data['plans'] = FloorPlan::orderby('created_at', 'desc')->get();
        return view('realstate', $data);
    }
    public function gallery()
    {
        $data['gallery'] = Gallery::orderby('created_at', 'desc')->get();
        return view('gallery',$data);
    }
    public function community_forum()
    {
        return view('community-forum');
    }
    public function contact_us()
    {
        return view('contact');
    }

    public function cookie()
        {
            return view('cookie');
        }
    public function guidelines()
        {
            return view('guidelines');
        }
    public function lienceseagreement()
        {
            return view('lienceseagreement');
        }
    public function login()
    {
        // $this->middleware('auth')->except('logout');
        return view('auth.login');
    }

}
