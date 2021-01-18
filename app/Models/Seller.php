<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use Searchable;

    protected $fillable = [
        'sellerID',
        'userScore',
        'ratePerctg',
        'followers',
        'reviews',
        'memberSince',
        'storeName',
        'positiveScore',
        'neutralScore',
        'negativeScore',
    ];

    protected $searchableFields = ['*'];

    public function items()
    {
        return $this->hasMany(Item::class, 'sellerID');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'sellerID');
    }

    public function transactionTotals()
    {
        return $this->hasMany(TransactionTotal::class);
    }
}
