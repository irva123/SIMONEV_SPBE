<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpdModel extends Model
{
    use HasFactory;
    protected $table = 'opd';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama_opd',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_opd');
    }
}
