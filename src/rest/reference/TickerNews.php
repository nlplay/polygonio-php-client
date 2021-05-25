<?php
namespace PolygonIO\rest\reference;

use PolygonIO\rest\RestResource;

/**
 * Class TickerNews
 * @package PolygonIO\rest\reference
 */
class TickerNews extends RestResource {
    protected $defaultParams = [
        'perPage' => 50,
        'page' => 1,
    ];

    /**
     * @param $tickerSymbol
     * @param $params
     * @return mixed
     */
    public function get($tickerSymbol, $params = []) {
        $params['ticker'] = $tickerSymbol;

        return $this->_get('/v2/reference/news', $params);
    }
}