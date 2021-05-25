<?php
namespace PolygonIO\rest\stocks;

use PolygonIO\rest\RestResource;

class LastTradeForSymbol extends RestResource {
    public function get($tickerSymbol) {
        return $this->_get('/v2/last/trade/'.$tickerSymbol);
    }
}