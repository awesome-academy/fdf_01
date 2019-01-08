<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public $fillable = [
        'product_id',
        'name',
    ];

    protected $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
