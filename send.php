<?php
//Include FB config file
require_once 'fbConfig.php';
require_once 'view.php';
include_once "config.php";

if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
        // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    
    //FB post content
	
	$query = mysqli_query($con, "select * from upload_images order by id desc limit 1");
	 if(mysqli_num_rows($query) > 0){
	 	
	 	$no = 1;
	 	while($r = mysqli_fetch_array($query)){
	 		$id = $r['id'];
	 		$nama = $r['nama'];
	 		$gambar = "images/thumb_".$r['images'];
			$size = $r['size'];
			$bahan = $r['bahan'];
			$kategori = $r['kategori'];
			$harga = $r['harga'];
	 		$tgl_upload = $r['tgl_upload'];
	 	}
	 }

	
    $message = $nama.' ukuran '.$size.' bahan '.$bahan.' harga '.$harga;
    $title = 'Post From Website';
    $link = 'https://drive.google.com/open?id=0BzWbOwuPIy3zWmRJbzF3UDBPY0E';
    $description = 'CodexWorld is a programming blog.';
    $picture = 'http://www.codexworld.com/wp-content/uploads/2015/12/www-codexworld-com-programming-blog.png';
            
    $attachment = array(
        'message' => $message,
		'link' => $link,
    );
    
    try{
        //Post to Facebook
        $fb->post('/me/feed', $attachment, $accessToken);
        
        //Display post submission status
        echo 'The post was submitted successfully to Facebook timeline.';
    }catch(FacebookResponseException $e){
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    }catch(FacebookSDKException $e){
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
}else{
    //Get FB login URL
    $fbLoginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
    
    //Redirect to FB login
    header("Location:".$fbLoginURL);
}