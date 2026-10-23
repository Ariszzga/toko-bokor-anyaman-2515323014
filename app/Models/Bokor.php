<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bokor extends Model
{
    protected $fillable = [
        'category_id',
        'pengrajin_id',
        'name',
        'artisan_name',
        'material',
        'price',
        'cover',
        'made_year',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function pengrajin(): BelongsTo
    {
        return $this->belongsTo(Pengrajin::class);
    }

    protected function coverUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->cover
                ? asset('storage/'.$this->cover)
                : asset('images/bokor-1.png'),
        );
    }
}
