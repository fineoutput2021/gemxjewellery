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

// Route::get('/', function () {
//     return view('welcome');
// });

//clear chache route in the fronted
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCodes = Artisan::call('config:clear');
    // return what you want
});

//get home page of the website(open website)
Route::get('/','frontend\HomeController@index');
// Route::get('/','frontend\HomeController@main_index');


// Admin panel web apis //

/* Admin Login*/
Route::get('/admin_login','LoginController@admin_login')->name('admin_login');

Route::post('/admin_login_process','LoginController@admin_login_process')->name('admin_login_process');

Route::get('/admin_logout','LoginController@admin_logout')->name('admin_logout');

Route::get('/admin_profile','LoginController@admin_profile')->name('admin_profile');
Route::get('/admin_change_pass_view','LoginController@admin_change_pass_view')->name('admin_change_pass_view');

Route::post('/admin_change_password','LoginController@admin_change_password')->name('admin_change_password');

/* Admin Home Dashboard*/
Route::get('/admin_index','TeamController@admin_index')->name('admin_index');

Route::get('/view_appointment','AppointmentController@view_appointment')->name('view_appointment');
Route::get('/stocks','frontend\HomeController@stocks')->name('stocks');


// Route::get('/check','CategoryController@check')->name('check');


// Admin Team
//create admin and manage their permissions for admin panel
Route::get('/add_team_view','TeamController@add_team_view')->name('add_team_view');
Route::get('/view_team','TeamController@view_team')->name('view_team');
Route::post('/add_team_process','TeamController@add_team_process')->name('add_team_process');
Route::get('/update_status/{status}/{id}','TeamController@update_status')->name('update_status');
Route::get('/deleteTeam/{id}','TeamController@deleteTeam')->name('deleteTeam');

// Admin Category
Route::get('/view_category','CategoryController@view_category')->name('view_category');
Route::get('/add_category_view','CategoryController@add_category_view')->name('add_category_view');
Route::get('/update_category_view/{id}','CategoryController@update_category_view')->name('update_category_view');
Route::post('/add_category_process','CategoryController@add_category_process')->name('add_category_process');
Route::get('/update_cat_status/{status}/{id}','CategoryController@update_cat_status')->name('update_cat_status');
Route::get('/deleteCategory/{id}','CategoryController@deleteCategory')->name('deleteCategory');


// Admin subcategory
Route::get('/view_subcategory','SubCategoryController@view_subcategory')->name('view_subcategory');
Route::get('/add_subcategory_view','SubCategoryController@add_subcategory_view')->name('add_subcategory_view');
Route::get('/update_subcategory_view/{id}','SubCategoryController@update_subcategory_view')->name('update_subcategory_view');
Route::post('/add_subcategory_process','SubCategoryController@add_subcategory_process')->name('add_subcategory_process');
Route::get('/update_subcategory_status/{status}/{id}','SubCategoryController@update_subcategory_status')->name('update_subcategory_status');
Route::get('/deletesubcategory/{id}','SubCategoryController@deletesubcategory')->name('deletesubcategory');


// Admin Minisubcategory
Route::get('/view_minisubcategory','MiniSubCategoryController@view_minisubcategory')->name('view_minisubcategory');
Route::get('/add_minisubcategory_view','MiniSubCategoryController@add_minisubcategory_view')->name('add_minisubcategory_view');
Route::get('/update_minisubcategory_view/{id}','MiniSubCategoryController@update_minisubcategory_view')->name('update_minisubcategory_view');
Route::post('/add_minisubcategory_process','MiniSubCategoryController@add_minisubcategory_process')->name('add_minisubcategory_process');
Route::get('/update_minisubcategory_status/{status}/{id}','MiniSubCategoryController@update_minisubcategory_status')->name('update_minisubcategory_status');
Route::get('/deleteminisubcategory/{id}','MiniSubCategoryController@deleteminisubcategory')->name('deleteminisubcategory');


// Admin color
//For product type
Route::get('/add_color_view','ColorController@add_color_view')->name('add_color_view');
Route::get('/view_color','ColorController@view_color')->name('view_color');
Route::get('/update_color_view/{id}','ColorController@update_color_view')->name('update_color_view');
Route::post('/add_color_process','ColorController@add_color_process')->name('add_color_process');
Route::get('/update_color_status/{status}/{id}','ColorController@update_color_status')->name('update_color_status');
Route::get('/deleteColor/{id}','ColorController@deleteColor')->name('deleteColor');

// Admin gemstone
//only for product filters on frontend
Route::get('/add_gemstone_view','GemstoneController@add_gemstone_view')->name('add_gemstone_view');
Route::get('/view_gemstone','GemstoneController@view_gemstone')->name('view_gemstone');
Route::get('/update_gemstone_view/{id}','GemstoneController@update_gemstone_view')->name('update_gemstone_view');
Route::post('/add_gemstone_process','GemstoneController@add_gemstone_process')->name('add_gemstone_process');
Route::get('/update_gemstone_status/{status}/{id}','GemstoneController@update_gemstone_status')->name('update_gemstone_status');
Route::get('/deleteGemstone/{id}','GemstoneController@deleteGemstone')->name('deleteGemstone');

