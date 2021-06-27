<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/27/21
 * Time: 12:57 AM
 * All rights reserved
 */

namespace App\Helpers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Pagen
{
    public $maxLimit = 20;

    protected $total = 0;
    protected $current = 1;
    protected $limit = 10;
    protected $uri;

    public function __construct($total)
    {
        $this->total = $total > 0 ? $total : 0;
    }

    public function initFromRequest(Request $request)
    {
        $limit = (int)$request->get('limit', 10);
        $this->setLimit($limit);

        $this->current = (int)$request->get('page', 1);
        if( $this->current < 1 ){
            $this->current = 1;
        }
        if( $this->current > $this->getLast() ){
            $this->current = $this->getLast();
        }

        $this->uri = $request->getRequestUri();
    }

    public function validateLimitRequest(Request $request)
    {
        $validated = Validator::make([
            'limit' => $request->get('limit', 1)
        ], [
            'limit' => 'integer|min:1|max:'.$this->maxLimit
        ]);

        if( !$validated->fails() ){
            return false;
        }

        return $validated->errors()->get('limit')[0];
    }

    public function validatePageRequest(Request $request)
    {
        $validated = Validator::make([
            'page' => $request->get('page', 1)
        ], [
            'page' => 'integer|min:1|max:'.$this->getLast()
        ]);

        if( !$validated->fails() ){
            return false;
        }

        return $validated->errors()->get('page')[0];
    }

    public function getData()
    {
        $items = $this->getTotal() - $this->getOffset();
        if( $items > $this->getLimit() ){
            $items = $this->getLimit();
        }

        return [
            'page' => $this->getCurrent(),
            'totalItems' => $this->getTotal(),
            'limit' => $this->getLimit(),
            'lastPage' => $this->getLast(),
            'items' => $items
        ];
    }

    public function getPagenData()
    {
        $data = $this->getData();

        $pages = [
            'self' => $this->uri,
            'first' => $this->getUrlForPage(1),
            'last' => $this->getUrlForPage($this->getLast()),
        ];
        if( $this->getCurrent() > 1 ){
            $pages['prev'] = $this->getUrlForPage($this->getPrev());
        }
        if( $this->getCurrent() < $this->getLast() ) {
            $pages['next'] = $this->getUrlForPage($this->getNext());
        }

        $data['_links'] = $pages;

        return $data;
    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function setLimit(int $limit)
    {
        if( $limit <= $this->maxLimit && $limit > 0 ){
            $this->limit = $limit;
        }
    }

    public function getOffset()
    {
        return ($this->getCurrent()-1)*$this->getLimit();
    }

    protected function getUrlForPage($pageNum)
    {
        $pageUri = $this->uri;

        if( strpos($pageUri, 'page=') ){
            $pageUri = str_replace('page='.$this->getCurrent(), 'page='.$pageNum, $this->uri);
        } elseif( strpos($pageUri, '?') ) {
            $pageUri .= '&page='.$pageNum;
        } else {
            $pageUri .= '?page='.$pageNum;
        }

        return $pageUri;
    }

    public function getPrev()
    {
        $page = $this->getCurrent()-1;
        if( $page < 1 ){
            $page = 1;
        }

        return $page;
    }

    public function getNext()
    {
        $page = $this->getCurrent()+1;
        if( $page > $this->getLast() ){
            return 0;
        }

        return $page;
    }

    public function getLast()
    {
        return ceil($this->getTotal() / $this->getLimit());
    }
}