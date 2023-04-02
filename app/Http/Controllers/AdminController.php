<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\models\Log;
use Carbon\Carbon;

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

        $pie = json_decode(json_encode($pie), true);

        foreach ($pie as $key => $value) {
            $label_pie[] = $value['diagnosa'];
        }
        foreach ($pie as $key => $value) {
            $count_pie[] = $value['total'];
        }

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

        $users = QueryBuilder::for(User::class)
        ->allowedFilters(['name', 'email'])
        ->paginate(10)
        ->appends(request()->query());
        // http://127.0.0.1:3000/userdata?page=3
        // dd($users->links());
        // dd($users);
        // $users = User::all();
        $users = $users->reverse();
        return view('admin.data-user', ['users' => $users]);
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

        Log::create([
            'time' => Carbon::now(),
            'email' => auth()->user()->email,
            'username' => auth()->user()->name,
            'action' => "<td><label class='badge badge-warning'>Edit Profile username '$user->name'</label></td>",
        ]);

        return redirect()->route('data-user');
    }

    public function log_activity()
    {
        $logs = QueryBuilder::for(Log::class)
        ->orderBy('time', 'desc')
        ->paginate(10)
        ->appends(request()->query());
        // dd($logs);
        return view('admin.log-activity', ['logs' => $logs]);
    }

    public function checkup_show(Request $request)
    {
        return view('checkup-new');
    }

    public function checkup_store(Request $request)
    {
        Pasien::create([
            'nik' => $request->nik,
            'tanggal_kunjungan' => Carbon::now(),
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
            'poli' => $request->poli,
            'diagnosa' => $request->diagnosa,
        ]);

        Log::create([
            'time' => Carbon::now(),
            'email' => auth()->user()->email,
            'username' => auth()->user()->name,
            'action' => "<td><label class='badge badge-info'>Insert Pasien '$request->nama_pasien'</label></td>",
        ]);

        return redirect()->route('checkup');
    }

    public function checkup(Request $request)
    {
        $data['q'] = $request->query('q');
        $data['start'] = $request->query('start');
        $data['end'] = $request->query('end');

        if($data['start'] != null && $data['end'] != null) {
            $pasien = QueryBuilder::for(Pasien::class)
            ->allowedFilters(['nama_pasien', 'alamat', 'diagnosa', 'poli', 
            AllowedFilter::scope('starts_before')])
            ->orderBy('tanggal_kunjungan', 'desc')
            ->whereBetween('tanggal_kunjungan', [$data['start'], $data['end']])
            ->paginate(10)
            ->appends(request()->query());

            return view('checkup', ['pasien' => $pasien]);
        }

        $pasien = QueryBuilder::for(Pasien::class)
        // ->allowedFilters(['nama_pasien', 'alamat', 'diagnosa', 'poli'])
        ->where('nama_pasien', 'LIKE', '%' . $data['q'] . '%')
        ->orWhere('alamat', 'LIKE', '%' . $data['q'] . '%')
        ->orWhere('diagnosa', 'LIKE', '%' . $data['q'] . '%')
        ->orderBy('tanggal_kunjungan', 'desc')
        ->paginate(10)
        ->appends(request()->query());

        // dd($pasien);

        // dd($pasien->links());
        // $data['users'] = $query;
        // $pasien = Pasien::paginate(10);
        // $pasien = $pasien->reverse();
        return view('checkup', ['pasien' => $pasien]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('data-user');
    }

    public function cetak()
    {
        $pasien = Pasien::all();
        return view('cetak-checkup', ['pasien' => $pasien]);
    }
}
