<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorModel extends Model
{
    use HasFactory;
    protected $table = 'indikator';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama_indikator',
        'bobot_nilai',
        'id_periode',
        'id_domain',
        'id_aspek',
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

    public function aspek()
    {
        return $this->belongsTo(AspekModel::class, 'id_aspek');
    }
}
