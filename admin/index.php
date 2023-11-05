<?php
include '../models/pdo.php';
include '../models/PDO_admin.php';
include '../models/adminModel/categoryModel.php';
include '../models/adminModel/productModel.php';
include '../models/adminModel/varitionModel.php';

$action = $_GET['action'] ?? 'dashboard';

include 'partitions/header.php';
include 'partitions/sideBar.php';


$listCategory = listDanhmuc();
$listProduct = listProduct();

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
            $pricePro = $_POST['pricePro'];
            $sale = $_POST['sale'];
            $selectCategory = $_POST['selectCategory'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $amount = $_POST['amount'];
            

            $filename =  time().basename($_FILES['image']['name']);
            $target = "../public/upload/image/product/".$filename;
            move_uploaded_file($_FILES['image']['tmp_name'], $target);


            $product_id = addProduct($namePro,$pricePro,$sale,$filename,$selectCategory);

            for($i = 0; $i < count($color); $i++) {
                addVation($product_id,$color[$i],$size[$i],$amount[$i]);
            }

            header('location: index.php?action=listProduct');
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
        if(isset($_GET['id_product']) && ($_GET['id_product'] > 0)) {
            $idProduct = $_GET['id_product'];
            $productInfo = selectIdproduct($idProduct);
        
            // Lấy danh sách biến thể của sản phẩm cụ thể theo id
            $listVariations = getVariationsByProductId($idProduct);
        } else {
            $idProduct = "";
            $productInfo = "";
            $listVariations = array();
        }

        if(isset($_POST['updatePro'])) {
            $id = $_POST['id'];
            $variant_id = $_POST['variant_id'];
            $namePro = $_POST['namePro'];
            $pricePro = $_POST['pricePro'];
            $sale = $_POST['sale'];
            $selectCategory = $_POST['selectCategory'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $amount = $_POST['amount'];

            $filename = "";

            if($_FILES['image']['name']) {
                $filename =  time().basename($_FILES['image']['name']);
                $target = "../public/upload/image/product/".$filename;
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
            }

            $product_id = updateProduct($id,$namePro,$pricePro,$sale,$filename,$selectCategory);

            for($i = 0; $i < count($color); $i++) {
                updateVation($variant_id[$i],$color[$i],$size[$i],$amount[$i]);
            }

            header('location: index.php?action=listProduct');
        }

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

        if (isset($_POST['firth_name'])) {
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

    case 'deleteProduct':
        if(isset($_GET['id_product']) && ($_GET['id_product'] > 0)) {
            $productId = $_GET['id_product'];
            deleteProduct($productId);
            header('location: index.php?action=listProduct'); 
        } else {
            $productId = "";
        }
        


    //other
    case 'order_detail':


    default:
        include 'dashboard.php';
}
include 'partitions/footer.php';
