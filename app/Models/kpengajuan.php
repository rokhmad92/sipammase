<?php

namespace App\Models;

use App\Models\harmonisasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kpengajuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'kpengajuan';

    public function harmonisasi()
    {
        return $this->hasMany(harmonisasi::class);
    }
}
