<?php

use App\Http\Controllers\API\HistoryPeriodsController;
use App\Models\Fact;
use App\Models\GalleryImage;
use App\Models\QuizQuestion;
use App\Models\TimelineEvent;
use Illuminate\Support\Facades\Route;

use App\Models\HistoryPeriods;

Route::get('/history-periods', function () {
    return response()
        ->json(HistoryPeriods::all())
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type,Authorization');
});

Route::get('/facts', function () {
    return response()
        ->json(Fact::all())
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type,Authorization');
});

//Route::get('/gallery', function () {
//    return response()
//        ->json(GalleryImage::all())
//        ->header('Access-Control-Allow-Origin', '*')
//        ->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS')
//        ->header('Access-Control-Allow-Headers', 'Content-Type,Authorization');
//});
Route::get('/gallery', function () {
    $data = GalleryImage::all()->map(fn($img) => [
        'path' => asset("storage/{$img->path}"),
    ]);

    return response()->json($data)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
});


Route::get('/quiz', function () {
    return response()
        ->json(QuizQuestion::all())
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type,Authorization');
});
Route::get('/time-line', function () {
    return response()
        ->json(TimelineEvent::all())
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type,Authorization');
});



Route::get('/', function () {
    return view('welcome');
});
