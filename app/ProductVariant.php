<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'code',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function options()
    {
        return $this->belongsToMany(OptionValue::class,'variant_option');
    }
}
