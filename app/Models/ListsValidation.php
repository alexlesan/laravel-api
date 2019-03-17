<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListsValidation extends Model
{
    /**
     * @return bool
     * @throws \Exception
     */
    public static function validateList()
    {
        $oLists = Lists::orderBy('id')->get();
        $prev = null;

        foreach($oLists as $list){
            $aData = [];
            foreach($list->transactions as $transaction) {
                $aData[] = $transaction->amount;
            }
            $sData = json_encode($aData);
            $salt = env('APP_KEY');
            $sHash = hash('sha256', $sData.$salt);

            if($sHash !== $list->hash) {
                throw new \Exception('Data in this table failed the hash correlation.');
            }
        }

        return true;
    }
}
