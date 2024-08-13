<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aktivitas extends Model
{
    use HasFactory;
    protected $table = 'aktivitas';
    protected $fillable =['id_aktivitas_users', 'username', 'keterangan', 'tanggal'];

    public function pengguna () : BelongsTo {
        return $this->belongsTo(Users::class);
    }
}
