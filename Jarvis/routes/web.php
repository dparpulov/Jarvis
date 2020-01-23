<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('layout', function () {
    return view('layout');
});



//--------- IMPORTING ---------//
//Countries, states and cities in 1 import
Route::post('countryFolder/importCSC', 'ImportExport\ImportController@importCSC')->name('importCSC');

Route::post('urlFolder/importURL', 'ImportExport\ImportController@importURL')->name('importURL');
Route::post('baseTCFolder/importBaseTestCenter', 'ImportExport\ImportController@importBaseTestCenter')->name('importBaseTestCenter');
Route::post('rawTestDateFolder/importRawTestDate', 'ImportExport\ImportController@importRawTestDate')->name('importRawTestDate');

//--------- EXPORTING ---------//
Route::get('editTestDateFolder/exportLinkedDate', 'ImportExport\ExportController@exportLinkedDate')->name('exportLinkedDate');

Route::get('baseTCFolder/exportBaseTCForLameco', 'ImportExport\ExportController@exportBaseTCForLameco')->name('exportBaseTCForLameco');
Route::get('baseTCFolder/exportBaseTCForJarvis', 'ImportExport\ExportController@exportBaseTCForJarvis')->name('exportBaseTCForJarvis');


//--------- DELETING (of multiple rows/entities) ---------//
Route::post('countryFolder/deleteAllCSC', 'CountryController@deleteAllCSC')->name('deleteAllCSC');
Route::post('urlFolder/deleteAllURL', 'ClickoutURLController@deleteAllURL')->name('deleteAllURL');
Route::post('baseTCFolder/deleteBaseTestCenter', 'BaseTestCenterController@deleteBaseTestCenter')->name('deleteBaseTestCenter');
Route::post('rawTestDateFolder/deleteRawTestDates', 'RawTestDateController@deleteRawTestDates')->name('deleteRawTestDates');
Route::post('editTestDateFolder/deleteEditTestDates', 'EditTestDateController@deleteEditTestDates')->name('deleteEditTestDates');


//--------- BROKEN URLS ---------//
Route::get('urlFolder/brokenURL', 'ClickoutURLController@checkBrokenURL')->name('checkBrokenURL');



//--------- EDIT TEST DATES ---------//
Route::any('editTestDateFolder/editTestDate', 'TestDateController@makeEditTestDates')->name('makeEditTestDates');



//--------- LINKING DATES ---------//
Route::any('editTestDateFolder/linkOnCenterNrAndCity', 'TestDateController@linkOnCenterNrAndCity')->name('linkOnCenterNrAndCity');

Route::any('editTestDateFolder/linkDateAndUpdateCenter', 'TestDateController@linkDateAndUpdateCenter')->name('linkDateAndUpdateCenter');


//--------- SEARCHES ---------//
Route::any( 'countryFolder/search', 'SearchController@searchCountry')->name('searchCountry');
Route::any( 'stateFolder/search', 'SearchController@searchState')->name('searchState');
Route::any( 'cityFolder/search', 'SearchController@searchCity')->name('searchCity');
Route::any( 'baseTCFolder/search', 'SearchController@searchBaseTC')->name('searchBaseTC');
Route::any( 'importFileFolder/search', 'SearchController@searchImportFile')->name('searchImportFile');
Route::any( 'rawTestDateFolder/search', 'SearchController@searchRawTestDate')->name('searchRawTestDate');
Route::any( 'urlFolder/search', 'SearchController@searchClickoutURL')->name('searchClickoutURL');



//--------- JSON DATA ---------//
Route::get('stateFolder/state/dataArray', 'JsonController@stateJsonDataArray')->name('stateJsonDataArray');
Route::get('stateFolder/state/dataList', 'JsonController@stateJsonDataList')->name('stateJsonDataList');

Route::get('cityFolder/city/dataArray', 'JsonController@cityJsonDataArray')->name('cityJsonDataArray');
Route::get('cityFolder/city/dataList', 'JsonController@cityJsonDataList')->name('cityJsonDataList');

Route::get('urlFolder/url/dataArray', 'JsonController@clickoutURLJsonDataArray')->name('urlJsonDataArray');
Route::get('urlFolder/url/dataList', 'JsonController@clickoutURLJsonDataList')->name('urlJsonDataList');

Route::get('baseTCFolder/baseTC/dataArray', 'JsonController@baseTCJsonDataArray')->name('baseTCJsonDataArray');
Route::get('baseTCFolder/baseTC/dataList', 'JsonController@baseTCJsonDataList')->name('baseTCJsonDataList');

//Route::get('rawTestDateFolder/rawTestDate/dataArray', 'JsonController@rawTestDatesJsonArray')->name('rawTestDatesJsonArray');
Route::get('rawTestDateFolder/rawTestDate/dataArray', function(Request $request) {
    $jsonController = new App\Http\Controllers\JsonController;
    //dd($request->importFileId);
    return $jsonController->rawTestDatesJsonArray($request->importFileId);
});

Route::get('editTestDateFolder/editTestDate/linkedDataArray', 'JsonController@linkedEditTestDatesJsonArray')->name('linkedEditTestDatesJsonArray');

Route::get('editTestDateFolder/editTestDate/unlinkedDataArray', 'JsonController@unlinkedEditTestDatesJsonArray')->name('unlinkedEditTestDatesJsonArray');


//--------- RESOURCE ROUTES ---------//
Route::resource('countryFolder/country', 'CountryController');
Route::resource('cityFolder/city', 'CityController');
Route::resource('baseTCFolder/baseTC', 'BaseTestCenterController');
Route::resource('stateFolder/state', 'StateController');
Route::resource('testProviderFolder/testProvider', 'TestProviderController');
Route::resource('testFolder/test', 'TestController');
Route::resource('testTypeFolder/testType', 'TestTypeController');
Route::resource('urlFolder/url', 'ClickoutURLController');
Route::resource('importFileFolder/importFile', 'ImportFileController');
Route::resource('rawTestDateFolder/rawTestDate', 'RawTestDateController');
Route::resource('editTestDateFolder/editTestDate', 'EditTestDateController');



//--------- TESTING ---------//
//ajax loading TESTING ROUTES and AJAX and JSON etc.
Route::get('break', 'CityController@getBreak')->name('break');
Route::get('break/data', 'CityController@getData')->name('break.data');


