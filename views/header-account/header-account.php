<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if($_GET['url'] == 'login') {
                ?>
                    Đăng ký ngay | VanhStore Việt Nam
                <?php
            } else {
                ?>
                    Đăng nhập tài khoản - Mua sắm Online | VanhStore
                <?php
            }
        ?>
    </title>
    <link rel="shortcut icon" href="./img1/iconLogo.png" type="image/x-icon">
    <?php
        if($_GET['url'] == 'login') {
            ?>
                <link rel="stylesheet" href="./css/dangky.css">
            <?php
        } else {
            ?>
                <link rel="stylesheet" href="./css/dangnhap.css">
            <?php
        }
    ?>
</head>

<body>
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
                            if($_GET['url'] == 'login') {
                                ?>
                                    Đăng ký
                                <?php
                            } else {
                                ?>
                                    Đăng nhập
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <a href="" class="suppost">Bạn cần giúp đỡ?</a>
            </div>
        </nav>

        

        