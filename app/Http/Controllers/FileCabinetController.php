<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileCabinetController extends Controller
{
    public function lostfound()
    {
        $data['file'] = 'lostfound';
        return view('filecabinet', $data);
    }
    public function operations()
    {
        $data['file'] = 'operationss';
        return view('filecabinet', $data);
    }
    public function ccnrs()
    {
        $data['file'] = 'community';
        return view('filecabinet', $data);
    }
    public function newsletter()
    {
        $data['file'] = 'newsletter';
        return view('filecabinet', $data);
    }
    public function minutes()
    {
        $data['file'] = 'minutess';
        return view('filecabinet', $data);
    }
    public function report()
    {
        $data['file'] = 'report';
        return view('filecabinet', $data);
    }
    public function legal_info()
    {
        $data['file'] = 'legal_info';
        return view('filecabinet', $data);
    }
    public function contracts()
    {
        $data['file'] = 'contractss';
        return view('filecabinet', $data);
    }
}
