<?php 
$endpoint_url = 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize';
$clientid = 'client_id='.'6731de76-14a6-49ae-97bc-6eba6914391e';
$response_typ = 'response_type='.'code';
$redirect_uri = 'redirect_uri='.'http://localhost/myapp/';
$response_mode = 'response_mode='.'query';
$scope = 'scope='.'openid%20profile%20email';
$state = 'state='.'123456';

$main_url = $endpoint_url.'?'.$clientid.'&'.$response_typ.'&'.$redirect_uri.'&'.$response_mode.'&'.$scope.'&'.$state;
?>
<html>
<body>

<p><a href="<?php echo $main_url;?>">Login With Microsoft</a></p>

</body>
</html>
