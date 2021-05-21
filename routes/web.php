<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;



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

Route::get('/', [HomeController::class, 'index'])->name('/');


require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/getFreshNews', [HomeController::class, 'getFreshNews'])->name('getFreshNews');


Route::get('/clanky/{category_slug?}', [PostController::class, 'index'])->name('posts');
Route::get('/clanok/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('/{page}', function($page){
            return Inertia::render('Page/Show',[
                'page' => \TCG\Voyager\Models\Page::where('slug', $page)->first()
                ]);
        })->name('page.show');

