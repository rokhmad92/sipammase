<?php

namespace App\Models;

use App\Models\role;
use App\Models\tahun;
use App\Models\rancangan;
use App\Models\kpengajuan;
use App\Models\pemrakarsa;
use App\Models\padministrasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class harmonisasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'harmonisasi';

    public function kpengajuan()
    {
        return $this->belongsTo(kpengajuan::class);
    }

    public function padministrasi()
    {
        return $this->belongsTo(padministrasi::class);
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
}