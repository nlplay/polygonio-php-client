<?php
namespace PolygonIO\rest\reference;

use PolygonIO\rest\RestResource;

/**
 * Class Tickers
 * @package PolygonIO\rest\reference
 */
class Tickers extends RestResource {
    public $route = '/v3/reference/tickers';
    protected $defaultParams = [
        'sort' => 'ticker',
        'limit' => 50,
        'page' => 1,
    ];

    /**
     * @param $params
     * @return mixed
     */
    public function get($params = []) {
        return $this->_get($this->route, $params);
    }
}
