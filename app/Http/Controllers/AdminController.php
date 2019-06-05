<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\Position;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        return view('admin/admin');
    }

    // public function showPosition()
    // {
    //     $positions= Position::all();
    //     return view('auth.register', compact('positions'));
    // }
}
