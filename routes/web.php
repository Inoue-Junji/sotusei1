<?php

use Illuminate\Support\Facades\Route;
// 下記1行を追記
use App\Http\Controllers\RunnerController;
use App\Http\Controllers\MeasureController;
use App\Models\Runner;
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

// 下記1行を追記
Route::resource('runner', RunnerController::class);
Route::resource('measure', MeasureController::class);


// Route::get('runner', 'RunnerController@index')->('name');
// Route::get('runner/{runner}', 'RunnerController@show')
//   -> name('runner.show');


// Route::get('/runner/index/{id}', [RunnerController::class, 'show'])->name('runner');
// Route::get('/runner/show/', [RunnerController::class, 'index']);
// Route::resource('runner', RunnerController::class);


// Route::resource('blog', BlogController::class);

// Route::get('/donation/donate/{id}', [DonationController::class, 'create'])->name('donation');
// Route::get('/donation/thx/', [DonationController::class, 'show']);
// Route::resource('donation', DonationController::class);




// Route::get('runner',function(){
//     $runners = Runner::getMyAllOrderByGrade();
//     return $runners;
//   // return response()->json(['name' => 'yamada'])
// });



Route::get('measure/{measure}', [MeasureController::class,'show']);
Route::get('measure-record', [MeasureController::class,'showRecord'])->name('measure.showrecord');

// Route::post('post-measure', function(\Illuminate\Http\Request $request){
//     $hoge = $request->all();
//     return $hoge;
// });
Route::post('post-measure', [MeasureController::class,'time']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/individual', function () {
//     return view('individual'
// });

// Route::get('/measure',[RunnerController::class,'measure']);
// Route::post('/create', [BbsEntryController::class, 'create']);


