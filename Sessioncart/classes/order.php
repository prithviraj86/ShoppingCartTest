<?php
class Order{
    private $user_id;
    private $order_id;


    private $payment_id;

    private $firstname;
    private $middelname;
    private $lastname;
    private $street;
    private $city;
    private $state;
    private $pin;
    private $payment_mode;


    public function __construct(array $orderdata)
    {

        $this->user_id=session_id();
        $this->setFirstName($orderdata['firstname']);
        $this->setMiddelName($orderdata['middelname']);
        $this->setLastName($orderdata['lastname']);
        $this->setStreet($orderdata['street']);
        $this->setCity($orderdata['city']);
        $this->setState($orderdata['state']);
        $this->setPin($orderdata['pin']);
        $this->setPaymentMode($orderdata['paymode']);

    }
    public function setFirstName(string $firstname)
    {
        if($firstname=='')
        {
            throw new Exception('Firstname is blank');
        }
        else
        {
            $this->firstname=$firstname;
        }

    }
    public function getFirstName()
    {
        return $this->firstname;
    }
    public function setMiddelName(string $middelname)
    {
        if($middelname=='')
        {
            $this->middelname = 'Null';
        }
        else
        {
            $this->middelname = $middelname;
        }
    }
    public function getMiddelName()
    {
        return $this->middelname;
    }
    public function setLastName(string $lastname)
    {
        if($lastname=='')
        {
            throw new Exception('Lastname is blank');
        }
        else
        {
            $this->lastname = $lastname;
        }
    }
    public function getLastName()
    {
        return $this->lastname;
    }
    public function setStreet(string $street)
    {
        if ($street=='')
        {
            throw new Exception('Street is blank');
        }
        else {
            $this->street = $street;
        }
    }
    public function getStreet()
    {
        return $this->street;
    }
    public function setCity(string $city)
    {
        if ($city=='')
        {
            throw new Exception('City is blank');
        }
        else {
            $this->city = $city;
        }
        }
    public function getCity()
    {
        return $this->city;
    }
    public function setState(string $state)
    {
        if ($state==''){
            throw new Exception('State is blank');
        }
        else {
            $this->state = $state;
        }
    }
    public function getState()
    {
        return $this->state;
    }
    public function setPin(int $pin)
    {
        if ($pin==''){
            throw new Exception('Pin is blank');
        }
        else {
            $this->pin = $pin;
        }
    }
    public function getPin()
    {
        return $this->pin;
    }
    public function setPaymentMode(string $paymentmode)
    {
        if ($paymentmode==''){
            throw new Exception('Paymentmode is blank');
        }
        else {
            $this->payment_mode = $paymentmode;
        }
    }
    public function getPaymentMode()
    {
        return $this->payment_mode;
    }
}

?>