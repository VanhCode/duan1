<style>
    p {
        display: block;
        width: 85%;
        font-size: 20px;
    }

    p:focus {
        outline: none;
    }

    .menu_option {
        position: relative;
    }

    .menu_option > ul {
        top: -50px;
        right: -34px;
        opacity: 0;
        width: auto !important;
        height: auto;
        padding: 0;
        position: absolute;
        background: transparent;
        color: black;
        box-shadow: 0 0 1px;
        border-radius: 5px;
        overflow: hidden;
        pointer-events: none;
        transition: 0.3s;
        display: flex;
    }

    .show {
        opacity: 1 !important;
        pointer-events: auto !important;
    }

    .menu_option > ul > li {
        border-radius: unset !important;
        padding: 10px !important;
        margin: 0 !important;
        display: block;
        background: white !important;
        transition: 0.3s;
        font-size: 20px;
    }

    .todo-list > li > i {
        font-size: 30px;
    }

    .menu_option > ul > li:first-child {
        border-right: 1px solid #cbcbcb;
    }

    .menu_option > ul > li:hover {
        background: #eeeeee !important;
        color: red;
    }

    .menu_option > ul > li:first-child:hover {
        color: #0d6efd;
    }
</style>
<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Trang chủ</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Tìm kiếm">
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

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Bảng điều khiển</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Trang chủ</a>
                    </li>
                </ul>
            </div>
            <div style="width: 200px;">
                <select class="form-select select-day" name="" id="">
                    <option <?=$day==1?'selected':''?> value="1">1 ngày</option>
                    <option <?=$day==7?'selected':''?> value="7">7 ngày</option>
                    <option <?=$day==30?'selected':''?> value="30">30 ngày</option>
                </select>
            </div>
        </div>
        <script>
            let select_day=document.querySelector('.select-day');
            select_day.onchange=function (e){
                window.location.href=`index.php?action=dashboard&day=${this.value}`;
            }
        </script>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
						<h3><?= count($newOrder) ?></h3>
						<p>Đơn đặt hàng mới</p>
					</span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
						<h3><?= $totalUser['total_user'] ?></h3>
						<p>Khách hàng</p>
					</span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle'></i>
                <span class="text">
						<h3><?= number_format($totalSell['total_sell'], 0, ',', '.') ?></h3>
						<p>Tổng doanh thu</p>
					</span>
            </li>
        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Đơn đặt hàng gần đây</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th style="padding-right: 20px">STT</th>
                        <th>Người đặt hàng</th>
                        <th>Tổng cộng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Thanh toán</th>
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
                            <td>
                                <select onchange="changeStatus(this,<?= $value['order_id'] ?>)"
                                        class="form-select-sm selected_status" name="status"
                                    <?= $value['status'] == 'completed' ? 'disabled' : '' ?>
                                >
                                    <?php
                                    $status =
                                        [
                                            'pending' => 'Chờ xác nhận',
                                            'confirmed' => 'Đã xác nhận',
                                            'shipping' => 'Đang vận chuyển',
                                            'completed' => 'Hoàn thành'
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
                    <i class='bx bx-plus'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <ul class="todo-list">
                    <?php foreach ($todolist as $todo): ?>
                        <li todoList_id="<?= $todo['todolist_id'] ?>" class="<?= $todo['status'] ?>">
                            <p contenteditable="true"><?= $todo['content'] ?></p>
                            <i class='bx bx-dots-vertical-rounded menu_option'>
                                <ul>
                                    <li class="toggle_status"><i class="fa-solid fa-arrow-right-arrow-left "></i></li>
                                    <li class="delete_todolist"><i class="fa-solid fa-trash"></i></li>
                                </ul>
                            </i>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<script>
    function changeStatus(select, order_id, action = 'status') {
        if (select.disabled === false) {
            let xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    select.value = this.responseText
                    if (this.responseText === 'completed') {
                        select.disabled = true;
                    }
                }
            }
            xmlHttp.open('GET', `./xmlHttpRequest/statusOrder.php?${action}=${select.value}&order_id=${order_id}`, true);
            xmlHttp.send();
        }
    }
