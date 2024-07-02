<?php


Route::group(['middleware' => 'locale'], function(){



    Route::get('category/{category:slug}/posts', 'PostController@category')->name('category.posts');
    Route::get('posts', 'PostController@index')->name('posts.index');
    Route::get('posts/{post:slug}', 'PostController@show')->name('posts.show');


//Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('category/{category:slug}/products', 'ProductController@category')->name('category.products');
    Route::get('products/{product:slug}', 'ProductController@show')->name('products.show');

    Route::post('comments','CommentController@store')->name('comments.store');

//Route::get('about-us', 'AboutController@index')->name('abouts.show');

    Route::get('contact-us', 'ContactController@index')->name('contacts.show');
    Route::post('contact-us', 'ContactController@index')->name('contacts.store');

    Route::post('order/{product_id}','OrderController@store')->name('orders.store');

    Route::get('galleries', 'GalleryController@index')->name('galleries.index');
    Route::get('galleries/{gallery:slug}', 'GalleryController@show')->name('galleries.show');

    Route::get('contact_us', 'ContactController@index')->name('contact_us');
    Route::post('contact_us', 'ContactController@storeRequest');

    Route::get('search','SearchController@handle')->name('search');

    Route::post('/form/{form}', 'FormController@submit')->name('form.submit');

    Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'LanguageController@swap']);

    Route::get('/optimize', 'TemplateController@optimize')->name('optimize');

    Route::get('get-cities','FormController@getCities')->name('get_cities');

    Route::get('/', 'TemplateController@home')->name('home_template');

    Route::get('{template:slug}', 'TemplateController@index')->name('template');
    Route::post('{template:slug}', 'TemplateController@auth')->name('template.auth');

});