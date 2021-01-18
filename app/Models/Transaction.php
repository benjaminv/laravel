<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use Searchable;

    protected $fillable = [
        'item_id',
        'seller_id',
        'buyer',
        'buyOption',
        'price',
        'quantity',
        'order_date',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'order_date' => 'datetime',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'itemID');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'sellerID');
    }
}
