<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Spatie\QueryBuilder\QueryBuilder;


class UserController extends Controller
{
    public function riwayat(Request $request)
    {
        $nik = $request->query('nik');
        
        if ($nik){
            $data = QueryBuilder::for(Pasien::class)
            ->where('nik', $nik)
            ->paginate(10)
            ->appends(request()->query());
            return view('users.riwayat', ['data' => $data]);
        }

        return view('users.riwayat', ['data' => 'empty']);
    }
}
