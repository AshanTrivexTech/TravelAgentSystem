<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes TT
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now creates something great!
|
*/
//dashboard
Route::get('/','dashboardController@index');
Route::get('/admin/dashboard','dashboardController@index');
Route::post('/dashboard/load/data','dashboardController@load_dashbord_data')->name('load_dashbord_data');

//users

//Route::get('/users/load', 'userController@create')->name('user_load');
Route::get('/users/index', 'userController@index')->name('user_index');
Route::post('/users/delete', 'userController@destroy')->name('user_delete');
Route::get('/user/load/{id}/details','userController@add_user_privileges')->name('load_user_details');
Route::post('/user/livesearch','userController@liveSearch')->name('user_liveSearch');
Route::post('/users/privileges/update', 'userController@update')->name('privilege_update');
Route::get('/users/privileges/{id}/add', 'userController@load_user_privileges')->name('privilege_create');
Route::get('/users/privileges/index', 'userController@asign_user_privileges')->name('user_privileges');
//Hotel Routes


Route::get('/hotel/index','hotelController@index')->name('hotel_index');
//Route::get('/hotel/{id}/edit','hotelController@edit')->name('edit_hotels');
Route::get('/hotel/create','hotelController@create')->name('add_hotel');
Route::post('/hotel/store','hotelController@store')->name('add_store');
Route::get('/hotel/{hotel_supID}/edit','hotelController@edit')->name('add_edit');
Route::post('/hotel/update','hotelController@update')->name('hotel_update');
Route::post('/hotel/delete','hotelController@destroy')->name('hotel_delete');
Route::post('/hotel/liveSearch','hotelController@live_Search')->name('hotel_live_search');
Route::post('/hotel/load','hotelController@view_contacts')->name('view_hotelcontacts');

Route::get('/hoteltype/list','hotelTypeController@listIndex')->name('hotel_type_list');

//countries

Route::get('/countries/{e}/index','exceptionController@index')->name('exception_load');

//hotel features
Route::get('/hotel/features/create','hotel_featureController@create')->name('load_hotel_features');
Route::post('hotel/feature/store','hotel_featureController@store')->name('store_features');
//Route::get('/hotel/features/index','hotel_featureController@index')->name('index_hotel_feature');
Route::get('/hotel/feature/index','hotel_featureController@index')->name('feature_index');
Route::get('/hotel/feature/{id}/edit','hotel_featureController@edit')->name('feature_edit');
Route::post('/hotel/feature/delete','hotel_featureController@destroy')->name('hotel_features_delete');
Route::post('/hotel/feature/update','hotel_featureController@update')->name('feature_update');


//country

Route::get('/country/index','countryController@index')->name('load_country');



//--------City------------
Route::get('/city/create','cityController@create')->name('city_load');
Route::post('/city/store', 'cityController@store')->name('city_store');
Route::get('/city/index', 'cityController@index')->name('city_index');
Route::get('/city/{id}/edit','cityController@edit')->name('city_edit');
Route::post('/city/update','cityController@update')->name('city_update');
Route::post('/city/delete','cityController@destroy')->name('city_delete');
Route::post('/city/serach','cityController@livesearch')->name('city_livesearch');
//----Dropdown Select request-----------
Route::post('/city/list','cityController@selectIndexByCity')->name('select_city');

//-------Currency--------

Route::get('/currency/create','currencyController@create')->name('currency_load');
Route::post('/currency/store', 'currencyController@store')->name('currency_store');
Route::get('/currency/index', 'currencyController@index')->name('currency_index');
Route::get('/currency/{id}/edit','currencyController@edit')->name('currency_edit');
Route::post('/currency/update','currencyController@update')->name('currency_update');
Route::post('/currency/delete','currencyController@destroy')->name('currency_delete');
Route::post('/currency/search','currencyController@livesearch')->name('currency_livesearch');

//--------Currency Exchange Rate------

Route::get('/currency/exchange/create','currencyExchangeRateController@create')->name('currencyEx_load');
Route::post('/currency/exchange/store','currencyExchangeRateController@store')->name('currencyEx_store');
Route::post('/currency/exchange/list','currencyExchangeRateController@selectIndexByCurrencyType')->name('select_currencies');
Route::get('/currency/exchange/index','currencyExchangeRateController@index')->name('currencyEx_index');
Route::get('/currency/exchange/{id}/edit','currencyExchangeRateController@edit')->name('currencyEx_edit');
Route::post('/currency/exchange/update','currencyExchangeRateController@update')->name('currencyEx_update');
Route::post('/currency/exchange/delete','currencyExchangeRateController@destroy')->name('currencyEx_delete');
Route::post('/currency/exchange/search','currencyExchangeRateController@livesearch')->name('currencyEx_livesearch');
Route::get('/currency/exchange/manage','currencyExchangeRateController@create_excahnge_manage')->name('create_ex_rate_manage');

