<?php 

require_once '../assets/lib/php-graph-sdk-5.x/src/Facebook/autoload.php';

session_start();
$fb = new Facebook\Facebook([
  'app_id' => '2162318747411837',
  'app_secret' => '7c3a67d23a9aa3807033f9b330046572',
  'default_graph_version' => 'v3.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://fastweb-2/controller/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';