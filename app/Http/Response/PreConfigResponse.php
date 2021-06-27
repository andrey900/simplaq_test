<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/26/21
 * Time: 8:56 PM
 * All rights reserved
 */

namespace App\Http\Response;


class PreConfigResponse
{
    protected $responseData;

    protected $codes = [
        200 => '',
        201 => '',
        204 => '',
        400 => 'Bad request, show detail errors',
        401 => 'Authentication credentials were missing or incorrect',
        403 => 'The request is understood, but it has been refused or access is not allowed',
        404 => 'The item does not exist',
        405 => 'Method Not Allowed',
        429 => 'The request cannot be served due to the rate limit having been exhausted for the resource',
        500 => 'Something is broken',
        503 => 'The server is up, but overloaded with requests. Try again later',
    ];

    public function __construct(DataConfig $dataConfig)
    {
        $this->responseData = $dataConfig;
    }

    public function getByCode($code, $msg = '')
    {
        if( isset($this->codes[$code]) ){
            $_msg = $this->codes[$code];
            if( $msg ){
                $_msg = $msg;
            }
            $this->responseData->setStatus($code, $_msg);
        } else {
            $this->responseData->setStatus($code, $msg);
        }

        return $this->responseData;
    }

    public function getResponse()
    {
        return $this->responseData->getResponse();
    }
}