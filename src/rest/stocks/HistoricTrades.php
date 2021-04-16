<?php
namespace PolygonIO\rest\stocks;

use PolygonIO\rest\RestResource;

class HistoricTrades extends RestResource {
    protected $defaultParams = [
        'limit' => 100
    ];
    public function get($tickerSymbol, $date) {
        return $this->_get('/v1/historic/trades/'.$tickerSymbol.'/'.$date);
    }

    protected function mapper($response)
    {
        $response['ticks'] = array_map(function ($tick) {
            $tick['condition1'] = $tick['c1'] ?? null;
            $tick['condition2'] = $tick['c2'] ?? null;
            $tick['condition3'] = $tick['c3'] ?? null;
            $tick['condition4'] = $tick['c4'] ?? null;
            $tick['exchange'] = $tick['e'] ?? null;
            $tick['price'] = $tick['p'] ?? null;
            $tick['size'] = $tick['s'] ?? null;
            $tick['timestamp'] = $tick['t'] ?? null;
            return $tick;
        }, $response['ticks']);
        return $response;
    }
}