<style>
    .form-group {
        width: 40%;
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
                    <h3>Thống kê doanh thu</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <form class="d-flex align-items-center form-statistical">
                    <div class="form-group d-flex justify-content-center align-items-center">
                        <label for="">Từ</label>
                        <input class="form-control from" type="datetime-local">
                        <label for="">Đến</label>
                        <input class="form-control to" type="datetime-local">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <select class="form-select w-50 type mx-2">
                            <option hidden="hidden" value="DATE">Thống kê theo</option>
                            <option value="DATE">Ngày</option>
                            <option value="WEEK">Tuần</option>
                            <option value="MONTH">Tháng</option>
                            <option value="YEAR">Năm</option>
                        </select>
                    </div>
                    <div class="form-group" style="text-align: right">
                        <button class="btn btn-success send-data" type="button">Lọc</button>
                    </div>
                </form>

                <canvas id="myChart"></canvas>
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
    let labels=[];
    let numOrder=[];
    let revenue=[];
    btn_send_data.addEventListener('click', function () {
        let from = form_statistical.querySelector('.from');
        let to = form_statistical.querySelector('.to');
        let type = form_statistical.querySelector('.type');
        let data = `from=${from.value}&to=${to.value}&type=${type.value}`;
        xmlHttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                dataReturn=JSON.parse(this.responseText);
                dataReturn.revenue=dataReturn.revenue?.map((value)=>(parseInt(value)));
                dataReturn.numOrder=dataReturn.numOrder?.map((value)=>(parseInt(value)));
                updateChart(chart, dataReturn.date, dataReturn.numOrder, dataReturn.revenue);
            }
        }
        xmlHttp.open('POST','xmlHttpRequest/chart.php');
        xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlHttp.send(data);
    });
    getDataChart()
        .then((dt)=>{
            dt.revenue=dt.revenue?.map((value)=>(parseInt(value)));
            dt.numOrder=dt.numOrder?.map((value)=>(parseInt(value)));
            return dt;
        })
        .then((res)=>{
            updateChart(chart,res.date,res.numOrder,res.revenue);
        })
        .catch((err)=>{
            console.error('có lỗi '+err);
        });
        var ctx = document.getElementById('myChart').getContext('2d');
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
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        id: 'y-axis-0',
                        position: 'left'
                    }, {
                        ticks: {
                            beginAtZero: true
                        },
                        id: 'y-axis-1',
                        position: 'right'
                    }]
                }
            }
        });
    function updateChart(chart, date, numOrder, revenue) {
        chart.data.datasets[0].data=numOrder;
        chart.data.datasets[1].data=revenue;
        chart.data.labels=date
        chart.update();
    }
    function getDataChart() {
        return new Promise((resolve, reject) => {
            let dataR={};
            let fromDate=new Date();
            fromDate = fromDate.getFullYear() + '-' + (fromDate.getMonth() ) + '-' +
                fromDate.getDate() + 'T' +
                fromDate.getHours() + ':' +
                fromDate.getMinutes()

            let toDate = new Date();
            toDate=toDate.getFullYear() + '-' + (toDate.getMonth() + 1) + '-' +
                toDate.getDate() + 'T' +
                toDate.getHours() + ':' +
                toDate.getMinutes()
            let data = `from=${fromDate}&to=${toDate}&type=DATE`;

            xmlHttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    dataR = JSON.parse(this.responseText);
                    resolve(dataR); // Resolve the promise with the data
                } else if (this.readyState === 4) {
                    reject(this.status); // Reject the promise if there's an error
                }
            }

            xmlHttp.open('POST','xmlHttpRequest/chart.php');
            xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlHttp.send(data);
        });
    }
</script>