// Admin style
//only for product filters on frontend
Route::get('/add_style_view','StyleController@add_style_view')->name('add_style_view');
Route::get('/view_style','StyleController@view_style')->name('view_style');
Route::get('/update_style_view/{id}','StyleController@update_style_view')->name('update_style_view');
Route::post('/add_style_process','StyleController@add_style_process')->name('add_style_process');
Route::get('/update_style_status/{status}/{id}','StyleController@update_style_status')->name('update_style_status');
Route::get('/deleteStyle/{id}','StyleController@deleteStyle')->name('deleteStyle');

// Admin shape
//only for product filters on frontend
Route::get('/add_shape_view','ShapeController@add_shape_view')->name('add_shape_view');
Route::get('/view_shape','ShapeController@view_shape')->name('view_shape');
Route::get('/update_shape_view/{id}','ShapeController@update_shape_view')->name('update_shape_view');
Route::post('/add_shape_process','ShapeController@add_shape_process')->name('add_shape_process');
Route::get('/update_shape_status/{status}/{id}','ShapeController@update_shape_status')->name('update_shape_status');
Route::get('/deleteShape/{id}','ShapeController@deleteShape')->name('deleteShape');

// Admin motif
//add motifs for engrave products on header customize->Engravable Style part
Route::get('/add_motif_view','MotifController@add_motif_view')->name('add_motif_view');
Route::get('/view_motif','MotifController@view_motif')->name('view_motif');
Route::get('/update_motif_view/{id}','MotifController@update_motif_view')->name('update_motif_view');
Route::post('/add_motif_process','MotifController@add_motif_process')->name('add_motif_process');
Route::get('/update_motif_status/{status}/{id}','MotifController@update_motif_status')->name('update_motif_status');
Route::get('/deleteMotif/{id}','MotifController@deleteMotif')->name('deleteMotif');

// Admin plating
//only for product filters on frontend
Route::get('/add_plating_view','PlatingController@add_plating_view')->name('add_plating_view');
Route::get('/view_plating','PlatingController@view_plating')->name('view_plating');
Route::get('/update_plating_view/{id}','PlatingController@update_plating_view')->name('update_plating_view');
Route::post('/add_plating_process','PlatingController@add_plating_process')->name('add_plating_process');
Route::get('/update_plating_status/{status}/{id}','PlatingController@update_plating_status')->name('update_plating_status');
Route::get('/deletePlating/{id}','PlatingController@deletePlating')->name('deletePlating');

// Admin metal
//only for product filters on frontend
Route::get('/add_metal_view','MetalController@add_metal_view')->name('add_metal_view');
Route::get('/view_metal','MetalController@view_metal')->name('view_metal');
Route::get('/update_metal_view/{id}','MetalController@update_metal_view')->name('update_metal_view');
Route::post('/add_metal_process','MetalController@add_metal_process')->name('add_metal_process');
Route::get('/update_metal_status/{status}/{id}','MetalController@update_metal_status')->name('update_metal_status');
Route::get('/deleteMetal/{id}','MetalController@deleteMetal')->name('deleteMetal');

// Admin material
//only for product filters on frontend
Route::get('/add_material_view','MaterialController@add_material_view')->name('add_material_view');
Route::get('/view_material','MaterialController@view_material')->name('view_material');
Route::get('/update_material_view/{id}','MaterialController@update_material_view')->name('update_material_view');
Route::post('/add_material_process','MaterialController@add_material_process')->name('add_material_process');
Route::get('/update_material_status/{status}/{id}','MaterialController@update_material_status')->name('update_material_status');
Route::get('/deleteMaterial/{id}','MaterialController@deleteMaterial')->name('deleteMaterial');


// Admin size
//only for product filters on frontend
Route::get('/add_size_view','SizeController@add_size_view')->name('add_size_view');
Route::get('/view_size','SizeController@view_size')->name('view_size');
Route::get('/update_size_view/{id}','SizeController@update_size_view')->name('update_size_view');
Route::post('/add_size_process','SizeController@add_size_process')->name('add_size_process');
Route::get('/update_size_status/{status}/{id}','SizeController@update_size_status')->name('update_size_status');
Route::get('/deleteSize/{id}','SizeController@deleteSize')->name('deleteSize');


// Admin Product
Route::get('/add_product_view/{cid}/{sid}','ProductController@add_product_view')->name('add_product_view');
Route::get('/add_products_view','ProductController@add_products_view')->name('add_products_view');
Route::get('/update_product_view/{cid}/{sid}/{id}','ProductController@update_product_view')->name('update_product_view');

Route::get('/view_product_category','ProductController@view_product_category')->name('view_product_category');

Route::get('/view_product_subcategory/{id}','ProductController@view_product_subcategory')->name('view_product_subcategory');

Route::get('/view_product/{cid}/{sid}','ProductController@view_product')->name('view_product');

Route::post('/add_product_process/{cid}/{sid}','ProductController@add_product_process')->name('add_product_process');

Route::post('/add_products_process','ProductController@add_products_process')->name('add_products_process');

Route::get('/update_product_status/{status}/{cid}/{sid}/{id}','ProductController@update_product_status')->name('update_product_status');
Route::get('/deleteProduct/{cid}/{sid}/{id}','ProductController@deleteProduct')->name('deleteProduct');

//get subcategory and minisubcategory list in js on product add and update form
Route::post('/subcat_data','ProductController@subcat_data')->name('subcat_data');
Route::post('/minisubcat_data','ProductController@minisubcat_data')->name('minisubcat_data');



