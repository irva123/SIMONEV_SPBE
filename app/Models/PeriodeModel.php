<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeModel extends Model
{
    use HasFactory;
    protected $table = 'periode';
    protected $guarded = ['id'];
    protected $fillable = [
        'tahun',
        'status',
        'mulai',
        'selesai',
        'id_users',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function progress()
    {
        return $this->hasMany(Space::class, 'id_periode');
    }
}
