<?php
namespace PolygonIO\rest\crypto;

use PolygonIO\rest\Mappers;
use PolygonIO\rest\RestResource;

class Aggregates extends RestResource {
    public function get($tickerSymbol, $multiplier, $from, $to, $timespan = 'days', $params = []){
        return $this->_get('/v2/aggs/ticker/'.$tickerSymbol.'/range/'.$multiplier.'/'.$timespan.'/'.$from.'/'.$to, $params);
    }

    protected function mapper($response)
    {
        $response['results'] = array_map(function ($result) {
            return Mappers::snapshotAggV2($result);
        }, $response['results']);
        return $response;
    }
}