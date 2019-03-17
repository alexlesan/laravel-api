<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amounts = [5,10,20];

        $list = Db::table('lists')
            ->select('id')->orderBy('id', 'desc')
            ->first();
        $nListId = ($list->id) ? $list->id : 3;

        foreach($amounts as $amount){
            DB::table('transactions')->insert([
                [
                    'list_id' => $nListId,
                    'amount' => $amount,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]);
        }

    }
}
