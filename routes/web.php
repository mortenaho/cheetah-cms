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


use Illuminate\Support\Facades\Route;


Route::prefix("/admin")->middleware(['admin.auth'])->namespace('Admin')->group(function () {


    Route::get('', 'AdminController@index');

    Route::resource('Slider', 'SliderController');
    Route::resource('slider', 'SliderController');
    Route::get('/slider/{id}', 'SliderController@index');
    Route::get("slider/create/{id}", "SliderController@create");
    Route::get("slider/edit/{id}", "SliderController@create");
    Route::post("slider", "SliderController@store");
    Route::post("/slider/status/{id}", "SliderController@changeStatus");

    ///////////  visits
    Route::resource('visits', 'VisitsController');
    Route::resource('Visits', 'VisitsController');
    Route::post('/visits/details/{id}', 'VisitsController@details');
    Route::post("/visits/status/{id}", "VisitsController@changeStatus");

    ///////////  statistics
    Route::resource('statistics', 'StatisticsController');
    Route::post('/statistics/details/{id}', 'StatisticsController@details');


    Route::resource('Gallery', 'GalleryController');
    Route::resource('gallery', 'GalleryController');
    Route::get('/gallery/create/{id?}', 'GalleryController@create');
    Route::get('/gallery/details/{id}', 'GalleryController@index');
    Route::post("/gallery/status/{id}", "GalleryController@changeStatus");

    //Social Controller Route
    Route::resource('Social', 'SocialController');
    Route::resource('social', 'SocialController');
    Route::post("/social/status/{id}", "SocialController@changeStatus");

    // ErrorLog Controller Rout
    Route::get('/errorLog', 'ErrorLogController@index');
    Route::post('/getErrors', 'ErrorLogController@getErrors');
    Route::post('/errorLog/delete', 'ErrorLogController@delete');
    // Site setting Route
    Route::get("/setting", "SettingController@index")->name("setting");
    Route::post("/setting/{id}", "SettingController@update");

    Route::get("/seo", "SeoController@index")->name("seo");
    Route::post("/seo/{id}", "SeoController@update");
    // Profile Route
    Route::get("/profile", "ProfileController@index")->name("profile");
    Route::post("/profile", "ProfileController@update");
    Route::post("/changePassword", "ProfileController@changePassword");

    //Theme Rout
    Route::get("/themes", "ThemeController@index");
    Route::post("/theme/{name}", "ThemeController@Change");

    ///////////  contact_us
    Route::resource('ContactUs', 'ContactUsController');
    Route::post("/ContactUsController/status/{id}", "ContactUsController@changeStatus");
    Route::post("/answer", "ContactUsController@answer");
    Route::get("/replay/{id}", "ContactUsController@replay");
    Route::get("/contact_us/delete/{id}", "ContactUsController@delete");
    Route::get("/contact_us/is_show/{id}", "ContactUsController@isShow");
    Route::post("/contact_us/get", "ContactUsController@getAll");

    ///////////  comment
    Route::resource('comment', 'CommentController');
    Route::post("/comment/status/{id}", "CommentController@changeStatus");
    Route::post("/comment/answer", "CommentController@answer");
    Route::get("/comment/replay/{id}", "CommentController@replay");
    Route::get("/comment/close/{id}", "CommentController@close");
    Route::get("/comment/delete/{id}", "CommentController@delete");
    Route::post("/comment/get", "CommentController@getAll");

    ///////////  category
    Route::get("/category/{type}", "CategoryController@index");
    Route::resource('category', 'CategoryController');
    Route::resource('Category', 'CategoryController');
    Route::get("category/getByType/{type}", "CategoryController@getCategoryByType");
    Route::post("/category/status/{id}", "CategoryController@changeStatus");

    ///////////  menu
    Route::resource('menu', 'MenuController');
    Route::resource('Menu', 'MenuController');
    Route::get("menu/getByType/{type}", "MenuController@getCategoryByType");
    Route::post("/menu/status/{id}", "MenuController@changeStatus");
    Route::post("/menu/get_post", "MenuController@getPosts");
    Route::post("/menu/add_menu", "MenuController@addMenu");
    Route::post("/menu/order_menu", "MenuController@orderMenu");
    Route::post("/menu/menu_edit_title", "MenuController@menuEditTitle");
    Route::post("/menu/order_menu", "MenuController@orderMenu");
    Route::post("/menu/save_menu/", "MenuController@saveMenu");

    ///////////  menu
    Route::resource('menu_temp', 'MenuTempController');
    Route::resource('Menu_temp', 'MenuTempController');
    Route::get("menu_temp/getByType/{type}", "MenuTempController@getCategoryByType");
    Route::post("/menu_temp/status/{id}", "MenuTempController@changeStatus");
    Route::post("/menu_temp/get_post", "MenuTempController@getPosts");
    Route::post("/menu_temp/add_menu", "MenuTempController@addMenu");
    Route::post("/menu_temp/order_menu", "MenuTempController@orderMenu");
    Route::post("/menu_temp/menu_edit_title", "MenuTempController@menuEditTitle");

    /////////// attachment

//    Route::resource('Attachment', 'AttachmentController');
    Route::resource('attachment', 'AttachmentController');
    Route::get('/attachments/{id}', 'AttachmentController@index');
    Route::get("attachment/create/{id}", "AttachmentController@create");
    Route::get("attachment/edit/{id}", "AttachmentController@create");
    Route::post("attachment", "AttachmentController@store");
    Route::post("/attachment/status/{id}", "AttachmentController@changeStatus");


    Route::post("/ordering/post", "AdminController@ordering");
    Route::post("/customOrder/{table}", "AdminController@customOrder");

    ///////////  post
    Route::resource('post', 'PostController');
    Route::resource('Post', 'PostController');
    Route::post("/post/status/{id}", "PostController@changeStatus");
    Route::post("/post/featured/{id}", "PostController@featured");
    Route::get("/post_category/create", "PostController@categoryCreate");

    ///////////  pages
    Route::resource('pages', 'PagesController');
    Route::resource('Pages', 'PagesController');
    Route::post("/pages/status/{id}", "PagesController@changeStatus");
    Route::post("/pages/featured/{id}", "PagesController@featured");
    Route::get("/page_category/create", "PagesController@categoryCreate");

    ///////////  about_us
    Route::resource('about_us', 'AboutUsController');
    Route::resource('About_us', 'AboutUsController');
    Route::post("/about_us/status/{id}", "AboutUsController@changeStatus");
    ///////////  contact_info
    Route::resource('contact_info', 'ContactInfoController');
    Route::resource('Contact_info', 'ContactInfoController');
    Route::post("/contact_info/status/{id}", "ContactInfoController@changeStatus");

    ///////////  plugin
    Route::resource('plugin', 'PluginController');
    Route::post("/plugin/status/{id}", "PluginController@changeStatus");
    Route::post("/plugin/is_active/{id}", "PluginController@isActive");
    // DataTable Route

    Route::get("dtAjaxData/slider", "DataTableController@slider")->name("dtAjaxData.slider");
    Route::get("dtAjaxData/gallery/{parent?}", "DataTableController@gallery")->name("dtAjaxData.gallery");
    Route::get("dtAjaxData/contact_us", "DataTableController@contact_us")->name("dtAjaxData.contact_us");
    Route::get("dtAjaxData/social", "DataTableController@social")->name("dtAjaxData.social");
    Route::get("dtAjaxData/category/{type}", "DataTableController@category")->name("dtAjaxData.category");
    Route::get("dtAjaxData/post", "DataTableController@post")->name("dtAjaxData.post");
    Route::get("dtAjaxData/about_us", "DataTableController@about_us")->name("dtAjaxData.about_us");
    Route::get("dtAjaxData/contact_info", "DataTableController@contact_info")->name("dtAjaxData.contact_info");
    Route::get("dtAjaxData/menu", "DataTableController@menu")->name("dtAjaxData.menu");
    Route::get("dtAjaxData/comment", "DataTableController@comment")->name("dtAjaxData.comment");
    Route::get("dtAjaxData/attachment/{id}", "DataTableController@attachment")->name("dtAjaxData.attachment");
    Route::get("dtAjaxData/visits", "DataTableController@visits")->name("dtAjaxData.visits");
    Route::get("dtAjaxData/customers", "DataTableController@customers")->name("dtAjaxData.customers");
    // plugin route

    ///////////  service
    Route::resource('service', 'ServiceController');
    Route::resource('Service', 'ServiceController');
    Route::post("/service/status/{id}", "ServiceController@changeStatus");
    Route::post("/service/featured/{id}", "ServiceController@featured");
    Route::get("/service_category/create", "ServiceController@categoryCreate");
    ///////////  certificate
    Route::resource('certificate', 'CertificateController');
    Route::resource('Certificate', 'CertificateController');
    Route::post("/certificate/status/{id}", "CertificateController@changeStatus");
    Route::post("/certificate/featured/{id}", "CertificateController@featured");
    Route::get("/certificate_category/create", "CertificateController@categoryCreate");
    ///////////  product
    Route::resource('product', 'ProductController');
    Route::resource('Product', 'ProductController');
    Route::post("/product/status/{id}", "ProductController@changeStatus");
    Route::post("/product/featured/{id}", "ProductController@featured");
    Route::get("/product_category/create", "ProductController@categoryCreate");
    ///////////  training
    Route::resource('training', 'TrainingController');
    Route::resource('Training', 'TrainingController');
    Route::post("/training/status/{id}", "TrainingController@changeStatus");
    Route::post("/training/featured/{id}", "TrainingController@featured");
    Route::get("/training_category/create", "TrainingController@categoryCreate");
    ///////////  portfolio
    Route::resource('portfolio', 'PortfolioController');
    Route::resource('Portfolio', 'PortfolioController');
    Route::post("/portfolio/status/{id}", "PortfolioController@changeStatus");
    Route::post("/portfolio/featured/{id}", "PortfolioController@featured");
    Route::get("/portfolio_category/create", "PortfolioController@categoryCreate");
    ///////////  downloads
    Route::resource('download', 'DownloadController');
    Route::resource('Download', 'DownloadController');
    Route::post("/download/status/{id}", "DownloadController@changeStatus");
    Route::post("/download/featured/{id}", "DownloadController@featured");
    Route::get("/download_category/create", "DownloadController@categoryCreate");
    ///////////  customer
    Route::resource('customer', 'CustomerController');
    Route::resource('Customer', 'CustomerController');
    Route::post("/customer/status/{id}", "CustomerController@changeStatus");
    Route::post("/customer/featured/{id}", "CustomerController@featured");
    ///////////  customers
    Route::resource('customers', 'CustomersController');
    Route::resource('Customers', 'CustomersController');
    Route::post("/customers/status/{id}", "CustomersController@changeStatus");
    Route::post("/customers/activate/{id}", "CustomersController@activate");
    ///////////  client
    Route::resource('client', 'ClientController');
    Route::resource('Client', 'ClientController');
    Route::post("/client/status/{id}", "ClientController@changeStatus");
    Route::post("/client/featured/{id}", "ClientController@featured");

    // HMPost Controller Rout
    Route::resource('HMPost', 'HMPostController');
    Route::post("/hm_post/status/{id}", "HMPostController@changeStatus");
    // Reportage Controller Rout
    Route::resource('HMReportage', 'HMReportageController');
    Route::post("/hm_reportage/status/{id}", "HMReportageController@changeStatus");
    // HMAds Controller Rout
    Route::resource('HMAds', 'HMAdsController');

    Route::get("dtAjaxData/pages", "DataTableController@pages")->name("dtAjaxData.pages");
    Route::get("dtAjaxData/customer", "DataTableController@customer")->name("dtAjaxData.customer");
    Route::get("dtAjaxData/service", "DataTableController@service")->name("dtAjaxData.service");
    Route::get("dtAjaxData/certificate", "DataTableController@certificate")->name("dtAjaxData.certificate");
    Route::get("dtAjaxData/training", "DataTableController@training")->name("dtAjaxData.training");
    Route::get("dtAjaxData/product", "DataTableController@product")->name("dtAjaxData.product");
    Route::get("dtAjaxData/portfolio", "DataTableController@portfolio")->name("dtAjaxData.portfolio");
    Route::get("dtAjaxData/download", "DataTableController@download")->name("dtAjaxData.download");
    Route::get("dtAjaxData/visits", "DataTableController@visits")->name("dtAjaxData.visits");
    Route::get("dtAjaxData/hm_post", "DataTableController@hm_post")->name("dtAjaxData.hm_post");
    Route::get("dtAjaxData/hm_reportage", "DataTableController@hm_reportage")->name("dtAjaxData.hm_reportage");
    Route::get("dtAjaxData/hm_ads", "DataTableController@hm_ads")->name("dtAjaxData.hm_ads");
});

