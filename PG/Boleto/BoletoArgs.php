<?php
namespace App\PG\Boleto;
use JsonSerializable;
class BoletoArgs implements JsonSerializable {
    private string  $reference;
    private string  $firstDueDate;
    private int     $numberOfPayments = 0;
    private string  $periodicity;
    private float   $amount = 5.00;
    private string  $instructions;
    private string  $description;
    private Customer $customer;
    
    public function __construct(string $reference, $firstDueDate, $numberOfPayments, $periodicity, $amount, $instructions, $description, Customer $customer) {
        $this->firstDueDate = $firstDueDate;
        $this->customer = $customer;
        $this->reference = $reference;
        $this->numberOfPayments = $numberOfPayments;
        $this->periodicity = $periodicity;
        $this->amount = $amount;
        $this->instructions = $instructions;
        $this->description = $description;
    }

    

    #[\ReturnTypeWillChange]
    public function jsonSerialize() {
        return [
            'reference' => $this->reference,
            'firstDueDate' => $this->firstDueDate,
            'numberOfPayments' => $this->numberOfPayments,
            'periodicity' => $this->periodicity,
            'amount' => $this->amount,
            'instructions' => $this->instructions,
            'description' => $this->description,
            'customer' => $this->customer,
        ];
    }

    /**
     * Get the value of reference
     */ 
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */ 
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get the value of firstDueDate
     */ 
    public function getFirstDueDate()
    {
        return $this->firstDueDate;
    }

    /**
     * Set the value of firstDueDate
     *
     * @return  self
     */ 
    public function setFirstDueDate($firstDueDate)
    {
        $this->firstDueDate = $firstDueDate;

        return $this;
    }

    /**
     * Get the value of numberOfPayments
     */ 
    public function getNumberOfPayments()
    {
        return $this->numberOfPayments;
    }

    /**
     * Set the value of numberOfPayments
     *
     * @return  self
     */ 
    public function setNumberOfPayments($numberOfPayments)
    {
        $this->numberOfPayments = $numberOfPayments;

        return $this;
    }

    /**
     * Get the value of periodicity
     */ 
    public function getPeriodicity()
    {
        return $this->periodicity;
    }

    /**
     * Set the value of periodicity
     *
     * @return  self
     */ 
    public function setPeriodicity($periodicity)
    {
        $this->periodicity = $periodicity;

        return $this;
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of instructions
     */ 
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * Set the value of instructions
     *
     * @return  self
     */ 
    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of customer
     */ 
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set the value of customer
     *
     * @return  self
     */ 
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }
}