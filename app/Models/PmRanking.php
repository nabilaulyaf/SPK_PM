<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmRanking extends Model
{
    use HasFactory;

    protected $table = 'pm_ranking';
    protected $primaryKey = 'id_pelamar';
    public $timestamps = false;

    protected $fillable = [
        'nilai_akhir',
    ];

    public function pelamar()
    {
        return $this->belongsTo(MasterPelamar::class, 'id_pelamar');
    }
}
