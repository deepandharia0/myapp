<?php
// This is Default callback URL for Token Generation...........
use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;
require_once "vendor/autoload.php";
require_once "config.php";
use GuzzleHttp\Client;

if(isset($_REQUEST['code'])){
    $con = new config();
    $code = $_REQUEST['code'];
    $tokon_base_uri = $con->token_base_url;  
    $token_clnt = new Client([
        'base_uri'=>$tokon_base_uri
    ]);
    //--------& Preparing Request body &----------------------- 
    $token_params = array('client_id'=>$con->client_id,
                           'redirect_uri'=>$con->redirect_uri_token,
                           'grant_type'=>$con->grant_type,
                           'client_secret'=>$con->client_sec,
                           'code'=>$code 
                );
    //--------& Sending Request &------------------------------           
    $token_res = $token_clnt->request('POST', '/common/oauth2/v2.0/token', [
                    'form_params' => $token_params
                ]);
    //----------&Collectiing JSON Response &--------------------
    $token_body = $token_res->getBody();     
    $tmp = json_decode($token_body);
    
    $access_token = $tmp->access_token;
    
    $data_clnt = new Client([
                'base_uri'=>$con->graph_base_url
        ]);
     $auth_token = 'Bearer'.' '.$access_token;   
    $data_headers = array('Authorization'=>$auth_token
                    );
     $data_res = $data_clnt->request('POST','/oidc/userinfo',[
         'headers'=>$data_headers
     ]);      
     $data_body = $data_res->getBody();
    $data_tmp = json_decode($data_body);
    echo '<pre>';
    print_r(json_encode($data_tmp,JSON_PRETTY_PRINT));


}elseif(isset($_REQUEST['error'])){
    $response = array('message'=>$_REQUEST['error'],
                    'status'=>400);
    echo '<pre>';
    print_r(json_encode($response,JSON_PRETTY_PRINT));
}

?>