<?php

namespace App\Models;

use App\Models\pemrakarsa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';
    protected $guarded = ['id'];

    public function pemrakarsa()
    {
        return $this->belongsTo(pemrakarsa::class);
    }
}
