<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function success($result, $message, $code=200) {
        $result = [
            'code' => $code,
            'success' => true,
            'data' => $result,
            'message' => $message
        ];
        return response()->json($result, $code);
    }

    public function error($error, $errorMessage=[], $code=500) {
        $response = [
            'code'=>$code,
            'success'=>false,
            'error'=>$error
        ];
        if(!empty($errorMessage)) {
            $response['data'] = $errorMessage;
        }

        return response()->json($response, $code);
    }
}
