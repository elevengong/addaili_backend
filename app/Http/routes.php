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
//---------------------后台------------------------
Route::group(['middleware' => ['web']],function () {
    Route::any('/backend/login','backend\LoginController@login');
    Route::get('/backend/code','backend\LoginController@code');
});

Route::group(['middleware' => ['web','admin.login']],function () {
    Route::get('/backend/index','backend\IndexController@index');
    Route::post('/backend/logout','backend\IndexController@logout');
    Route::post('/backend/changepwd','backend\IndexController@changepwd');

    Route::any('/backend/adminlist','backend\AdminController@adminList');
    Route::any('/backend/admin/changestatus','backend\AdminController@changestatus');
    Route::delete('/backend/admin/delete/{admin_id}','backend\AdminController@delete')->where(['admin_id' => '[0-9]+']);
    Route::post('/backend/admin/add','backend\AdminController@adminadd');

    //总属性设置
    Route::get('/backend/static','backend\StaticController@index');
    Route::post('/backend/static/changestatus','backend\StaticController@changestatus');
    Route::any('/backend/static/addstatic','backend\StaticController@addstatic');
    Route::any('/backend/static/editstatic/{set_id}','backend\StaticController@editstatic')->where(['set_id' => '[0-9]+']);

    Route::any('/backend/static/resetapi','backend\StaticController@resetapi');

    //广告会员列表和站长列表
    Route::any('/backend/member/adsmember','backend\MemberController@adsmemberlist');
    Route::any('/backend/member/sitemember','backend\MemberController@sitememberlist');
    Route::post('/backend/member/changememberstatus','backend\MemberController@changememberstatus');
    Route::any('/backend/member/resetmemberpwd/{member_id}','backend\MemberController@resetmemberpwd')->where(['member_id' => '[0-9]+']);
    Route::post('/backend/member/setpersonalrate','backend\MemberController@setpersonalrate');



    //广告会员充值
    Route::any('/backend/money/applydeposit','backend\DepositController@applydeposit');
    Route::get('/backend/money/dealdepositorder/{deposit_id}','backend\DepositController@dealdepositorder')->where(['deposit_id' => '[0-9]+']);
    Route::any('/backend/money/updatedepositorder/{deposit_id}','backend\DepositController@updatedepositorder')->where(['deposit_id' => '[0-9]+']);
    Route::any('/backend/money/deposit','backend\DepositController@depositrecord');

    //帐变
    Route::any('/backend/money/moneychange','backend\MoneyController@moneychange');

    //广告素材管理
    Route::any('/backend/ads/materiallist','backend\AdsController@materiallist');
    Route::post('/backend/material/updatestatus','backend\AdsController@updatematerialstatus');

    //站长
    Route::any('/backend/sitemember/adslist','backend\SitememberController@adslist');

    Route::any('/backend/money/applywithdraw','backend\WithdrawController@applywithdraw');
    Route::get('/backend/money/dealwithdraworder/{withdraw_id}','backend\WithdrawController@dealwithdraworder')->where(['withdraw_id' => '[0-9]+']);
    Route::any('/backend/money/updatewithdraworder/{withdraw_id}','backend\WithdrawController@updatewithdraworder')->where(['withdraw_id' => '[0-9]+']);

    Route::any('/backend/money/withdraw','backend\WithdrawController@withdrawrecord');

    Route::any('/backend/money/webmasterearn','backend\MoneyController@webmasterearn');


    //审核站长网站列表
    Route::any('/backend/ads/verifylist','backend\WebsitesController@verifylist');
    Route::any('/backend/ads/verifyweb/{web_id}','backend\WebsitesController@verifyweb')->where(['web_id' => '[0-9]+']);

    //广告列表
    Route::any('/backend/ads/adslist','backend\AdsController@adslist');
    Route::any('/backend/ads/verifyads','backend\AdsController@verifyads');

    //运营数据管理
    Route::any('/backend/management/traffic','backend\TrafficController@traffic');
    Route::any('/backend/today/webmasterlist','backend\TodayController@webmasterlist');
    Route::any('/backend/today/adsmemberlist','backend\TodayController@adsmemberlist');
    Route::any('/backend/today/webmasteradslist','backend\TodayController@webmasteradslist');
    Route::any('/backend/today/adsmemberadslist','backend\TodayController@adsmemberadslist');
    Route::any('/backend/today/webmastermoneycontrast','backend\TodayController@webmastermoneycontrast');
    Route::any('/backend/today/webmasterdatacontrast','backend\TodayController@webmasterdatacontrast');
    Route::any('/backend/today/webmasteradscontrast','backend\TodayController@webmasteradscontrast');
    Route::any('/backend/today/browseranalysis','backend\TodayController@browseranalysis');

    //图片上传
    Route::any('/backend/upload','backend\JobController@upload');
    Route::any('/backend/uploadphoto/{id}','MyController@uploadphoto');
});


//---------------------pc前端------------------------

//Route::any('/getadphoto/{uid}','frontend\IndexController@getAdPhoto')->where(['uid' => '[0-9]+']);
//Route::any('/test','frontend\IndexController@test');
//Route::group(['middleware' => ['cors']],function () {
//
//
//
//});

//---------------------wap前端------------------------
//Route::get('/m/','frontend\WapController@index');
//Route::get('/m/joinus','frontend\WapController@joinus');
//Route::get('/m/job','frontend\WapController@job');
//
//Route::post('/uploadresume','frontend\IndexController@upload');
//Route::any('/frontend/uploadresume','frontend\FrontendController@uploadresume');
//Route::post('/frontend/updateapply','frontend\IndexController@updateapply');





