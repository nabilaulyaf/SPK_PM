<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmFaktor extends Model
{
    use HasFactory;

    protected $table = 'pm_faktor';
    protected $primaryKey = 'id_faktor';
    public $timestamps = false;

    protected $fillable = [
        'id_aspek',
        'faktor',
        'target',
        'type',
    ];

    public function aspek()
    {
        return $this->belongsTo(PmAspek::class, 'id_aspek', 'id_aspek');
    }
}
