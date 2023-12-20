<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_number',
        'inventory_id',
        'user_id',
        'quantity',
        'purchased_on',
        'is_sold',
        'sold_on',
    ];

    protected $casts = [
        'purchased_on' => 'datetime',
        'is_sold' => 'boolean',
        'sold_on' => 'datetime',
    ];

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