//-------District--------

Route::get('/district/create','districtController@create')->name('district_load');
Route::post('/district/store','districtController@store' )->name('district_store');
Route::get('/district/index','districtController@index')->name('district_index');
Route::get('/district/{id}/edit','districtController@edit')->name('edit_district');
Route::post('/district/update','districtController@update')->name('update_district');
Route::post('/district/delete','districtController@destroy')->name('district_delete');
Route::post('/district/serach','districtController@livesearch')->name('district_livesearch');
//----Dropdown Select request-----------
Route::post('/district/list','districtController@selectIndexByCountry')->name('select_districts');


//-------Markets----------

Route::get('/market/create','marketController@create')->name('market_load');
Route::post('/market/store','marketController@store')->name('market_store');
Route::get('/market/index','marketController@index')->name('market_index');
Route::get('/market/{id}/edit','marketController@edit')->name('market_edit');
Route::post('/market/update','marketController@update')->name('market_update');
Route::post('/markets/delete','marketController@destroy')->name('market_delete');
Route::post('/markets/serach','marketController@livesearch')->name('market_livesearch');

//-------Optional Supplement--------
//Route::get('/ops/create','optionalSuplimentController@create')->name('osupplement_load');
Route::get('/opsup/{id}/create','optionalSuplimentController@create')->name('optional_create');
Route::post('/ops/store','optionalSuplimentController@store')->name('osupplement_store');
Route::get('/ops/{id}/index','optionalSuplimentController@index')->name('osupplement_index');
Route::get('/ops/{id}/edit','optionalSuplimentController@edit')->name('osupplement_edit');
Route::post('/ops/update','optionalSuplimentController@update')->name('osupplement_update');
Route::Post('/ops/delete','optionalSuplimentController@destroy')->name('osupplement_delete');

//-------Compulsory Supplement--------
// Route::get('/comps/{id}/create','compulsorySuplimentController@create')->name('comsup_load');
Route::get('/compulsories/create','compulsorySuplimentController@create')->name('create_new_compulsory_sup');
Route::post('/comps/store','compulsorySuplimentController@store')->name('comsup_store');
Route::get('/comps/index','compulsorySuplimentController@index')->name('comsup_index');
Route::get('/comps/{id}/edit','compulsorySuplimentController@edit')->name('comsup_edit');
Route::post('/comps/update','compulsorySuplimentController@update')->name('comsup_update');
Route::post('/comps/delete','compulsorySuplimentController@destroy')->name('comsup_delete');
Route::post('/comps/liveSearch','compulsorySuplimentController@liveSearch')->name('compulsories_liveSearch');

//-----Vehicle Supplier------------------
Route::get('/vehicle/supplier/index','vehicleController@index')->name('vehicle_sup_index');
Route::get('/vehicle/supplier/create','vehicleController@create')->name('vehicle_sup_create');
Route::post('/vehicle/supplier/store','vehicleController@store')->name('vehicle_sup_store');
Route::get('/vehicle/supplier/{id}/edit','vehicleController@edit')->name('vehicle_sup_edit');
Route::post('/vehicle/supplier/update','vehicleController@update')->name('vehicle_sup_update');
Route::post('/vehicle/supplier/delete','vehicleController@destroy')->name('vehicle_sup_delete');
Route::post('/vehicle/supplier/liveSearch','vehicleController@vSup_liveSearch')->name('v_sup_liveSearch');
Route::post('/vehicle/supplier/load','vehicleController@view_contacts')->name('view_vehicleSuppliercontacts');


//----------Vehicles------------------
Route::get('/vehicle/index','vehicleController@indexVehicleAll')->name('vehicles_index');
Route::get('/supplier/{supID}/vehicle/index','vehicleController@indexVehicle')->name('vehicle_index');
Route::get('/supplier/vehicle/create','vehicleController@createVehicle')->name('vehicle_create');
Route::post('/supplier/vehicle/store','vehicleController@storeVehicle')->name('vehicle_store');
Route::get('/supplier/vehicle/{id}/edit','vehicleController@editVehicle')->name('vehicle_edit');
Route::post('/supplier/vehicle/update','vehicleController@updateVehicle')->name('vehicle_update');
Route::post('/supplier/vehicle/delete','vehicleController@destroyVehicle')->name('vehicle_delete');
Route::post('/vehicle/all/liveSearch','vehicleController@allSearch')->name('vehicl_all_search');


