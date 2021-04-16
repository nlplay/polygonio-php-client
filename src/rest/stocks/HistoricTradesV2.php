<?php
namespace PolygonIO\rest\stocks;

use PolygonIO\rest\RestResource;

class HistoricTradesV2 extends RestResource {
    protected $defaultParams = [
        'limit' => 100
    ];
    public function get($tickerSymbol, $date) {
        return $this->_get('/v2/ticks/stocks/trades/'.$tickerSymbol.'/'.$date);
    }

    protected function mapper($response)
    {
        $response['ticks'] = array_map(function ($tick) {
           $tick['ticker'] = $tick['T'] ?? null;
           $tick['SIPTimestamp'] = $tick['t'] ?? null;
           $tick['participantExchangeTimestamp'] = $tick['y'] ?? null;
           $tick['tradeReportingFacilityTimestamp'] = $tick['y'] ?? null;
           $tick['sequenceNumber'] = $tick['q'] ?? null;
           $tick['tradeId'] = $tick['i'] ?? null;
           $tick['exchange'] = $tick['x'] ?? null;
           $tick['size'] = $tick['s'] ?? null;
           $tick['conditions'] = $tick['c'] ?? null;
           $tick['price'] = $tick['p'] ?? null;
           $tick['tapeWhereTheTradeOccured'] = $tick['z'] ?? null;
            return $tick;
        }, $response['ticks']);
        return $response;
    }
}