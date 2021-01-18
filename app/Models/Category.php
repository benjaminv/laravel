<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Searchable;

    protected $fillable = [
        '_type',
        'level',
        'NId',
        'categoryNodeId',
        'parentCategoryNodeId',
        'cat_text',
        'has_child',
    ];

    protected $searchableFields = ['*'];

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategory::class, 'NId', 'nid');
    }
}
