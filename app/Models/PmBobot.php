<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmBobot extends Model
{
    use HasFactory;

    protected $table = 'pm_bobot';
    public $timestamps = false;

    protected $fillable = [
        'selisih',
        'bobot',
        'keterangan',
    ];
}
