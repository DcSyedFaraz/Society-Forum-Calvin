<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function community()
    {


        // dd($data);
        return view('community.index');
    }
}
