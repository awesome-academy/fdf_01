<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'parent_id',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class,'categories_id', 'id');
    }
}