//Color and size in product
// Admin product types using color and prices
Route::get('/add_product_color_size_view/{pro_id}','ProductColorSizeController@add_product_color_size_view')->name('add_product_color_size_view');

Route::get('/view_product_color_size/{pro_id}','ProductColorSizeController@view_product_color_size')->name('view_product_color_size');

Route::get('/update_product_color_size_view/{id}','ProductColorSizeController@update_product_color_size_view')->name('update_product_color_size_view');

Route::post('/add_product_color_size_process','ProductColorSizeController@add_product_color_size_process')->name('add_product_color_size_process');

Route::get('/update_product_color_size_status/{status}/{pro_id}/{id}','ProductColorSizeController@update_product_color_size_status')->name('update_product_color_size_status');

Route::get('/deleteProductColorSize/{pro_id}/{id}','ProductColorSizeController@deleteProductColorSize')->name('deleteProductColorSize');

// // Admin size (not using in this project because size is not exist in this product)
Route::get('/add_product_size_view/{pro_id}','ProductSizeController@add_product_size_view')->name('add_product_size_view');

Route::get('/view_product_size/{pro_id}','ProductSizeController@view_product_size')->name('view_product_size');

Route::get('/update_product_size_view/{id}','ProductSizeController@update_product_size_view')->name('update_product_size_view');

Route::post('/add_product_size_process','ProductSizeController@add_product_size_process')->name('add_product_size_process');

Route::get('/update_product_size_status/{status}/{pro_id}/{id}','ProductSizeController@update_product_size_status')->name('update_product_size_status');

Route::get('/deleteProductSize/{pro_id}/{id}','ProductSizeController@deleteProductSize')->name('deleteProductSize');



// Admin Promocode
Route::get('/add_promocode_view','PromocodeController@add_promocode_view')->name('add_promocode_view');

Route::get('/update_promocode_view/{id}','PromocodeController@update_promocode_view')->name('update_promocode_view');

Route::get('/view_promocode','PromocodeController@view_promocode')->name('view_promocode');

Route::post('/add_promocode_process','PromocodeController@add_promocode_process')->name('add_promocode_process');

Route::get('/update_promocode_status/{status}/{id}','PromocodeController@update_promocode_status')->name('update_promocode_status');

Route::get('/deletePromocode/{id}','PromocodeController@deletePromocode')->name('deletePromocode');







// Admin Product Inventory
Route::get('/add_inventory_view/{id}','InventoryController@add_inventory_view')->name('add_inventory_view');

Route::get('/remove_inventory_view/{id}/{Iid}','InventoryController@remove_inventory_view')->name('remove_inventory_view');

Route::get('/view_inventory_category','InventoryController@view_inventory_category')->name('view_inventory_category');

Route::get('/view_inventory_subcategory/{id}','InventoryController@view_inventory_subcategory')->name('view_inventory_subcategory');

Route::get('/view_inventory_products/{cid}/{sid}','InventoryController@view_inventory_products')->name('view_inventory_products');

Route::get('/view_inventory/{id}','InventoryController@view_inventory')->name('view_inventory');

Route::get('/view_inventory_transaction','InventoryController@view_inventory_transaction')->name('view_inventory_transaction');

Route::post('/add_inventory_process','InventoryController@add_inventory_process')->name('add_inventory_process');

Route::post('/remove_inventory_process','InventoryController@remove_inventory_process')->name('remove_inventory_process');

Route::get('/deleteInventory/{id}','InventoryController@deleteInventory')->name('deleteInventory');


// Admin Catelogue
Route::get('/view_catelogue','CatelogueController@view_catelogue')->name('view_catelogue');

Route::get('/add_catelogue_view','CatelogueController@add_catelogue_view')->name('add_catelogue_view');

Route::get('/update_catelogue_view/{id}','CatelogueController@update_catelogue_view')->name('update_catelogue_view');

Route::post('/add_catelogue_process','CatelogueController@add_catelogue_process')->name('add_catelogue_process');

Route::get('/update_catelogue_status/{status}/{id}','CatelogueController@update_catelogue_status')->name('update_catelogue_status');

Route::get('/deleteCatelogue/{id}','CatelogueController@deleteCatelogue')->name('deleteCatelogue');


//admin can see user's catelogue requests apis
Route::get('view_user_catelogue', 'CatelogueController@view_user_catelogue')->name('view_user_catelogue');


// Admin can see user's product ask question apis
Route::get('/view_product_ask_question','AskQuestionController@view_product_ask_question')->name('view_product_ask_question');

// Admin can see user's and visitor's Contact informations
Route::get('/view_contact','ContactController@view_contact')->name('view_contact');

// Admin can see user's Wholesale Inquery
Route::get('/view_wholesale_inquiry','WholesaleInquiryController@view_wholesale_inquiry')->name('view_wholesale_inquiry');

// Admin can see user's Custom order
Route::get('/view_custom_order','CustomOrderController@view_custom_order')->name('view_custom_order');


//Admin can add and remove New & now products
Route::get('/view_new_and_now_category','NewArrivalController@view_new_and_now_category')->name('view_new_and_now_category');

