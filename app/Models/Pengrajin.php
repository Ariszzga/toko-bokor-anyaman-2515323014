<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengrajin extends Model
{
    protected $fillable = ['name', 'city'];

    public function bokors(): HasMany
    {
        return $this->hasMany(Bokor::class);
    }
}
