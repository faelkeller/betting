<?php

namespace App;

use Illuminate\Support\Arr;

class Random
{
    protected static $sleepTimes = [1, 2, 3];

    protected static $options = [1, 2, 3];

    public static function getItemsBetting($numberGames, $numberItemsRandom){
        $games = self::getGames($numberGames);
        $itemsRandom = [];

        for ($i=0; $i<$numberItemsRandom; $i++){
            $itemRandom = self::getItemRandom($games);
            $itemsRandom[] = $itemRandom;
            $games = self::unsetItemArrayByValue($games, $itemRandom->game);
        }

        return $itemsRandom;
    }

    protected static function getItemRandom($games){
        self::sleepTime();
        $game = Arr::random($games);
        echo "game random $game <br/>";

        $optionsShuffle = self::getOptionsShuffle();

        return (object)[
            "game" => $game,
            "optionsShuffle" => $optionsShuffle
        ];
    }

    protected static function unsetItemArrayByValue($array, $value){
        $key = array_search($value, $array);
        unset($array[$key]);
        return $array;
    }

    protected static function getOptionsShuffle(){
        self::sleepTime();
        $optionsShuffle = Arr::shuffle(self::$options);
        echo "Options Shuffle ". json_encode($optionsShuffle). " <br/>";
        return $optionsShuffle;
    }

    protected static function sleepTime(){
        $sleep = Arr::random(self::$sleepTimes);
        sleep($sleep);
    }

    protected static function getGames($numberGames){
        $games = [];

        for($i=1; $i<=$numberGames; $i++){
            self::sleepTime();
            $games[] = $i;
        }

        return $games;
    }
}
