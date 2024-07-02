<?php

$namespace = 'App\Http\Controllers';

Route::group(['prefix' => 'auth'], function () {
    Auth::routes(['verify' => false, 'register' => 'false']);
});

Route::middleware('auth')->namespace($namespace . '\CMS')->group(function () {
    Route::name('cms.')->group(function () {
        Route::get('/', 'DashboardController')->name('dashboard');
        Route::get('/account/edit_password', 'DashboardController@editPassword')->name('account.edit_password');
        Route::get('/account/edit_profile', 'DashboardController@editProfile')->name('account.edit_profile');
        Route::patch('/account/edit_password', 'DashboardController@updatePassword')->name('account.update_password');
        Route::patch('/account/edit_profile', 'DashboardController@updateProfile')->name('account.update_profile');
        Route::resource('contact_requests', 'ContactRequestController')->only(['index','show','destroy']);
        Route::resource('categories', 'CategoryController');
        Route::resource('posts', 'PostController');
        Route::resource('products', 'ProductController');
        Route::resource('articles', 'ArticleController');
        Route::resource('activities', 'ActivityController');
        Route::resource('questions', 'QuestionController');
        Route::resource('comments', 'CommentController');
        Route::resource('galleries', 'GalleryController');
        Route::resource('orders', 'OrderController');
        Route::resource('slides', 'SlideController');


        Route::post('change-status/{id}','OrderController@changeStatus')->name('order.change_status');

        Route::resource('languages', 'LanguageController');
        Route::get('localization', 'LanguageController@config')->name('localization');
        Route::get('send-notify', 'NotifyController@index')->name('notify.index');
        Route::post('send-notify', 'NotifyController@store')->name('notify.store');
        Route::patch('localization', 'LanguageController@updateL')->name('localization_post');

        Route::get('setting', 'SettingController@index')->name('setting');
        Route::patch('setting', 'SettingController@update')->name('setting_post');

        Route::resource('menus', 'MenuController');
        Route::get('forms/{form}/exportExcel', 'FormController@exportExcel')->name('forms.export_excel');
        Route::get('forms/{form}/items', 'FormController@answers')->name('forms.answers');
        Route::delete('forms/delete-answers/{id}', 'FormController@deleteAnswer')->name('forms.delete_answer');
        Route::resource('forms', 'FormController');

        Route::post('templates/uploader', 'TemplateController@uploader');
        Route::get('templates/{template}/users','TemplateController@setUsers')->name('templates.set_users');
        Route::patch('templates/{template}/users','TemplateController@updateUsers')->name('templates.update_users');
        Route::resource('templates', 'TemplateController');

        Route::get('filemanager/photo', 'FileManagerController@photo')->name('lfm.photo');
        Route::get('filemanager/doc', 'FileManagerController@doc')->name('lfm.doc');
    });

    Route::group(['prefix' => 'lfm'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});