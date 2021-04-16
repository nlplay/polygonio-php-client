<?php
namespace PolygonIO\rest\stocks;

use PolygonIO\rest\RestResource;

class HistoricQuotes extends RestResource {
    protected $defaultParams = [
        'limit' => 100
    ];
    public function get($tickerSymbol, $date) {
        return $this->_get('/v1/historic/quotes/'.$tickerSymbol.'/'.$date);
    }

    protected function mapper($response)
    {
        $response['ticks'] = array_map(function ($tick) {
            $tick['condition'] = $tick['c'] ?? null;
            $tick['bidExchange'] = $tick['bE'] ?? null;
            $tick['askExchange'] = $tick['aE'] ?? null;
            $tick['askPrice'] = $tick['aP'] ?? null;
            $tick['buyPrice'] = $tick['bP'] ?? null;
            $tick['bidSize'] = $tick['bS'] ?? null;
            $tick['askSize'] = $tick['aS'] ?? null;
            $tick['timestamp'] = $tick['t'] ?? null;
            return $tick;
        }, $response['ticks']);
        return $response;
    }
}