<?php

use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('options')->truncate();

        \Illuminate\Support\Facades\DB::table('option_values')->truncate();

         \App\Option::create([
            'name' => 'color',
        ])->values()->createMany([
            [ 'value' => '024','comment'=>'黑色' ],
            [ 'value' => '047','comment'=>'红色' ],
            [ 'value' => '21G','comment'=>'白色' ],
            [ 'value' => '02H' ],
            [ 'value' => 'DB4' ],
            [ 'value' => 'TT1' ],
            [ 'value' => 'WA1' ],
            [ 'value' => '098' ],
            [ 'value' => '001' ],
            [ 'value' => '003' ],
        ]);


        \App\Option::create([
            'name' => 'size',
        ])->values()->createMany([
            [ 'value' => '03','comment'=>'35.5' ],
            [ 'value' => '3H','comment'=>'36' ],
            [ 'value' => '04','comment'=>'37' ],
            [ 'value' => '05' ],
            [ 'value' => '5H' ],
            [ 'value' => '06' ],
            [ 'value' => '6H' ],
            [ 'value' => '07' ],
            [ 'value' => '7H' ],
            [ 'value' => '08' ],
            [ 'value' => '8H' ],
            [ 'value' => '09' ],
        ]);

    }
}
