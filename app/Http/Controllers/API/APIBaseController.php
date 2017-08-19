<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use InfyOm\Generator\Utils\ResponseUtil;
use Response;

class APIBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }
}