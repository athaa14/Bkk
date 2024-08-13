<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'data_perusahaan';
    protected $fillable = [
        'id_data_perusahaan',
        'username',
        'nama',
        'bidang_usaha',
        'no_telepon',
        'alamat',
        'logo',
    ];

    public function users () : BelongsTo {
        return $this->belongsTo(Users::class);
    }

    public function loker () : HasMany {
        return $this->hasMany(Loker::class);
    }
}
