<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>
    <ul style="padding-left: 0" class="side-menu top">
        <li class="<?=$action=='dashboard' ?'active':''?>">
            <a href="index.php?action=dashboard">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="<?=$action=='listCustomer' ?'active':''?>">
            <a href="index.php?action=listCustomer">
                <i class='bx bxs-group' ></i>
                <span class="text">Customer</span>
            </a>
        </li>
        <li class="<?=$action=='listOrder' ?'active':''?>">
            <a href="index.php?action=listOrder">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Orders</span>
            </a>
        </li>
        <li class="<?=$action=='listProduct'||$action=='addProduct' ?'active':''?>">
            <a href="index.php?action=listProduct">
                <i class='bx bxl-product-hunt'></i>
                <span class="text">Products</span>
            </a>
        </li>
        <li class="<?=$action=='category' ?'active':''?>">
            <a href="index.php?action=categories">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Categories</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu px-0">
        <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->
