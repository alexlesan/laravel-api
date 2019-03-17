<?php
/**
 * Created by PhpStorm.
 * User: art
 * Date: 3/16/19
 * Time: 11:28 AM
 */

namespace App\Traits;


use Illuminate\Http\Response;

trait ApiController
{

    /**
     * default status code is 200
     *
     * @var int
     */
    protected $statusCode = Response::HTTP_OK;

    /**
     * @return int
     */
    public function getStatusCode()
    :int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode)
    :void {
        $this->statusCode = $statusCode;
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found.')
    {
        $this->setStatusCode(Response::HTTP_NOT_FOUND);
        return $this->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondBadRequest($message = 'Bad Request')
    {
        $this->setStatusCode(Response::HTTP_BAD_REQUEST);
        return $this->respondWithError($message);
    }

    public function respondServerError($message = 'Server Error')
    {
        $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        return $this->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondConflict($message = 'Conflict')
    {
        $this->setStatusCode(Response::HTTP_CONFLICT);
        return $this->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondUnprocessable($message = 'Unprocessable Entity')
    {
        $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        return $this->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondUnauthorized($message = 'Unauthorized')
    {
        $this->setStatusCode(Response::HTTP_UNAUTHORIZED);
        return $this->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondForbidden($message = 'Forbidden')
    {
        $this->setStatusCode(Response::HTTP_FORBIDDEN);
        return $this->respondWithError($message);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function respondCreated($data = [])
    {
        $this->setStatusCode(Response::HTTP_CREATED);
        return $this->respond($data);
    }


    /**
     * @param       $data
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     *
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'data' => $message,
                'code' => $this->getStatusCode()
            ]
        ]);
    }

}