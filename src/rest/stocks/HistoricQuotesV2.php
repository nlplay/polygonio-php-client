<?php
namespace PolygonIO\rest\stocks;

use PolygonIO\rest\RestResource;

class HistoricQuotesV2 extends RestResource {
    protected $defaultParams = [
        'limit' => 100
    ];
    public function get($tickerSymbol, $date) {
        return $this->_get('/v2/ticks/stocks/nbbo/'.$tickerSymbol.'/'.$date);
    }

    protected function mapper($response)
    {
        if ($response['results']) {
            $response['results'] = array_map(function ($result) {
                $result['ticker'] = $result['T'] ?? null;
                $result['SIPTimestamp'] = $result['t'] ?? null;
                $result['participantExchangeTimestamp'] = $result['y'] ?? null;
                $result['tradeReportingFacilityTimestamp'] = $result['f'] ?? null;
                $result['sequenceNumber'] = $result['q'] ?? null;
                $result['conditions'] = $result['c'] ?? null;
                $result['indicators'] = $result['i'] ?? null;
                $result['bidPrice'] = $result['p'] ?? null;
                $result['bidExchangeId'] = $result['x'] ?? null;
                $result['bidSize'] = $result['s'] ?? null;
                $result['askPrice'] = $result['p'] ?? null;
                $result['askExchangeId'] = $result['X'] ?? null;
                $result['askSize'] = $result['S'] ?? null;
                $result['tapeWhereTradeOccured'] = $result['z'] ?? null;
                return $result;
            }, $response['results']);
        }
        return $response;
    }
}