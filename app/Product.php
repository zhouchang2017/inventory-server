<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'code', 'price', 'is_hot', 'arrived_at',
    ];

    protected $casts = [
        'is_hot'     => 'bool',
        'arrived_at' => 'date',
    ];


    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'product_option')
            ->using(ProductOption::class)
            ->as('option_values')
            ->withPivot('values');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function combinationOptions($loadModel = false)
    {
        $optionValues = $this->options->map->option_values->map->values;
        if ($loadModel) {
            $ids = $optionValues->flatten()->toArray();
            $ov = OptionValue::find($ids);
            $optionValues = $optionValues->map(function ($item) use ($ov) {
                return collect($item)->map(function ($v) use ($ov) {
                    return $ov->where('id', $v)->values()->first();
                });
            });
        }
        $head = $optionValues->shift();

        $head = collect($head);

        return $head->crossJoin(...$optionValues)->all();

    }
}
