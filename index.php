<?php
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$consumerKey = "your consumer key";
$consumerSecret = "yout consumer secret";

//post tweets
// $twitter = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
// $result = $twitter->post(
//         "statuses/update",
//         array("status" => "てすとだよ。")
// );
//var_dump($result);exit;

//serach tweets
$twitter = new TwitterOAuth($consumerKey, $consumerSecret);
$result = $twitter->get(
    "search/tweets",
    array(
    	"q" => "沖縄　魚"
    )
);
foreach($result->statuses as $tweet)
{
    print $tweet->user->name . "さんのツイート:<br>";
    print $tweet->text."<br>";
}


if($twitter->getLastHttpCode() == 200) {
    // ツイート成功
    print "tweeted\n";
} else {
    // ツイート失敗
    print "tweet failed\n";
}
