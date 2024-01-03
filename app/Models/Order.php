<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'total', 'user_id', 'returned_at'
    ];

    /**
     * Get the items that correspond to this order.
     */
    public function items(): BelongsToMany {
        return $this->belongsToMany(Item::class)->withTimestamps();
    }

    /**
     * Get the items that correspond to this order.
     */
    public function textbooks(): BelongsToMany {
        return $this->belongsToMany(Textbook::class)->withTimestamps();
    }

    /**
     * Get the transactions that paid far this order.
     */
    public function transactions(): HasMany {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get the user that correspond this Order.
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
