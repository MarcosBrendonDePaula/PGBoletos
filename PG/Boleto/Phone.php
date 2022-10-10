<?php

namespace App\PG\Boleto;
use JsonSerializable;
class Phone implements JsonSerializable  {
    private $number;
    private $areaCode;
    
    public function __construct($number, $areaCode) {
        $this->number = $number;
        $this->areaCode = $areaCode;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize() {
        return [
            'number' => $this->number,
            'areaCode' => $this->areaCode
        ];
    }

    /**
     * Get the value of areaCode
     */ 
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * Set the value of areaCode
     *
     * @return  self
     */ 
    public function setAreaCode($areaCode)
    {
        $this->areaCode = $areaCode;

        return $this;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }
}