Route::get('/view_new_and_now_subcategory/{id}','NewArrivalController@view_new_and_now_subcategory')->name('view_new_and_now_subcategory');

Route::get('/view_new_and_now_add_product/{cid}/{sid}','NewArrivalController@view_new_and_now_add_product')->name('view_new_and_now_add_product');

Route::get('/add_new_and_now_product/{cid}/{sid}/{id}','NewArrivalController@add_new_and_now_product')->name('add_new_and_now_product');

Route::get('/remove_new_and_now_product/{cid}/{sid}/{id}','NewArrivalController@remove_new_and_now_product')->name('remove_new_and_now_product');



//Admin Sale products (clearance products- code name )
Route::get('/view_sale_category','ClearanceController@view_sale_category')->name('view_sale_category');

Route::get('/view_sale_subcategory/{id}','ClearanceController@view_sale_subcategory')->name('view_sale_subcategory');

Route::get('/view_sale_add_product/{cid}/{sid}','ClearanceController@view_sale_add_product')->name('view_sale_add_product');

Route::get('/add_sale_product/{cid}/{sid}/{id}','ClearanceController@add_sale_product')->name('add_sale_product');

Route::get('/remove_sale_product/{cid}/{sid}/{id}','ClearanceController@remove_sale_product')->name('remove_sale_product');



//Admib Slider Apis
Route::get('/view_slider','SliderController@view_slider')->name('view_slider');

Route::get('/add_slider_view','SliderController@add_slider_view')->name('add_slider_view');

Route::get('/update_slider_view/{id}','SliderController@update_slider_view')->name('update_slider_view');

Route::post('/add_slider_process','SliderController@add_slider_process')->name('add_slider_process');

Route::get('/update_slider_status/{status}/{id}','SliderController@update_slider_status')->name('update_slider_status');

Route::get('/deleteSlider/{id}','SliderController@deleteSlider')->name('deleteSlider');

//home page slide banners
//Admin Slider2 Apis
Route::get('/view_slider2','Slider2Controller@view_slider2')->name('view_slider2');

Route::get('/update_slider2_view/{id}','Slider2Controller@update_slider2_view')->name('update_slider2_view');

Route::post('/update_slider2_process','Slider2Controller@update_slider2_process')->name('update_slider2_process');


// Admin GiftCard Apis
Route::get('/view_giftcard','GiftCardController@view_giftcard')->name('view_giftcard');

Route::get('/add_giftcard_view','GiftCardController@add_giftcard_view')->name('add_giftcard_view');

Route::get('/update_giftcard_view/{id}','GiftCardController@update_giftcard_view')->name('update_giftcard_view');

Route::post('/add_giftcard_process','GiftCardController@add_giftcard_process')->name('add_giftcard_process');

Route::get('/update_giftcard_status/{status}/{id}','GiftCardController@update_giftcard_status')->name('update_giftcard_status');

Route::get('/deleteGiftCard/{id}','GiftCardController@deleteGiftCard')->name('deleteGiftCard');




// Admin can add and update GiftCard Prices Apis
Route::get('/view_giftprice','GiftCardPriceController@view_giftprice')->name('view_giftprice');

Route::get('/add_giftprice_view','GiftCardPriceController@add_giftprice_view')->name('add_giftprice_view');

Route::get('/update_giftprice_view/{id}','GiftCardPriceController@update_giftprice_view')->name('update_giftprice_view');

Route::post('/add_giftprice_process','GiftCardPriceController@add_giftprice_process')->name('add_giftprice_process');

Route::get('/update_giftprice_status/{status}/{id}','GiftCardPriceController@update_giftprice_status')->name('update_giftprice_status');

Route::get('/deleteGiftprice/{id}','GiftCardPriceController@deleteGiftprice')->name('deleteGiftprice');


// Admin Blogs Apis
Route::get('/view_blog','BlogController@view_blog')->name('view_blog');

Route::get('/add_blog_view','BlogController@add_blog_view')->name('add_blog_view');

Route::get('/update_blog_view/{id}','BlogController@update_blog_view')->name('update_blog_view');

Route::post('/add_blog_process','BlogController@add_blog_process')->name('add_blog_process');

Route::get('/update_blog_status/{status}/{id}','BlogController@update_blog_status')->name('update_blog_status');

Route::get('/deleteBlog/{id}','BlogController@deleteBlog')->name('deleteBlog');




// Admin can add Contries Currency for frontend header choose options
Route::get('/add_currency_view','CountriesCurrency2@add_currency_view')->name('add_currency_view');
Route::get('/view_currency','CountriesCurrency2@view_currency')->name('view_currency');
Route::get('/update_currency_view/{id}','CountriesCurrency2@update_currency_view')->name('update_currency_view');
Route::post('/add_currency_process','CountriesCurrency2@add_currency_process')->name('add_currency_process');
Route::get('/update_currency_status/{status}/{id}','CountriesCurrency2@update_currency_status')->name('update_currency_status');
Route::get('/deleteCurrency/{id}','CountriesCurrency2@deleteCurrency')->name('deleteCurrency');


