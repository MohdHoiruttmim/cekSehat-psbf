<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Pasien;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    // how to false crate_at and update_at
    public $timestamps = false;
    protected $fillable = [
        'nik',
        'tanggal_kunjungan',
        'nama_pasien',
        'alamat',
        'umur',
        'poli',
        'diagnosa',
    ];

    public function scopeStartsBefore(Builder $query, $data)
    {
        return $query->where('tanggal_kunjungan', '<=', $data);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
