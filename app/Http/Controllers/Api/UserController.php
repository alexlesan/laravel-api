<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserResource;
use App\Traits\ApiController;
use App\User;

class UserController extends Controller
{
    use ApiController;

    /**
     *
     * @api  {post} /user/login User Login/Create.
     * @apiName Login
     * @apiDescription Login user or create if doesn't exists email in database
     * @apiGroup User
     *
     * @apiParam {String} email User's email
     * @apiParam {String} password User's password
     *
     * @apiSuccessExample {json} Success-Response when user exists in db and it is just logged:
     *           HTTP/1.1 200 OK
     *           {
     *              "email": "user-email@domain.com",
     *              "token": "token-generated-after-login"
     *              }
     * @apiSuccessExample {json} Success-Response when user is created:
     *           HTTP/1.1 201 Created
     *           {
     *              "email": "user-email@email.com",
     *              "token": "token generated after user was created"
     *           }
     *
     * @apiErrorExample {json} Error-Response wrong email or password:
     *           HTTP/1.1 401 Unauthorized
     *           {
     *              "error": {
     *                          "data": "Wrong username\/password combination.",
     *                          "code": 401
     *                      }
     *           }
     *
     * @apiErrorExample {json} Error-Response validation error:
     *           HTTP 1.1 422 Unprocessable Entity
     *           {
     *              "errors": {
     *                   "email": [ "The email field is required."],
     *                   "password": [ "The password field is required." ]
     *               }
     *           }
     *
     */
    public function login(UserLoginRequest $request)
    {
        try {
            $aParams = [
                'email'    => $request->get('email'),
                'password' => $request->get('password'),
            ];

            $user = User::firstOrCreate(
                ['email' => $request->get('email')],
                ['password' => \Hash::make($request->get('password'))]
            );

            if (auth()->attempt($aParams)) {
                return new UserResource($user);
            } else {
                return $this->respondUnauthorized('Wrong username/password combination.');
            }
        } catch (\Exception $exception) {
            return $this->respondServerError($exception->getMessage());
        }
    }

}
