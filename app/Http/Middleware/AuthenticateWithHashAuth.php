<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/26/21
 * Time: 2:19 PM
 * All rights reserved
 */

namespace App\Http\Middleware;


use App\Http\Response\PreConfigResponse;
use Illuminate\Http\Response;

class AuthenticateWithHashAuth
{
    protected $hash = "973bbee0fcbba3e0247f654223a1e7e5";

    public function handle($request, \Closure $next)
    {
        if(!$request->header('X-Auth-Hash') || $request->header('X-Auth-Hash') != $this->hash){
            return resolve(PreConfigResponse::class)->getByCode(401)->getResponse();
        }

        return $next($request);
    }
}