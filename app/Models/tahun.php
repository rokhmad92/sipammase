<?php

namespace App\Models;

use App\Models\User;
use App\Models\harmonisasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tahun extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'tahun';

    public function harmonisasi()
    {
        return $this->hasMany(harmonisasi::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
