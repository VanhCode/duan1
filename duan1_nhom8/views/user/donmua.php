<div class="single-box">
    <div class="nav-form">
        <ul>
            <li class="abill"><a href="index.php?url=user&user=don-mua&order=all">Tất cả</a></li>
            <li class="abill"><a href="index.php?url=user&user=don-mua&order=cho-thanh-toan">Chờ thanh toán</a></li>
            <li class="abill"><a href="index.php?url=user&user=don-mua&order=van-chuyen">Vận chuyển</a></li>
            <li class="abill"><a href="index.php?url=user&user=don-mua&order=dang-giao">Đang giao</a></li>
            <li class="abill"><a href="index.php?url=user&user=don-mua&order=hoan-thanh">Hoàn thành</a></li>
            <li class="abill"><a href="index.php?url=user&user=don-mua&order=da-huy">Đã hủy</a></li>
            <li class="abill"><a href="index.php?url=user&user=don-mua&order=tra-hang">Trả hàng/Hoàn tiền</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <?php

            if (isset($_GET['url']) && isset($_GET['user']) && isset($_GET['order'])) {
                $url = $_GET['url'];
                $user = $_GET['user'];
                $order = $_GET['order'];

                if ($url == "user" && $user == "don-mua" && $order == "all") {
                    include "donmua/fullbill.php";
                } else if ($url == "user" && $user == "don-mua" && $order == "cho-thanh-toan") {
                    include "donmua/chothanhtoan.php";
                } else if ($url == "user" && $user == "don-mua" && $order == "van-chuyen") {
                    include "donmua/vanchuyen.php";
                } else if ($url == "user" && $user == "don-mua" && $order == "dang-giao") {
                    include "donmua/danggiao.php";
                } else if ($url == "user" && $user == "don-mua" && $order == "hoan-thanh") {
                    include "donmua/hoanthanh.php";
                } else if ($url == "user" && $user == "don-mua" && $order == "da-huy") {
                    include "donmua/dahuy.php";
                } else if ($url == "user" && $user == "don-mua" && $order == "tra-hang") {
                    include "donmua/trahang.php";
                }
            } else {
                include "donmua/fullbill.php";
            }


            // include "donmua/fullbill.php";
            // include "donmua/chothanhtoan.php";
            // include "donmua/vanchuyen.php";
            // include "donmua/danggiao.php";
            // include "donmua/hoanthanh.php";
            // include "donmua/dahuy.php";
            // include "donmua/trahang.php";
        ?>
    </div>
</div>