//----------Vehicle Type-------------
Route::get('/vehicle/type/create','vehicleTypeController@create')->name('create_vehicle');
Route::post('/vehicle/type/store','vehicleTypeController@store')->name('store_vehicle');
Route::get('/vehicle/type/index','vehicleTypeController@index')->name('load_vehcles');
Route::get('/vehicle/type/{id}/edit','vehicleTypeController@edit')->name('edit_vehicle');
Route::post('/vehivle/type/update','vehicleTypeController@update')->name('update_vehicle');
Route::post('/vehicle/type/delete','vehicleTypeController@destroy')->name('delete_vehicle_type');
Route::post('/vehicle/type/liveSearch','vehicleTypeController@v_typeLiveSearch')->name('V_type_liveSearch');
//----------Hotel Package----------
Route::get('/hotel/package/create','hotelPackageController@create')->name('create_hotel_package');
Route::post('/hotel/package/store','hotelPackageController@store')->name('store_package');
Route::get('/hotel/package/index','hotelPackageController@index')->name('package_index');
Route::get('/hotel/package/{id}/edit','hotelPackageController@edit')->name('edit_packages');
Route::post('/hotel/package/update','hotelPackageController@update')->name('package_update');
Route::post('/hotel/package/delete','hotelPackageController@destroy')->name('package_delete');
Route::post('/hotel/package/liveSearch','hotelPackageController@live_Search')->name('live_search_packages');

//----------Package Period-----------
Route::get('/package/period/create','packagePeriodController@create')->name('create_period');
Route::post('/package/period/store','packagePeriodController@store')->name('store_period');
Route::get('/package/period/{id}/edit','packagePeriodController@edit')->name('edit_period');
Route::post('/package/period/update','packagePeriodController@update')->name('update_period');
Route::get('/package/period/index','packagePeriodController@index')->name('period_index');
Route::post('/package/period/delete','packagePeriodController@destroy')->name('delete_period');

//------Hotel Groups---------
Route::get('/hotel/groups/create','hotelGroupController@create' )->name('hotelgroup_create');
Route::post('/hotel/groups/store','hotelGroupController@store' )->name('hotelgroup_store');
Route::get('/hotel/groups/index','hotelGroupController@index' )->name('hotelgroup_index');
Route::get('/hotel/groups/{id}/edit','hotelGroupController@edit' )->name('hotelgroup_edit');
Route::post('/hotel/groups/update','hotelGroupController@update' )->name('hotelgroup_update');
Route::post('/hotel/groups/delete','hotelGroupController@destroy' )->name('hotelgroup_delete');
Route::post('/hotel/groups/livesearch','hotelGroupController@gropu_live_search')->name('hotel_group_liveSearch');

//country live srarch
Route::post('/country/search','countryController@liveSearch')->name('search_country');


//------Location Details-------
Route::get('/location/index','locationController@index')->name('location_index');
Route::get('/location/create','locationController@create')->name('location_create');
Route::post('/location/store', 'locationController@store')->name('location_store');
Route::get('/location/{id}/edit', 'locationController@edit')->name('location_edit');
Route::post('/location/update', 'locationController@update')->name('location_update');
Route::post('/location/delete','locationController@destroy')->name('location_delete');
Route::post('/location/serach','locationController@livesearch')->name('location_livesearch');
Route::get('location/ss/create','locationController@siteSeen_create')->name('siteSeen_create');
Route::post('/location/ss/store','locationController@stieSeen_store')->name('siteSeen_store');


//---------Distance Details-----------
Route::get('/distance/index','distanceController@index')->name('distance_index');
Route::get('/distance/create','distanceController@create')->name('distance_create');
Route::post('/distance/store','distanceController@store')->name('distance_store');
Route::get('/distance/{id}/edit','distanceController@edit')->name('distance_edit');
Route::Post('/distance/update','distanceController@update')->name('distance_update');
Route::post('/distance/location/list','distanceController@selectIndexLocations')->name('dis_location_list');
Route::post('/distance/serach','distanceController@livesearch')->name('distance_livesearch');

//--------miscellanes----------
Route::get('/miscellanies/create','miscellaniesController@create')->name('create_miscellanies');
Route::post('/miscellanies/store','miscellaniesController@store')->name('store_miscellanies');
Route::get('/miscellanies/{id}/edit','miscellaniesController@edit')->name('edit_miscellanies');
Route::post('/miscellanies/update','miscellaniesController@update')->name('update_miscellanies');
Route::get('/miscellanies/index','miscellaniesController@index')->name('index_miscellanies');
Route::post('/miscellanies/delete','miscellaniesController@destroy')->name('delete_miscellanies');
Route::post('/miscellanies/search','miscellaniesController@live_search')->name('misc_search');

