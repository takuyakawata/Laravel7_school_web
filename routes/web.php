<?php

//どのコントローラーに処理を渡すか、道を作っている！！
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
//tweet機能
use App\Http\Controllers\TweetController;
//お気に入り機能
use App\Http\Controllers\FavoriteController;
//フォロー機能
use App\Http\Controllers\FollowController;
//検索機能
use App\Http\Controllers\SearchController;
//pdf化機能
use App\Http\Controllers\PdfController;

//予約情報をまとめる機能
use App\Http\Controllers\ReservationController;
//予約情報をまとめる機能
use App\Http\Controllers\ReserveController;
// dompdfの利用
use App\Http\Controllers\DomPdfController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
// –––––––––––––––––––––––––––––––––––––––––––––––––


// -------------------------------------------------
Route::get('/output/pdf', [DomPdfController::class, 'output'])->name('dompdf.output');

// 予約を書く画面に移動
Route::get('/reserve/show/{id}', [ReserveController::class, 'show'])->name('reserve.show');

// pdfのフォーム画面
Route::get('/test',  function () {
        return view('test.pdfTest');
    });
    
// pdf化の機能
Route::get('/show-pdf-form', [PdfController::class, 'showPdfForm'])->name('show-pdf-form');
// ---------------------------------------------
Route::post('/generate-pdf', [PdfController::class, 'generatePDF'])->name('generate-pdf');
// 検索画面
Route::get('/tweet/search/input', [SearchController::class, 'create'])->name('search.input');
// 検索処理
Route::get('/tweet/search/result', [SearchController::class, 'index'])->name('search.result');
// フォローのタイムライン作成
Route::get('/tweet/timeline', [TweetController::class, 'timeline'])->name('tweet.timeline');

//フォローの処理
Route::get('user/{user}', [FollowController::class, 'show'])->name('follow.show');
//ユーザーのフォロー追加削除の処理
Route::post('user/{user}/follow', [FollowController::class, 'store'])->name('follow');
Route::post('user/{user}/unfollow', [FollowController::class, 'destroy'])->name('unfollow');
// お気に入りの追加と削除
Route::post('tweet/{tweet}/favorites', [FavoriteController::class, 'store'])->name('favorites');
Route::post('tweet/{tweet}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');
//マイページに入れるtweetの処理
Route::get('/tweet/mypage', [TweetController::class, 'mydata'])->name('tweet.mypage');

});
//tweet
Route::resource('tweet', TweetController::class);
//予約をまとめる
Route::resource('reservation', ReserveController::class);

// //予約
// Route::resource('reservation', ReservationController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
