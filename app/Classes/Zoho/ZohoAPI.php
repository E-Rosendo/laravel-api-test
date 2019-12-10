<?php

namespace App\Classes\Zoho;

use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\oauth\ZohoOAuth;

class ZohoAPI
{
    public $oAuthClient=null;
    public $configuration=null;

    public function __construct($conf=null) {

        if($conf!=null)
            $this->configuration=$conf;
        //Initialize Core SDK library
        ZCRMRestClient::initialize($this->configuration);
        $this->oAuthClient = ZohoOAuth::getClientInstance();

    }
    //For set all configurations
    public function setConfiguration($config){
        $this->configuration=$config;
    }

    public function generateToken($grantToken){
        //Below is sample grant token
        // $grantToken = "1000.11355e7151087bf58933e82c3876a5e9.609bbf22b49c1d43b36fbe3708b2399c";
        return $oAuthTokens = $this->oAuthClient->generateAccessToken($grantToken);
    }
    //This function if access token expire then using refresh token you can generate new Access token

    public function refreshToken($refreshToken,$userIdentifier){
        //below is sample refresh token you found and that automatically updated once generate

        //$refreshToken = "1000.dbc14d31df8e43e17d0e54ebadc7c5e1.404c4a7000dbdb31c9f162925abb0146";
        return $oAuthTokens = $this->oAuthClient->generateAccessTokenFromRefreshToken($refreshToken,$userIdentifier);
    }

}
