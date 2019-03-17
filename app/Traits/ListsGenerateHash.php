<?php
/**
 * Created by PhpStorm.
 * User: art
 * Date: 3/17/19
 * Time: 2:32 AM
 */

namespace App\Traits;


use App\Models\Lists;

trait ListsGenerateHash
{

    /**
     * @param $data
     *
     * @return string
     */
    public function createHash($data){
        $salt = env('APP_KEY');
        $sData = json_encode($data);

        return hash('sha256', $sData . $salt);
    }

    /**
     * @param \App\Models\Lists $list
     *
     * @return bool|string
     */
    public function generateHash(Lists $list)
    {
        if($list->transactions) {
            $aData = [];
            foreach($list->transactions as $transaction) {
                $aData[] = $transaction->amount;
            }

            return $this->createHash($aData);
        }

        return null;
    }

    /**
     * @param array $aAmount
     *
     * @return string
     */
    public function generatePlainHash($aAmount = array())
    {
        return $this->createHash($aAmount);
    }

}