<?php
namespace PolygonIO\rest\stocks;

use PolygonIO\rest\RestResource;

class LastQuoteForSymbol extends RestResource {
    public function get($tickerSymbol) {
        return $this->_get('/v2/last/nbbo/'.$tickerSymbol);
    }
}