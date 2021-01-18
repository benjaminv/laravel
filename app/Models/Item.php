<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Searchable;

    protected $fillable = [
        'item_name',
        'seller_id',
        'user_score',
        'condition',
        'brand',
        'upc',
        'ean',
        'ePID',
        'sold',
        'd_view',
        'item_rate_count',
        'item_rate',
        'item_price',
        'item_list_price',
        'item_postage',
        'item_hotness',
        'item_sold',
        'item_watching',
    ];

    protected $searchableFields = ['*'];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'sellerID');
    }

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategory::class, 'itemID', 'item_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'itemID');
    }

    public function transactionTotal()
    {
        return $this->hasOne(TransactionTotal::class);
    }
}
