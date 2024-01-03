<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TextbookState extends Model
{
    use HasFactory;

    /**
     * Get the items that correspond to the state.
     */
    public function textbooks(): HasMany {
        return $this->hasMany(Textbook::class);
    }
}