</script>
<script>
    let xmlHttp = new XMLHttpRequest();
    let head = document.querySelectorAll(".head")[1];
    let btnAdd = head.querySelectorAll("i")[0];
    let btnFilter = head.querySelectorAll("i")[1];
    let todoList = document.querySelector(".todo-list");

    let Btn_menuOption = todoList.querySelectorAll('.menu_option');
    let Btn_deleteTodolist = document.querySelectorAll('.delete_todolist');
    let paragraphElements = todoList.querySelectorAll('p');
    let toggle_status = document.querySelectorAll('.toggle_status');
    btnAdd.onclick = function (e) {
        let li = document.createElement('li');
        xmlHttp.onreadystatechange = function (e) {
            if (this.readyState === 4 && this.status === 200) {
                li.setAttribute('todoList_id', this.responseText);
                li.setAttribute('class', 'not-completed');
                li.innerHTML = `    <p contenteditable="true"></p>
                                    <i class='bx bx-dots-vertical-rounded menu_option'>
                                        <ul>
                                            <li class="toggle_status"><i class="fa-solid fa-arrow-right-arrow-left "></i></li>
                                            <li class="delete_todolist"><i class="fa-solid fa-trash"></i></li>
                                        </ul>
                                    </i>`;
                CRUD();
            }
        }
        xmlHttp.open('GET', `./xmlHttpRequest/todoList.php?action=addTodolist`, true);
        xmlHttp.send();

        todoList.appendChild(li);
    }
    CRUD();
    Btn_menuOption.forEach(function (option) {
        let menu = option.querySelector('ul');
        let li = menu.querySelectorAll('li');

        document.addEventListener('click', function (e) {
            if (e.target === option) {
                menu.classList.add('show');
            } else if (e.target !== li[0] && e.target !== li[1]) {
                menu.classList.remove('show');
            }
        });
    });

    // xoá content
    Btn_deleteTodolist.forEach(function (btn_delete) {
        btn_delete.onclick = function (e) {
            let id = this.parentElement.parentElement.parentElement.getAttribute('todoList_id');
            xmlHttp.onreadystatechange = function (e) {
                if (this.readyState === 4 && this.status === 200) {
                    if (this.responseText === 'success') {
                        btn_delete.parentElement.parentElement.parentElement.remove();
                        console.log('remove');
                    }
                }
            }
            xmlHttp.open('GET', `./xmlHttpRequest/todoList.php?action=deleteTodolist&todolist_id=${id}`, true);
            xmlHttp.send();
        }
    });
    //edit content
    paragraphElements.forEach(function (paragraphElement) {
        paragraphElement.oninput = function () {
            let id = this.parentElement.getAttribute('todoList_id');
            let content = this.innerHTML;
            console.log('edit content');
            xmlHttp.open('GET', `./xmlHttpRequest/todoList.php?action=editContentTodolist&content=${content}&todolist_id=${id}`, true);
            xmlHttp.send();
        }
    });

    //thay đổi trạng thái
    toggle_status.forEach(function (btnToggle) {
        btnToggle.onclick = function () {
            let id = this.parentElement.parentElement.parentElement.getAttribute('todoList_id');
            let status = this.parentElement.parentElement.parentElement.getAttribute('class');
            xmlHttp.onreadystatechange = function (e) {
                if (this.readyState === 4 && this.status === 200) {
                    if (this.responseText === 'not-completed' || this.responseText === 'completed') {
                        btnToggle.parentElement.parentElement.parentElement.setAttribute('class', this.responseText);
                        console.log('toggle status');
                    }
                }
            }
            xmlHttp.open('GET', `./xmlHttpRequest/todoList.php?action=toggleStatus&status=${status}&todolist_id=${id}`, true);
            xmlHttp.send();
        }
    });
    // ẩn hiện option
    function CRUD() {
        let Btn_menuOption = todoList.querySelectorAll('.menu_option');
        let Btn_deleteTodolist = document.querySelectorAll('.delete_todolist');
        let paragraphElements = todoList.querySelectorAll('p');
        let toggle_status = document.querySelectorAll('.toggle_status');
    }


</script>
<script src="../js/scriptDashboard.js"></script>
<!-- CONTENT -->