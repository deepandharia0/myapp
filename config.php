<?php 
class config{
    public $client_id = '6731de76-14a6-49ae-97bc-6eba6914391e';
    public $scope = 'openid%20profile%20email';  // This is for Basic profile details....
    public $client_sec = 'JqQX2PNo9bpM0uEihUPzyrh';
    public $grant_type = 'authorization_code';
    public $redirect_uri_token = 'http://localhost/myapp/';
    public $res_type = 'code';
    public $res_mode = 'query';
    public $state = '12345';   
    public $token_base_url = 'https://login.microsoftonline.com';
    public $graph_base_url = 'https://graph.microsoft.com';

}

?>