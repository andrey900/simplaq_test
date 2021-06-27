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
use App\ModelDataProxy\Customer;
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

    private $dataRegistry;

    public function __construct(Registry $dataRegistry)
    {
        $this->dataRegistry = $dataRegistry;
    }

    public function index(Request $request)
    {
        $registry = $this->dataRegistry;

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

        if( $request->has('sort') ){
            $sortHelper = resolve(Sort::class);
            $sortHelper->setFields(['id', 'points', 'redeems']);

            $orderFields = $sortHelper->getFieldsFromStr($request->get('sort', ''));
            $error = $sortHelper->validateFields($orderFields->toArray());
            if( $error ){
                return resolve(\App\Http\Response\PreConfigResponse::class)->getByCode(400, $error)->getResponse();
            }

            $registry->sort($sortHelper->parseSortStr($request->get('sort', '')));
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
                'items' => $registry->get()->slice($pagen->getOffset(), $pagen->getLimit())->values(),
                'allow_actions' => $this->actions
            ])
            ->getResponse();
    }

    public function show(Request $request, $id)
    {
        $item = $this->dataRegistry->find($id)->get();

        if( $item->isEmpty() ){
            return resolve(\App\Http\Response\PreConfigResponse::class)->getByCode(404)->getResponse();
        }

        /**
         * @var $item Customer
         */
        $item = $item->first();
        $item->disableLink();
        $item->setHideFields([]);

        return resolve(\App\Http\Response\PreConfigResponse::class)
            ->getByCode(200)
            ->setData([
                'item' => $item,
                'allow_actions' => $this->actions['item']
            ])
            ->getResponse();
    }
}