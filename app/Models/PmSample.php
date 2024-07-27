<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmSample extends Model
{
    use HasFactory;

    protected $table = 'pm_sample';
    protected $primaryKey = 'id_sample';
    public $timestamps = false;

    protected $fillable = [
        'id_pelamar',
        'id_faktor',
        'value',
    ];

    public function pelamar()
    {
        return $this->belongsTo(MasterPelamar::class, 'id_pelamar');
    }

    public function faktor()
    {
        return $this->belongsTo(PmFaktor::class, 'id_faktor');
    }
}
