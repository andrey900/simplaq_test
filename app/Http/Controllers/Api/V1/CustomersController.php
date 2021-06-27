<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/27/21
 * Time: 12:46 AM
 * All rights reserved
 */

namespace App\Http\Controllers\Api\V1;


use App\Data\Registry;
use App\Helpers\Pagen;
use App\Helpers\Sort;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CustomersController extends Controller
{
    protected $actions = [
        'item' => [
            'read', 'edit', 'delete', 'active', 'inactive'
        ],
        'items' => [
            'create', 'active', 'inactive'
        ]
    ];

    public function index(Request $request)
    {
        $registry = resolve(Registry::class);

        if( $request->has('search') ){
            $search = $request->get('search');
            $allowSearchFields = ['name', 'location'];
            foreach ($search as $field => $v){
                if( !in_array($field, $allowSearchFields) ){
                    $error = 'Search field must be from one: '.implode(',', $allowSearchFields);
                    return resolve(\App\Http\Response\PreConfigResponse::class)->getByCode(400, $error)->getResponse();
                }
            }
            $registry->search($search);
        }

        $sortFields = $request->get('sort', '');
        if( $sortFields ){
            $sortHelper = resolve(Sort::class);
            $sortHelper->setFields(['id', 'points', 'redeems']);
            $orderFields = $sortHelper->getFieldsFromStr($sortFields);
            $error = $sortHelper->validateFields($orderFields->toArray());
            if( $error ){
                return resolve(\App\Http\Response\PreConfigResponse::class)->getByCode(400, $error)->getResponse();
            }

            $registry->sort($sortHelper->parseSortStr($sortFields)->toArray());
        }

        $total = $registry->count();

        $pagen = resolve(Pagen::class, ['total' => $total]);

        $pagen->initFromRequest($request);

        $error = $pagen->validateLimitRequest($request);
        if( $error ){
            return resolve(\App\Http\Response\PreConfigResponse::class)->getByCode(400, $error)->getResponse();
        }

        $error = $pagen->validatePageRequest($request);
        if( $error ){
            return resolve(\App\Http\Response\PreConfigResponse::class)->getByCode(400, $error)->getResponse();
        }


        $meta = [
            'totalItems' => $pagen->getTotal(),
            'limit' => $pagen->getLimit()
        ];

        return resolve(\App\Http\Response\PreConfigResponse::class)
            ->getByCode(200)
            ->setData([
                'pagen' => $pagen->getPagenData(),
                'meta' => $meta,
                'items' => $registry->getItems()->slice($pagen->getOffset(), $pagen->getLimit())->values(),
                'allow_actions' => $this->actions
            ])
            ->getResponse();
    }

    public function show(Request $request, $id)
    {
        $registry = resolve(Registry::class);

        $item = $registry->find($id)->getItems();
        if( $item->isEmpty() ){
            return resolve(\App\Http\Response\PreConfigResponse::class)->getByCode(404)->getResponse();
        }

        return resolve(\App\Http\Response\PreConfigResponse::class)
            ->getByCode(200)
            ->setData([
                'item' => $item->values(),
                'allow_actions' => $this->actions['item']
            ])
            ->getResponse();
    }
}