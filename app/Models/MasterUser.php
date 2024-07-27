<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterUser extends Model
{
    use HasFactory;

    protected $table = 'master_user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'nama',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
