
<?php
session_start();

require "./Data/DatabaseUtil.php";
require "./Data/CategoryDao.php";
require "./Data/ProductDao.php";
require "./Data/UserDao.php";
require "./Data/CartDao.php";
require "./Data/OrderDao.php";
require "./Data/FeedbackDao.php";
require "./Models/Category.php";
require "./Models/Product.php";
require "./Models/User.php";
require "./Models/Order.php";
require "./Models/OrderDetails.php";
require "./Models/SendMail.php";
require "./Models/Feedback.php";
require "./Common/UrlUtil.php";
require "./Common/AppConstats.php";


$controller = filter_input(INPUT_GET, 'controller');

if($controller == null)
    $controller = filter_input(INPUT_POST, 'controller');

if($controller == null)
    $controller = AppConstats::Index_CONTROLLER;

include './Controller/' .$controller . '.php';
