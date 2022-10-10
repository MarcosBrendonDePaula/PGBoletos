<?php
namespace App\PG\Boleto;
use JsonSerializable;
class Document implements JsonSerializable {
    public const CPF = "CPF";
    public const CNPJ = "CNPJ";
    
    private $type = "";
    private $number = "";

    public function __construct(string $type, string $number) {
        $this->type = $type;
        $this->number = $number;
    }
    
    /**
     * @param string define o tipo do documento
     */
    public function setType(string $type) { $this->type = $type; }
    
    /**
     * @return string retorna o tipo do documento
     */
    public function getType() { return $this->type; }
    
    /**
     * @return string define o numero do documento
     */
    public function setNumber($number) { $this->number = $number; }
    
    /**
     * @return string retorna o numero do documento
     */
    public function getNumber() { return $this->number; }
    
    #[\ReturnTypeWillChange]
    public function jsonSerialize() {
        return [
            'type' => $this->type,
            'value' => $this->number,
        ];
    }
}