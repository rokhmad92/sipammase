<?php

namespace App\Models;

use App\Models\User;
use App\Models\harmonisasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pemrakarsa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pemrakarsa';

    public function harmonisasi()
    {
        return $this->hasMany(harmonisasi::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
