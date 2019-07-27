<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [ 'name' ];

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
