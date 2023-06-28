<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class surat_pemda extends Model
{
    use HasFactory;
    protected $table = 'surat_pemda';
    protected $guarded = ['id'];

    public function harmonisasi(): HasOne
    {
        return $this->hasOne(harmonisasi::class);
    }
}
