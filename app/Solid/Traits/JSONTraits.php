<?php

namespace App\Solid\Traits;

trait JSONTraits
{
    public function whenDone($data,$message = null)
    {
        return response()->json([
            'status' => true,
            'message' => $message == null ? 'Success' : $message,
            'data' => $data,
        ],200);
    }

    public function whenError($data)
    {
        return response()->json([
            'status' => false,
            'message' => $data,
            'data' => null,
        ],400);
    }
}
