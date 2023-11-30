<link rel="stylesheet" href="./css/camon.css">
<main class="container main_thanks">
    <div class="vanhstore_thanks">   
        <div class="vanhstore_thanks_content">
            <div class="vanhstore_thanks_content_title">
                <div class="success_ic_text">
                    <i class="fa-solid fa-circle-check"></i>
                    <h3>Đặt hàng thành công</h3>
                </div>
                <div class="success_text">
                    <p>Vui lòng chọn Đơn mua để xem thêm thông tin</p>
                </div>
                <div class="vanhstore__btn_thanhs">
                    <a href="index.php" class="btn_href">Trang chủ</a>
                    <a href="index.php?action=user&user=don-mua&order=cho-xac-nhan" class="btn_href">Đơn mua</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="maybe-you-like">
            <div style="display: contents;">
                <div class="text-header-you">
                    <div class="tile-like-headerMay">
                        <div>Có thể bạn cũng thích</div>
                    </div>
                    <a href="index.php?action=san-pham" class="view-full-product-link">
                        <button class="icon-next-view-link">
                            Xem Tất Cả
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </a>
                </div>
                <div class="productS-link-full-view viewOne">  
                    <?php
                        foreach($listProduct as $productCart) {
                            ?>
                                <div class="productS-full-link-view">
                                    <a href="index.php?action=chi-tiet-sanpham&detail_product=<?= $productCart['product_id'] ?>" class="">
                                        <div class="prd-v2">
                                            <div class="prd-v3">
                                                <div style="pointer-events: none;">
                                                    <div class="prd-img-hv">
                                                        <img src="./public/upload/image/product/<?= explode(",", $productCart['images'])[0] ?>" class="prd-img" alt="">
                                                        <div class="yt-prd">
                                                            <div class="yt-chill rgba-yt-chil">
                                                                <span class="span-yt-chil span-yt-prd">Yêu thích</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prd-v3-chil">
                                                    <div class="prd-v3-title-text">
                                                        <div class="prd-v3-box-text">
                                                            <div class="prd-v3-text">
                                                                <?= $productCart['product_name'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="prd-v3-price prd-v3-price-bv">
                                                        <div class="prd-v3-price-textChil">
                                                            <span class="prd-v3-price-textChil-span">
                                                                ₫<?= number_format($productCart['sale'], 0,',','.') ?>
                                                            </span>
                                                        </div>
                                                        <div class="check-sub-success">
                                                            Đã bán 2k5
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>