//--------Miscellaneous types---------
Route::get('/Miscellaneous/types/create','miscellaneousTypeController@create')->name('MiscellaneousTypes_create');
Route::post('/Miscellaneous/types/store','miscellaneousTypeController@store')->name('MiscellaneousTypes_store');
Route::get('/Miscellaneous/types/index','miscellaneousTypeController@index')->name('MiscellaneousTypes_index');
Route::post('/Miscellaneous/types/delete','miscellaneousTypeController@destroy')->name('MiscellaneousTypes_delete');
Route::post('/Miscellaneous/types/serach','miscellaneousTypeController@livesearch')->name('msctype_livesearch');


//--------Miscellaneous Category---------
Route::get('/Miscellaneous/category/create','miscellaneousCategoryController@create')->name('miscellaneousCategory_create');
Route::post('/Miscellaneous/category/store','miscellaneousCategoryController@store')->name('miscellaneousCategory_store');
Route::get('/Miscellaneous/category/index','miscellaneousCategoryController@index')->name('miscellaneousCategory_index');
Route::post('/Miscellaneous/category/delete','miscellaneousCategoryController@destroy')->name('miscellaneousCategory_delete');
Route::get('/Miscellaneous/category/{id}/edit','miscellaneousCategoryController@edit')->name('miscellaneousCategory_edit');
Route::post('/Miscellaneous/category/update','miscellaneousCategoryController@update')->name('miscellaneousCategory_update');
Route::post('/Miscellaneous/category/search','miscellaneousCategoryController@liveSearch')->name('ms_liveSearch');

//---------guide--------
Route::get('/guide/create','guideController@create')->name('create_guide');
Route::post('/guide/store','guideController@store')->name('store_guide');
Route::get('/guide/index','guideController@index')->name('index_guide');
Route::get('/guide/{id}/edit','guideController@edit')->name('edit_guide');
Route::post('/guide/update','guideController@update')->name('update_guide');
Route::post('/guide/delete','guideController@destroy')->name('delete_guide');
Route::post('/guide/lang/list','guideController@selectIndexOnLang')->name('guide_lang_list');
Route::post('/guide/serach','guideController@livesearch')->name('guide_livesearch');
Route::post('/guide/load','guideController@view_contacts')->name('view_guidecontacts');

//---------Guide Rooms--------
Route::get('/guideroom/create','guideRoomController@create')->name('guideroom_create');
Route::post('/guideroom/store','guideRoomController@store')->name('guideroom_store');
Route::get('/guideroom/index','guideRoomController@index')->name('guideroom_index');
Route::post('/guideroom/delete','guideRoomController@destroy')->name('guideroom_delete');
Route::get('/guideroom/{id}/edit','guideRoomController@edit')->name('guideroom_edit');
Route::post('/guideroom/update','guideRoomController@update')->name('guideroom_update');
Route::post('/guideroom/update/search','guideRoomController@liveSearch')->name('guide_liveSearch');

//---------Guide Language Rate--------
Route::get('/guide/languagerate/create','guideLanuageRateController@create')->name('guidelanguagerate_create');
Route::post('/guide/languagerate/store','guideLanuageRateController@store')->name('guidelanguagerate_store');
Route::post('/guide/languagerate/delete','guideLanuageRateController@destroy')->name('guidelanguagerate_delete');
Route::get('/guide/languagerate/index','guideLanuageRateController@index')->name('guidelanguagerate_index');
Route::post('/guide/languagerate/serach','guideLanuageRateController@livesearch')->name('guidelangrate_livesearch');
Route::get('/guide/languagerate/{id}/edit','guideLanuageRateController@edit')->name('guidelangrate_edit');
Route::post('/guide/languagerate/update','guideLanuageRateController@update')->name('guidelangrate_update');

//view lanuages
Route::get('/guide/view/{id}/languages','guideLanguageController@index')->name('load_guid_lanuages');
Route::get('/guide/view/{id}/add','guideLanguageController@create')->name('guid_lanuages_add');
Route::post('/guide/view/store','guideLanguageController@store')->name('guid_lanuages_store');
Route::post('/guide/view/delete','guideLanguageController@destroy')->name('guid_lanuages_delete');


//-------Guest--------
Route::get('/guest/create','guestController@create')->name('guest_create');
Route::post('/guest/store','guestController@store')->name('guest_store');
Route::get('/guest/index','guestController@index')->name('guest_index');
Route::get('/guest/{id}/edit','guestController@edit')->name('guest_edit');
Route::post('/guest/update','guestController@update')->name('guest_update');
Route::post('/guest/delete','guestController@destroy')->name('guest_delete');
Route::post('/guest/search','guestController@liveSearch')->name('guest_liveSearch');
Route::post('/guest/load','guestController@view_contacts')->name('view_guestcontacts');

