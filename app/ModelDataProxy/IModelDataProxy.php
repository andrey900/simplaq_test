<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/28/21
 * Time: 2:02 AM
 * All rights reserved
 */

namespace App\ModelDataProxy;


use Illuminate\Database\Eloquent\Model;

interface IModelDataProxy
{
    public function __construct(Model $model);
}