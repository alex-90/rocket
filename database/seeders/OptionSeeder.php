<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('options')->insert([
             'item_id' => 1,
             'key' => 'свойство1',
             'value' => 'значение1_своства1',
         ]);

        DB::table('options')->insert([
            'item_id' => 1,
            'key' => 'свойство1',
            'value' => 'значение2_своства1',
        ]);

        DB::table('options')->insert([
            'item_id' => 1,
            'key' => 'свойство2',
            'value' => 'значение1_свойства2',
        ]);

        Option::factory()
            ->count(50)
            ->create();
    }
}
