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
                        <a href="">Danh sách sản phẩm</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Thêm sản phẩm</a>
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
                    <h3>Thêm sản phẩm</h3>
                    <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i>
                </div>
                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="form-label">Tên</label>
                        <input type="text" name="namePro" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Ảnh</label>
                        <input type="file" class="upFile form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Giá sản phẩm</label>
                        <input type="text" class="form-control" name="pricePro">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Giảm giá</label>
                        <input type="text" class="form-control" name="sale">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Danh mục</label>
                        <select class="form-select" name="selectCategory" id="">
                            <?php
                                foreach($listCategory as $key) {
                                    ?>
                                        <option value="<?= $key['category_id'] ?>"><?= $key['category_name'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="title-text fw-semibold">Phân loại</div>
                    <div class="form-group" id="listVariant">
                        <div class="variant">
                            <label for="" class="form-label">Màu sắc</label>
                            <input class="add_vari" type="text" name="color[]">
                            <label for="" class="form-label mg_lr">Size</label>
                            <input class="add_vari" type="text" name="size[]">
                            <label for="" class="form-label mg_lr">Số lượng</label>
                            <input class="add_vari" type="text" name="amount[]">
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success addVariant" type="button" value="Thêm phân loại">
                        <input class="btn btn-primary" type="submit" name="addProduct" value="Thêm sản phẩm">
                        <a href="index.php?action=listProduct" class="btn btn-dark">Danh sách</a>
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