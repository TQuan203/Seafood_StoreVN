<?php
session_start();
require_once "../Common/check_admin.php";
?>
<?php include "./Views/Common/header.php" ?>
<?php include "./Views/Common/menu.php" ?>
<?php

require "../Data/DatabaseUtil.php";
require "../Data/CategoryDao.php";
require "../Data/ProductDao.php";
require "../Data/UserDao.php";
require "../Data/OrderDao.php";
require "../Data/FeedbackDao.php";
require "../Data/RevenueDao.php";
require "../Models/Category.php";
require "../Models/Order.php";
require "../Models/OrderDetails.php";
require "../Models/News.php";

require "../Models/Product.php";
require "../Models/User.php";
require "../Models/Feedback.php";
require "../Models/Revenue.php";
require "../Common/UrlUtil.php";
require "../Common/AppConstats.php";





$controller = filter_input(INPUT_GET, 'controller');

if($controller == null)
    $controller = filter_input(INPUT_POST, 'controller');

if($controller == null)
    $controller = AppConstats::Index_CONTROLLER;

include '../Controller/' .$controller . '.php';
?>
<?php include "./Views/Common/footer.php"?>
