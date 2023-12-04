<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Đơn hàng</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell'></i>
            <span class="num">8</span>
        </a>
        <a href="#" class="profile">
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->
    <style>
        th,
        td,
        p {
            text-align: left !important;
        }
    </style>
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Quản lý đơn hàng</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Quản lí đơn hàng</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Danh sách đơn hàng</a>
                    </li>
                </ul>
            </div>
            <select onchange="window.location.href=`index.php?action=listOrder&filter_status=${this.value}`" style="width: 200px;" class="form-select" name="" id="">
                <option value="">Tất cả</option>
            <?php
            $status =
                [
                    'pending' => 'Chờ xác nhận',
                    'confirmed' => 'Đã xác nhận',
                    'shipping' => 'Đang vận chuyển',
                    'completed' => 'Hoàn thành',
                    'requestCanceled' => 'Yêu cầu huỷ',
                    'canceled' => 'Đã huỷ'
                ];
            foreach ($status as $key=>$value):?>
                <option <?=$_GET['filter_status']==$key ? 'selected':''?> value="<?=$key?>"><?=$value?></option>
            <?php endforeach;?>
            </select>
        </div>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Danh sách đơn hàng</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th style="padding-right: 20px">STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Người đặt hàng</th>
                        <th>Người nhận</th>
                        <th>Tổng cộng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Thanh toán</th>
                        <th>Chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listOrder as $key => $value) : ?>
                            <tr>
                                <td style="margin-top: 45px"><?= $key + 1 ?></td>
                                <td style="width:100px"><?= $value['ma_don_hang'] ?></td>
                                <td>
                                    <img src="../public/upload/image/user/<?= $value['user_image'] ?>" alt="">
                                    <span><?= $value['fullName'] ?></span>
                                </td>
                                <td>
                                    <p><i><?= $value['receiver_name'] ?></i></p>
                                    <p style="width: 150px;"><b>ĐC: </b><?= $value['receiver_address'] ?></p>
                                    <p><b>SĐT: </b><?= $value['receiver_phone'] ?></p>
                                </td>
                                <td style="color: #ff7d7d;font-weight: 500;"><?= number_format($value['total'], 0, ',', '.') ?></td>
                                <td><?= $value['create_at'] ?></td>

                            <td>
                                <select onchange="changeStatus(this,<?=$value['order_id']?>)"
                                        class="form-select-sm selected_status" name="status"
                                        <?=$value['status']=='completed'||$value['status']=='canceled'?'disabled':''?>
                                >
                                    <?php
                                    $status =
                                        [
                                            'pending' => 'Chờ xác nhận',
                                            'confirmed' => 'Đã xác nhận',
                                            'shipping' => 'Đang vận chuyển',
                                            'completed' => 'Hoàn thành',
                                            // 'requestCanceled' => 'Yêu cầu huỷ',
                                            'canceled' => 'Đã huỷ'
                                        ];
                                    foreach ($status as $key => $order):?>
                                        <option <?= $key == $value['status'] ? 'selected' : '' ?>
                                                style="font-size: 14px; padding: 5px"
                                                value="<?= $key ?>"><?= $order ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select onchange="changeStatus(this,<?= $value['order_id'] ?>,'payment_status')"
                                        class="form-select-sm selected_status" name="status"
                                    <?= $value['payment_status'] == 'completed' ? 'disabled' : '' ?>
                                >
                                    <?php
                                    $status =
                                        [
                                            'unpaid' => 'Chưa thanh toán',
                                            'paid' => 'Đã thanh toán',
                                            'repaid' => 'Yêu cầu hoàn tiền'
                                        ];
                                    foreach ($status as $key => $order):?>
                                        <option <?= $key == $value['payment_status'] ? 'selected' : '' ?>
                                                style="font-size: 14px; padding: 5px"
                                                value="<?= $key ?>"><?= $order ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>

                                <td>
                                    <a class="btn btn-success btn-sm" href="index.php?action=listOrder_detail&order_id=<?= $value['order_id'] ?>">Chi
                                        tiết</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    function changeStatus(select,order_id,action='status') {
                        console.log("Sending request with status:", select.value, "and order_id:", order_id);
                        if (select.disabled === false) {
                            let xmlHttp = new XMLHttpRequest();
                            xmlHttp.onreadystatechange = function() {
                                if (this.readyState === 4 && this.status === 200) {
                                    select.value = this.responseText
                                    if (this.responseText === 'completed'||this.responseText === 'canceled') {
                                        select.disabled = true;
                                    }
                                }
                            }
                            xmlHttp.open('GET', `./xmlHttpRequest/statusOrder.php?${action}=${select.value}&order_id=${order_id}`, true);
                            xmlHttp.send();
                        }
                    }
                </script>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>