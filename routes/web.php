<?php

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

Route::group(['middleware' => ['web']], function () {
    // HOME - FIRST PAGE
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/', array(
        'uses' => 'DashboardController@welcome',
        'as'   => 'welcome',
    ));

    // REGISTER
    Route::get('/register', function () {
        return view('authentication/register');
    });

    Route::post('/register', array(
        'uses' => 'UserController@registerAction',
        'as'   => 'register',
    ));

    // LOGIN
    Route::get('/login', function () {
        return view('authentication/login');
    });

    Route::post('/login', array(
        'uses' => 'UserController@loginAction',
        'as'   => 'login',
    ));

    // LOGOUT
    Route::get('/logout', array(
        'uses' => 'UserController@logoutAction',
        'as'   => 'logout',
    ));

    // DASHBOARD
    Route::get('/dashboard', array(
        'uses'       => 'DashboardController@show',
        'as'         => 'dashboard',
        'middleware' => 'auth',
    ));

    //Clear Cache facade value:
    Route::get('/clear-cache', function () {
        $exitCode = Artisan::call('cache:clear');

        return '<h1>Cache facade value cleared</h1>';
    });

    //Reoptimized class loader:
    Route::get('/optimize', function () {
        $exitCode = Artisan::call('optimize');

        return '<h1>Reoptimized class loader</h1>';
    });

    //Clear Route cache:
    Route::get('/route-cache', function () {
        $exitCode = Artisan::call('route:cache');

        return '<h1>Route cache cleared</h1>';
    });

    //Clear View cache:
    Route::get('/view-clear', function () {
        $exitCode = Artisan::call('view:clear');

        return '<h1>View cache cleared</h1>';
    });

    //Clear Config cache:
    Route::get('/config-cache', function () {
        $exitCode = Artisan::call('config:cache');

        return '<h1>Clear Config cleared</h1>';
    });

    // EAN Hinzufuegen
    Route::get('/codes/add', function () {
        return view('codes/add');
    });

    // Vorlagen Editor
    Route::get('/templates/add', function () {
        return view('templates/add');
    });

    // Produkt Editor
    Route::get('/products/add', function () {
        return view('products/add');
    });

    // Vorhanden EANs
    Route::get('/codes', function () {
        return view('codes/index');
    });

    // Lizenzen
    Route::get('/licence', function () {
        return view('licence/index');
    });

    // Payment
    Route::get('/payment', function () {
        return view('payment/index');
    });

    // Unternehmen
    Route::get('/profile/edit', array(
        'uses'       => 'ProfileController@editAction',
        'as'         => 'editProfile',
        'middleware' => 'auth',
    ));

    // Support
    Route::get('/support', array(
        'uses'       => 'SupportController@action',
        'as'         => 'support',
        'middleware' => 'auth',
    ));

    // API: Create data from database
    // Version: 1.0.0
    // Database: Normal
    Route::get('/v1/codes/{codeType}/{codeId}', array(
        'uses' => 'CodeController@getDataFromCode',
        'as'   => 'getDataFromCode',
    ));

     // API: ReviewMeta
    // Version: 1.0.0
    // Database: Normal
    Route::get('/reviewMeta/v1/{codeId}', array(
        'uses' => 'ReviewMetaController@getReviewMeta',
        'as'   => 'getReviewMeta',
    ));



    // User profile save
    Route::post('/profile/user/save', array(
        'uses'       => 'ProfileController@saveUserProfile',
        'as'         => 'saveUserProfile',
        'middleware' => 'auth',
    ));

    // Company profile save
    Route::post('/profile/company/save', array(
        'uses'       => 'ProfileController@saveCompanyProfile',
        'as'         => 'saveCompanyProfile',
        'middleware' => 'auth',
    ));

    // Unternehmen
    Route::get('/products', array(
        'uses'       => 'ProductController@viewAction',
        'as'         => 'viewProducts',
        'middleware' => 'auth',
    ));

    // Product add
    Route::post('/product/add', array(
        'uses'       => 'ProductController@addProduct',
        'as'         => 'addProduct',
        'middleware' => 'auth',
    ));

    // Remove product
    Route::get('/product/delete/{productId}', array(
        'uses'       => 'ProductController@deleteProduct',
        'as'         => 'deleteProduct',
        'middleware' => 'auth',
    ));

    // Edit product
    Route::post('/product/edit/{productId}', array(
        'uses'       => 'ProductController@editProduct',
        'as'         => 'editProduct',
        'middleware' => 'auth',
    ));

    // View of creating code
    Route::get('/codes/new', array(
        'uses'       => 'CodeController@newCode',
        'as'         => 'newCode',
        'middleware' => 'auth',
    ));

    // Create/Add code
    Route::post('/codes/create', array(
        'uses'       => 'CodeController@createCode',
        'as'         => 'createCode',
        'middleware' => 'auth',
    ));

    // View of editing for a specific code
    Route::get('/codes/edit/{id}', array(
        'uses'       => 'CodeController@editCode',
        'as'         => 'editCode',
        'middleware' => 'auth',
    ));

    // Update (Edit in DB) a specific code
    Route::post('/codes/update/{id}', array(
        'uses'       => 'CodeController@updateCode',
        'as'         => 'updateCode',
        'middleware' => 'auth',
    ));

    // Update (Edit in DB) a specific code
    Route::post('/codes/update2/{id}', array(
        'uses'       => 'CodeController@updateCode2',
        'as'         => 'updateCode2',
        'middleware' => 'auth',
    ));

    // Update (Edit in DB) a specific code
    Route::get('/codes/edit2/{id}', array(
        'uses'       => 'CodeController@editCode2',
        'as'         => 'editCode2',
        'middleware' => 'auth',
    ));

    // View all codes
    Route::get('/codes', array(
        'uses'       => 'CodeController@viewAction',
        'as'         => 'viewCodes',
        'middleware' => 'auth',
    ));

    // View all codes
    Route::get('/deleteCode/{codeId}', array(
        'uses'       => 'CodeController@deleteCode',
        'as'         => 'deleteCode',
        'middleware' => 'auth',
    ));

    // View all codes
    Route::get('/store', array(
        'uses'       => 'StoreController@viewAction',
        'as'         => 'viewStore',
        'middleware' => 'auth',
    ));

    // Change language
    Route::get('/language/{language}', array(
        'uses'       => 'LanguageController@changeLanguage',
        'as'         => 'changeLanguage',
        'middleware' => 'auth',
    ));

    // Support
    Route::get('/support', array(
        'uses'       => 'SupportController@viewAction',
        'as'         => 'viewAction',
        'middleware' => 'auth',
    ));

    // Contact
    Route::get('/contact', array(
        'uses'       => 'ContactController@viewAction',
        'as'         => 'viewContact',
        'middleware' => 'auth',
    ));

    // Contact
    Route::post('/contact/send', array(
        'uses'       => 'ContactController@sendMessage',
        'as'         => 'sendMessage',
        'middleware' => 'auth',
    ));

    // Store
    Route::get('/store/buy/package/{id}', array(
        'uses'       => 'StoreController@buyPackage',
        'as'         => 'buyPackage',
        'middleware' => 'auth',
    ));

    // Payment view
    Route::get('/payments', array(
        'uses'       => 'PaymentController@viewAction',
        'as'         => 'viewPayments',
        'middleware' => 'auth',
    ));

    // Payment download pdf
    Route::get('/payments/download/{id}', array(
        'uses'       => 'PaymentController@downloadAction',
        'as'         => 'downloadPDF',
        'middleware' => 'auth',
    ));

});