//-------Agents----------
Route::get('/agents/create','agentController@create')->name('agent_create');
Route::post('/agents/store','agentController@store')->name('agent_store');
Route::get('/agents/index','agentController@index')->name('agent_index');
Route::get('/agents/{id}/edit','agentController@edit')->name('agent_edit');
Route::post('/agents/update','agentController@update')->name('agent_update');
Route::post('/agents/delete','agentController@destroy')->name('agent_delete');
Route::post('/agents/select/by/market','agentController@selectIndexbyMarket')->name('agent_filter_by_market');
Route::post('/agents/serach','agentController@livesearch')->name('agent_livesearch');
Route::post('/agents/load','agentController@view_contacts')->name('view_agentcontacts');


//-------Driver----------
Route::get('/drivers/create','driverController@create')->name('driver_create');
Route::post('/drivers/load','driverController@view_contacts')->name('view_contacts');
Route::post('/drivers/store','driverController@store')->name('driver_store');
Route::get('/drivers/index','driverController@index')->name('driver_index');
Route::get('/drivers/{id}/edit','driverController@edit')->name('driver_edit');
Route::post('/drivers/update','driverController@update')->name('driver_update');
Route::post('/drivers/delete','driverController@destroy')->name('driver_delete');
Route::post('driver/liveSearch','driverController@liveSearch')->name('driver_liverSearch');

//-------Languages-------
Route::get('/languages/create','languageController@create')->name('language_create');
Route::post('/languages/store','languageController@store')->name('language_store');
Route::get('/languages/index','languageController@index')->name('language_index');
Route::post('/languages/delete','languageController@destroy')->name('language_delete');
Route::post('/languages/serach','languageController@livesearch_lan')->name('language_livesearch');

//tour Section
Route::get('/tour/quotation/create','tourQuotationController@create')->name('quotation_create');
Route::post('/tour/quotation/store','tourQuotationController@store')->name('quotation_store');
Route::get('/tour/quotation/index','tourQuotationController@index')->name('quotation_index');
Route::post('/tour/quotation/livesearch','tourQuotationController@liveSearch')->name('quotation_livesearch');
Route::post('/tour/quotation/gplivesearch','tourQuotationController@gpliveSearch')->name('Gpquotation_livesearch');
Route::post('/tour/quotation/hotel/livesearch','tourQuotationController@hotelSelectmodelSrch')->name('hotel_model_livesearch');
Route::post('/tour/quotation/hoteldata/livesearch','tourQuotationController@hotel_srch_select_hotel')->name('hotel_model_hotel_livesearch');

Route::get('/tour/quotation/{tourId}/manage','tourQuotationController@edit')->name('quotation_edit');
Route::get('/tour/quotation/{tourId}/manage/quick','tourQuotationController@edit_quick')->name('quotation_edit_quick');
Route::get('/tour/quotation/create/new/quick','tourQuotationController@create_quick')->name('quotation_create_quick');

Route::post('/tour/quotation/create/new/quick','tourQuotationController@save_gp_vehicleTypes')->name('quotation_save_gp_vehicleTypes');

Route::post('/tour/quotation/get/gpvehicle/data','tourQuotationController@quotation_get_gp_vehicle_data')->name('quotation_get_gp_vehicle_data');
Route::post('/tour/quotation/save/gpguide/data','tourQuotationController@gp_guide_data_save')->name('quotation_gp_guide_data_save');
Route::post('/tour/quotation/get/gpguide/fee','tourQuotationController@get_gp_guide_fee')->name('quotation_get_gp_guide_fee');

Route::post('/hotel/list','tourQuotationController@selectHotelByCity')->name('select_hotels');


Route::post('/tour/quotation/new/version','tourQuotationController@newVersion')->name('quotation_new_version');
Route::post('/tour/quotation/update','tourQuotationController@update')->name('quotation_update');
Route::get('/tour/quotation/{id}/cancel','tourQuotationController@qtCancel')->name('quotation_cancel');
Route::post('/tour/quotation/manage/check/distance','tourQuotationController@checkdistance')->name('location_checkdistance');
Route::post('/tour/quotation/manage/update/location','tourQuotationController@updatelocation')->name('location_updatelocation');
Route::post('/tour/quotation/manage/update/hotels','tourQuotationController@updatehotels')->name('location_updatehotels');
Route::post('/tour/quotation/manage/update/guideing/fee','tourQuotationController@find_guidefee')->name('guide_fee_find');
Route::post('/tour/quotation/manage/update/guideing/rom/byhotelid','guideRoomController@listIndexRooms')->name('guide_rlistFilter');
Route::post('/tour/quotation/manage/update/guide','tourQuotationController@update_guides')->name('guide_update_qoute');
Route::post('/tour/quotation/manage/select/trasport','vehicleTypeController@findVehilceDetailsIndex')->name('transport_listFilter');
Route::post('/tour/quotation/manage/update/trasport','tourQuotationController@update_trasport')->name('transport_update');
Route::post('/tour/quotation/manage/select/misc','tourQuotationController@find_miscMisdata')->name('misc_findData');
Route::post('/tour/quotation/manage/update/misc','tourQuotationController@update_misc')->name('quot_misc_update');
Route::post('/tour/quotation/manage/select/supliments','tourQuotationController@supliment_list')->name('quote_supliment_list');
Route::post('/tour/quotation/manage/days/move/up','tourQuotationController@day_move_up')->name('quote_day_move_up');
Route::post('/tour/quotation/manage/days/move/down','tourQuotationController@day_move_down')->name('quote_day_move_down');
Route::post('/tour/quotation/manage/finalize','tourQuotationController@finalize')->name('quotation_finalize');
Route::post('/tour/quotation/manage/confirm','tourQuotationController@confirm_quotation')->name('quotation_confirm');

