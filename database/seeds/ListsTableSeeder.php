<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_encode([5,10,20]);
        $salt = env('APP_KEY');

        DB::table('lists')->insert([
            'hash' => hash('sha256', $data.$salt),
            'prev_hash' => null,
            'is_valid' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
