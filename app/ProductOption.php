<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductOption extends Pivot
{
    protected $casts = [
        'values' => 'array',
    ];

    public function getValuesValue($value)
    {
        dd($value);
    }
}
