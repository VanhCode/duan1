<!-- Main start -->

<div style="display: contents;">
    <div class="main__boxGroup main__boxGroup-product">
        <div class="bg_mainTop__prd">
            <div class="section-banner-hotword--with-skin container">
                <div class="full-home-banners-wrapper">
                    <div class="full-home-banners__flex">
                        <div class="full-home-banners">
                            <a>
                                <img src="./img1/d3.png" alt="">
                            </a>
                            <a>
                                <img src="./img1/d12.png" alt="">
                            </a>
                            <a>
                                <img src="./img1/d5.png" alt="">
                            </a>
                            <a> 
                                <img src="./img1/d4.png" alt="">
                            </a>
                            <a>
                                <img src="./img1/d10.png" alt="">
                            </a>
                            <a>
                                <img src="./img1/d13.png" alt="">
                            </a>
                            <a>
                                <img src="./img1/d1.png" alt="">
                            </a>
                            <a>
                                <img src="./img1/d7.png" alt="">
                            </a>
                            <a>
                                <img src="./img1/d6.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="click__bannerGo">
                        <button class="click-left"><</button>
                        <button class="click-right">></button>
                    </div>
                    <div class="list-item__dostClick">
                        <div class="item item-0 active"></div>
                        <div class="item item-1"></div>
                        <div class="item item-2"></div>
                        <div class="item item-3"></div>
                        <div class="item item-4"></div>
                        <div class="item item-5"></div>
                        <div class="item item-6"></div>
                        <div class="item item-7"></div>
                        <div class="item item-8"></div>
                    </div>
                </div>
                <div class="full-home__item_sale">
                    <a href="">
                        <div class="sale__timeBanner-end">
                            <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                <div class="sale__timeBanner-end__box_image">
                                    <div class="box__img_bannerEnd box__img_1"></div>
                                </div>
                            </div>
                            <div class="time__sale_box">Khung Giờ Sale</div>
                        </div>
                    </a>
                    <a href="">
                        <div class="sale__timeBanner-end">
                            <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                <div class="sale__timeBanner-end__box_image">
                                    <div class="box__img_bannerEnd1 box__img_1"></div>
                                </div>
                            </div>
                            <div class="time__sale_box">Miễn Phí Ship - VanhStore</div>
                        </div>
                    </a>
                    <a href="">
                        <div class="sale__timeBanner-end">
                            <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                <div class="sale__timeBanner-end__box_image">
                                    <div class="box__img_bannerEnd2 box__img_1"></div>
                                </div>
                            </div>
                            <div class="time__sale_box">Voucher Giảm Giá Lớn</div>
                        </div>
                    </a>
                    <a href="">
                        <div class="sale__timeBanner-end">
                            <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                <div class="sale__timeBanner-end__box_image">
                                    <div class="box__img_bannerEnd3 box__img_1"></div>
                                </div>
                            </div>
                            <div class="time__sale_box">Giảm 50% Outlet</div>
                        </div>
                    </a>
                    <a href="">
                        <div class="sale__timeBanner-end">
                            <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                <div class="sale__timeBanner-end__box_image">
                                    <div class="box__img_bannerEnd4 box__img_1"></div>
                                </div>
                            </div>
                            <div class="time__sale_box">Mã Giảm Giá</div>
                        </div>
                    </a>
                    <a href="">
                        <div class="sale__timeBanner-end">
                            <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                <div class="sale__timeBanner-end__box_image">
                                    <div class="box__img_bannerEnd5 box__img_1"></div>
                                </div>
                            </div>
                            <div class="time__sale_box">Ngày Hội Sale Quốc Tế</div>
                        </div>
                    </a>
                    <a href="">
                        <div class="sale__timeBanner-end">
                            <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                <div class="sale__timeBanner-end__box_image">
                                    <div class="box__img_bannerEnd6 box__img_1"></div>
                                </div>
                            </div>
                            <div class="time__sale_box">Hot Trend Giá Sốc</div>
                        </div>
                    </a>
                    <a href="">
                        <div class="sale__timeBanner-end">
                            <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                <div class="sale__timeBanner-end__box_image">
                                    <div class="box__img_bannerEnd7 box__img_1"></div>
                                </div>
                            </div>
                            <div class="time__sale_box">Giá Rẻ Bất Ngờ</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="dm__main container">
                <div></div>
                <div class="section-below-the-fold">

                    <!-- Danh mục sản phẩm -->

                    <div class="vanhstore__header_simpleBox">
                        <div class="vanhstore-header-section__header">
                            <div class="vanhstore-header-section__header__title">Danh Mục Sản Phẩm</div>
                        </div>
                        <div class="vanhstore-header-section__content">
                            <div class="image-carousel">
                                <ul class="image-carousel__item-list">
                                    <?php
                                        foreach($listCategory as $category) {
                                            ?>
                                                <li class="image-carousel__title">
                                                    <a href="index.php?action=danh-muc?product_category=<?= $category['category_id'] ?>" class="image-carousel__contentA">
                                                        <div class="image-carousel__image"><img src="./public/upload/image/category/<?= $category['image_cate'] ?>" alt=""></div>
                                                        <div class="image-carousel__image-text">
                                                            <?= $category['category_name'] ?>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- End danh mục sản phẩm -->

                    <!-- Flast sale and clock -->

                    <div style="display: contents;">
                        <div class="oclock_flashsale">
                            <div class="vanh-header-section__header">
                                <div class="vanh-header-section__content_flash_andClock">
                                    <div class="vanh-header-section__content_flash">
                                    </div>
                                    <div class="section__content_flashClock">
                                        <span id="hrs">00</span>
                                        <span id="minu">00</span>
                                        <span id="seco">00</span>
                                    </div>
                                </div>
                                <a href="">Xem Tất Cả <i class="fa-solid fa-chevron-right"></i></a>
                            </div>
                            <div class="oclock_slider__banner">
                                <div class="oclock_sliderBar-BoxFull">
                                    <ul class="oclock_slider__banner_img">
                                        <div class="oclock_slider__banner_Boximg">
                                            <a>
                                                <img src="./img1/d19.png" alt="">
                                            </a>
                                            <a>
                                                <img src="./img1/bs1.png" alt="">
                                            </a>
                                            <a>
                                                <img src="./img1/a28.jpg" alt="">
                                            </a>
                                            <a>
                                                <img src="./img1/a14.jpg" alt="">
                                            </a>
                                            <a>
                                                <img src="./img1/d13.png" alt="">
                                            </a>
                                        </div>
                                    </ul>
                                    <div class="oclock_control__slider">
                                        <button class="oclock_control__slider_back"><</button>
                                        <button class="oclock_control__slider_next">></button>
                                    </div>
                                    <div class="oclock_dostSlider">
                                        <div class="dost dost-0 activeSlider__oclock"></div>
                                        <div class="dost dost-1"></div>
                                        <div class="dost dost-2"></div>
                                        <div class="dost dost-3"></div>
                                        <div class="dost dost-4"></div>
                                    </div>
                                </div>
                                <div class="oclock__Flashsale_timeSlider">
                                    <div class="clock">
                                        <div style="--clr:#ee4d2d; --h:57px;" id="hour" class="hand"><i></i></div>
                                        <div style="--clr:#214789; --h:75px;" id="min" class="hand"><i></i></div>
                                        <div style="--clr:#000000; --h:88px;" id="sec" class="hand"><i></i></div>
                                        <span style="--i:1;"><b>1</b></span>
                                        <span style="--i:2;"><b>2</b></span>
                                        <span style="--i:3;"><b>3</b></span>
                                        <span style="--i:4;"><b>4</b></span>
                                        <span style="--i:5;"><b>5</b></span>
                                        <span style="--i:6;"><b>6</b></span>
                                        <span style="--i:7;"><b>7</b></span>
                                        <span style="--i:8;"><b>8</b></span>
                                        <span style="--i:9;"><b>9</b></span>
                                        <span style="--i:10;"><b>10</b></span>
                                        <span style="--i:11;"><b>11</b></span>
                                        <span style="--i:12;"><b>12</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="oclock_time-right__banner">
                                <div class="oclock__Flashsale_timeSlider_nav">
                                    <ul id="oclock__Flashsale_timeSlider_ul" class="oclock__Flashsale_timeSlider_ul">
                                        <li class="oclock__Flashsale_timeSlider_li">
                                            <div class="oclock__Flashsale_div">
                                                <a href="./view/chitietsp.php?id=<?= $item['id_spBanChay'] ?>" class="oclock__Flashsale_timeSlider_a">
                                                    <div class="Flashsale_timeSlider_BoxImageS">
                                                        <img src="./img1/a1.jpg">
                                                        <div class="Flashsale_timeSlider_textSpan">
                                                            <span class="Flashsale_timeSlider_Span">Sale</span>
                                                        </div>
                                                    </div>
                                                    <div class="Flashsale_timeSlider_BoxTextS">
                                                        <div class="Flashsale_timeSlider_BoxTextS_price">
                                                            đ 200.000
                                                        </div>
                                                        <div class="Flashsale_timeSlider_BoxTextS_updateSale">
                                                            <div class="Flashsale_timeSlider_BoxTextS_updateSaleNumber">
                                                                <div class="BoxTextS_Image_sendSuccess"></div>
                                                                <div class="BoxTextS_sendSuccess_content">
                                                                    Đã bán 23,2k
                                                                </div>
                                                                <div class="BoxTextS_sendSuccess_bg"></div>
                                                                <div class="BoxTextS_sendSuccess_bg_2"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="carousel-arrow carousel-arrow--prev carousel-arrow--hint">
                                    <button id="carousel-arrow--prev__icon" class="carousel-arrow--prev__icon"><i class="fa-solid fa-angle-left"></i></button>
                                </div>
                                <div class="carousel-arrow carousel-arrow--next carousel-arrow--hint">
                                    <button id="carousel-arrow--next__icon" class="carousel-arrow--next__icon"><i class="fa-solid fa-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end Flast Sale -->

                    <!-- Banner Sale2 -->

                    <div class="" style="margin-top: 20px; height: 110px;">
                        <div class="simple-banner">
                            <img class="banner-image" role="presentation" alt="" src="./img1/fva.jpg">
                            <div class="click-sections-wrapper">
                                <a class="click-section" target="_self" href="">
                                    <!---->
                                    Banner flast sale 2
                                    <!---->
                                </a>
                                <a class="click-section" target="_self" href="">
                                    <!---->
                                    Banner flast sale 2 0
                                    <!---->
                                </a>
                                <a class="click-section" target="_self" href="">
                                    <!---->
                                    Banner flast sale 2
                                    <!---->
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- End Banner Sale2 -->

                    <!-- Free vận chuyển -->

                    <div class="homepage-mall-section">
                        <div class="vanh-header-section F--Nrr vanh-header-section--simple">
                            <div class="vanh-header-section__header">
                                <div class="vanh-header-section__header__title">
                                    <div class="chil__sale_logoFl">
                                        <a class="freeVc" href="/mall">Vanh Shop</a>
                                        <div class="freeVc_Box_logoS">
                                            <div class="freeVc_Box_logoS__Box1">
                                                <img class="freeVc_Box_logoS__Box1_img1" src="./img1/t1.png" alt=""> 7 ngày miễn phí trả hàng
                                            </div>
                                            <div class="freeVc_Box_logoS__Box1">
                                                <img class="freeVc_Box_logoS__Box1_img1" src="./img1/t2.png" alt=""> Hàng chính hãng 100%
                                            </div>
                                            <div class="freeVc_Box_logoS__Box1">
                                                <img class="freeVc_Box_logoS__Box1_img1" src="./img1/t3.png" alt=""> Miễn phí vận chuyển
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vanh-header-section__header-link">
                                    <button class="vanh-button-no-outline">
                                        <a href="" class="vanh-a-no-outline">
                                            <div class="vanh-div-no-outline">
                                                Xem tất cả
                                                <div class="vanh-icon-no-outline">
                                                    <i class="fa-solid fa-chevron-right"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </button>
                                </div>
                            </div>
                            <div class="vanh-header-section__content">
                                <div class="vanh-header-section__content_imgS">
                                    <div style="width: 100%;">
                                        <div class="vanh-banner-content_imgS__carousel">
                                            <div class="vanh-banner-content_imgS__carouselList_Img">
                                                <ul class="stardust-carousel2__item-list__image">
                                                    <a class="stardust-carousel2__item-list__li">
                                                        <img src="./img1/a38.jpg" alt="">
                                                    </a>
                                                    <a class="stardust-carousel2__item-list__li">
                                                        <img src="./img1/a36.jpg" alt="">
                                                    </a>
                                                    <a class="stardust-carousel2__item-list__li">
                                                        <img src="./img1/a44.jpg" alt="">
                                                    </a>
                                                    <a class="stardust-carousel2__item-list__li">
                                                        <img src="./img1/bh.jpg" alt="">
                                                    </a>
                                                </ul>
                                                <div class="box__dost__banner3">
                                                    <div class="dostB3 dostB3-0 dostB3_active"></div>
                                                    <div class="dostB3 dostB3-1"></div>
                                                    <div class="dostB3 dostB3-2"></div>
                                                    <div class="dostB3 dostB3-3"></div>
                                                </div>
                                                <div class="box__nextBack__banner3">
                                                    <button class="backBanner3"><</button>
                                                    <button class="nextBanner3">></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="vanh-header-section__content_productS">
                                    <div class="BoximageContentS-carousel">
                                        <div class="BoximageContentS-carousel__wrapperB">
                                            <ul id="ulControl" class="BoximageContentS-carousel__wrapperB_ul">
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image yM9KRq">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image yM9KRq">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image yM9KRq">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image yM9KRq">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image yM9KRq">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image yM9KRq">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image yM9KRq">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image yM9KRq">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="BoximageContentS-carousel__wrapperB_lis">
                                                    <div>
                                                        <div class="ofs-carousel__item">
                                                            <a class="ofs-carousel__shop-cover-image" href="">
                                                                <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                    <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="ofs-carousel__item__text">
                                                                Ưu đãi đến 50%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="BoximageContentS-carousel__wrapperB_controlS">
                                            <button id="preControl" class="pre_control"><i class="fa-solid fa-angle-left"></i></button>
                                            <button id="neControl" class="ne_control"><i class="fa-solid fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Free vận chuyển -->

                    <!-- Tìm kiếm nhiều nhất -->

                    <div class="container">
                        <div class="maybe-you-like">
                            <div style="display: contents;">
                                <div class="text-header-you">
                                    <div class="tile-like-headerMay">
                                        <div>Tìm kiếm nhiều nhất</div>
                                    </div>
                                    <a href="" class="view-full-product-link">
                                        <button class="icon-next-view-link">
                                            Xem Tất Cả
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </button>
                                    </a>
                                </div>
                                <div class="productS-link-full-view viewOne">
                                    <div class="productS-full-link-view">
                                        <a href="index.php?action=chi-tiet-sanpham" class="">
                                            <div class="prd-v2">
                                                <div class="prd-v3">
                                                    <div style="pointer-events: none;">
                                                        <div class="prd-img-hv">
                                                            <img src="./img1/a1.jpg" class="prd-img" alt="">
                                                            <div class="yt-prd">
                                                                <div class="yt-chill rgba-yt-chil">
                                                                    <span class="span-yt-chil span-yt-prd">Hot</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="prd-v3-chil">
                                                        <div class="prd-v3-title-text">
                                                            <div class="prd-v3-box-text">
                                                                <div class="prd-v3-text">
                                                                    Áo Thun Nam
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="prd-v3-price prd-v3-price-bv">
                                                            <div class="prd-v3-price-textChil">
                                                                <span class="prd-v3-price-textChil-span">
                                                                    200.000đ
                                                                </span>
                                                            </div>
                                                            <div class="check-sub-success">
                                                                đã bán 23.2k
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Tìm kiếm nhiều nhất -->

                    <div class="section-recommend-products-wrapper">
                        <div style="display: contents;">
                            <div>
                                <div class="section-recommend-products-wrapper__Box">
                                    <div class="stardust-tabs-header-anchor"></div>
                                    <nav class="stardust-tabs-header-wrapper">
                                        <ul class="stardust-tabs-header">
                                            <li class="stardust-tabs-header__tab stardust-tabs-header__tab--active">
                                                <div class="rTmd0c zJaHI0"></div>
                                                <div tabindex="0" class="span__stardust-tabs-header__tab"><span>SẢN PHẨM BÁN CHẠY</span></div>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="stardust-tabs-header-product">
                                        <section class="stardust-tabs-panels__panel" style="display: block;">
                                            <div class="stardust-tabs-panels__panel_navS">
                                                <div class="stardust-tabs-panels__panel_navSChilrent">
                                                    <a href="./view/chitietsp.php?id=<?= $itemSpBanChay['id_spBanChay'] ?>" class="stardust-tabs-panels__flexHref">
                                                        <div class="stardust-tabs-panels__ColumFlex__div">
                                                            <div class="stardust-tabs-panels__ColumFlex_img">
                                                                <img src="./img1/a1.jpg" alt="">
                                                                <div class="ColumFlex_img__spanSale">
                                                                    <span class="ColumFlex_img__span">Sale</span>
                                                                </div>
                                                                <div class="ColumFlex_img__spanSalePt">
                                                                    <span class="ColumFlex_img__textSaleContent">10</span>
                                                                    <span class="ColumFlex_img__textSaleGiam">GIẢM</span>
                                                                </div>
                                                                <!-- <div class="ColumFlex_img__bgrImage">
                                                                            <img src="../../img1/bgpr.png" alt="">
                                                                        </div> -->
                                                            </div>
                                                            <div class="stardust-tabs-panels__ColumFlex_BoxText">
                                                                <div class="stardust-ColumFlex_title">
                                                                    Áo Thun
                                                                </div>
                                                                <div class="stardust-ColumFlex_Boxprice">
                                                                    <div class="stardust-ColumFlex_Boxprice">
                                                                        200.000 đ
                                                                    </div>
                                                                    <div class="stardust-ColumFlex_clickPrice">
                                                                        đã bán 23.2k
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="btn__click_stardust__product">
                                                    <a class="btn btn-light btn--m btn--inline btn-light--link btn__click___productAhref" href="">Xem thêm</a>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end main -->
        </div>
    </div>
</div>