//Admin Package Item Apis
//In this admin can make pakages for user's for discount on every product of the website while order place with date and time duration
Route::get('/view_package','PackageController@view_package')->name('view_package');
Route::get('/add_package_view','PackageController@add_package_view')->name('add_package_view');
Route::get('/update_package_view/{id}','PackageController@update_package_view')->name('update_package_view');
Route::post('/add_package_process','PackageController@add_package_process')->name('add_package_process');
Route::get('/update_package_status/{status}/{id}','PackageController@update_package_status')->name('update_package_status');
Route::get('/deletePackage/{id}','PackageController@deletePackage')->name('deletePackage');


//---HOmepage Images-----
Route::get('/view_homepage_img','Homepage_images@view_homepage_img')->name('view_homepage_img');
Route::get('/add_homepage_image','Homepage_images@add_homapge_img_view')->name('add_homepage_image');
Route::post('/add_homepage_img_data','Homepage_images@add_homepage_img_process')->name('add_homepage_img_data');
Route::get('/update_homepage_image/{id}','Homepage_images@update_homapge_img_view')->name('update_homepage_image');






// Admin can see NewsLetter requests apis
Route::get('/view_newsletter','NewsLetterController@view_newsletter')->name('view_newsletter');


//admin can see product reviews
Route::get('/view_product_reviews','ReviewController@view_product_reviews')->name('view_product_reviews');


// Customize Part Start


// CRUD- admin can add , update, and remove Customize Categories for frontend header custimize part
Route::get('/view_customize_category','CustomizeController@view_category')->name('view_customize_category');
Route::get('/add_customize_category_view','CustomizeController@add_category_view')->name('add_customize_category_view');
Route::get('/update_customize_category_view/{id}','CustomizeController@update_category_view')->name('update_customize_category_view');
Route::post('/add_customize_category_process','CustomizeController@add_category_process')->name('add_customize_category_process');
Route::get('/update_customize_cat_status/{status}/{id}','CustomizeController@update_cat_status')->name('update_customize_cat_status');
Route::get('/deleteCustomizeCategory/{id}','CustomizeController@deleteCategory')->name('deleteCustomizeCategory');

// CRUD- admin can add , update, and remove Customize products for frontend header custimize part
// Customize Category product
Route::get('/view_customize_product/{id}','CustomizeController@view_product')->name('view_customize_product');
Route::get('/add_customize_product_view','CustomizeController@add_product_view')->name('add_customize_product_view');
Route::get('/update_customize_product_view/{id}','CustomizeController@update_product_view')->name('update_customize_product_view');
Route::post('/add_customize_product_process','CustomizeController@add_product_process')->name('add_customize_product_process');
Route::get('/update_customize_product_status/{status}/{id}','CustomizeController@update_product_status')->name('update_customize_product_status');
Route::get('/deleteCustomizeProduct/{id}','CustomizeController@deleteProduct')->name('deleteCustomizeProduct');

// CRUD- admin can add , update, and remove Customize products stones for frontend header custimize part
// Customize Category product stone
Route::get('/view_customize_product_stone/{id}','CustomizeController@view_customize_product_stone')->name('view_customize_product_stone');
Route::get('/add_customize_product_stone_view','CustomizeController@add_customize_product_stone_view')->name('add_customize_product_stone_view');
Route::get('/update_customize_product_stone_view/{id}','CustomizeController@update_customize_product_stone_view')->name('update_customize_product_stone_view');
Route::post('/add_customize_product_stone_process','CustomizeController@add_customize_product_stone_process')->name('add_customize_product_stone_process');
Route::get('/update_customize_product_stone_status/{status}/{id}','CustomizeController@update_customize_product_stone_status')->name('update_customize_product_stone_status');
Route::get('/deleteCustomizeProductStone/{id}','CustomizeController@deleteCustomizeProductStone')->name('deleteCustomizeProductStone');


// CRUD- admin can add , update, and remove Customize products color for frontend header custimize part
// Customize metal color
Route::get('/view_customize_color','CustomizeController@view_color')->name('view_customize_color');
Route::get('/add_customize_color_view','CustomizeController@add_color_view')->name('add_customize_color_view');
Route::get('/update_customize_color_view/{id}','CustomizeController@update_color_view')->name('update_customize_color_view');
Route::post('/add_customize_color_process','CustomizeController@add_color_process')->name('add_customize_color_process');
Route::get('/update_customize_color_status/{status}/{id}','CustomizeController@update_color_status')->name('update_customize_color_status');
Route::get('/deleteCustomizeColor/{id}','CustomizeController@deleteColor')->name('deleteCustomizeColor');


// Customize Part End


//engrave Part start

// CRUD- admin can add , update, and remove Engrave Categories  for frontend header custimize->Engravable Styles part
// Engrave Category
Route::get('/view_engrave_category','EngraveController@view_category')->name('view_engrave_category');
Route::get('/add_engrave_category_view','EngraveController@add_category_view')->name('add_engrave_category_view');
Route::get('/update_engrave_category_view/{id}','EngraveController@update_category_view')->name('update_engrave_category_view');
Route::post('/add_engrave_category_process','EngraveController@add_category_process')->name('add_engrave_category_process');
Route::get('/update_engrave_cat_status/{status}/{id}','EngraveController@update_cat_status')->name('update_engrave_cat_status');
Route::get('/deleteEngraveCategory/{id}','EngraveController@deleteCategory')->name('deleteEngraveCategory');


