<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

        $pie = DB::table('pasien')
        ->selectRaw('COUNT(nik) as total, diagnosa')
        ->groupBy('diagnosa')
        ->get();
        $label_pie = [];
        $count_pie = [];
        // convert to array
        $pie = json_decode(json_encode($pie), true);
        // insert value to label
        foreach ($pie as $key => $value) {
            $label_pie[] = $value['diagnosa'];
        }
        foreach ($pie as $key => $value) {
            $count_pie[] = $value['total'];
        }

        
        // dd($label);
        // dd($count);
        return view('admin.index', [
            'title' => 'Dashboard', 
            'label' => $label,
            'count' => $count,
            'label_pie' => $label_pie,
            'count_pie' => $count_pie,
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

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('data-user');
    }

    public function data_user(Request $request)
    {
        // $data['q'] = $request->query('q');
        // $query = User::select('name', 'email', 'role')
        // ->where('name', 'LIKE', '%' . $data['q'] . '%')
        // ->orWhere('email', 'LIKE', '%' . $data['q'] . '%')
        // ->get();

        // $data['users'] = $query;

        // dd($query);
        $users = User::all();
        $users = $users->reverse();
        return view('admin.data-user', ['users' => $users]);
        // return view('admin.data-user', $data);
    }

    public function update_show($id)
    {
        $user = User::find($id);
        return view('admin.update-user', ['user' => $user]);
    }

    public function update_store($id)
    {
        $user = User::find($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->role = request('role');
        $user->save();
        return redirect()->route('data-user');
    }

    public function log_activity()
    {
        return view('admin.log-activity');
    }

    public function checkup(Request $request)
    {
        // $data['q'] = $request->query('q');
        // $query = Pasien::select('*')
        // ->where('nama_pasien', 'LIKE', '%' . $data['q'] . '%')
        // ->orWhere('alamat', 'LIKE', '%' . $data['q'] . '%')
        // ->orWhere('diagnosa', 'LIKE', '%' . $data['q'] . '%')
        // ->get();

        $users = QueryBuilder::for(User::class)
        ->allowedFilters(['name', 'email'])
        ->get();

        dd($users);
        // $data['users'] = $query;
        $pasien = Pasien::paginate(10);
        // $pasien = $pasien->reverse();
        return view('checkup', ['pasien' => $pasien]);
    }

    public function delete($id)
    {
        // dd($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('data-user');
    }

    public function cetak_pdf()
    {
        $pasien = Pasien::all();
        return view('cetak-checkup', ['pasien' => $pasien]);
    }
}
