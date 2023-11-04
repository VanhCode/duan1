<?php
    include '../models/pdo.php';
    include '../models/adminModel/categoryModel.php';

    $action = $_GET['action'] ?? 'dashboard';

    include 'partitions/header.php';
    include 'partitions/sideBar.php';


    $listCategory = listDanhmuc();

    switch ($action){
        case 'dashboard':
            include 'dashboard.php';
            break;
        
        
        // list
        case 'listProduct':
            include 'product/listProduct.php';
            break;
        
        case 'listCategory':
            include 'category/listCategory.php';
            break;
        
        case 'listOrder':
            include 'order/listOrder.php';
            break;
        
        case 'listCustomer':
            include 'customer/listCustomer.php';
            break;
        
        case 'listComment':
            include './comment/listComment.php';
            break;
        

        //add
        case 'addProduct':
            include 'product/addProduct.php';
            break;
        
        case 'addCategory':
            if(isset($_POST['addcategory'])) {
                $errCategory = "";
                $namecate = $_POST['danhmuc'];
                $checkCate = true;

                if(empty($namecate)) {
                    $checkCate = false;
                    $errCategory = "Vui lòng nhập trường này";
                }

                if($checkCate) {
                    addCategory($namecate);
                    header('location: index.php?action=listCategory');
                }
            }

            include 'category/addCategory.php';
            break;
        


        //edit
        case 'editProduct':
            include 'product/editProduct.php';
            break;

        case 'editCategory':

            if(isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                $categoryId = $_GET['category_id'];
                $succesEditCate = editCategory($categoryId);
            } else {
                $categoryId = "";
                $succesEditCate = "";
            }

            if(isset($_POST['updateCate'])) {
                $id = $_POST['id'];
                $namecate = $_POST['danhmuc'];
                $checkCate = true;

                if(empty($namecate)) {
                    $checkCate = false;
                    $errCategory = "Vui lòng nhập trường này";
                }

                if($checkCate) {
                    updateCategory($id,$namecate);
                    header('location: index.php?action=listCategory');
                }
                
            }
        
            include 'category/editCategory.php';
            break;


        //other
        case 'order_detail':

        

        default:
            include 'dashboard.php';
        
    }
    include 'partitions/footer.php';