<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'description', 'image_path', 'item_category_id'
    ];

    /**
     * Get the cart where the item has been added.
     */
    public function cartItems(): HasMany {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Get the category that correspond to the item.
     */
    public function itemCategory(): BelongsTo {
        return $this->belongsTo(ItemCategory::class);
    }

    /**
     * Get the orders that this Item has filled.
     */
    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }

    /**
     * Get the current price of the Item.
     */
    public function price(): HasOne {
        return $this->hasOne(Price::class)->latestOfMany();
    }

    /**
     * Get the list of prices that the Item has had.
     */
    public function prices(): HasMany {
        return $this->hasMany(Price::class);
    }

    /**
     * Get the state of the item.
     */
    public function itemState(): BelongsTo {
        return $this->belongsTo(ItemState::class);
    }

    /**
     * Get the type that correspond to the item.
     */
    public function itemType(): BelongsTo {
        return $this->belongsTo(ItemType::class);
    }

    /**
     * Get the users that has this Item in the cart.
     */
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'cart_item');
    }
}
