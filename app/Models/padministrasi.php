<?php

namespace App\Models;

use App\Models\harmonisasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class padministrasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'padministrasi';

    public function harmonisasi()
    {
        return $this->hasMany(harmonisasi::class);
    }
}
