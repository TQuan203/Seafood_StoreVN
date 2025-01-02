<?php

class Revenue
{
    public $TotalRevenue;  // Tổng doanh thu

    public function __construct()
    {
        $this->TotalRevenue = 0;  // Khởi tạo doanh thu ban đầu
    }

    // Phương thức tính tổng doanh thu
    public function calculateRevenue($data)
    {
        $this->TotalRevenue = 0;  // Reset tổng doanh thu

        foreach ($data as $order) {
            $this->TotalRevenue += $order['total'];  // Cộng dồn tổng doanh thu
        }
    }
}
