<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PaypalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(['prefix' => 'payment/paypal'],
function () {
    Route::post('/webhook', [PaypalController::class, 'webhook']);
}
);
Route::group(['namespace'=>'Api'], function () {
    Route::get('/dashboard','HomeController@index');
    Route::get('/category','CategoryController@index');
    Route::get('danh-muc/{slug}','CategoryDetailController@getCategoryDetail');
    Route::get('product/{slug}','ProductDetailController@getProductDetail');
    Route::get('san-pham','ProductController@index');
});

Route::group(['namespace' => 'Api','middleware' => 'auth:api'], function () {
    Route::prefix('shopping')->group(function(){
        Route::get('don-hang','ShoppingCartController@index');
        Route::post('add/{id}','ShoppingCartController@add');
        Route::patch('update/{id}','ShoppingCartController@update');
        Route::delete('delete/{id}','ShoppingCartController@delete');
        Route::post('pay','ShoppingCartController@postPay');
        Route::get('orders/{status}','ShoppingCartController@orders');
    });
});
Route::get('/payment/momo/callback','Frontend\ShoppingCartController@callback');
