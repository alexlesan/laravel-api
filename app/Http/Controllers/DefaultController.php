<?php

namespace App\Http\Controllers;

use App\Traits\ApiController;

class DefaultController extends Controller
{
    use ApiController;
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->respond(['status' => 'hello...']);
    }

    /**
     * method used for not found pages;
     * @return mixed
     */
    public function fallback()
    {
        return $this->respondNotFound('The page does not exists');
    }
}
