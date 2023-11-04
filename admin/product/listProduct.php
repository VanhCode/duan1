<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Sản phẩm</a>
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
                <h1>Quản lý sản phẩm</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Quản lí sản phẩm</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Danh sách sản phẩm</a>
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
                    <h3>Danh sách sản phẩm</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <div class="alert alert-primary add__btn__click">
                    <a class="btn btn-primary w100hz" href="index.php?action=addProduct">Thêm sản phẩm</a>
                </div>
                <table class="tbl__tab">
                    <thead>
                        <tr class="tr_th">
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Thao tác</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tr_td">
                            <td>1</td>
                            <td class="img__productadd"><img src="../public/image/people.png" alt=""></td>
                            <td>Áo chống tăng</td>
                            <td>Luxury</td>
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="index.php?action=editProduct">Sửa</a>
                                <a class="btn btn-outline-danger btn-sm" href="">Xoá</a>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="index.php?action=editProduct">Xem</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </div>

        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->