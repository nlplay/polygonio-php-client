<?php
namespace PolygonIO\rest;

class Mappers {
    public static function quoteV1 ($tick) {
        $tick['condition'] = $tick['c'] ?? null;
        $tick['bidExchange'] = $tick['bE'] ?? null;
        $tick['askExchange'] = $tick['aE'] ?? null;
        $tick['askPrice'] = $tick['aP'] ?? null;
        $tick['buyPrice'] = $tick['bP'] ?? null;
        $tick['bidSize'] = $tick['bS'] ?? null;
        $tick['askSize'] = $tick['aS'] ?? null;
        $tick['timestamp'] = $tick['t'] ?? null;
        return $tick;
    }

    public static function snapshotQuote ($q) {
        $q['bidPrice'] = $q['p'] ?? null;
        $q['bidSize'] = $q['s'] ?? null;
        $q['askPrice'] = $q['P'] ?? null;
        $q['askSize'] = $q['S'] ?? null;
        $q['lastUpdateTimestam'] = $q['t'] ?? null;
        return $q;
    }

    public static function tradeV1 ($tick) {
        $tick['condition1'] = $tick['c1'] ?? null;
        $tick['condition2'] = $tick['c2'] ?? null;
        $tick['condition3'] = $tick['c3'] ?? null;
        $tick['condition4'] = $tick['c4'] ?? null;
        $tick['exchange'] = $tick['e'] ?? null;
        $tick['price'] = $tick['p'] ?? null;
        $tick['size'] = $tick['s'] ?? null;
        $tick['timestamp'] = $tick['t'] ?? null;
        return $tick;
    }

    public static function snapshotAgg ($snap) {
        $snap['close'] =  $snap['c'] ?? null;
        $snap['high'] =  $snap['h'] ?? null;
        $snap['low'] = $snap['l'] ?? null;
        $snap['open'] = $snap['o'] ?? null;
        $snap['volume'] = $snap['v'] ?? null;
        return $snap;
    }

    public static function snapshotAggV2 ($snap) {
        $snap['tickerSymbol'] = $snap['T'] ?? null;
        $snap['volume'] = $snap['v'] ?? null;
        $snap['open'] = $snap['o'] ?? null;
        $snap['close'] = $snap['c'] ?? null;
        $snap['high'] = $snap['h'] ?? null;
        $snap['low'] = $snap['l'] ?? null;
        $snap['timestamp'] = $snap['t'] ?? null;
        $snap['numberOfItems'] = $snap['n'] ?? null;
        return $snap;
    }

    public static function snapshotTicker ($snap) {
        $snap['day'] = Mappers::snapshotAgg($snap['day']);
        $snap['lastTrade'] = Mappers::tradeV1($snap['lastTrade']);
        $snap['lastQuote'] = Mappers::snapshotQuote($snap['lastQuote']);
        $snap['min'] = Mappers::snapshotAgg($snap['min']);
        $snap['prevDay'] = Mappers::snapshotAgg($snap['prevDay']);
        return $snap;
    }

    public static function snapshotCryptoTicker ($snap) {
        $snap['day'] = Mappers::snapshotAgg($snap['day']);
        $snap['lastTrade'] = Mappers::cryptoTick($snap['lastTrade']);
        $snap['min'] = Mappers::snapshotAgg($snap['min']);
        $snap['prevDay'] = Mappers::snapshotAgg($snap['prevDay']);
        return $snap;
    }

    public static function cryptoTick($tick) {
        $tick['price'] = $tick['p'] ?? null;
        $tick['size'] = $tick['s'] ?? null;
        $tick['exchange'] = $tick['x'] ?? null;
        $tick['conditions'] = $tick['c'] ?? null;
        $tick['timestamp'] = $tick['t'] ?? null;
        return $tick;
    }

    public static function cryptoSnapshotBookItem ($item) {
        $item['price'] = $item['p'] ?? null;
        return $item;
    }
}