<?php

namespace App\Models;

use App\Models\jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class perancang extends Model
{
    use HasFactory;

    protected $table = 'perancang';
    protected $guarded = ['id'];

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class);
    }
}
