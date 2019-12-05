<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function sendsms($number, $message_body, $return = '0') {

    $sender = 'SEDEMO'; 
    $smsGatewayUrl = 'http://springedge.com';
    $apikey = '62q3z3hs4941mve32s9kf10fa5074n7'; 
    $textmessage = urlencode($textmessage);
    $api_element = '/api/web/send/';
    $api_params = $api_element.'?
    apikey='.$apikey.'&sender='.$sender.'&to='.$mobileno.'&message='.$textmessage;
    $smsgatewaydata = $smsGatewayUrl.$api_params;
    $url = $smsgatewaydata;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); $output = curl_exec($ch);
    curl_close($ch);
    if(!$output){ $output = file_get_contents($smsgatewaydata); }
    if($return == '1'){ 
        return $output; 
    }else{
         echo "Sent";
    }
}

function smsSend(){

    //all parameters in array
    $apiParams = array(
        'user' => 'put_your_username',
        'apiKey' => 'put_your_api_key',
        'senderID' => 'put_your_sender_id',
        'receipientno' => 'put_receiver_contact_no',
        'message' => 'Put sms message here'
    );

    //merge API url and parameters
    $apiUrl = "http://api.domainname.com/http/sendsms?";
    foreach($apiParams as $key => $val){
        $apiUrl .= $key.'='.urlencode($val).'&';
    }
    $apiUrl = rtrim($apiUrl, "&");

    //API call
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_exec($ch);
    curl_close($ch);

}