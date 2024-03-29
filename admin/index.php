<?php
include '../models/pdo.php';
include '../models/PDO_admin.php';
include '../models/adminModel/categoryModel.php';
include '../models/adminModel/productModel.php';
include '../models/adminModel/varitionModel.php';
include '../models/adminModel/commentModel.php';
include '../models/adminModel/orderModel.php';
include '../models/adminModel/dashboardModel.php';
include '../models/adminModel/voucherModel.php';
include '../models/adminModel/statisticalModel.php';

$action = $_GET['action'] ?? 'dashboard';

include 'partitions/header.php';
include 'partitions/sideBar.php';
session_start();
$userID = $_SESSION['user_id'] ?? 0;
$user = getDataBy('users',['user_id'=>$userID]);
$_SESSION['user']=$user;
if($user){
    if(!$user['role']){
        header('location: ../index.php?action=login');
    }
}else{
    header('location: ../index.php?action=login');
}

$listCategory = listDanhmuc();
switch ($action) {
    case 'dashboard':
        $_GET['day']=$_GET['day']??1;
        $day=$_GET['day'];
        $totalSell=totalSell($day);
        $newOrder=newOrder($day);
        $totalUser=totalUser();
        $todolist=getAll('todolist');

        include 'dashboard.php';
        break;
    case 'statistical':
        $product_volume=product_volume();
        $sale_volume=array_column($product_volume,'sale_volume');
        $product_name=array_column($product_volume,'product_name');
        $product_volume=[];
        $product_volume['sale_volume']=$sale_volume;
        $product_volume['product_name']=$product_name;
        $product_volume=json_encode($product_volume);
        include 'statistical.php';
        break;
    // list
    case 'listVoucher':
        $allVoucher=getAll('voucher',['voucher_id DESC']);
        include 'voucher/listVoucher.php';
        break;

    case 'listProduct':
        if(isset($_GET['product_page']) && ($_GET['product_page'] > 0)) {
            $product_page = $_GET['product_page'];
        } else {
            $product_page = 1;
        }

        if($product_page == "" || $product_page == 1) {
            $begin = 0;
        } else {
            $begin = ($product_page - 1) * 5;
        }

        $listPageProduct = page_product();
        $listProduct = listProduct($begin);

        $count = count($listPageProduct);

        $countTrang = ceil($count / 5);

        include 'product/listProduct.php';
        break;

    case 'listCategory':

        include 'category/listCategory.php';
        break;

    case 'listOrder':
        $_GET['filter_status']=$_GET['filter_status']??'';
        $filter_status=$_GET['filter_status'];
        $listOrder=listOrder($filter_status);
        include 'order/listOrder.php';
        break;

    case 'listOrder_detail':
        $order_id=$_GET['order_id']??0;
        $listOrder_detail=listOrder_detail($order_id);
        include 'order/listOrder_detail.php';
        break;
    case 'listComment_statistical':
        $listComment_statistical=listComment_statistical();
        include 'comment/listComment_statistical.php';
        break;
    case 'listComment':
        $limit=6;
        $_GET['page']=$_GET['page']??1;
        $startIndex=($_GET['page']-1)*$limit;
        $product_id=$_GET['product_id']??0;
        $countCmt=count($comments=listCommentByProduct_id($product_id,0,9999999));
        $pageSL=ceil($countCmt/$limit);
        $comments=listCommentByProduct_id($product_id,$startIndex,$limit);
        include 'comment/listComment.php';
        break;

    case 'listCustomer':
        $users = getAll('users',['user_id DESC']);
        include 'customer/listCustomer.php';
        break;


    //add
    case 'addVoucher':
        $products=getAll('products');
        $_POST['del_price']=$_POST['del_price']??0;
        $_POST['del_percent']=$_POST['del_percent']??0;
        if(isset($_POST['addVoucher'])){
            $voucher_id=addDataReturnId('voucher',[
                'content_voucher'=>$_POST['content_voucher'],
                'del_price'=>$_POST['del_price'],
                'del_percent'=>$_POST['del_percent'],
                'from_price'=>$_POST['from_price'],
                'to_price'=>$_POST['to_price'],
                'start_date'=>$_POST['start_date'],
                'end_date'=>$_POST['end_date']
            ]);
            if(isset($_POST['addForAll'])){
                if(isset($_POST['product_id'])){
                    foreach ($_POST['product_id'] as $product_id){
                        addVoucherForAllUser($voucher_id,$product_id);
                    }
                }else{
                    addVoucherForAllUser($voucher_id);
                }
            }
            if(isset($_POST['onlineDay'])){
                if(isset($_POST['product_id'])){
                    foreach ($_POST['product_id'] as $product_id){
                        addVoucherForNewUser($voucher_id, $_POST['onlineDay'],$product_id);
                    }
                }else {
                    addVoucherForNewUser($voucher_id, $_POST['onlineDay']);
                }
            }
            if(isset($_POST['paymentLimit'])){
                if(isset($_POST['product_id'])){
                    foreach ($_POST['product_id'] as $product_id){
                        addVoucherForUserWithPaymentLimit($voucher_id, $_POST['paymentLimit'],$product_id);
                    }
                }else {
                    addVoucherForUserWithPaymentLimit($voucher_id, $_POST['paymentLimit']);
                }
            }
            header("location: index.php?action=listVoucher");
        }
        include 'voucher/addVoucher.php';
        break;
    case 'addProduct':
        if (isset($_POST['addProduct'])) {
            $namePro = $_POST['namePro'];
            $image = $_FILES['image']['name'];
            $pricePro = $_POST['pricePro'];
            $sale = $_POST['sale'];
            $selectCategory = $_POST['selectCategory'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $amount = $_POST['amount'];
            $product_gender = $_POST['product_gender'];
            $description=$_POST['description'];

            $uploadedImages = array();

            foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
                $filename = time() . basename($_FILES['image']['name'][$key]);
                $target = "../public/upload/image/product/" . $filename;

                if (move_uploaded_file($tmp_name, $target)) {
                    $uploadedImages[] = $filename;
                }
            }

            $filename = implode(",", $uploadedImages);

            $product_id = addProduct($namePro, $pricePro, $sale, $filename, $product_gender, $selectCategory,$description);

            for ($i = 0; $i < count($color); $i++) {
                addVation($product_id, $color[$i], $size[$i], $amount[$i]);
            }

            header('location: index.php?action=listProduct');
        }
        $listCategory_addSp = listDanhmuc_addsp();
        include 'product/addProduct.php';
        break;


    case 'addCategory':
        if (isset($_POST['addcategory'])) {
            $errCategory = "";
            $namecate = $_POST['danhmuc'];
            $trangthai = $_POST['checkshow'];


            $filename = time().basename($_FILES['imageCate']['name']);
            $target = "../public/upload/image/category/".$filename;
            move_uploaded_file($_FILES['imageCate']['tmp_name'],$target);

            addCategory($namecate,$filename,$trangthai);
            header('location: index.php?action=listCategory');
        }

        include 'category/addCategory.php';
        break;


    case 'addCustomer':
        if (isset($_POST['addUser'])) {
            $path = "../public/upload/image/user/";
            move_uploaded_file($_FILES['user_image']['tmp_name'], $path . $_FILES['user_image']['name']);
            addData('users', [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'user_image' => $_FILES['user_image']['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'],PASSWORD_DEFAULT),
                'phone' => $_POST['phone'],
                'role'=>$_POST['role']??0,
                'gender'=>$_POST['gender']??''
            ]);
            header("location: index.php?action=listCustomer");
        }

        include 'customer/addCustomer.php';
        break;


    //edit
    case 'editVoucher':
        $products=getAll('products');
        $voucher_id=$_GET['voucher_id']??0;
        $voucher=getDataBy('voucher',[
            'voucher_id'=>$voucher_id
        ]);
