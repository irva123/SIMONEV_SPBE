<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrJawabanInternalModel extends Model
{
    use HasFactory;
    protected $table = 'tr_jawaban_internal';
    protected $guarded = ['id'];
    protected $fillable = [
        'id_periode',
        'id_indikator',
        'level_terpilih_internal',
        'uraian_kriteria1',
        'uraian_kriteria2',
        'uraian_kriteria3',
        'uraian_kriteria4',
        'uraian_kriteria5',
        'level_terpilih_eksternal',
        'uraian_eksternal',
        'id_user_internal',
        'id_user_eksternal',

    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeModel::class, 'id_periode');
    }

    public function tr_data_dukung()
    {
        return $this->hasMany(TrDataDukungModel::class, 'id_jawaban');
    }
}
