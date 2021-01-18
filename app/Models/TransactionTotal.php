<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class TransactionTotal extends Model
{
    use Searchable;

    protected $fillable = ['item_id', 'seller_id', 'item_sold', 'last_trans'];

    protected $searchableFields = ['*'];

    protected $table = 'transaction_totals';

    protected $casts = [
        'last_trans' => 'datetime',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
