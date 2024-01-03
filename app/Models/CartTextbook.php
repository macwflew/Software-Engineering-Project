<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CartTextbook extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'textbook_id', 'user_id'
    ];

    /**
     * Get the textbooks that exist in the cart.
     */
    public function textbook(): BelongsTo {
        return $this->belongsTo(Textbook::class);
    }
}
