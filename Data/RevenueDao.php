<?php

class RevenueDao
{
    var $dbu;

    public function __construct()
    {
        $this->dbu = new DatabaseUtil();
        $this->dbu->Open();
    }

    // Phương thức lấy doanh thu từ tất cả các đơn hàng hoàn thành
    public function getRevenueData($toDate, $fromDate)
    {
        $sql = "SELECT total FROM orders WHERE (date BETWEEN :from_date AND :to_date) and status = 0   ";
        $args = array('to_date' => $toDate, 'from_date'=> $fromDate);
        $result = $this->dbu->Query($sql, $args);

        return $result;  // Dữ liệu trả về là mảng các đơn hàng với trường 'total'
    }
    public function Find()
    {
        $sql = "SELECT * FROM orders";

        $orders = $this->dbu->Query($sql, array());

        return $orders;
    }
    
}
