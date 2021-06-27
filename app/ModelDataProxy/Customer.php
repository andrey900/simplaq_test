<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/28/21
 * Time: 2:01 AM
 * All rights reserved
 */

namespace App\ModelDataProxy;


use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;

class Customer implements IModelDataProxy, Arrayable
{
    protected $model;

    protected $emdbed = [
        'link' => false
    ];

    protected $hidden = [];

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function enableLink()
    {
        $this->emdbed['link'] = true;
    }

    public function disableLink()
    {
        $this->emdbed['link'] = false;
    }

    public function setHideFields(iterable $fields)
    {
        $this->hidden = $fields;
    }

    public function toArray()
    {
        $data = $this->model->toArray();
        $data['registered'] = Carbon::parse($data['created_at'])->format('d.m.Y');

        if( $this->emdbed['link'] ){
            $data['_link'] = [
                'self' => '/api/v1/customers/'.$data['id']
            ];
        }
        if( $this->hidden ){
            foreach ($this->hidden as $item) {
                unset($data[$item]);
            }
        }


        return $data;
    }

    public function values()
    {
        return $this->toArray();
    }
}