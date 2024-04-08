<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\NewsController;


$products = \App\Models\Product::all();
$categories = \App\Models\Category::all();
$brands = \App\Models\Brand::all();
Route::view('/', 'index', compact('products', 'categories', 'brands'))->name('home');

// Фото

// Route::get('photos', [PhotoController::class, 'index'])->name('photos');
// Route::get('photos/create', [PhotoController::class, 'create'])->name('photos.create');
// Route::post('photos', [PhotoController::class, 'store'])->name('photos.store');
// Route::get('photos/{photo}', [PhotoController::class, 'show'])->name('photos.store');
// Route::get('photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
// Route::put('photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
// Route::delete('photos/{photo}', [PhotoController::class, 'delete'])->name('photos.delete');

Route::resource('photos', PhotoController::class)->names('photos');

Route::resource('news', NewsController::class)->names('news');

// Route::get('/hello', function () {
//     $photos =[(object)['title' => 'Photo title', 'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores rem quaerat dolor porro eaque inventore odit, tempore illo laboriosam eligendi minima? A mollitia, tempore itaque ipsum vitae incidunt ex temporibus?']];
//     return view('photos.index', compact("photos"));
// });

//Route::get("/photoView", [PhotoController::class, 'photoView'])->name('photoView');

Route::get('/calc', [PhotoController::class, 'someCalculate'])->name('calc');

#маршруты Аутинфикации и рeгистрации:

Route::name('user.')->group(function () {
    Route::get('/cabinet',
        [\App\Http\Controllers\UserController::class, 'show'])->middleware('auth')->name('cabinet');
    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect(route('user.cabinet'));
        }
        return view('login');
    })->name('login');
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect('cabinet');
        }
        return view('registration');
    })->name('registration');
    Route::post('/registration', [\App\Http\Controllers\UserController::class, 'store']);
});
