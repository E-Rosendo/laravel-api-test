<?php

use App\Classes\Zoho\ZOHO_Exec;
use Illuminate\Http\Request;
use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\oauth\ZohoOAuth;
use GuzzleHttp\Client;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', function() {
    $exeZ =new ZOHO_Exec();
    dd($exeZ->zoho->oAuthClient);
//    $clientid= '1000.EK6A7WOCPO3D5V5HGGZ8Q14FI91A4H';
//    $redirect_uri= 'http://dialca-api.test:81/api/token';
//    $client = new Client();
//    $res = $client->request('GET',
//    "https://accounts.zoho.com/oauth/v2/auth?scope=ZohoCRM.users.ALL&client_id={$clientid}&response_type=code&access_type={online}&redirect_uri={$redirect_uri}");
//    echo $res->getStatusCode();

//    $configuration= [
//        'client_id' => '1000.EK6A7WOCPO3D5V5HGGZ8Q14FI91A4H',
//        'client_secret' => '967d78df1c0d29ff9bc02b69eb783b451bf5c2f48f',
//        'redirect_uri' => 'http://fd46bf33.ngrok.io/' ,
//        'currentUserEmail' => 'eduardo.rosendo@sportech37.com',
//        'token_persistence_path' => public_path('persistence')
//    ];
//    ZCRMRestClient::initialize($configuration);
//    $oAuthClient = ZohoOAuth::getClientInstance();
//    $grantToken = "1000.535773af1b4d4e4374d4428313c47f37.24fcab9ade2a6f54f6b51c0de0794748";
//    $oAuthTokens = $oAuthClient->generateAccessToken($grantToken);
//
//    try{
//        $ins=ZCRMRestClient::getInstance();
//        $moduleArr=$ins->getAllModules()->getData();
//        dd($moduleArr['contacts']);
//    } catch (ZCRMException $e) {
//        echo $e->getCode();
//        echo $e->getMessage();
//        echo $e->getExceptionCode();
//    }
});

Route::get("zoho_redirect", function(Request $request){

    if(!empty($request['code'])){
        $zoho =new ZOHO_Exec();
        $zoho->zoho->generateToken($request['code']);
        //You can get code using Application as well without creating link and authorise.
    }
});