// CRUD- admin can add , update, and remove Engrave products for frontend header custimize->Engravable Styles part
// Engrave Category product
Route::get('/view_engrave_product/{id}','EngraveController@view_product')->name('view_engrave_product');
Route::get('/add_engrave_product_view','EngraveController@add_product_view')->name('add_engrave_product_view');
Route::get('/update_engrave_product_view/{id}','EngraveController@update_product_view')->name('update_engrave_product_view');
Route::post('/add_engrave_product_process','EngraveController@add_product_process')->name('add_engrave_product_process');
Route::get('/update_engrave_product_status/{status}/{id}','EngraveController@update_product_status')->name('update_engrave_product_status');
Route::get('/deleteEngraveProduct/{id}','EngraveController@deleteProduct')->name('deleteEngraveProduct');


//engrave Part End



//Admin can see user's placed orders in admin sidebar orders tab
Route::get('/view_orders','OrderController@view_orders')->name('view_orders');
Route::get('/new_orders','OrderController@new_orders')->name('new_orders');
Route::get('/dispatched_orders','OrderController@dispatched_orders')->name('dispatched_orders');
Route::get('/completed_orders','OrderController@completed_orders')->name('completed_orders');
Route::get('/rejected_orders','OrderController@rejected_orders')->name('rejected_orders');
Route::get('/view_ordered_product_details/{id}','OrderController@view_ordered_product_details')->name('view_ordered_product_details');
Route::get('/updateordersStatus/{id}/{type}','OrderController@updateordersStatus')->name('updateordersStatus');

Route::get('/order_bill/{id}','OrderController@view_order_bill')->name('order_bill');

//admin add track id for user orders tracking on frontend
Route::get('/add_order_track_view/{id}','OrderController@add_order_track_view')->name('add_order_track_view');
Route::post('/add_track_id_process/{id}','OrderController@add_track_id_process')->name('add_track_id_process');





//----------------- Frontend web apis -----------------//


//open login signup page and functionality on frontend
Route::get('/open_login/{id?}','frontend\LoginController@open_login')->name('open_login');
Route::post('/register_process','frontend\LoginController@register_process')->name('register_process');
Route::post('/login_process','frontend\LoginController@login_process')->name('login_process');

Route::get('/logout','frontend\LoginController@logout')->name('logout');

Route::get('/forgot_password','frontend\LoginController@forgot_password')->name('forgot_password');
Route::post('/form_submit_forgotpassword','frontend\LoginController@form_submit_forgotpassword')->name('form_submit_forgotpassword');
Route::get('/forget_password_reset/{id}','frontend\LoginController@forget_password_reset')->name('forget_password_reset');
Route::post('/update_password/{id}','frontend\LoginController@update_password')->name('update_password');

//User Profile Apis
Route::get('/user_profile','frontend\LoginController@user_profile')->name('user_profile');

Route::get('/edit_user_profile','frontend\LoginController@edit_user_profile')->name('edit_user_profile');

Route::post('/edit_user_profile_process','frontend\LoginController@edit_user_profile_process')->name('edit_user_profile_process');

Route::get('/comming_soon','frontend\HomeController@comming_soon')->name('comming_soon');



//Color onchange color image and price ajax api on product details page and cart page
Route::post('/get_color_data','frontend\HomeController@get_color_data')->name('get_color_data');
//color onchange price ajax api
Route::post('/get_color_price','frontend\HomeController@get_color_price')->name('get_color_price');


//open home and products list pages frontend pages api
Route::get('/index','frontend\HomeController@index')->name('index');
Route::get('/manufacture','frontend\HomeController@manufacture')->name('manufacture');
Route::get('/all_products/{id}/{m_id?}','frontend\HomeController@all_products')->name('all_products');

//products list on categories wise on click header categories
Route::get('/category_products/{id}','frontend\HomeController@category_products')->name('category_products');

//single product details page
Route::get('/products_view/{id}','frontend\HomeController@products_view')->name('products_view');

//new & now products page api
Route::get('/new_and_now_products','frontend\HomeController@new_and_now_products')->name('new_and_now_products');


//Sale products page api (code name- clearence products)
Route::get('/sale_products','frontend\HomeController@sale_products')->name('sale_products');


// Frontend product ask question apis on product deatail page
Route::post('/add_product_askquestion_process','frontend\HomeController@add_product_askquestion_process')->name('add_product_askquestion_process');

// Frontend contact us apis
Route::get('/view_contact_page','frontend\HomeController@view_contact_page')->name('view_contact_page');
Route::post('/add_contact_process','frontend\HomeController@add_contact_process')->name('add_contact_process');

// Frontend wholesale inquiry apis on header top Wholesale Inquery tab
Route::get('/view_wholesale_inquiry_page','frontend\HomeController@view_wholesale_inquiry_page')->name('view_wholesale_inquiry_page');
Route::post('/add_wholesale_inquery_process','frontend\HomeController@add_wholesale_inquery_process')->name('add_wholesale_inquery_process');

// Frontend custom orders  apis on header top Custom Order tab
Route::get('/view_custom_order_page','frontend\HomeController@view_custom_order_page')->name('view_custom_order_page');
Route::post('/add_custom_order_process','frontend\HomeController@add_custom_order_process')->name('add_custom_order_process');


