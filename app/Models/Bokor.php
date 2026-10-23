<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bokor extends Model
{
    protected $fillable = ['category_id', 'name', 'artisan_name', 'material', 'price'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
