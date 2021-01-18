<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use Searchable;

    protected $fillable = ['item_id', 'nid'];

    protected $searchableFields = ['*'];

    protected $table = 'items_categories';

    public function items()
    {
        return $this->hasMany(Item::class, 'itemID', 'item_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'NId', 'nid');
    }
}
