<?php

namespace App\Models;

use App\Models\perancang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';
    protected $guarded = ['id'];

    public function perancang()
    {
        return $this->hasMany(perancang::class);
    }
}
