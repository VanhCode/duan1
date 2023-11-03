<?php
include '../model/PDO_admin.php';
$action=$_GET['action']??'dashboard';
switch ($action){
    default:{
        include 'dashboard.php';
    }
}