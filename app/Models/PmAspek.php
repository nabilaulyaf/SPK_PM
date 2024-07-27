<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmAspek extends Model
{
    use HasFactory;

    protected $table = 'pm_aspek';
    protected $primaryKey = 'id_aspek';
    public $timestamps = false;

    protected $fillable = [
        'aspek',
        'prosentase',
        'bobot_core',
        'bobot_secondary',
    ];

    public function faktors()
    {
        return $this->hasMany(PmFaktor::class, 'id_aspek', 'id_aspek');
    }
}
