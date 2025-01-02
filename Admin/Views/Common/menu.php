<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
<!--menu.php-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/Seafood_StoreVN_MVC" class="simple-text">
                Seafood StoreVN
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="?controller=Controller">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="?controller=UserController&action=user">
                    <i class="pe-7s-user"></i>
                    <p>Thành viên</p>
                </a>
            </li>
            <li>
                <a href="?controller=CategoryController&action=cate">
                    <i class="pe-7s-note2"></i>
                    <p>Loại hàng</p>
                </a>
            </li>
            <li>
                <a href="?controller=ProductController&action=prod">
                    <i class="pe-7s-box1"></i>
                    <p>Sản phẩm</p>
                </a>
            </li>
            <li>
                <a href="?controller=OrderController">
                    <i class="pe-7s-note2"></i>
                    <p>Đơn hàng</p>
                </a>
            </li>
            <li>
                <a href="?controller=RevenueController">
                    <i class="pe-7s-graph"></i>
                    <p>Thống kê doanh thu</p>
                </a>
            </li>
            <li>
                <a href="?controller=AmountController">
                    <i class="pe-7s-box2"></i>
                    <p>Sản phẩm tồn kho</p>
                </a>
            </li>
            <li>
                <a href="?controller=FeedbackController">
                    <i class="pe-7s-comment"></i>
                    <p> Quản lý góp ý</p>
                </a>
            </li>
            <li>
                <a href="?controller=NewsController">
                    <i class="pe-7s-news-paper"></i>
                    <p> Quản lý tin tức</p>
                </a>
            </li>

        </ul>
    </div>
</div>
<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-dashboard"></i>
                            <p class="hidden-lg hidden-md">Dashboard</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../?controller=UserController&action=logout">
                            <p>Log out</p>
                        </a>
                    </li>
                    <li class="separator hidden-lg"></li>
                </ul>
            </div>
        </div>
    </nav>