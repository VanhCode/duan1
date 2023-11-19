<!-- footer -->

<footer>

<div class="delivery container">
    <div class="delivery-content">
        <img src="./img1/giaohang1.png" alt="">
        <div class="delivery-text">
            <h3>GIAO HÀNG MIỄN PHÍ</h3>
            <P>Toàn cầu từ 75k</P>
        </div>
    </div>
    <div class="delivery-content">
        <img src="./img1/giaohang2.png" alt="">
        <div class="delivery-text">
            <h3>DỄ DÀNG ĐỔI TRẢ</h3>
            <P>Đổi trả thoải mái trong 30 ngày</P>
        </div>
    </div>
    <div class="delivery-content">
        <img src="./img1/giaohang3.png" alt="">
        <div class="delivery-text">
            <h3>THANH TOÁN NHANH</h3>
            <P>Thẻ tín dụng có sẵn</P>
        </div>
    </div>
    <div class="delivery-content">
        <img src="./img1/giaohang4.png" alt="">
        <div class="delivery-text">
            <h3>QUÀ TẶNG MIỄN PHÍ</h3>
            <P>Nhận quà tặng và giảm giá</P>
        </div>
    </div>
</div>

<div class="footer-information container">
    <div class="footer-text">
        <img class="logo__vanhCart_footer" src="./img1/vanhcart.jpg" alt="">
        <div class="address-footer">
            <ul>
                <li> 22 Trịnh văn bô, Quận Nam Từ Liêm, Hà Nội</li>
                <li> 0969621079</li>
                <li> Thứ Hai-Thứ Sáu 8:00 đến 19:00</li>
                <li> tranvanh2k4@gmail.com</li>
            </ul>
        </div>
    </div>
    <div class="footer-text">
        <h2>Thông tin</h2>
        <div class="address-footer-hover">
            <ul>
                <li><i class="fa-solid fa-caret-right"></i> <a href="">Trang chủ</a></li>
                <li><i class="fa-solid fa-caret-right"></i> <a href="">Giới thiệu</a></li>
                <li><i class="fa-solid fa-caret-right"></i> <a href="">Sale sản phẩm</a></li>
                <li><i class="fa-solid fa-caret-right"></i> <a href="">Tin tức</a></li>
                <li><i class="fa-solid fa-caret-right"></i> <a href="">Liên hệ</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-text">
        <h2>Sản phẩm</h2>
        <div class="address-footer-hover">
            <ul>
                <li><i class="fa-solid fa-caret-right"></i> <a href="">Quần áo</a></li>
                <li><i class="fa-solid fa-caret-right"></i> <a href="">Giày dép</a></li>
                <li><i class="fa-solid fa-caret-right"></i> <a href="">Sale sản phẩm</a></li>
                <li><i class="fa-solid fa-caret-right"></i> <a href="">Phụ kiện</a></li>
                <li><i class="fa-solid fa-caret-right"></i> <a href="">Hot trend</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-text">
        <h2>Kết nối với chúng tôi</h2>
        <form class="form-footer" action="" method="post">
            <p>
                Điền email của bạn để nhận thông tin giảm giá và sự kiện của shop
            </p>
            <input type="text" name="send-footer" placeholder="Nhập email">
            <button type="submit" class="send" name="send" id="send">Gửi</button>
            <button type="submit" class="reset" name="reset" id="reset">Hủy</button>
        </form>
    </div>
</div>
</footer>

<!-- end footer -->

</div>


</body>
    <?php
        if(isset($_GET['action']) && $_GET['action'] == 'signup'){
            ?>
                <script src="./js/dangky.js"></script>
            <?php
        }   else if(isset($_GET['action']) && $_GET['action'] == 'login'){
            ?>
                <script src="./js/dangnhap.js"></script>
            <?php
        }   else if(isset($_GET['action']) && $_GET['action'] == 'chi-tiet-sanpham'){
            ?>
                <script src="./js/checkAmount.js"></script>
                <script src="./js/chitietsanpham.js"></script>
            <?php
        }   else if(isset($_GET['action']) && $_GET['action'] == 'danh-muc' || isset($_GET['action']) == 'san-pham'){
            ?>
                <script src="./js/danhmuc.js"></script>
            <?php
        }   else if (isset($_GET['action']) == "") {
            ?>
                <script src="./js/trangchu2.js"></script>
            <?php
        }

        if(isset($_GET['profile'])) {
            if($_GET['profile'] == 'change-page') {
                ?>
                    <script src="./js/account.js"></script>
                <?php
            } else if ($_GET['profile'] == 'ho-so') {
                ?>
                    <script src="./js/userJS.js"></script>
                <?php
            }
        }
    ?>
    
<script src="./js/loadding.js"></script>

</html>