<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\DB;
use PDF;

class AdminController extends Controller
{
    public function index()
    {
        $data = DB::table('pasien')
        ->selectRaw('COUNT(nik) as total, poli')
        ->groupBy('poli')
        ->get();
        $label = [];
        $count = [];
        // convert to array
        $data = json_decode(json_encode($data), true);
        // insert value to label
        foreach ($data as $key => $value) {
            $label[] = $value['poli'];
        }
        foreach ($data as $key => $value) {
            $count[] = $value['total'];
        }
        
        // dd($label);
        // dd($count);
        return view('admin.index', [
            'title' => 'Dashboard', 
            'label' => $label,
            'count' => $count
        ]);
    }

    public function add_user()
    {
        return view('admin.add-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        dd($request->all());

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('data-user');
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

    public function cetak_pdf()
    {
        $pasien = Pasien::all();
        return view('cetak-checkup', ['pasien' => $pasien]);
    }
}
