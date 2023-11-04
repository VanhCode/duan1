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
                <h1>Quản lý sản phẩm</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="">Product</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Sửa sản phẩm</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Sửa sản phẩm</h3>
                    <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i>
                </div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    echo "<pre>";
                    print_r($_POST);
                    echo "</pre>";
                }
                ?>
                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="form-group">
                        <label for="" class="form-label">Tên</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Ảnh</label>
                        <input type="file" class="upFile" name="image">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Danh mục</label>
                        <select class="form-select-sm" name="" id="">
                            <option value="">option 1</option>
                            <option value="">option 2</option>
                            <option value="">option 3</option>
                        </select>
                    </div>
                    <div class="title-text fw-semibold">Biến thể</div>
                    <div class="form-group" id="listVariant">
                        <div class="variant">
                            <label for="" class="form-label">Màu sắc</label>
                            <input type="text" name="color[]">
                            <label for="" class="form-label">Size</label>
                            <input type="text" name="size[]">
                            <label for="" class="form-label">Số lượng</label>
                            <input type="text" name="amount[]">
                        </div>
                    </div>
                    <input class="btn btn-success btn-sm addVariant" type="button" value="Thêm biến thể">
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Thêm sản phẩm">
                    </div>
                </form>
            </div>

        </div>
    </main>
    <!-- MAIN -->
</section>
<script src="../public/js/Admin_pro.js">

</script>
<!-- CONTENT -->