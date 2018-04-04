<?php
addProvider('BtyBugHook\ApiUser\Providers\ModuleServiceProvider');


//BBregistreApi('FBlogin','admin/apiuser/settings');

function BBfb(){
    $data = json_decode(BBgetApiSettings('FBlogin')->val,true);
    $appID = (isset($data["client_id"])) ?$data["client_id"]: null;
    return '<a href="#" class="btn btn-primary" onClick="logInWithFacebook()">Log In FB</a>
            <script>
                logInWithFacebook = function() {
                    FB.login(function(response) {
                        if (response.authResponse) {
                            getFbUserData();
                            // Now you can redirect the user or do an AJAX request to
                            // a PHP script that grabs the signed request from the cookie.
                        } else {
                            alert(\'User cancelled login or did not fully authorize.\');
                        }
                    });
                    return false;
                };
                window.fbAsyncInit = function() {
                    FB.init({
                        appId: '."$appID".',
                        cookie: true, // This is important, it\'s not enabled by default
                        version: "v2.7"
                    });
                };
            
                (function(d, s, id){
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {return;}
                    js = d.createElement(s); js.id = id;
                    js.src = "https://connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, "script", "facebook-jssdk"));
            
            
            
            
                    // Fetch the user profile data from facebook
                    function getFbUserData(){
                        FB.api("/me", {locale: "en_US", fields: "id,first_name,last_name,email,link,gender,locale,picture"},
                            function (response) {
                                saveUserData(response);
                            });
                    }
            
                    function saveUserData(userData){
                        $.get("/apiuser-api/callback", {oauth_provider:"facebook",userData: JSON.stringify(userData)}, function(data){                           
                            window.location.reload();
                        });
                    }
            
            </script>';
}
