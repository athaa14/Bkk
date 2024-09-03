<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alumni extends Model
{
    use HasFactory;     
    protected $table = 'alumni';
    protected $fillable = ['nik','username','nama_lengkap','jurusan','jenis_kelamin','tahun_lulus','alamat','kontak','keahlian','foto','deskripsi'];
    public $timestamps = false;
    // public $update_at = false;
    public $incrementing = false;
    protected $primaryKey = 'nik';

    public function pengguna () : BelongsTo {
        return $this->belongsTo(Users::class, 'username');  
    }

    public function lamaran () : HasMany {
        return $this->hasMany(Lamaran::class, 'nik');
    }

    public function pendidikan () : HasMany {
        return $this->hasMany(pendidikan::class, 'nik');
    }

    public function kerja () : HasMany {
        return $this->hasMany(kerja::class, 'nik');
    }
}
