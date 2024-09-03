<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LowonganPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'loker';
    protected $primaryKey = 'id_loker';
    public $incrementing = false;
    protected $KeyType = 'string';
    public $timestamps = false;
    protected $fillable = ['id_perusahaan', 'jabatan', 'jenis_waktu_pekerjaan', 'deskripsi', 'tanggal_akhir', 'status'];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->id_lowongan_pekerjaan = self::generateId();
        });
    }

    private static function generateId()
    {
        $prefix = 'LP';
        $lastRecord = self::orderBy('id_lowongan_pekerjaan', 'desc')->first();
        $lastNumber = $lastRecord ? intval(substr($lastRecord->id_lowongan_pekerjaan, strlen($prefix))) : 0;
        $newNumber = $lastNumber + 1;

        return $prefix . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
    }

    public function dataPerusahaan () : BelongsTo {
        return $this->belongsTo(dataPerusahaan::class, 'id_data_perusahaan');
    }

    public function lamaran () : HasMany {
        return $this->hasMany(Lamaran::class);
    }
}
