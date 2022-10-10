<?php
namespace App\PG\Boleto;
use JsonSerializable;
class Customer implements JsonSerializable{
    private Document $document;
    private $name = "";
    private $email = "";
    private Phone $phone;
    private Address $address;

    public function __construct($name=null, $email=null, Phone $phone=null, Document $document=null, Address $address=null){
        $this->name = $name;
        $this->email = $email;
        $this->document = $document;
        $this->phone = $phone;
        $this->address = $address;
        $this->phone = $phone;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize() {
        return [
            'document' => $this->document,
            'name' => $this->name,
            'email'=> $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
        ];
    }

    /**
     * @param Document define o documento do comprador
     */
    public function setDocument(Document $document) { $this->document = $document; }
    
    /**
     * @return Document retorna o documento do comprador
     */
    public function getDocument() { return $this->document; }
   
    /**
     * @param string define o nome do comprador
     */
    public function setName(string $name) { $this->name = $name;}
    
    /**
     * @return string retorna o nome do comprador
     */
    public function getName() { return $this->name; }
    
    /**
     * @param string define o email do comprador
     */
    public function setEmail(string $email){$this->email = $email;}

    /**
     * @return string retorna o email do comprador
     */
    public function getEmail() { return $this->email; }

    /**
     * @param Phone define o telefone do comprador
     */
    public function setPhone(Phone $phone){$this->phone = $phone;}
    
    /**
     * @return Phone retorna o telefone do comprador
     */
    public function getPhone() { return $this->phone;}

    /**
     * @param Address define o endereço do comprador
     */
    public function setAddress(Address $address) { $this->address = $address;}
    
    /**
     * @return Address retorna o endereço do comprador
     */
    public function getAddress() { return $this->address; }

}