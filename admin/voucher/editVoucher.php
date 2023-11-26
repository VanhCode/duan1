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
                <h1>Quản lý voucher</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="">Danh sách voucher</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Thêm voucher</a>
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
                    <h3>Thêm voucher</h3>
                    <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i>
                </div>
                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="form-group">
                        <label for="" class="form-label">Nội dung voucher</label>
                        <input type="text" name="content_voucher" class="form-control" value="<?=$voucher['content_voucher']?>">
                        <small></small>
                    </div>
                    <div class="form-group del">
                        <label for="" class="form-label">Giảm giá</label>
                        <div class="input-group flex-nowrap w-25">
                            <input type="text" name="del_price" class="form-control" value="<?=$voucher['del_price']?>">
                            <span class="input-group-text changeDel">,00</span>
                        </div>
                        <div style="display: none" class="input-group flex-nowrap w-25">
                            <input type="text" name="del_percent" class="form-control" value="<?=$voucher['del_percent']?>">
                            <span class="input-group-text changeDel">%</span>
                        </div>
                    </div>
                    <script>
                        let del=document.querySelector('.del');
                        let btnChange=del.querySelectorAll('span');
                        btnChange[0].onclick=function (){
                            btnChange[0].parentElement.style.display='none';
                            btnChange[1].parentElement.style.display='flex';
                        }
                        btnChange[1].onclick=function (){
                            btnChange[0].parentElement.style.display='flex';
                            btnChange[1].parentElement.style.display='none';
                        }
                    </script>
                    <div class="form-group">
                        <label for="" class="form-label">Ngày hết hạn</label>
                        <div class="input-group flex-nowrap w-25">
                            <input type="datetime-local" name="expiration_date" class="form-control" value="<?=$voucher['expiration_date']?>">
                        </div>
                    </div>
                    <script>

                    </script>
                    <div class="form-group">
                        <label for="" class="form-label">Điều kiện giảm giá</label> <br>
                        <div style="width: 500px; display: flex; align-items: center" class="price_space">
                            <span>Từ: </span><input style="margin-left: 10px" class="form-control" type="text" name="from_price" value="<?=$voucher['from_price']?>">
                            <span style="margin-left: 10px">Đến: </span><input style="margin-left: 10px" class="form-control" type="text" name="to_price" value="<?=$voucher['to_price']?>"></div>
                        <small></small>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Áp dụng</label>
                        <div class="input-group mb-3 w-25">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" name="addForAll">
                            </div>
                            <span class="form-control">Áp dụng cho tất cả</span>
                        </div>
                        <div class="input-group mb-3 w-25">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="0" name="onlineDay">
                            </div>
                            <input oninput="this.parentElement.querySelector('input').value=this.value" type="number" class="form-control" placeholder="Hoạt động tối thiểu">
                        </div>
                        <div class="input-group mb-3 w-25">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="0" name="paymentLimit">
                            </div>
                            <input oninput="this.parentElement.querySelector('input').value=this.value" type="number" class="form-control" placeholder="Chi tiêu tối thiểu">
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="editVoucher" value="Sửa voucher">
                        <a href="index.php?action=listVoucher" class="btn btn-dark">Danh sách</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->