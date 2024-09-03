<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// class Perusahaan extends Model
// {
//     use HasFactory;
//     protected $table = 'data_perusahaan';
//     protected $primaryKey = 'id_data_perusahaan';
//     public $timestamps = false;
//     public $update_at = false;
//     protected $fillable = [
//         'id_data_perusahaan',
//         'username',
//         'nama',
//         'bidang_usaha',
//         'no_telepon',
//         'alamat',
//         'logo',
//     ];

//     public function users () : BelongsTo {
//         return $this->belongsTo(Users::class);
//     }

//     public function loker () : HasMany {
//         return $this->hasMany(Loker::class);
//     }
// }

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';
    protected $keyType = 'string';
    public $incrementing = false; // Tambahkan ini karena primary key bukan auto-increment
    public $timestamps = false;
    
    protected $fillable = [
        'id_perusahaan',
        'nama_perusahaan',
        'username',
        'nama',
        'bidang_usaha',
        'no_telepon',
        'alamat',
        'logo',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id_perusahaan)) {
                $model->id_perusahaan = self::generateKodeUnik();
            }
        });
    }

    private static function generateKodeUnik()
    {
        $prefix = 'P'; // Bisa disesuaikan sesuai kebutuhan
        $lastRecord = self::orderBy('id_perusahaan', 'desc')->first();
        $lastNumber = $lastRecord ? intval(substr($lastRecord->id_perusahaan, strlen($prefix))) : 0;
        $newNumber = $lastNumber + 1;

        return $prefix . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'username'); 
    }
}
