<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainModel extends Model
{
    use HasFactory;
    protected $table = 'domain';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama_domain',
        'id_periode',
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

    public function aspek()
    {
        return $this->hasMany(AspekModel::class, 'id_aspek');
    }

}