//        echo "<pre>";
//        print_r($voucher);
        if(isset($_POST['editVoucher'])){
            updateData('voucher',[
                'content_voucher'=>$_POST['content_voucher'],
                'del_price'=>$_POST['del_price'],
                'del_percent'=>$_POST['del_percent'],
                'from_price'=>$_POST['from_price'],
                'to_price'=>$_POST['to_price'],
                'start_date'=>$_POST['start_date'],
                'end_date'=>$_POST['end_date'],
            ],"voucher_id=$voucher_id");

            if(isset($_POST['addForAll'])){
                if(isset($_POST['product_id'])){
                    foreach ($_POST['product_id'] as $product_id){
                        addVoucherForAllUser($voucher_id,$product_id);
                    }
                }else{
                    addVoucherForAllUser($voucher_id);
                }
            }
            if(isset($_POST['onlineDay'])){
                if(isset($_POST['product_id'])){
                    foreach ($_POST['product_id'] as $product_id){
                        addVoucherForNewUser($voucher_id, $_POST['onlineDay'],$product_id);
                    }
                }else {
                    addVoucherForNewUser($voucher_id, $_POST['onlineDay']);
                }
            }
            if(isset($_POST['paymentLimit'])){
                if(isset($_POST['product_id'])){
                    foreach ($_POST['product_id'] as $product_id){
                        addVoucherForUserWithPaymentLimit($voucher_id, $_POST['paymentLimit'],$product_id);
                    }
                }else {
                    addVoucherForUserWithPaymentLimit($voucher_id, $_POST['paymentLimit']);
                }
            }
            header("location: index.php?action=listVoucher");
        }
        include 'voucher/editVoucher.php';
        break;

    case 'editProduct':
        if (isset($_GET['id_product']) && ($_GET['id_product'] > 0)) {
            $idProduct = $_GET['id_product'];

            // Lấy ra 1 sản phẩm edit theo id
            $productInfo = selectIdproduct($idProduct);

            // Lấy danh sách biến thể của sản phẩm cụ thể theo id
            $listVariations = getVariationsByProductId($idProduct);
        } else {
            $idProduct = "";
            $productInfo = "";
            $listVariations = array();
        }

        if (isset($_POST['updatePro'])) {
            $id = $_POST['id'];
            $variant_id = $_POST['variant_id'];
            $namePro = $_POST['namePro'];
            $pricePro = $_POST['pricePro'];
            $sale = $_POST['sale'];
            $selectCategory = $_POST['selectCategory'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $amount = $_POST['amount'];
            $product_gender = $_POST['product_gender'];
            $oldImage = $_POST['oldImage'];
            $description=$_POST['description'];

            if ($_FILES['image']['name']) {
                $uploadedImages = array();

                foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
                    $filename = time() . basename($_FILES['image']['name'][$key]);
                    $target = "../public/upload/image/product/" . $filename;

                    if (move_uploaded_file($tmp_name, $target)) {
                        $uploadedImages[] = $filename;
                    }
                }

                $filename = implode(",", $uploadedImages);

            }

            if ($oldImage !== "" && $filename !== "") {
                $oldImage = $oldImage . ",";
            }

            $product_id = updateProduct($id, $namePro, $pricePro, $sale, $filename ? $oldImage . $filename : $oldImage, $product_gender, $selectCategory,$description);

            $length=9999;

            for ($i = 0; $i < $length; $i++) {
                //nếu cả 2 tồn tại
                if (isset($variant_id[$i]) && isset($color[$i])) {
                    updateVation($variant_id[$i], $color[$i], $size[$i], $amount[$i]);
                }

                if (!isset($variant_id[$i]) && isset($color[$i])) {
                    addVation($id, $color[$i], $size[$i], $amount[$i]);
                    $length=count($color);
                }

                if(!isset($color[$i])&&isset($variant_id[$i])) {
                    deleteVation($variant_id[$i]);
                    $length=count($variant_id);
                }


            }

            header('location: index.php?action=listProduct');
        }

        include 'product/editProduct.php';
        break;
    case 'editCategory':
        if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
            $categoryId = $_GET['category_id'];
            $succesEditCate = editCategory($categoryId);
        } else {
            $categoryId = "";
            $succesEditCate = "";
        }

        if (isset($_POST['updateCate'])) {
            $id = $_POST['id'];
            $namecate = $_POST['danhmuc'];
            $trangthai = $_POST['checkshow'];
            $oldCate = $_POST['oldCate'];

            if(!empty($_FILES['imageCate']['name'])) {
                $filename = time().basename($_FILES['imageCate']['name']);
                $target = "../public/upload/image/category/" . $filename;
                move_uploaded_file($_FILES['imageCate']['tmp_name'],$target);
            }

            updateCategory($id,$namecate,$filename ? $filename : $oldCate,$trangthai);
            header('location: index.php?action=listCategory');
        }

        include 'category/editCategory.php';
        break;
    case 'editComment':
        include './comment/editComment.php';
        break;

    case 'editCustomer':
        $user = getDataBy('users', [
            'user_id' => $_GET['user_id']
        ]);

        if (isset($_POST['first_name'])) {
            $path = "../public/upload/image/user/";
            move_uploaded_file($_FILES['user_image']['tmp_name'], $path . $_FILES['user_image']['name']);
            updateData('users', [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'user_image' => $_FILES['user_image']['name'] !='' ? $_FILES['user_image']['name']:  $user['user_image'],
                'email' => $_POST['email'],
                'password' => $_POST['password']==$user['password']?$_POST['password']:password_hash($_POST['password'],PASSWORD_DEFAULT),
                'phone' => $_POST['phone'],
                'role'=>$_POST['role']??0,
                'gender'=>$_POST['gender']??''
            ], "user_id=" . $_GET['user_id']);
            header("location: index.php?action=listCustomer");
        }

        include 'customer/editCustomer.php';
        break;

    // Delete
    case 'deleteVoucher':
        $voucher_id=$_GET['voucher_id']??0;
        deleteData('voucher','voucher_id='.$voucher_id);
        header('location:'.$_SERVER['HTTP_REFERER']);
        break;
    case 'deleteCustomer':
        deleteData("users", "user_id=" . $_GET['user_id']);
        header("location:index.php?action=listCustomer");
        break;


    case 'deleteProduct':
        if (isset($_GET['id_product']) && ($_GET['id_product'] > 0)) {
            $productId = $_GET['id_product'];

            $selectImage = selectIdproduct($productId);

            $selectImage = explode(",", $selectImage['images']);

            // echo "<pre>";
            // print_r($selectImage);


            foreach ($selectImage as $valueTarget) {
                $target = "../public/upload/image/product/" . $valueTarget;
                unlink($target);
            }

            deleteProduct($productId);
            header('location: index.php?action=listProduct');
        } else {
            $productId = "";
        }

    case 'deleteCategory':
        if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
            $categoryId = $_GET['category_id'];
            $selectImg_byId = editCategory($categoryId);

            unlink("../public/upload/image/category/".$selectImg_byId['image_cate']);
            deleteCategory($categoryId);

            header('location: index.php?action=listCategory');
        } else {
            $categoryId = "";
            $selectImg_byId = "";
        }
    case 'deleteComment':
        $comment_id=$_GET['comment_id']??0;
        deleteData('comments','comment_id='.$comment_id);
        header("Location: ".$_SERVER['HTTP_REFERER']);
        break;

    //other
    case 'order_detail':


    default:
        include 'dashboard.php';
}
include 'partitions/footer.php';
