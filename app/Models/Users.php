<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = ['username','password','role'];
    public $timestamps = false;
    public $update_at = false;

    public function aktivitas () : HasMany {
        return $this->hasMany(Aktivitas::class);
    }

    public function perusahaan() : HasOne {
        return $this->hasOne(Perusahaan::class);
    }
}