//Cart apis
//add to cart after login from everywhere product in the website
Route::get('/view_cart','frontend\CartController@view_cart')->name('view_cart');
Route::post('/check_Inventory','frontend\CartController@check_Inventory')->name('check_Inventory');
Route::post('/add_to_cart_online','frontend\CartController@add_to_cart_online')->name('add_to_cart_online');

Route::post('/get_cart_pro_full_data','frontend\CartController@get_cart_pro_full_data')->name('get_cart_pro_full_data');

Route::post('/update_qty_in_tbl_cart','frontend\CartController@update_qty_in_tbl_cart')->name('update_qty_in_tbl_cart');

Route::post('/delete_from_tbl_cart','frontend\CartController@delete_from_tbl_cart')->name('delete_from_tbl_cart');

//cart handling after login
//check cart products after login in the website using js
Route::post('/check_localcart','frontend\CartController@check_localcart')->name('check_localcart');
Route::post('/check_localcart_frm_tbl','frontend\CartController@check_localcart_frm_tbl')->name('check_localcart_frm_tbl');

//Frontend Order Place Apis
Route::get('/checkout','frontend\OrderController@checkout')->name('checkout');

Route::post('/order_place','frontend\OrderController@order_place')->name('order_place');
Route::post('/isValidPromocodeforcheckout','frontend\OrderController@isValidPromocodeforcheckout')->name('isValidPromocodeforcheckout');
Route::post('/isValidGiftPromoforcheckout','frontend\OrderController@isValidGiftPromoforcheckout')->name('isValidPromocodeforcheckout');

Route::get('/order_success','frontend\OrderController@order_success')->name('order_success');
Route::get('/orderfailed','frontend\OrderController@orderfailed')->name('orderfailed');
Route::get('/delete_address/{id}','frontend\OrderController@delete_address')->name('delete_address');


//open my orders page api
Route::get('/my_orders','frontend\OrderController@my_orders')->name('my_orders');
Route::get('/cancel_order/{id}','frontend\OrderController@cancel_order')->name('cancel_order');


// Frontend Address apis
Route::get('/add_address','frontend\AddressController@add_address')->name('add_address');
Route::post('/add_address_process','frontend\AddressController@add_address_process')->name('add_address_process');

//Frontend Rating Apis
Route::post('/add_product_review','frontend\RatingController@add_product_review')->name('add_product_review');

//Frontend blog apis
Route::get('/view_blog_detail','frontend\BlogController@view_blog_detail')->name('view_blog_detail');
Route::get('/view_blog/{id}','frontend\BlogController@view_blog')->name('view_blog');

//search api for frontend
Route::post('/search_results','frontend\HomeController@search_results')->name('search_results');
Route::post('/search_products','frontend\HomeController@search_products')->name('search_products');

//Frontend Send GiftCard To A Friend  Pages apis
Route::get('/send_giftcard_view','frontend\GiftCardController@send_giftcard_view')->name('send_giftcard_view');
Route::get('/open_giftcard_checkout/{id}','frontend\GiftCardController@open_giftcard_checkout')->name('open_giftcard_checkout');
Route::post('/giftcard_checkout','frontend\GiftCardController@giftcard_checkout')->name('giftcard_checkout');
Route::get('/giftcard_order_place/{id}','frontend\GiftCardController@giftcard_order_place')->name('giftcard_order_place');


//Frontend Wishlist Apis
Route::post('/add_to_wishlist','frontend\WishlistController@add_to_wishlist')->name('add_to_wishlist');
Route::post('/remove_from_wishlist','frontend\WishlistController@remove_from_wishlist')->name('remove_from_wishlist');
Route::get('/get_wishlist','frontend\WishlistController@get_wishlist')->name('get_wishlist');
Route::get('/isValidPromocode','frontend\OrderController@isValidPromocode')->name('isValidPromocode');


// Frontend footer pages apis
Route::get('/FAQ','frontend\HomeController@FAQ')->name('FAQ');
Route::get('/stonechart','frontend\HomeController@stonechart')->name('stonechart');
Route::get('/stonechartstable','frontend\HomeController@stonechartstable')->name('stonechartstable');
Route::get('/sizeguides','frontend\HomeController@sizeguides')->name('sizeguides');
Route::get('/sizeguidestable','frontend\HomeController@sizeguidestable')->name('sizeguidestable');
Route::get('/virtualshoping','frontend\HomeController@virtualshoping')->name('virtualshoping');
Route::get('/appointment_type','frontend\HomeController@appointment_type')->name('appointment_type');
Route::post('/booking_appointment','frontend\HomeController@booking_appointment')->name('booking_appointment');
Route::get('/delivery_and_returns','frontend\HomeController@delivery_and_returns')->name('delivery_and_returns');
Route::get('/contact_us','frontend\HomeController@contact_us')->name('contact_us');
// Route::get('/terms_and_conditions','frontend\HomeController@terms_and_conditions')->name('terms_and_conditions');


Route::get('/add_to_cart_local/{id}','frontend\CartController@add_to_cart_local')->name('add_to_cart_local');
Route::post('/add_to_cart_local2','frontend\CartController@add_to_cart_local2')->name('add_to_cart_local2');
Route::get('/delete_product_cart/{id}/{id2}','frontend\CartController@delete_product_cart')->name('delete_product_cart');
Route::post('/update_cart','frontend\CartController@update_cart')->name('update_cart');
Route::post('/delete_sc_custom','frontend\CartController@delete_sc_custom')->name('delete_sc_custom');
Route::post('/delete_sc_ecustom','frontend\CartController@delete_sc_ecustom')->name('delete_sc_ecustom');



