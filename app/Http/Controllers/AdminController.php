<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

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

    public function checkup()
    {
        $pasien = Pasien::paginate(10);
        return view('checkup', ['pasien' => $pasien]);
    }
}
