<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/loadding.css">
    <title>
        <?php
            if($_GET['action'] == 'login') {
                ?>
                    Đăng nhập tài khoản - Mua sắm Online | VanhStore
                <?php
            } else {
                ?>
                    Đăng ký ngay | VanhStore Việt Nam
                <?php
            }
        ?>
    </title>
    <link rel="shortcut icon" href="./img1/iconLogo.png" type="image/x-icon">
    <?php
        if($_GET['action'] == 'login') {
            ?>
                <link rel="stylesheet" href="./css/dangnhap.css">
                <?php
        } else {
            ?>
                <link rel="stylesheet" href="./css/dangky.css">
            <?php
        }
    ?>
</head>

<body>
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>
    <div class="wrapper">

        <!-- Header -->

        <nav class="nav_signup">
            <div class="logo_header">
                <div class="logo">
                    <a href="index.php">
                        <img src="./img1/vanhcart.jpg" alt="">
                    </a>
                    <div class="signup">
                        <?php
                            if($_GET['action'] == 'login') {
                                ?>
                                    Đăng nhập
                                <?php
                            } else {
                                ?>
                                    Đăng ký
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <a href="" class="suppost">Bạn cần giúp đỡ?</a>
            </div>
        </nav>

        

        