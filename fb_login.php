<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 10/12/16
 * Time: 6:15 PM
 */

session_start();
require_once 'vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '257968584597664', // Replace {app-id} with your app id
    'app_secret' => '20ab3395a93736b3cb7cd79ecb273af8',
    'default_graph_version' => 'v2.2',
]);
$fb = new Facebook\Facebook([
    'app_id' => '257968584597664',
    'app_secret' => '20ab3395a93736b3cb7cd79ecb273af8',
    'default_graph_version' => 'v2.5',
]);
$redirect = 'http://localhost/ajax-login/login.php';

$helper = $fb->getRedirectLoginHelper();

try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
if (isset($accessToken)) {
    $fb->setDefaultAccessToken($accessToken);
    try {
        $response = $fb->get('/me?fields=email,name');
        $userNode = $response->getGraphUser();
    }catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    echo "Welcome !<br><br>";
    echo 'Name: ' . $userNode->getName().'<br>';
    echo 'User ID: ' . $userNode->getId().'<br>';
    echo 'Email: ' . $userNode->getProperty('email').'<br><br>';
    $image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
    echo "Picture<br>";
    echo "<img src='$image' /><br><br>";
    die();

}
else{
    $permissions  = ['email'];
    $loginUrl = $helper->getLoginUrl($redirect,$permissions);
}