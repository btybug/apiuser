<?php
addProvider('BtyBugHook\ApiUser\Providers\ModuleServiceProvider');

//function getFB(){
//    $fb = new \Facebook\Facebook([
//        'app_id' => '1481000275258739',
//        'app_secret' => '922719e9742bb0a569a563b486581ac2',
//    ]);
//
//    $helper = $fb->getRedirectLoginHelper();
//
//    $permissions = ['email', 'user_likes']; // optional
//    $loginUrl = $helper->getLoginUrl('http://dfalbum.bty/apiuser-api/callback', $permissions);
//
//    return $loginUrl;
//}