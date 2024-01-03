<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Textbook extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the cart where the textbook has been added.
     */
    public function cartTextbooks(): HasMany {
        return $this->hasMany(CartTextbook::class);
    }

    /**
     * Get the users that has this Textbook in the cart.
     */
    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }

    /**
     * Get the state of the textbook.
     */
    public function textbookState(): BelongsTo {
        return $this->belongsTo(TextbookState::class);
    }
}
