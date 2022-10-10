<?php
namespace App\PG\Boleto;
use JsonSerializable;
use Exceptions;
use Illuminate\Support\Facades\Http;

class BoletoGenerator{
    
    
    
    private $ambient = null;
    private $defaultEmail = null;
    private $defaultToken = null;
    

    public function __construct(){
    }

    public function Generate(BoletoArgs $args, $ambient, $VEMAIL = null, $VTOKEN = null){

        ($VEMAIL == null)?$VEMAIL = $this->defaultEmail: $VEMAIL;
        ($VTOKEN == null)?$VTOKEN = $this->defaultToken: $VTOKEN;
        $VEMAIL = urlencode($VEMAIL);
        $VTOKEN = urlencode($VTOKEN);

        $url = sprintf("%s/recurring-payment/boletos?email=%s&token=%s", $ambient, $VEMAIL, $VTOKEN);
        $res = Http::withBody(json_encode($args), 'application/json')->post($url);

        $boletos_json = json_decode($res, true);
        $boletos = array();
    
        foreach ($boletos_json["boletos"] as $b){
            $boleto = new Boleto(
            $b['code'], 
            $b['paymentLink'], 
            $b['barcode'], 
            $b['dueDate']);
            array_push($boletos, $boleto); 
        }
        return $boletos;
    }
}