Route::post('/tour/quotation/manage/update/room/allocation','tourQuotationController@update_room_allocation')->name('update_room_allocation');


Route::post('/tour/quotation/route/itinerary','tourQuotationController@route_itinerary_search')->name('quotation_route_itinerary_search');
Route::post('/tour/quotation/route/itinerary/select','tourQuotationController@select_itinerary')->name('quotation_route_select_itinerary');

Route::post('/tour.quotation/manager/select/expences','TransportExpensesController@find_expences')->name('expences_list_filter');

//Group QT Cal

Route::post('/tour/quotation/get/gpvehicle/cal','gptransportcalController@quotation_cal_gp_data')->name('quotation_cal_gp_vehicle_data');



//Booking section
Route::get('/tour/booking/index','bookingController@index')->name('tour_booking_index');
Route::post('/tour/booking/list/livesearch','bookingController@liveSearch')->name('tour_booking_livesearch');
Route::get('/tour/booking/reservation/{id}/dashboard','bookingController@dashboard_index')->name('load_dashboard');
Route::get('/tour/booking/reservation/{id}/routes','bookingController@route_view')->name('load_dashboard_route');
Route::get('/tour/booking/reservation/{id}/accommodation','bookingController@hotel_reserve')->name('load_dashboard_accmd');
Route::post('/tour/booking/reservation/store/accommodation','bookingController@accmd_reserve_store')->name('reservation_store_accmd');
Route::post('/tour/booking/reservation/amnd/accommodation','bookingController@reservation_amend_accmd')->name('reservation_amend_accmd');

Route::post('/tour/booking/reservation/genarate/accommodation/voucher','bookingController@accmd_reserve_genarate')->name('reservation_genarate_voucher_accmd');
Route::post('/tour/booking/reservation/generate/miscellaneous/voucher','bookingController@misc_reserve_generate')->name('reservation_generate_voucher_misc');
Route::post('/tour/booking/reservation/generate/miscellaneous/voucher/advance','bookingController@misc_reserve_advance_store')->name('reservation_store_advance_misc');

Route::get('/tour/booking/reservation/{id}/gp/miscellaneous','bookingController@gp_misc_reserve')->name('load_dashboard_gpmisc');

Route::get('/tour/booking/amalgamate/{id}/create','bookingController@amalgamate_create')->name('tour_booking_amalgamate_create');
Route::post('/tour/booking/amalgamate/store','tourQuotationController@amlgmate_store')->name('tour_booking_amalgamate_store');

//Route::get('/tour/booking/reservation/{id}/guide','bookingController@guide_allocate')->name('load_dashboard_accmd');
Route::post('/tour/booking/reservation/roomlist/find/data','bookingController@find_rm_list_data')->name('reservation_find_rmlst_pkgs');
Route::post('/tour/booking/reservation/roomlist/search/modal','bookingController@search_rm_list_data')->name('reservation_search_rm_list_data');

Route::get('/tour/booking/reservation/view/{id}/guide','bookingController@guide_view')->name('guide_view_load');
Route::post('/tour/booking/reservation/store/guide','bookingController@save_guideDetails')->name('guide_allocate');
Route::get('/tour/booking/reservation/transport/{id}/allocation','bookingController@transport_allocation')->name('transport_view_load');
Route::post('/tour/booking/reservation/transport/reserve','bookingController@transport_addto_reserve')->name('transport_add_to_reserve');
Route::post('/tour/booking/reservation/transport/reserve/data','bookingController@transport_addto_reserve_update')->name('reserve_update_trns');
Route::get('/tour/booking/reservation/misc/{id}/create','bookingController@misc_view')->name('misc_view_load');
Route::post('tour/booking/reservation/mic/save','bookingController@misc_reserve_store')->name('misc_view_store_reserve');

