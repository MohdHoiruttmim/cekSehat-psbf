<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function add_user()
    {
        return view('admin.add-user');
    }

    public function data_user()
    {
        return view('admin.data-user');
    }

    public function log_activity()
    {
        return view('admin.log-activity');
    }
}
