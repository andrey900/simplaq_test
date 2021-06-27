<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/26/21
 * Time: 8:23 PM
 * All rights reserved
 */

namespace App\Http\Response;


use Illuminate\Http\Response;

class DataConfig
{
    protected $data = [];

    protected $code = 200;
    protected $errorMsg = '';

    protected $response;

    protected $errors = [];

    public function __construct(Response $response)
    {
        $this->response = $response;

        $this->errors = collect();
    }

    public function setStatus(int $code, $mess = '')
    {
        $this->code = $code;
        $this->errorMsg = $mess;

        return $this;
    }

    public function setError($error, $key = false)
    {
        if( !$key ){
            $this->errors->push($error);
        } else {
            $this->errors->put($key, $error);
        }

        return $this;
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function getResponse()
    {
        $this->response->setStatusCode($this->code);

        $this->response->setContent($this->getResponseContent());

        return $this->response;
    }

    public function getResponseContent()
    {
        $data = collect();

        $data->put('status', 'success');
        if( $this->code != 200 && $this->code != 201 && $this->code != 204 ){
            $data->put('status', 'error');
        }

        $data->put('code', $this->code);

        if( $this->errorMsg ){
            $data->put('message', $this->errorMsg);
        }
        if( $this->errors->isNotEmpty() ){
            $data->put('errors', $this->errors);
        }

        if( $this->data ){
            $data = $data->merge($this->data);
        }

        return $data;
    }
}