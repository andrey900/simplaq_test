<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/27/21
 * Time: 3:21 AM
 * All rights reserved
 */

namespace App\Http\Controllers\Api\V1;


use App\Data\Registry;

class LocationsController
{
    public function index()
    {
        $registry = resolve(Registry::class);
        $registry->groupBy('location');

        return resolve(\App\Http\Response\PreConfigResponse::class)
            ->getByCode(200)
            ->setData([
                'items' => $registry->getItems()->keys(),
            ])
            ->getResponse();
    }
}