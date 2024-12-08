<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    //
    public static function successResponse(array $data = null, $code = Response::HTTP_OK)
    {
        $responseMessage = ['Response' => ['errCode' => 0, 'errMsg' => '']];

        if ($data) {
            $responseMessage = array_merge($responseMessage, $data);
        }

        return response()->json(
            $responseMessage,
            $code
        );
    }

    public static function failedResponse(string $message, $code = Response::HTTP_NOT_FOUND)
    {
        return response()->json(['Response' => ['errCode' => 1001, 'errMsg' => $message]], $code);
    }
}
