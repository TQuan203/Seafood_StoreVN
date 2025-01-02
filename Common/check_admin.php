<?php

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 1) {
        header("location: ../");
    }
}elseif (!isset($_SESSION['user'])){
    header("location: ../");
}
