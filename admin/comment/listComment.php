<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Bình luận</a>
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
            <img src="../public/upload/image/user/<?= $user['user_image'] ?>">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Quản lý bình luận</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Quản lí bình luận</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a href="">Danh sách thống kê bình luận</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>

                    <li>
                        <a class="active" href="#">Danh sách bình luận</a>
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
                    <h3>Tài khoản bình luận</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                    <tr class="tr_th">
                        <th>STT</th>
                        <th>Người dùng</th>
                        <th>Nội dung bình luận</th>
                        <th>Tạo ngày</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1;
                    foreach ($comments as $comment):?>
                    <tr class="tr_td">
                        <td><?=$count++?></td>
                        <td>
                            <div class="pro">
                                <img src="../public/upload/image/user/<?=$comment['user_image']?>" alt="">
                                <span><?=$comment['fullName']?></span>
                            </div>
                        </td>
                        <td><?=$comment['content']?></td>
                        <td><?=$comment['create_at']?></td>
                        <td>
                            <a class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$comment['comment_id']?>">Xoá</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal<?=$comment['comment_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xóa bình luận</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có muốn xóa bình luận: <br> <?= $comment['content'] ?><br>
                                Người dùng: '<?= $comment['fullName'] ?>'
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <a class="btn btn-primary" href="index.php?action=deleteComment&comment_id=<?=$comment['comment_id']?>">Xoá</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <div class="flex_page">
                    <a class="click_right" href="index.php?action=listComment&product_id=<?=$_GET['product_id']?>&page=<?= $_GET['page'] > 1 ? $_GET['page'] - 1 : 1 ?>">&lt;</a>
                    <?php for($i=1;$i<=$pageSL;$i++):?>
                    <?php if($i<=5):?>
                            <a class="page__i" <?=$_GET['page']==$i?'style="color: #ee4d2d;"':''?> href="index.php?action=listComment&product_id=<?=$_GET['product_id']?>&page=<?=$i?>"><?=$i?></a>
                        <?php endif;?>
                    <?php endfor;?>
                    <span style="font-size: 26px;">. . .</span>
                    <a class="click_left" href="index.php?action=listComment&product_id=<?=$_GET['product_id']?>&page=<?= $_GET['page'] + 1 <= $pageSL ? $_GET['page'] + 1 : $pageSL ?>">&gt;</a>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<script>
    function remote(btn, move) {
        let input = btn.parentElement.parentElement.querySelector("input");
        if (move === "up") {
            input.value++;
        }
        if (input.value > 0) {
            if (move === "down") {
                input.value--;
            }
        }

    }
</script>
<!-- CONTENT -->
<!--<div class="btn-block">-->
<!--    <div class="stepper position-relative">-->
<!--        <input type="text" value="1">-->
<!--        <span class="d-flex flex-column position-absolute">-->
<!--                                    <i onclick="remote(this,'up')" class="fa fa-angle-up"></i>-->
<!--                                    <i onclick="remote(this,'down')" class="fa fa-angle-down"></i>-->
<!--                                </span>-->
<!--    </div>-->
<!--    <div class="btn_group">-->
<!--        <a href="">-->
<!--            <i class="fa fa-refresh"></i>-->
<!--        </a>-->
<!--        <a href="">-->
<!--            <i class="fa-solid fa-xmark"></i>-->
<!--        </a>-->
<!--    </div>-->
<!--</div>-->