<?php
namespace App\PG\Boleto;
use JsonSerializable;
use Illuminate\Support\Facades\Http;
class Boleto implements JsonSerializable {
    private string $code = "";
    private string $paymentLink = "";
    private string $barcode = "";
    private string $dueDate = "";

    public function __construct(string $code, string $paymentLink, string $barcode, string $dueDate) {
        $this->code = $code;
        $this->paymentLink = $paymentLink;
        $this->barcode = $barcode;
        $this->dueDate = $dueDate;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize() {
        return [
            'code' => $this->code,
            'paymentLink' => $this->paymentLink,
            'barcode' => $this->barcode,
            'dueDate' => $this->dueDate,
        ];
    }

    /**
     * @return [] retorna as variaveis da classe
     */
    private function __expost(){
        return get_object_vars($this);
    }
    
    /**
     * @return string retorna a classe em formato json
     */
    public function to_json(){
        return json_encode($this->__expost());
    }

    public function cancel($ambient, $VEMAIL = null, $VTOKEN = null){
       
        ($VEMAIL == null)?$VEMAIL = $this->defaultEmail: $VEMAIL;
        ($VTOKEN == null)?$VTOKEN = $this->defaultToken: $VTOKEN;
        $VEMAIL = urlencode($VEMAIL);
        $VTOKEN = urlencode($VTOKEN);

        $url = url(sprintf("%s/v2/transactions/cancels?email=%s&token=%s&transactionCode=%s", $ambient, $VEMAIL, $VTOKEN, $this->code));
        $res = Http::withBody("", 'application/json')->post($url);
        return $res->body();
    }
    
    public function getDetails($ambient, $VEMAIL = null, $VTOKEN = null){
        
        ($VEMAIL == null)?$VEMAIL = $this->defaultEmail: $VEMAIL;
        ($VTOKEN == null)?$VTOKEN = $this->defaultToken: $VTOKEN;
        $VEMAIL = urlencode($VEMAIL);
        $VTOKEN = urlencode($VTOKEN);

        $url = url(sprintf("%s/v2/transactions/%s?email=%s&token=%s", $ambient, $this->code ,$VEMAIL, $VTOKEN));
        $res = Http::get($url);
        return $res->body();
    }
}
