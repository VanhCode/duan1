<?php
include '../model/PDO_admin.php';
$action=$_GET['action']??'dashboard';
include 'partitions/header.php';
include 'partitions/sideBar.php';
switch ($action){
    case 'dashboard':{
        include 'dashboard.php';
        break;
    }
//    list
    case 'listProduct':{
        include 'product/listProduct.php';
        break;
    }
    case 'listOrder':{
        include 'order/listOrder.php';
        break;
    }
    case 'listCustomer':{
        include 'customer/listCustomer.php';
        break;
    }

    //add
    case 'addProduct':{
        include 'product/addProduct.php';
        break;
    }


    //edit
    case 'editProduct':{
        include 'product/editProduct.php';
        break;
    }


    //other
    case 'order_detail':{

    }

    default:{
        include 'dashboard.php';
    }
}
include 'partitions/footer.php';