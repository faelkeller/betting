<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/random', function () {
    $itemsRandom = \App\Random::getItemsBetting(9, 4);
    dd($itemsRandom);
});

Route::get('/parser', function () {

    function printItem($match, $class){
        $str = $match->find(".$class")[0];
        echo "{$str->text} </br>";
    }

    $file = File::get(storage_path('app/public/rounds/1.html'));

    $dom = new \PHPHtmlParser\Dom;
    $dom->loadStr($file);
    $matches = $dom->find('.event__match');

    foreach ($matches as $match){
        $class = ['event__time', 'event__participant--home', 'event__participant--away', 'event__scores', ];
        foreach ($class as $item){
            printItem($match, $item);
        }

    }
});




Route::get('/generate', function () {

    $file = file(storage_path('app/public/resultados_2020.html'));

    $round = null;

    foreach($file as $line) {
        if (Str::contains($line, 'event__round')){
            $search = ['<div class="event__round event__round--static">', '</div>', 'Rodada '];
            $round = trim(str_replace($search, "", $line));
            echo "$round </br>";
        }

        if ($round){
            Storage::disk('local')->append("public/rounds/$round.html", $line);
        }

    }
});





