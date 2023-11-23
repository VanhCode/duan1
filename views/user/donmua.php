<div class="single-box">
    <div class="nav-form">
        <ul>
            <li class="abill <?= $order == 'all' ? 'activeNav' : "" ?>"><a class="<?= $order == 'all' ? 'sticky' : "" ?>" href="index.php?action=user&user=don-mua&order=all">Tất cả <?= !empty($load_order_all) ? "(".count($load_order_all).")" : "" ?></a></li>
            <li class="abill <?= $order == 'cho-xac-nhan' ? 'activeNav' : "" ?>"><a class="<?= $order == 'cho-xac-nhan' ? 'sticky' : "" ?>" href="index.php?action=user&user=don-mua&order=cho-xac-nhan">Chờ xác nhận <?= !empty($load_order_choxacnhan) ? "(".count($load_order_choxacnhan).")" : "" ?></a></li>
            <li class="abill <?= $order == 'da-xac-nhan' ? 'activeNav' : "" ?>"><a class="<?= $order == 'da-xac-nhan' ? 'sticky' : "" ?>" href="index.php?action=user&user=don-mua&order=da-xac-nhan">Đã xác nhận <?= !empty($load_order_daxacnhan) ? "(".count($load_order_daxacnhan).")" : "" ?></a></li>
            <li class="abill <?= $order == 'dang-giao' ? 'activeNav' : "" ?>"><a class="<?= $order == 'dang-giao' ? 'sticky' : "" ?>" href="index.php?action=user&user=don-mua&order=dang-giao">Đang giao</a></li>
            <li class="abill <?= $order == 'hoan-thanh' ? 'activeNav' : "" ?>"><a class="<?= $order == 'hoan-thanh' ? 'sticky' : "" ?>" href="index.php?action=user&user=don-mua&order=hoan-thanh">Hoàn thành</a></li>
            <li class="abill <?= $order == 'da-huy' ? 'activeNav' : "" ?>"><a class="<?= $order == 'da-huy' ? 'sticky' : "" ?>" href="index.php?action=user&user=don-mua&order=da-huy">Đã hủy</a></li>
            <li class="abill <?= $order == 'tra-hang' ? 'activeNav' : "" ?>"><a class="<?= $order == 'tra-hang' ? 'sticky' : "" ?>" href="index.php?action=user&user=don-mua&order=tra-hang">Trả hàng/Hoàn tiền</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <?php

            if (isset($_GET['action']) && isset($_GET['user']) && isset($_GET['order'])) {
                $action = $_GET['action'];
                $userAction = $_GET['user'];
                $order = $_GET['order'];

                if ($action == "user" && $userAction == "don-mua" && $order == "all") {
                    include "donmua/fullbill.php";
                } else if ($action == "user" && $userAction == "don-mua" && $order == "cho-xac-nhan") {
                    include "donmua/choxacnhan.php";
                } else if ($action == "user" && $userAction == "don-mua" && $order == "da-xac-nhan") {
                    include "donmua/daxacnhan.php";
                } else if ($action == "user" && $userAction == "don-mua" && $order == "dang-giao") {
                    include "donmua/danggiao.php";
                } else if ($action == "user" && $userAction == "don-mua" && $order == "hoan-thanh") {
                    include "donmua/hoanthanh.php";
                } else if ($action == "user" && $userAction == "don-mua" && $order == "da-huy") {
                    include "donmua/dahuy.php";
                } else if ($action == "user" && $userAction == "don-mua" && $order == "tra-hang") {
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