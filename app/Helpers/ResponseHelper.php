<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function format($status = 200, $success = true, $message = 'Success', $data = [])
    {
        return [
            'success' => $success,
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }
}
