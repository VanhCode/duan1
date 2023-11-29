<style>
    *{
        margin: 0;
        padding: 0;
    }
    p{
        width: 250px;
        margin: 0!important;
    }
</style>
<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Voucher</a>
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
                        <a href="#">Quản lí voucher</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Danh sách voucher</a>
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
                    <h3>Danh sách voucher</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <div class="alert alert-primary add__btn__click">
                    <a class="btn btn-primary w100hz" href="index.php?action=addVoucher">Thêm voucher</a>
                </div>
                <table class="tbl__tab">
                    <thead>
                    <tr class="tr_th">
                        <th>STT</th>
                        <th>Tên voucher</th>
                        <th>Giảm</th>
                        <th>Điều kiện</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày hết hạn</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center">
                    <?php foreach ($allVoucher as $key=>$voucher):?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><p style="text-align: left; padding-left:50px"><?=$voucher['content_voucher']?></p></td>
                        <td><?php if($voucher['del_price']!=0){echo number_format($voucher['del_price'],0,',','.');}if($voucher['del_percent']!=0){echo number_format($voucher['del_percent'],0,',','.').'%';}?></td>
                        <td><?php
                            if($voucher['from_price']==0&&$voucher['to_price']==999999999){
                                echo 'Không giới hạn';
                            }else if($voucher['to_price']==999999999){
                                echo number_format($voucher['from_price'],0,',','.').' trở lên';
                            }else{
                                echo number_format($voucher['from_price'],0,',','.').'->'.number_format($voucher['from_price'],0,',','.');
                            }
                            ?>
                        </td>
                        <td><?=$voucher['start_date']?></td>
                        <td class="d-flex justify-content-center align-items-center"><p style="padding-top: 10px;" voucher_id="<?=$voucher['voucher_id']?>" class="timeCL">0 ngày 0 giờ 0 phút 0 giây</p></td>
                        <td>
                            <a href="index.php?action=deleteVoucher&voucher_id=<?=$voucher['voucher_id']?>" class="btn btn-outline-danger btn-sm">Xoá</a>
                            <a href="index.php?action=editVoucher&voucher_id=<?=$voucher['voucher_id']?>" class="btn btn-outline-success btn-sm">Sửa</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <script>
                        let timeCL=document.querySelectorAll('.timeCL');
                        setInterval(function (){
                            timeCL.forEach(function (value){
                                updateTime(value,value.getAttribute('voucher_id'));
                            })
                        },1000)

                        function updateTime(element,voucher_id){
                            let xmlHttp = new XMLHttpRequest();
                            xmlHttp.onreadystatechange = function() {
                                if (this.readyState === 4 && this.status === 200) {
                                    let timeArr=this.responseText.split(',');
                                    if(this.responseText=='Chưa bắt đầu'){
                                        element.innerHTML=this.responseText;
                                    }else {
                                        element.innerHTML=formatTime(timeArr);
                                    }
                                }
                            }
                            xmlHttp.open('GET', `./xmlHttpRequest/voucher.php?voucher_id=${voucher_id}`, true);
                            xmlHttp.send();
                        }
                        function formatTime(timeArr) {
                            let timeUnits = [' ngày', ' giờ', ' phút', ' giây'];
                            let startIndex = timeUnits.length - timeArr.length;
                            timeArr=timeArr.map((value, index) => value + timeUnits[startIndex + index]);
                            if(timeArr[0].indexOf(0)===0){
                                timeArr[0]=timeArr[0].replace('0 ngày','');
                                if(timeArr[1].indexOf(0)===0){
                                    timeArr[1]=timeArr[1].replace('0 giờ','');
                                    if(timeArr[2].indexOf(0)===0){
                                        timeArr[2]=timeArr[2].replace('0 phút','');
                                        if(timeArr[3].indexOf(0)===0){
                                            timeArr[3]=timeArr[3].replace('0 giây','Đã hết hạn');
                                        }
                                    }
                                }
                            }
                            return timeArr.join(' ');
                        }
                    </script>
                    </tbody>
                </table>
            </div>

        </div>

    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->