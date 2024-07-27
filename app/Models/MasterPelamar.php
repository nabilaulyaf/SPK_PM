<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPelamar extends Model
{
    use HasFactory;

    protected $table = 'master_pelamar';
    protected $primaryKey = 'id_pelamar';
    public $timestamps = false;

    protected $fillable = [
        'id_pelamar',
        'nama_pelamar',
        'no_hp',
        'email',
    ];
}
