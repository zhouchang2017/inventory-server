<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [ 'name' ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
