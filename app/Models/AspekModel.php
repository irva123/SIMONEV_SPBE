<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspekModel extends Model
{
    use HasFactory;
    protected $table = 'aspek';
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'nama_aspek',
        'deskripsi',
        'bobot_nilai',
        'id_periode',
        'id_domain',
        'id_users',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeModel::class, 'id_periode');
    }

    public function domain()
    {
        return $this->belongsTo(DomainModel::class, 'id_domain');
    }

    public function indikator()
    {
        return $this->hasMany(IndikatorModel::class, 'id_indikator');
    }
}
