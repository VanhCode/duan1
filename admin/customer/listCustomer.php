<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Tài khoản</a>
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

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Quản lý tài khoản</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Quản lí tài khoản</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Danh sách tài khoản</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Tải xuống PDF</span>
            </a>
        </div>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Danh sách khách hàng</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <div class="alert alert-primary add__btn__click">
                    <a class="btn btn-primary w100hz" href="index.php?action=addCustomer">Thêm tài khoản</a>
                </div>
                <table>
                    <thead>
                    <tr class="tr_th">
                        <th>STT</th>
                        <th>Người dùng</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Mật khẩu</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr class="tr_td">
                            <td>1</td>
                            <td>
                                <div class="td_user_img">
                                    <img src="<?= $user['user_image'] ?>">
                                    <p><?= $user['firth_name'] . ' ' . $user['last_name'] ?></p>
                                </div>
                            </td>
                            <td><?=$user['email']?></td>
                            <td><?=$user['phone']?></td>
                            <td><?=$user['password']?></td>
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="index.php?action=editCustomer&user_id=<?=$user['user_id']?>">Sửa</a>
                                <a onclick="return confirm('Xoá nó')" class="btn btn-outline-danger btn-sm" href="index.php?action=deleteCustomer&user_id=<?=$user['user_id']?>">Xoá</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->