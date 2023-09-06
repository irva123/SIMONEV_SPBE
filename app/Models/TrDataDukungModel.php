<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrDataDukungModel extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'tr_data_dukung';
    protected $guarded = ['id'];
    protected $fillable = [
        'id_jawaban',
        'nama_file',
    ];

    public function tr_jawaban_internal()
    {
        return $this->belongsTo(TrJawabanInternalModel::class, 'id_jawaban');
    }
}
