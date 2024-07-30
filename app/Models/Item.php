<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $guarded = [];
    use HasFactory;

    /**
     * @return HasMany
     */
    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
