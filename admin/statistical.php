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
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [
            {
                label: 'Số đơn hàng',
                data: [12, 19, 3, 5, 2, 3, 7],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Doanh thu',
                data: [1000, 2000, 3000, 4000, 5000, 6000, 7000],
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
</script>


