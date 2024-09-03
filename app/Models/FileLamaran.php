<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileLamaran extends Model
{
    use HasFactory;
    protected $table = 'lamaran';
    protected $fillable = ['id_lamaran','nama_file'];

    public function loker () : BelongsTo {
        return $this->belongsTo(LowonganPekerjaan::class);
    }

    public function alumni () : BelongsTo {
        return $this->belongsTo(Alumni::class);
    }
}
