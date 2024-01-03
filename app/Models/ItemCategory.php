<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemCategory extends Model
{
    use HasFactory;

    /**
     * Get the items that correspond to the category.
     */
    public function items(): HasMany {
        return $this->hasMany(Item::class);
    }
}