Route::namespace('Admin')->group(function () {
    Route::get("/login/admin", "LoginController@index");
    Route::post("/login/admin", "LoginController@login");
    Route::get("/logout/admin", "LoginController@logOut");
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
});

//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
//    Route::post('/filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
//    // list all lfm routes here...
//});

Route::prefix("/customer")->middleware(['customer.auth'])->namespace('Customer')->group(function () {

    Route::get('', 'CustomerController@index');

    //Orders
    Route::get("dtAjaxData/orders", "DataTableController@orders")->name("dtAjaxData.orders");
    Route::resource('orders', 'OrdersController');
    Route::resource('Orders', 'OrdersController');
    Route::post('/orders/details/{id}', 'OrdersController@details');
    Route::post("/orders/status/{id}", "OrdersController@changeStatus");

});

Route::namespace('Home')->group(function () {
    Route::get('/sitemap/{id?}', 'HomeController@sitemap');
    Route::post('/home/visit', 'HomeController@visit');
    Route::post("/rate/star/{cid}","StarRateController@set_rate");
    Route::get("/order/{id}/{pid?}",'OrderFormController@show');
    Route::get("/{locale}/order/{id}/{pid?}",'OrderFormController@show');
    Route::post("/order/{id}",'OrderFormController@store');
    Route::post("/{locale}/order/{id}",'OrderFormController@store');
    Route::post("/home/cart","HomeController@addToCart");
    Route::post("/home/cart_delete","HomeController@deleteCart");
    Route::post("/home/cart_update","HomeController@updateCart");
    Route::post("/home/cart_empty","HomeController@emptyCart");
    Route::post("/home/checkout","HomeController@checkOut");

    Route::get("/{locale}/home/register","LoginController@register");
    Route::get("/{locale}/home/activate/{id}","LoginController@activate");
    Route::get("/{locale}/home/recover","LoginController@recover");
    Route::get("/{locale}/home/login","LoginController@login");

    Route::post("/home/register","HomeController@register");
    Route::post("/home/validateCode","HomeController@validateCode");
    Route::post("/home/resendCode","HomeController@resendCode");
    Route::post("/home/login","HomeController@login");


    Route::get("/home/logout","HomeController@logOut");
});


 // Get file when base_directory isn't public

Route::get('/bagheera/{base_path}/{file_name}', 'CoreController@getFile')
    ->where(['file_name'=> '.*']);

Route::get("/mortenaho","\Themes\Main\Controllers\HomeController@index");


