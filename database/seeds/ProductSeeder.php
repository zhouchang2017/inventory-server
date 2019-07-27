<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('products')->truncate();
        \Illuminate\Support\Facades\DB::table('product_option')->truncate();

        \Illuminate\Support\Facades\DB::table('product_variants')->truncate();
        \Illuminate\Support\Facades\DB::table('variant_option')->truncate();
        factory(\App\Product::class, 50)->create()
            ->each(function ($product) {

                $data = \App\Option::all()->mapWithKeys(function ($option) {

                    return [
                        $option->id => [ 'values' => $option->values->random(mt_rand(1, 4))->pluck('id')->toArray() ],
                    ];
                })->toArray();

                $product->options()->attach($data);

                $optionValues = $product->combinationOptions(true);
                collect($optionValues)->each(function ($ov) use ($product) {
                    $product->variants()->create([
                        'code'  => $product->code . (string)collect($ov)->map->value->join(""),
                        'price' => $product->price,
                    ])->options()->attach(collect($ov)->map->id->toArray());
                });
            });
    }
}
