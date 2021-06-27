<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/26/21
 * Time: 9:30 PM
 * All rights reserved
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'location',
        'points',
        'redeems',
        'gender',
        'status',
    ];
}