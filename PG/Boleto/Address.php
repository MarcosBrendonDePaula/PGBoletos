<?php
use JsonSerializable;
class Address implements JsonSerializable {
    private $postalCode;
    private $street;
    private $city;
    private $number;
    private $state;
    private $district;

    public function __construct(
        $postalCode=null, 
        $street=null, 
        $city=null, 
        $number=null, 
        $state=null, 
        $district=null) {
            
            $this->postalCode = $postalCode;
            $this->street = $street;
            $this->city = $city;
            $this->number = $number;
            $this->state = $state;
            $this->district = $district;
    }

    public function setPostalCode($postalCode){$this->postalCode = $postalCode;}
    public function getPostalCode(){return $this->postalCode;}
    
    public function setStreet($street){$this->street = $street;}
    public function getStreet(){return $this->street;}
    
    public function setCity($city){$this->city = $city;}
    public function getCity(){return $this->city;}

    public function setNumber($number){$this->number = $number;}
    public function getNumber(){return $this->number;}

    public function setState($state){$this->state = $state;}
    public function getState(){return $this->state;}
    
    public function setDistrict($district){$this->district = $district;}
    public function getDistrict(){return $this->district;}

    #[\ReturnTypeWillChange]
    public function jsonSerialize() {
        return [
            'postalCode' => $this->postalCode,
            'street' => $this->street,
            'city' => $this->city,
            'number' => $this->number,
            'state' => $this->state,
            'district' => $this->district
        ];
    }
}