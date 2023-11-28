<?php
    session_start();
    include "../models/pdo.php";
    include "../models/userModel/commentModel.php";

    $userID = $_SESSION['user_id'] ?? 0;

    if(isset($_POST['noidung'])) {
        $productId = $_POST['idproduct'];
        $noidung = $_POST['noidung'];
        insert__comment($userID,$productId,$noidung);
        // header('Location:'.$_SERVER['HTTP_REFERER']);
        // die;
    }


    $listComment = loadall__comment__Byid($_POST['idproduct']);


    foreach($listComment as $comment) {
        ?>
            <div class="vanhstore-product-rating">
                <a href="" class="vanhstore-product-rating__avatar">
                    <div class="vanhstore-avatar">
                        <img class="vanhstore-avatar__img" src="./public/upload/image/user/<?= isset($comment['user_image']) ? $comment['user_image'] : "" ?>" alt="">
                    </div>
                </a>
                <div class="vanhstore-product-rating__main">
                    <a class="vanhstore-product-rating__author-name" href="/shop/991020722"><?= $comment['firth_name']." ".$comment['last_name'] ?></a>
                    <div class="repeat-purchase-con">
                        <div class="vanhstore-product-rating__rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="vanhstore-product-rating__time"><?= date('Y-m-d', strtotime($comment['create_at'])) ?></div>
                    <div class="vanhstore-product-comment-list__content"><?= $comment['content'] ?>
                        <div style="position: absolute; right: 0px; bottom: 0px; background: linear-gradient(to left, rgb(255, 255, 255) 75%, rgba(255, 255, 255, 0)); padding-left: 24px;"></div>
                    </div>
                </div>
            </div>
        <?php
    }

    //  .= '';

    // echo $output;

?>