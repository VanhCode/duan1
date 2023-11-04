<?php
include '../models/pdo.php';
include '../models/PDO_admin.php';
include '../models/adminModel/categoryModel.php';
include '../models/adminModel/productModel.php';

$action = $_GET['action'] ?? 'dashboard';

include 'partitions/header.php';
include 'partitions/sideBar.php';


$listCategory = listDanhmuc();

switch ($action) {
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
        $users = getAll('users');
        include 'customer/listCustomer.php';
        break;

    case 'listComment':
        include './comment/listComment.php';
        break;


    //add
    case 'addProduct':
        if(isset($_POST['addProduct'])) {
            $namePro = $_POST['namePro'];
            $image = $_FILES['image']['name'];
            $pricePro = $_POST['pricePro'];
            $sale = $_POST['sale'];
            $selectCategory = $_POST['selectCategory'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $amount = $_POST['amount'];
        
            $conn = pdo_get_connection(); // Get the database connection
            if ($conn) {
                $product_id = addProduct($conn, $namePro, $pricePro, $sale, $image, $selectCategory);
        
                for($i = 0; $i < count($color); $i++) {
                    // Perform actions with $color
                }
        
                echo "<script>alert('.$product_id.')</script>";
            }
        }
        include 'product/addProduct.php';
        break;


    case 'addCategory':
        if (isset($_POST['addcategory'])) {
            $errCategory = "";
            $namecate = $_POST['danhmuc'];
            addCategory($namecate);
            header('location: index.php?action=listCategory');
        }

        include 'category/addCategory.php';
        break;


    case 'addCustomer': 
        if(isset($_POST['addUser'])) {
            $path = "../public/upload/image/user/";
            move_uploaded_file($_FILES['user_image']['tmp_name'], $path . $_FILES['user_image']['name']);
            addData('users', [
                'firth_name' => $_POST['firth_name'],
                'last_name' => $_POST['last_name'],
                'user_image' => $path . $_FILES['user_image']['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'phone' => $_POST['phone'],
            ]);
            header("location: index.php?action=listCustomer");
        }
        include 'customer/addCustomer.php';
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
            updateCategory($id,$namecate);
            header('location: index.php?action=listCategory');  
        }
        include 'category/editCategory.php';
        break;

    case 'editCustomer':
        $user = getDataBy('users', [
            'user_id' => $_GET['user_id']
        ]);
        $errValidate = [];
        $err = false;
        if (isset($_POST['firth_name'])) {
            foreach ($_POST as $key => $value) {
                if (empty($value)) {
                    $errValidate[$key] = "không được để trống";
                    $err = true;
                }
            }
            if (!$err) {
                $path = "../public/upload/image/user/";
                move_uploaded_file($_FILES['user_image']['tmp_name'], $path . $_FILES['user_image']['name']);
                updateData('users', [
                    'firth_name' => $_POST['firth_name'],
                    'last_name' => $_POST['last_name'],
                    'user_image' => $path . $_FILES['user_image']['name'] | $user['user_image'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'phone' => $_POST['phone'],
                ], "user_id=" . $_GET['user_id']);
                header("location: index.php?action=listCustomer");
            }
        }
        include 'customer/editCustomer.php';
        break;

    //delete
    case 'deleteCustomer':
        deleteData("users", "user_id=" . $_GET['user_id']);
        header("location:index.php?action=listCustomer");
        break;

    // Delete
    case 'deleteCategory':
        if(isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
            $categoryId = $_GET['category_id'];
            deleteCategory($categoryId);
            header('location: index.php?action=listCategory'); 
        } else {
            $categoryId = "";
        }



        //other
    case 'order_detail':


    default:
        include 'dashboard.php';
}
include 'partitions/footer.php';
