<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressModel extends Model
{
    use HasFactory;
    protected $table = 'progress';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama_progress',
        'id_periode',
        'mulai',
        'selesai',
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
}