Route::post('/tour/booking/reservation/voucher/guide/details','bookingController@guide_allocate_store')->name('guide_voucher_store');
Route::post('/tour/booking/reservation/voucher/guide/hotels','bookingController@guide_hotel_store')->name('guide_voucher_hotel_store');

Route::get('/tour/booking/reservation/guest/{id}/create','bookingController@guest_allocation')->name('guest_view_load');
Route::post('/tour/booking/reservation/guest/store','bookingController@save_guestDetails')->name('store_guestdetails');
Route::get('/tour/booking/resrevation/guest/allocation/{id}/index','bookingController@tour_booking_guest_allocate_index')->name('booking_guest_allocate_index_load');
Route::post('/tour/booking/reservation/guest/allocation/delete','bookingController@guests_allocation_delete_records')->name('guest_allocation_delete');
Route::post('/tour/booking/reservation/guest/allocation/livesearch','bookingController@guests_allocation_livesearch')->name('lv_srch');
//Booking Section Vouchers

Route::get('/tour/booking/reservation/view/accommodation/voucher/{id}','bookingController@accmd_reserve_voucher')->name('reservation_voucher_accmd');
Route::get('/tour/booking/reservation/view/misc/voucher','bookingController@misc_reserve_voucher')->name('reservation_voucher_misc');
Route::get('/tour/booking/reservation/view/meal/voucher' ,'bookingController@meal_reserve_voucher')->name('reservation_voucher_meal');
Route::get('/tour/booking/reservation/view/hotel/{id}/voucher','bookingController@save_pdf_hotel_voucher')->name('save_hotel_voucher');
Route::get('/tour/booking/reservation/view/misc/{id}/voucher','bookingController@generate_misc_voucher')->name('generate_misc_voucher_dtails');
Route::get('/tour/booking/reservation/view/misc/advance/{id}/voucher','bookingController@misc_reserve_advance_generate_voucher')->name('misc_reserve_advance_generate_voucher_dt');
Route::get('/tour/booking/reservation/view/guide/{id}voucher','bookingController@guide_generate_voucher')->name('reservation_voucher_guide');
Route::get('/tour/booking/reservation/view/guide/hotel/{id}voucher','bookingController@guide_hotel_voucher')->name('reservation_voucher_guide_hotel');

Route::get('/tour/booking/reservation/agent/invoice/{id}','bookingController@agent_invoice_window')->name('agent_invoice_genarate');
Route::get('/tour/booking/reservation/agent/inv/print','bookingController@agent_invoice_gen')->name('gen_agent_invoice');


Route::post('/tour/booking/reservation/agent/inv/addtolist','agentInvoceController@add_invoice_to_list')->name('add_invoice_to_list');





//----------Branches----------

Route::get('/branch/create','branchController@create')->name('branch_create');
Route::post('/branch/store','branchController@store')->name('branch_store');
Route::get('/branch/index','branchController@index')->name('branch_index');
Route::get('/branch/{id}/edit','branchController@edit')->name('branch_edit');
Route::post('/branch/update','branchController@update')->name('branch_update');
Route::post('/branch/delete','branchController@destroy')->name('branch_delete');
Route::post('/branch/serach','branchController@livesearch')->name('branch_livesearch');
Route::post('/branch/load','branchController@view_contacts')->name('view_branchcontacts');


//----------------Itineray-------------------

Route::get('/itineray/create','itinerayController@create')->name('itineray_create');
Route::post('/itineray/store','itinerayController@store')->name('itineray_store');
Route::post('/itineray/distance','itinerayController@getDistance')->name('itenary_chk');
Route::get('/itineray/index','itinerayController@index')->name('itineray_index');
Route::get('/itineray/{id}/edit','itinerayController@edit')->name('itineray_edit');
Route::post('/itineray/update','itinerayController@update')->name('itineray_update');
Route::post('/itineray/delete','itinerayController@destroy')->name('itineray_delete');
Route::post('/itineray/liveSearch','itinerayController@liveSearch')->name('itineray_liveSearch');

//------------Tax--------------

Route::get('/tax/create','taxController@create')->name('tax_create');
Route::post('/tax/store', 'taxController@store')->name('tax_store');
Route::get('/tax/index', 'taxController@index')->name('tax_index');
Route::get('/tax/{id}/edit','taxController@edit')->name('tax_edit');
Route::post('/tax/update', 'taxController@update')->name('tax_update');
Route::post('/tax/delete', 'taxController@destroy')->name('tax_delete');
Route::post('/tax/search','taxController@livesearch')->name('tax_livesearch');

//---------Transport Expenses--------

