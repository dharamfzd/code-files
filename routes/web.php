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
    $str = "Lorem ipsum dolor sit amet 'consectetur adipiscing' elit, litora 'enim cum tellus' nisl 'ridiculus senectus' natoque, 'eros' vestibulum mauris aenean tempus lobortis. Accumsan 'volutpat semper auctor' tincidunt";
    $c = 0;
    $smallQuotes = false;
    for ($i = 0; $i < strlen($str); $i++) {
        $subStr = $str[$i];
        if ($subStr == "'") {
            $smallQuotes = !$smallQuotes;
        } 
        else if ($subStr == ' ' && !$smallQuotes) {
            $c++;
        }
    }
    $c++;
    return view('words-count', compact('str', 'c'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
