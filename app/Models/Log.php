<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'log_activity';
    public $timestamps = false;
    protected $fillable = [
        'time',
        'username',
        'email',
        'action',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
