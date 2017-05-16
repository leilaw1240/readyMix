<?php

// this contains the application parameters that can be maintained via GUI
return array(
    // this is displayed in the header section
    'title' => 'Ready Mix',
    // this is used in error pages
    'adminEmail' => 'krissh1240@gmail.com',
    // number of posts displayed per page
    'postsPerPage' => 10,
    // maximum number of comments that can be displayed in recent comments portlet
    'recentCommentCount' => 10,
    // maximum number of tags that can be displayed in tag cloud portlet
    'tagCloudCount' => 20,
    // whether post comments need to be approved before published
    'commentNeedApproval' => true,
    // the copyright information displayed in the footer section
    'copyrightInfo' => 'Copyright &copy; ' . date("Y") . ' by Ready Mix.',
    'providers' => array(
        // openid providers
        "OpenID" => array(
            "enabled" => true
        ),
        "Yahoo" => array(
            "enabled" => true,
            "keys" => array("key" => "", "secret" => ""),
        ),
        "AOL" => array(
            "enabled" => true
        ),
        "Google" => array(
            "enabled" => true,
            "keys" => array("id" => "259535333914-nhiqgno60ff9ohmuker7c66ve8fc1887.apps.googleusercontent.com", "secret" => "1kQpx4YQ4IdXhC9WKS9W6yOQ"),
        ),
        "Facebook" => array(
            "enabled" => true,
            "keys" => array("id" => "1789695267929931", "secret" => "c93ada5bf6d1203b3081a41721534278"),
            "trustForwarded" => false
        ),
        "Twitter" => array(
            "enabled" => true,
            "keys" => array("key" => "", "secret" => ""),
            "includeEmail" => false
        ),
        // windows live
        "Live" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => "")
        ),
        "LinkedIn" => array(
            "enabled" => true,
            "keys" => array("key" => "", "secret" => "")
        ),
        "Foursquare" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => "")
        ),
    ),
    'signature' => 'Ready Mix Team.',
    'mailconfig' => array('username' => 'info.classybook@gmail.com',
        'password' => 'classybook@123',
        'port' => 587,
        'host' => 'smtp.gmail.com'
    ),
    'cities' => array('IN' => 'India')
);
