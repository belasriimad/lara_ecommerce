<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'index'
]);
Route::get('/products',[
    'uses' => 'ProductsController@index',
    'as' => 'product.index'
]
);
Route::get('/panier',[
    'uses' => 'ProductsController@getPanier',
    'as' => 'product.panier'
]
);
Route::get('/register',[
    'uses' => 'UsersController@create',
    'as' => 'user.create',
    'middleware'=>'guest'
]
);
Route::post('/register',[
    'uses' => 'UsersController@store',
    'as' => 'user.create',
    'middleware'=>'guest'
]
);
Route::get('/login',[
    'uses' => 'UsersController@getLogin',
    'as' => 'user.login',
    'middleware'=>'guest'
]
);
Route::post('/login',[
    'uses' => 'UsersController@login',
    'as' => 'user.login',
    'middleware'=>'guest'
]
);
Route::get('/logout',[
    'uses' => 'UsersController@logout',
    'as' => 'user.logout',
    'middleware'=>'auth'
]
);
Route::get('/product/{id}/show',[
    'uses' => 'ProductsController@show',
    'as' => 'product.show'
]
);
Route::get('/categories/add',[
    'uses' => 'CategoriesController@create',
    'as' => 'cat.create',
    'middleware'=>'admin'
]
);
Route::get('/admin',[
    'uses'=>'UsersController@admin',
    'as'=>'admin',
    'middleware'=>'admin'
]);
Route::get('/admin/products',[
    'uses'=>'ProductsController@adminProducts',
    'as'=>'admin.products',
    'middleware'=>'admin'
]);
Route::get('/admin/products/{id}/delete',[
    'uses'=>'ProductsController@destroy',
    'as'=>'admin.products.delete',
    'middleware'=>'admin'
]);
Route::post('/admin/products/{id}/update',[
    'uses'=>'ProductsController@update',
    'as'=>'admin.product.update',
    'middleware'=>'admin'
]);
Route::get('/admin/categories',[
    'uses'=>'CategoriesController@index',
    'as'=>'categories.index',
    'middleware'=>'admin'
]
);
Route::post('/admin/categories/add',[
    'uses'=>'CategoriesController@store',
    'as'=>'categorie.add',
    'middleware'=>'admin'
]
);
Route::get('/admin/categories/{id}/delete',[
    'uses'=>'CategoriesController@destroy',
    'as'=>'categorie.delete',
    'middleware'=>'admin'
]
);
Route::post('/admin/categorie/{id}/update',[
    'uses'=>'CategoriesController@update',
    'as'=>'categorie.update',
    'middleware'=>'admin'
]);
Route::get('/admin/users',[
    'uses'=>'UsersController@index',
    'as'=>'admin.users.index',
    'middleware'=>'admin'
]
);
Route::get('/admin/users/{id}/delete',[
    'uses'=>'UsersController@destroy',
    'as'=>'admin.user.delete',
    'middleware'=>'admin'
]
);
Route::get('/admin/user/{id}/update',[
    'uses'=>'UsersController@update',
    'as'=>'user.update',
    'middleware'=>'admin'
]);
Route::get('/admin/user/{id}/remove',[
    'uses'=>'UsersController@removeAdmin',
    'as'=>'user.remove',
    'middleware'=>'admin'
]);
Route::get('/admin/product/add',function(){
    return view('admin.products.create');
}
);
Route::post('/products/create',[
    'uses' => 'ProductsController@store',
    'as' => 'product.add',
    'middleware'=>'admin'
]
);
Route::get('/products/{categorie}/find',[
    'uses'=>'ProductsController@productByCat',
    'as'=>'products.categorie'
]);
Route::post('/product/addToCart',[
    'uses'=>'ProductsController@addToCart',
    'as'=>'product.add.cart'
]);
Route::get('/products/cancel/cart',[
    'uses'=>'ProductsController@cancelCart',
    'as'=>'product.cancel.cart'
]);