<style>
    .form-group {
        width: 50%;
    }

    .form-group label {
        width: 70px;
        padding-right: 10px;
    }

    .form-group input {
        margin-right: 10px;
    }
</style>
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
                <h1>Thống kê</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Thống kê</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Trang chủ</a>
                    </li>
                </ul>
            </div>
            <div style="width: 200px;">
                <select class="form-select select-day" name="" id="">
                    <option value="">1 ngày</option>
                    <option value="">7 ngày</option>
                    <option value="">30 ngày</option>
                </select>
            </div>
        </div>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Thống kê</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>

                <div class="row">
                    <div class="col-8">
                        <form class="d-flex align-items-center form-statistical">
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <label for="">Từ</label>
                                <input class="form-control from" type="date">
                                <label for="">Đến</label>
                                <input class="form-control to" type="date">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <select class="form-select type mx-2">
                                    <option value="DATE">Ngày</option>
                                    <option value="MONTH">Tháng</option>
                                    <option value="YEAR">Năm</option>
                                </select>
                            </div>
                            <div class="form-group" style="text-align: right">
                                <button class="btn btn-success send-data" type="button">Lọc</button>
                            </div>
                        </form>
                        <div class="">
                            <select class="form-select filter-day">
                                <option value="7">7 ngày</option>
                                <option value="14">14 ngày</option>
                                <option value="30">30 ngày</option>
                            </select>
                        </div>
                        <div class="chart">
                            <canvas id="myChart">
                            </canvas>
                            <div class="group-btn d-flex justify-content-between">
                                <button class="btn btn-sm btn-outline-danger" id="back">back</button>
                                <button class="btn btn-sm btn-outline-primary" id="next">next</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <h3 align="center" class="py-3">Sản phẩm bán chạy</h3>
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let form_statistical = document.querySelector('.form-statistical');
    let btn_send_data = document.querySelector('.send-data');
    let xmlHttp = new XMLHttpRequest();
    let dateNow = new Date();
    let fromDate=changeDays(dateNow,Number('-'+7));
    let toDate = changeDays(dateNow,0)
    let next=document.querySelector('#next');
    let back=document.querySelector('#back');
    btn_send_data.addEventListener('click', function () {
        let from = form_statistical.querySelector('.from');
        let to = form_statistical.querySelector('.to');
        let type = form_statistical.querySelector('.type');
        fromDate=from.value;
        toDate=to.value;
        getDataChart(fromDate,toDate,type.value)
            .then((dt) => {
                dt.revenue = dt.revenue.map((value) => (parseInt(value)));
                dt.numOrder = dt.numOrder.map((value) => (parseInt(value)));
                updateChart(chart, dt.date, dt.numOrder, dt.revenue);
            })
    });
    let filterDay=document.querySelector('.filter-day');
    filterDay.onchange=function (e){
        fromDate=changeDays(toDate,Number('-'+this.value));
        getDataChart(fromDate,toDate)
            .then((dt) => {
                dt.revenue = dt.revenue.map((value) => (parseInt(value)));
                dt.numOrder = dt.numOrder.map((value) => (parseInt(value)));
                updateChart(chart, dt.date, dt.numOrder, dt.revenue);
            });
    }
    getDataChart(fromDate,toDate)
        .then((dt) => {
            dt.revenue = dt.revenue.map((value) => (parseInt(value)));
            dt.numOrder = dt.numOrder.map((value) => (parseInt(value)));
            updateChart(chart, dt.date, dt.numOrder, dt.revenue);
        });
    next.onclick=function (e){
        fromDate=changeDays(fromDate,+1);
        toDate=changeDays(toDate,+1);

        getDataChart(fromDate,toDate)
            .then((dt) => {
                dt.revenue = dt.revenue.map((value) => (parseInt(value)));
                dt.numOrder = dt.numOrder.map((value) => (parseInt(value)));
                updateChart(chart, dt.date, dt.numOrder, dt.revenue);
            });
    }
    back.onclick=function (e){
        fromDate=changeDays(fromDate,-1);
        toDate=changeDays(toDate,-1);

        getDataChart(fromDate,toDate)
            .then((dt) => {
                dt.revenue = dt.revenue.map((value) => (parseInt(value)));
                dt.numOrder = dt.numOrder.map((value) => (parseInt(value)));
                updateChart(chart, dt.date, dt.numOrder, dt.revenue);
            });
    }
    var ctx = document.getElementById('myChart').getContext('2d');
    var ctx1 = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [
                {
                    label: 'Số đơn hàng',
                    data: [],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Doanh thu',
                    data: [],
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1,
                    yAxisID: 'y-axis-1'
                }]
        },
        options: {
            plugins: {
                datalabels: {
                    color: '#36A2EB',
                    display: function(context) {
                        return context.dataset.data[context.dataIndex] > 15;
                    },
                    font: {
                        weight: 'bold'
                    },
                    formatter: Math.round,
                    animations: {
                        numbers: {
                            type: 'number',
                            properties: ['x', 'y', 'base', 'width', 'height'],
                            duration: 1000,
                            easing: 'easeOutElastic',
                            delay: function(context) {
                                return context.index * 100;
                            }
                        }
                    }
                }
            }
        }
    });
    let product_volume = JSON.parse('<?=$product_volume?>');
    product_volume.sale_volume=product_volume.sale_volume.map(value=>parseInt(value));
    product_volume.product_name=product_volume.product_name.map(str=>str.substr( 0, 20)+'...')
    var chart1 = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: product_volume.product_name,
            datasets: [{
                label: 'Số lượng đã bán',
                data: product_volume.sale_volume,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(255,168,32)',
                    'rgb(86,255,255)',
                    'rgb(238,86,255)',
                ],
                hoverOffset: 4
            }]
        },
    });

    function updateChart(chart, date, numOrder, revenue) {
        chart.data.datasets[0].data = numOrder;
        chart.data.datasets[1].data = revenue;
        chart.data.labels = date
        chart.update();
    }

    function getDataChart(from, to, type='DATE') {
        return new Promise((resolve, reject) => {
            let dataR = {};
            let data = `from=${from}&to=${to}&type=${type}`;

            xmlHttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    dataR = JSON.parse(this.responseText);
                    resolve(dataR); // Resolve the promise with the data
                } else if (this.readyState === 4) {
                    reject(this.status); // Reject the promise if there's an error
                }
            }

            xmlHttp.open('POST', 'xmlHttpRequest/chart.php');
            xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlHttp.send(data);
        });
    }

    function changeDays(date, days) {
        let result = new Date(date);
        result.setDate(result.getDate() + days);
        let year = result.getFullYear();
        let month = (result.getMonth() + 1).toString().padStart(2, '0');
        let day = result.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
</script>


