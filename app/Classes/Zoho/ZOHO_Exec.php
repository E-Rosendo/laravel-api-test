<?php

namespace App\Classes\Zoho;

class ZOHO_Exec
{
    public $zoho;

    public function __construct (){

        $configuration=
            array(
                "client_id"=>"1000.EK6A7WOCPO3D5V5HGGZ8Q14FI91A4H",
                "client_secret"=> "967d78df1c0d29ff9bc02b69eb783b451bf5c2f48f",
                "redirect_uri"=>"https://quiet-dusk-98165.herokuapp.com/api/zoho_redirect",
                "currentUserEmail"=> "eduardo.rosendo@sportech37.com",
                "access_type"=>'offline' ,
                "persistence_handler_class"=>"ZohoOAuthPersistenceInterface",
                "token_persistence_path"=>public_path('persistence'),
            );

        $this->connect_zoho($configuration);
        return redirect("https://accounts.zoho.com/oauth/v2/auth?scope=ZohoCRM.users.ALL&client_id={$configuration['client_id']}&response_type=code&access_type={"offline"}&redirect_uri={$configuration['redirect_uri']}")
    }

    Private function connect_zoho($conf){
        $this-> zoho = new ZohoAPI($conf);
        return true;
    }
}
