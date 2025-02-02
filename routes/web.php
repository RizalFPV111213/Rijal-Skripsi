<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\BookingController;

Route::get('/', function(){return redirect('/home');});
Route::get('/home', 'UserController@home')->name('home');
Route::get('/blog', 'UserController@blog')->name('blog');
Route::get('/blog/{slug}', 'UserController@show_article')->name('blog.show');
Route::get('/destination', 'UserController@destination')->name('destination');
Route::get('/destination/{slug}', 'UserController@show_destination')->name('destination.show');
Route::get('/contact', 'UserController@contact')->name('contact');
Route::get('/photographer', [PhotoController::class, 'index'])->name('photographer.index');
Route::get('/photographer/{id}', [PhotoController::class, 'show']);
Route::post('/photographer/booking', [BookingController::class, 'store'])->name('photographer.booking');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/videographer', 'VideoController@videographer')->name('videographer');
Route::get('/drone', 'DroneController@drone')->name('drone');

// Register
Route::get('/register', [CustomerController::class, 'register'])->name('register');
Route::post('/register', [CustomerController::class, 'store'])->name('register.store');



Route::prefix('admin')->group(function(){
  Route::get('/', function(){
    return view('auth/login');
  });
  // handle route register
  Route::match(["GET", "POST"], "/register", function(){ 
    return redirect("/login"); 
  })->name("register");


  Auth::routes();
  // Route Dashboard
  Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
  
  // route categories
  Route::get('/categories/{category}/restore', 'CategoryController@restore')->name('categories.restore');
  Route::delete('/categories/{category}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent');
  Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch');
  Route::resource('categories', 'CategoryController')->middleware('auth');
  
  // route article
  Route::post('/articles/upload', 'ArticleController@upload')->name('articles.upload')->middleware('auth');
  Route::resource('/articles', 'ArticleController')->middleware('auth');
  
  // route destination
  Route::resource('/destinations', 'DestinationController')->middleware('auth');
    
  // Route about
  Route::get('/abouts', 'AboutController@index')->name('abouts.index')->middleware('auth');
  Route::get('/abouts/{about}/edit', 'AboutController@edit')->name('abouts.edit')->middleware('auth');
  Route::put('/abouts/{about}', 'AboutController@update')->name('abouts.update')->middleware('auth');

  // route Bank
  Route::resource('banks', BankController::class);

  Route::resource('portfolios', PortfolioController::class);    

  Route::resource('packages', PackageController::class);
});