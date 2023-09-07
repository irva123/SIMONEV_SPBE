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
        'deskripsi',
        'bobot_nilai',
        'id_periode',
        'id_domain',
        'id_aspek',
        'id_users',
        'id_opd',
        'penjelasan_indikator',
        'kriteria1',
        'kriteria2',
        'kriteria3',
        'kriteria4',
        'kriteria5'
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

    public function opd()
    {
        return $this->belongsTo(OpdModel::class, 'id_opd');
    }
}
