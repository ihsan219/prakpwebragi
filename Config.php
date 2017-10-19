*
 * Configuration and setup Facebook SDK
 */
$appId         = '124887171602570'; //Facebook App ID
$appSecret     = '7672736678cf0848bc3639d2605acaef'; //Facebook App Secret
$redirectURL   = 'http://localhost/upload_images/'; //Callback URL
$fbPermissions = array('publish_actions'); //Facebook permission

$fb = new Facebook(array(
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.2',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
        $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}
?>
