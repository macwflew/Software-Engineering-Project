<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    use HasFactory;

    /**
     * Get the item that this price belongs.
     */
    public function item(): BelongsTo {
        return $this->belongsTo(Item::class);
    }
}
