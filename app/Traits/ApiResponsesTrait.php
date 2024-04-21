<?php

namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponsesTrait
{
    /**
     * Respond with a success message.
     *
     * @param string $message
     * @param array  $data
     * @param int    $statusCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($message, $data = [], $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * Respond with an error message.
     *
     * @param string $message
     * @param int    $statusCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $statusCode)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $statusCode);
    }

        /**
     * Respond with a success message.
     *
     * @param string $message
     * @param array  $data
     * @param int    $statusCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handlingRequestResponse($data)
    {
        return response()->json([
            'success' => false,
            'message' => 'Bad Request!',
            'error' => $data,
        ], Response::HTTP_BAD_REQUEST);
    }
}
