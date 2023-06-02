<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\role;
use App\Models\tahun;
use App\Models\rancangan;
use App\Models\harmonisasi;
use App\Models\pemrakarsa;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ["id"];
    protected $table = 'user';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password',];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(role::class);
    }

    public function pemrakarsa()
    {
        return $this->belongsTo(pemrakarsa::class);
    }

    public function rancangan()
    {
        return $this->belongsTo(rancangan::class);
    }

    public function tahun()
    {
        return $this->belongsTo(tahun::class);
    }

    public function harmonisasi()
    {
        return $this->hasMany(harmonisasi::class);
    }
}
