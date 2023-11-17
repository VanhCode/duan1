<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu' ></i>
        <a href="#" class="nav-link">Trang chủ</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Tìm kiếm">
                <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell' ></i>
            <span class="num">8</span>
        </a>
        <a href="#" class="profile">
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Bảng điều khiển</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">Trang chủ</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download' ></i>
                <span class="text">Tải xuống PDF</span>
            </a>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check' ></i>
                <span class="text">
						<h3><?=count($newOrder)?></h3>
						<p>Đơn đặt hàng mới</p>
					</span>
            </li>
            <li>
                <i class='bx bxs-group' ></i>
                <span class="text">
						<h3><?=$totalUser['total_user']?></h3>
						<p>Khách hàng</p>
					</span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle' ></i>
                <span class="text">
						<h3><?=number_format($totalSell['total_sell'],0,',','.')?></h3>
						<p>Tổng doanh thu</p>
					</span>
            </li>
        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Đơn đặt hàng gần đây</h3>
                    <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th style="padding-right: 20px">STT</th>
                        <th>Người đặt hàng</th>
                        <th>Tổng cộng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Thanh toán</th>
                        <th>Vận chuyển</th>
                        <th>Chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($newOrder as $key => $value): ?>
                        <tr>
                            <td style="margin-top: 7px"><?= $key + 1 ?></td>
                            <td>
                                <img src="../public/upload/image/user/<?= $value['user_image'] ?>" alt="">
                                <span><?= $value['fullName'] ?></span>
                            </td>
                            <td style="color: #ff7d7d;font-weight: 500;"><?= number_format($value['total'], 0, ',', '.') ?></td>
                            <td><?= $value['create_at'] ?></td>
                            <td><span style="cursor: pointer" onclick="toggleStatus(this,'togglePayment','<?=$value['order_id']?>')"
                                      class="status <?= $value['payment_status'] ?>"><?= $value['payment_status'] ?></span>
                            </td>
                            <td><span style="cursor: pointer" onclick="toggleStatus(this,'toggleShipping','<?=$value['order_id']?>')"
                                      class="status <?= $value['shipping_status'] ?>"><?= $value['shipping_status'] ?></span>
                            </td>
                            <td><a class="btn btn-success btn-sm"
                                   href="index.php?action=listOrder_detail&order_id=<?= $value['order_id'] ?>">Chi
                                    tiết</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Việc cần làm</h3>
                    <i class='bx bx-plus' ></i>
                    <i class='bx bx-filter' ></i>
                </div>
                <ul class="todo-list">
                    <li class="completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="not-completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="not-completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<script>
    let xmlHttp = new XMLHttpRequest();
    function toggleStatus(e,action,id) {
        xmlHttp.onreadystatechange = function () {
            e.setAttribute('class','status '+xmlHttp.responseText);
            e.innerHTML=xmlHttp.responseText;
            console.log(xmlHttp.responseText);
        }
        xmlHttp.open('GET', `./xmlHttpRequest/statusOrder.php?action=${action}&order_id=${id}`, true);
        xmlHttp.send();
    }
</script>
<!-- CONTENT -->