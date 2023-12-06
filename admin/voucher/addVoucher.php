<style>
    *{
        margin: 0;
        padding: 0;
    }
    thead,tbody,th{
        text-align: center!important;
    }
    tr{
        cursor: pointer;
    }
    .checkedPro{
        background: #eee;
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
            <img src="../public/upload/image/user/<?= $user['user_image'] ?>">
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
                        <input type="text" name="content_voucher" class="form-control">
                        <small></small>
                    </div>
                    <div class="form-group del">
                        <label for="" class="form-label">Giảm giá</label>
                        <div class="input-group flex-nowrap w-25">
                            <input type="text" name="del_price" class="form-control" value="0">
                            <span class="input-group-text changeDel">,00</span>
                        </div>
                        <div style="display: none" class="input-group flex-nowrap w-25">
                            <input type="text" name="del_percent" class="form-control" value="0">
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
                        <label for="" class="form-label">Ngày bắt đầu</label>
                        <div class="input-group flex-nowrap w-25">
                            <input type="datetime-local" name="start_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Ngày hết hạn</label>
                        <div class="input-group flex-nowrap w-25">
                            <input type="datetime-local" name="end_date" class="form-control">
                        </div>
                    </div>
                    <script>

                    </script>
                    <div class="form-group">
                        <label for="" class="form-label">Điều kiện giảm giá</label> <br>
                        <div style="width: 500px; display: flex; align-items: center" class="price_space">
                            <span>Từ: </span><input style="margin-left: 10px" class="form-control" type="text" name="from_price" value="0">
                            <span style="margin-left: 10px">Đến: </span><input style="margin-left: 10px" class="form-control" type="text" name="to_price" value="999999999"></div>
                        <small></small>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Đối tượng áp dụng</label>
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

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Áp dụng cho sản phẩm
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div style="max-width: 800px!important;" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Chọn sản phẩm áp dụng</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body overflow-auto" style="height: 700px">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th colspan="2">Sản phẩm</th>
                                            <th>Giá</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($products as $product):?>
                                            <tr class="" onclick="checkedPro(this)">
                                                <td class="mt-5 border-0"><input class="form-check-input" type="checkbox" name="product_id[]" value="<?=$product['product_id']?>"></td>
                                                <td class="img__productadd">
                                                    <img src="../public/upload/image/product/<?= explode(",", $product['images'])[0] ?>" alt="">
                                                </td>
                                                <td><p style="width: 400px;"><?=$product['product_name']?></p></td>
                                                <td style="color: red"><?=$product['price']?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                    <script>
                                        function checkedPro(tr){
                                            let ip=tr.querySelector('input');
                                            if(ip.checked===false){
                                                ip.checked=true;
                                                tr.classList.add('checkedPro');
                                            }else {
                                                ip.checked=false;
                                                tr.classList.remove('checkedPro');
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="addVoucher" value="Thêm voucher">
                        <a href="index.php?action=listVoucher" class="btn btn-dark">Danh sách</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->