Route::get('/our_story','frontend\HomeController@our_story')->name('our_story');
Route::get('/repair_policy','frontend\HomeController@repair_policy')->name('repair_policy');
Route::get('/packaging','frontend\HomeController@packaging')->name('packaging');
Route::get('/our_materials','frontend\HomeController@our_materials')->name('our_materials');
Route::get('/catalogpage','frontend\HomeController@catalogpage')->name('catalogpage');
Route::get('/careers','frontend\HomeController@careers')->name('careers');

Route::get('/terms_and_conditions','frontend\HomeController@terms_and_conditions')->name('terms_and_conditions');
Route::get('/fitness_trainer_terms_and_conditions','frontend\HomeController@fitness_trainer_terms_and_conditions')->name('fitness_trainer_terms_and_conditions');
Route::get('/privacy_policy','frontend\HomeController@privacy_policy')->name('privacy_policy');
Route::get('/Refund_Policy','frontend\HomeController@Refund_Policy')->name('Refund_Policy');


// Frontend user catelogue send request apis
Route::post('user_catelogue_request', 'frontend\HomeController@user_catelogue_request')->name('user_catelogue_request');


// Frontend Add NewsLetter apis
Route::post('/add_newsletter_process','frontend\HomeController@add_newsletter_process')->name('add_newsletter_process');



//Frontend Refer A Friend  page apis on footer refer afriend option
Route::get('/refer_friend_view','frontend\HomeController@refer_friend_view')->name('refer_friend_view');
Route::get('/refer_a_friend/{id}','frontend\HomeController@refer_a_friend')->name('refer_a_friend');
Route::post('/refer_friend_process','frontend\HomeController@refer_friend_process')->name('refer_friend_process');
Route::post('/refer_a_friend_process/{id}','frontend\HomeController@refer_a_friend_process')->name('refer_a_friend_process');


//frontend  product rating Apis
Route::post('/add_product_rating/{id}','frontend\HomeController@add_product_rating')->name('add_product_rating');


//paypal apis
// Route::get('payment', 'PaymentController@index');
Route::get('charge/{amu}/{id}', 'frontend\OrderController@charge')->name('charge');
Route::get('paymentsuccess/{id}', 'frontend\OrderController@payment_success')->name('paymentsuccess');
Route::get('paymenterror', 'frontend\OrderController@payment_error')->name('paymenterror');

//paypal apis
Route::get('giftcharge/{amu}/{id}', 'frontend\GiftCardController@charge')->name('giftcharge');
Route::get('giftpaymentsuccess/{id}', 'frontend\GiftCardController@payment_success')->name('giftpaymentsuccess');
Route::get('giftpaymenterror', 'frontend\GiftCardController@payment_error')->name('giftpaymenterror');


//Frontend Currency change on website header country list
Route::get('currency_data/{id}', 'frontend\HomeController@currency_data')->name('currency_data');


//frontend Customize apis on website header custimize->Colo Bar part
Route::get('customize_category', 'frontend\CustomizeController@customize_category')->name('customize_category');
Route::get('color_bar_category', 'frontend\CustomizeController@color_bar_category')->name('color_bar_category');
Route::get('customize_subcategory/{id}', 'frontend\CustomizeController@customize_subcategory')->name('customize_subcategory');
Route::get('customize_diamond/{id}', 'frontend\CustomizeController@customize_diamond')->name('customize_diamond');

//frontend engraving apis on website header custimize->Colo Bar part
Route::get('engrave_category', 'frontend\CustomizeController@engrave_category')->name('engrave_category');
Route::get('engrave_subcategory/{id}', 'frontend\CustomizeController@engrave_subcategory')->name('engrave_subcategory');
Route::get('engrave_diamond/{id}', 'frontend\CustomizeController@engrave_diamond')->name('engrave_diamond');
Route::get('engrave_products_view/{id}', 'frontend\CustomizeController@engrave_products_view')->name('engrave_products_view');


//Metal onchange customize product metal image ajax api (customize product page on website header custimize->Colo Bar part )
Route::post('/get_metal_blank_data','frontend\CustomizeController@get_metal_blank_data')->name('get_metal_blank_data');
Route::post('/get_metal_stone_data','frontend\CustomizeController@get_metal_stone_data')->name('get_metal_stone_data');


// Frontend Packages (Frontend footer packages tab) and buy packages
Route::get('Packages', 'frontend\PackageController@Packages')->name('Packages');
Route::get('Buy_Package/{id}', 'frontend\PackageController@Buy_Package')->name('Buy_Package');

Route::get('packagepaymentsuccess/{id}/{p_id}', 'frontend\PackageController@packagepaymentsuccess')->name('packagepaymentsuccess');
Route::get('packagepaymenterror', 'frontend\PackageController@packagepaymenterror')->name('packagepaymenterror');

Route::get('/package_order_success','frontend\PackageController@package_order_success')->name('package_order_success');
Route::get('/package_orderfailed','frontend\PackageController@package_orderfailed')->name('package_orderfailed');

//note: add check_localcart_frm_tbl in cart controller(manage and insert cart data, locat to tbl cart)- Done On 24 april 2021