Route::get('/transportExpenses/create','TransportExpensesController@create')->name('transportExpenses_load');
Route::post('/transportExpenses/store','TransportExpensesController@store')->name('transportExpenses_store');
Route::get('/transportExpenses/index','TransportExpensesController@index')->name('transportExpenses_index');
Route::get('/transportExpenses/{id}/edit','TransportExpensesController@edit')->name('transportExpenses_edit');
Route::post('/transportExpenses/update','TransportExpensesController@update')->name('transportExpenses_update');
Route::post('/transportExpenses/delete','TransportExpensesController@destroy')->name('transportExpenses_delete');
Route::post('/transportExpenses/serach','TransportExpensesController@livesearch')->name('transportExpenses_livesearch');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/print',function(){

    return view('print');

});

Route::get('/booking/transport',function(){

    return view('tour_section_bookings.components.transport_view');

});


    Route::get('/aaa','userController@assign_privilages');



    Route::get('/dashboard/metro',function(){

        return view('dashboard.metro');

    });

    Route::get('/print/tadvanced',function(){

        return view('tour_section_bookings.print_doc.tour_advanced');

    });

    Route::get('/tour/booking/reservation/voucher/rooming/list','bookingController@rooming_list_voucher')->name('rooming_list_voucher');

//Transport Section

Route::get('/tour/transport/index','transportController@index')->name('tourtransport_load');
Route::post('/tour/transport/livesearch','transportController@liveSearch')->name('tourtransport_livesearch');
Route::get('/tour/transport/vehicle/{id}/type','transportController@view_vehicle_types')->name('load_vehicletypes');
Route::get('tour/transport/{id}/view','transportController@load_view_transport')->name('load_tour_trns_view');

//Transport reservation
Route::post('/tour/transport/reserve/store','transportController@add_to_reserve')->name('tour_trn_addto_reserve');

//Transport Section Vouchers
Route::get('/tour/transport/voucher','transportController@transport_voucher')->name('tourtransport_voucher');
Route::get('/tour/transport/voucher/{id}/generate','transportController@generate_voucher')->name('generate_voucher');
Route::post('/tour/booking/reservation/voucher/transport/details','transportController@allocate_vehicle')->name('vehicle_voucher_store');
Route::post('tour/quotation/misc/cal','tourQuotationController@get_excg_mis')->name('get_mis_excg');


Route::get('/cal',function(){
       return view('calender');
});

Route::get('/tour/booking/pnl','bookingController@booking_pnl_generate')->name('booking_pnl');
Route::get('/gmd/dashboard','dashboardController@gmd_dashboard')->name('gmd_dashboard');
Route::get('/opmd/dashboard','dashboardController@opmd_dashboard')->name('opmd_dashboard');
Route::get('/opertation/dashboard','dashboardController@op_dashboard')->name('operation_dashboard');

Route::get('/booking/dashboard',function(){

    return view('booking_dashboard');
})->name('booking_dashboard');

// Route::get('/grid/dashboard',function(){

//     return view('grid_dashboard');
// })->name('grid_dashboard');




// messages

Route::post('/store/session','sendMessageController@session_user')->name('store_session');
Route::post('/message/store','sendMessageController@store')->name('store_message');
Route::post('chat/live','sendMessageController@chat_live')->name('chat_live');
Route::post('/users/get','sendMessageController@get_users')->name('get_user_data');

//annoucements

Route::get('/annoucement/load','annoucementController@create')->name('load_annoucement');
Route::post('/annoucement/load/data','annoucementController@store')->name('store_annoucement');

//FeedBacks
Route::get('/feedback/load','feedbackController@create')->name('load_feedback');
Route::post('/feedback/store','feedbackController@store')->name('store_feedback');
Route::get('/feedback/view','feedbackController@fdb_view')->name('view_feedback');

// Route::get('/quick/quote/contracts',function(){

//     return view('tour_section.quick_quote.create_Contract');
// })->name('create_Contracts');


// Route::get('/report/Page',function(){

//     return view('exception_return.report_page');
// })->name('404Page');

Route::post('/report/page','exceptionreturnController@create')->name('report_page');
Route::post('/report/save/page','exceptionreturnController@store')->name('save_error');

//---505----
Route::get('/report/404/error','exceptionreturnController@view_404page')->name('404report_page');

// Route::get('/booking/invoice',function(){

//     return view('invoice');
// })->name('booking_invoice');

Route::get('/grid/dashboard','bookingController@invoice_gen')->name('grid_dashboard');

Route::get('/create/institute',function(){

    return view('create_institute');
})->name('create_institute');

Route::get('/booking/section/confirm/manage','bookingController@manage_confirm')->name('manage_confirm');
Route::get('/booking/download/quotation/{id}','bookingController@download_quotation')->name('download_quotation');
