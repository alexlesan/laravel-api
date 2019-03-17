<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Lists;
use App\Models\Transaction;
use App\Traits\ApiController;
use App\Traits\ListsGenerateHash;
class TransactionController extends Controller
{
    /**
     * using the treat to return responses based on error code.
     */
    use ApiController;
    use ListsGenerateHash;

    /**
     *
     * @api            {post} /transaction Transaction Add
     * @apiName        Transaction
     * @apiDescription will try to add new amount into database, before that
     *                 will check if all lists are valid
     * @apiGroup       Transaction
     *
     * @apiParam {Number} amount Amount to add
     *
     * @apiSuccessExample {json} Success-Response:
     *           HTTP/1.1 201 Created
     *           {
     *              "success": "The amount was saved"
     *           }
     *
     * @apiErrorExample {json} Error-Response:
     *           HTTP/1.1 401 Unauthorized
     *           {
     *              "error": {
     *                          "data": "Wrong username\/password
     *                          combination.",
     *                          "code": 401
     *                      }
     *           }
     * @apiErrorExample {json} Error-Response:
     *                 HTTP/1.1 500 Internal Server Error
     *                 {
     *                   "error": {
         *                   "data": "Data in this table failed the hash correlation.",
         *                   "code": 500
         *                   }
     *                  }
     */
    public function add(TransactionRequest $request)
    {
        try {
            $amount = (int)$request->get('amount');
            // check prev_hash for existing list
            $prevList = Lists::orderBy('id', 'desc')->first();
            $prevHash = ($prevList) ? $prevList->hash : null;

            // create new list
            $oNewList = Lists::create([
                'hash'      => $this->generatePlainHash([$amount]),
                'prev_hash' => $prevHash,
                'is_valid'  => true,
            ]);

            if ($oNewList) {
                // insert amount in transactions
                $oTransaction = Transaction::create([
                    'list_id' => $oNewList->id,
                    'amount'  => $amount
                ]);

                if ($oTransaction) {
                    return $this->respondCreated(['success' => "The amount was saved"]);
                }
            }

        } catch (\Exception $exception) {
            return $this->respondServerError($exception->getMessage());
        }

    }
}
