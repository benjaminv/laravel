<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use Searchable;

    protected $fillable = ['name', 'email', 'password', 'remember_token'];

    protected $searchableFields = ['*'];

    protected $hidden = ['password'];

    public function users()
    {
        return $this->hasMany(User::class, 'admin_email', 'email');
    }
}
