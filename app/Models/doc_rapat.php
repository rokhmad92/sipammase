<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class doc_rapat extends Model
{
    use HasFactory;

    protected $table = 'doc_rapat';
    protected $guarded = ['id'];

    public function harmonisasi(): HasOne
    {
        return $this->hasOne(harmonisasi::class);
    }
}
