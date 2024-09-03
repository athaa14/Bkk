<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';
    protected $KeyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id_perusahaan','username', 'nama_perusahaan', 'bidang_usaha', 'no_telepon', 'alamat', 'logo', 'created_at', 'update_at', 'delete_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_data_perusahaan = self::generateId();
        });
    }

    private static function generateId()
    {
        $prefix = 'P';
        $lastRecord = self::orderBy('id_perusahaan', 'desc')->first();
        $lastNumber = $lastRecord ? intval(substr($lastRecord->id_perusahaan, strlen($prefix))) : 0;
        $newNumber = $lastNumber + 1;

        return $prefix . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
    }


    public function user () : BelongsTo {
        return $this->belongsTo(User::class, 'username');
    }

    public function lowonganPekerjaan () : HasMany {
        return $this->hasMany(LowonganPekerjaan::class, 'id_perusahaan');
    }
}
