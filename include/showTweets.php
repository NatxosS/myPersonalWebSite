<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Twitter {
    
    public function getTweets() {
        
        require_once 'TwitterAPIExchange.php';

        $settings = array(
            'oauth_access_token' => "623186846-JesHAJNhYyENgEn0mehqxbhEezgXHjJhUuGoNDg6", 
            'oauth_access_token_secret' => "8yEgvbJrlaSUxDwO8Gdmisrm5cGqRxiUWbBjiRwFdV2m2",
            'consumer_key' => "0tbejMFz4uDeVs8qMhcidMhfp",
            'consumer_secret' => 'Ber84U52EzITKvQa1pcCpGIb9lmBR4c0ETbCvAOuxVMEnCNwVZ'
        );
        
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=Natxoss&count=3';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        
        var_dump($json);
        
        return $json;
    }
    
    public function getArrayTweets($jsoraw) {
        
        $array;
        
        
        return $array;
    }
    
    public function displayTweet($rawdata) {
        
        
    }
}

