<?php


class OrderDetails
{
    public $Id;
    public $Order_id;
    public $Product_id;
    public $Price;
    public $Amount;

    public function RetrieveRequestParam()
    {
        if(isset($order_id)){
            $this->Order_id = $order_id;
        }
        if(isset($Product_id)){
            $this->Product_id = $Product_id;
        }
        if(isset($Price)){
            $this->Price = $Price;
        }
        if(isset($Amount)){
            $this->Amount = $Amount;
        }
        $id =  filter_input(INPUT_POST, 'id');

        if ($id != null) $this->Id = $id;
    }
}