<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/27/21
 * Time: 2:15 AM
 * All rights reserved
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Sort
{
    protected $rawSort = '';

    protected $sort = [
        'id' => 'asc'
    ];

    protected $fields = [
        'id'
    ];

    public function setDefault($field, $type)
    {
        if( !in_array($field, $this->fields) ){
            return;
        }

        $this->sort = [
            $field => $this->checkSortType($type)
        ];
    }

    public function setFields(array $arFields)
    {
        $this->fields = $arFields;
    }

    public function validateFields(array $fields)
    {
        foreach ($fields as $field){
            $validated = Validator::make([
                'field' => $field
            ], [
                'field' => [
                    'required',
                    Rule::in($this->fields),
                ],
            ], [
                'in' => 'The order field is invalid. Order allowed from one: '.implode(', ', $this->fields)
            ]);

            if( $validated->fails() ){
                return $validated->errors()->get('field');
            }
        }

        return false;
    }

    public function getFieldsFromStr($str)
    {
        $fields = $this->parseSortStr($str);
        return $fields->keys();
    }

    protected function checkSortType($sortType)
    {
        $sortType = trim($sortType);

        if( $sortType == 'desc' || $sortType == '-' ){
            return 'desc';
        }

        return 'asc';
    }

    public function parseSortStr($sortStr)
    {
        $this->rawSort = $sortStr;
        $sortFields = collect(explode(',', $sortStr));
        $orderData = collect();
        foreach ($sortFields as $field){
            if( strpos($field, '-') === 0 ){
                $orderData[substr($field, 1)] = 'desc';
            } else {
                $orderData[$field] = 'asc';
            }
        }

        return $orderData;
    }
}