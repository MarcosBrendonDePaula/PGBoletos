<?php
namespace App\PG\VD;
use Illuminate\Support\Facades\Http;

class Authorization {

    public function __construct(){

    }

    public function get($ambient, $appId = null, $appKey = null, $reference, $redirectUrl, $notificationUrl){
        
        $appId = urlencode($appId);
        $appKey = urlencode($appKey);

        $xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
        <authorizationRequest>
            <reference>%s</reference>
            <permissions>
                <code>CREATE_CHECKOUTS</code>
                <code>RECEIVE_TRANSACTION_NOTIFICATIONS</code>
                <code>SEARCH_TRANSACTIONS</code>
                <code>MANAGE_PAYMENT_PRE_APPROVALS</code>
                <code>DIRECT_PAYMENT</code>
            </permissions>
            <redirectURL>%s</redirectURL>
            <notificationURL>%s</notificationURL>
        </authorizationRequest>';
        $xml = sprintf($xml, $reference, $redirectUrl, $notificationUrl);
        $url = sprintf("%s/v2/authorizations/request/?appId=%s&appKey=%s", $ambient ,$appId, $appKey);
        $response = Http::withBody(
            $xml, 'application/xml; charset=ISO-8859-1'
        )->post($url);

        if($response->status() == 200){
            $res_xml = simplexml_load_string($response->body());
            $code = $res_xml->code;

            $url_redirect = sprintf('%s/v2/authorization/request.jhtml?code=%s', getenv("PAGSEGURO_REDIRECT_AUTH_URL"), $code);

            $obj = array(
                'status' => $response->status(),
                'code' => $code,
                'url' => $url_redirect,
                'error'=> false
            );
            
            return $obj;
        }
        else {

            $obj = array(
                'status' => $response->status(),
                'response' => $response->body(),
                'error'=> true
            );
            return $obj;
        }
    }

    public function consultByCodeNotify($ambient, $notifyCode, $appId = null, $appKey = null){
        $appId = urlencode($appId);
        $appKey = urlencode($appKey);
        $notifyCode = urlencode($notifyCode);

        $url = sprintf('%s/v2/authorizations/notifications/$s?appId=%s&appKey=%s', $ambient, $notifyCode, $appId, $appKey);
        $res = Http::get($url);
        //incompleto!
        return $res->body();
    }

}