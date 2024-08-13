<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loker extends Model
{
    use HasFactory;
    protected $table = 'loker';
    protected $primaryKey = 'id_loker';
    protected $fillable = ['id_lowongan_pekerjaan','id_data_perusahaan','jenis_waktu_pengerjaan','deskripsi','tanggal_akhir','status'];
    
    public function perusahaan () : BelongsTo {
        return $this->belongsTo(Perusahaan::class);
    }

    public function lamaran () : HasMany {
        return $this->hasMany(lamaran::class);
    }
}
