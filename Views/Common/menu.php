<!-- Header -->
<header class="header2">
    <!-- Header desktop -->
    <div class="container-menu-header-v2 p-t-26">
        <div class="topbar2">
            <div class="topbar-social">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-instagram"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>

            <!-- Logo2 -->
            <a href="?action=index" class="logo2">
    <img src="Assets/images/icons/seafood-logo.png" alt="IMG-LOGO" style="width: 50px; height: 20%;">
</a>

            <div class="topbar-child2">
					<span class="topbar-email">
						<?php if(isset($_SESSION['user'])){
						    echo $_SESSION['user']['fullname'];
                        } ?>
					</span>

                <!--  -->
<!--                <a href="#" class="header-wrapicon1 dis-block m-l-30">-->
<!--                    <img src="Assets/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">-->
<!--                </a>-->
                <div class="header-wrapicon2 m-l-30">
                    <img src="Assets/images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown"
                         alt="ICON">
                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown" style="width: 164px !important;">
                        <ul class="header-cart-wrapitem">
                            <?php if(!isset($_SESSION['user'])): ?>
                            <li class="header-cart-item">
                                <a href="?controller=UserController&action=login">LOGIN</a>
                            </li>
                            <?php endif; ?>
                            <li class="header-cart-item">
                                <a href="?controller=UserController&action=register">REGISTER</a>
                            </li>
                            <?php if(isset($_SESSION['user'])): ?>
                            <li class="header-cart-item">
                                <a href="?controller=UserController&action=logout">LOGOUT</a>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
                <span class="linedivide1"></span>

                <div class="header-wrapicon2 m-r-13">
                    <img src="Assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown"
                         alt="ICON">
                    <span class="header-icons-noti"><?php
                        $count = new CartDao();
                        $c = $count->cartCount();
                        if($c != null){
                            echo $c;
                        }else{
                            echo "0";
                        }
                        ?>
                    </span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <?php
                            $cartDao = new CartDao();
                            $cart = $cartDao->cartItems();
                            if(isset($cart)){
foreach ($cart as $product_id => $item):

                            ?>
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="Admin/Assets/img/products/<?=$item['image']?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        <?=$item['name']?>
                                    </a>

                                    <span class="header-cart-item-info">
											<?=$item['quantity']?> X <?=number_format($item['price'])?> VND
										</span>
                                </div>
                            </li>
                            <?php endforeach; }?>

                        </ul>

                        <div class="header-cart-total">
							</div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="?controller=CartController" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Xem giỏ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrap_header">

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="./">Trang Chủ</a>
                        </li>

                        <li>
                            <a href="?controller=Controller&action=news">Tin tức</a>
                        </li>

                        <li>
                            <a href="?controller=Controller&action=introduce">Giới thiệu</a>
                        </li>

                        <li>
                            <a href="?controller=Controller&action=contact">Liên hệ</a>
                        </li>
                        <li>
                            <a href="?controller=Controller&action=feedback">Góp ý</a>
                        </li>
                        
                        <li>
                            <?php if(isset($_SESSION['user'])): if($_SESSION['user']['role'] == 0): ?>

                            <a href="?controller=Controller&action=admin"> Admin </a>
                            <?php endif; endif; ?>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">

            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="index.html" class="logo-mobile">
            <img src="Assets/images/icons/gomarket.png" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="#" class="header-wrapicon1 dis-block">
                    <img src="Assets/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="Assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown"
                         alt="ICON">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="Assets/images/item-cart-01.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        White Shirt With Pleat Detail Back
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $19.00
										</span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="Assets/images/item-cart-02.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Converse All Star Hi Black Canvas
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $39.00
										</span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="Assets/images/item-cart-03.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Nixon Porter Leather Watch In Tan
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $17.00
										</span>
                                </div>
                            </li>
                        </ul>

                        <div class="header-cart-total">
								Total: $75.00
							</div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Miễn phí vận chuyển từ 1 Tỷ VND
						</span>
                </li>

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
							<span class="topbar-email">
								Seafood StoreVN
							</span>

                        <div class="topbar-language rs1-select2">
                            <select class="selection-1" name="time">
                                <option>USD</option>
                                <option>VND</option>
                            </select>
                        </div>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="index.html">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Homepage V1</a></li>
                        <li><a href="index.html">Homepage V2</a></li>
                        <li><a href="home-03.html">Homepage V3</a></li>
                    </ul>
                    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                </li>

                <li class="item-menu-mobile">
                    <a href="./">Shop</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="./">Sale</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="cart.html">Features</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="blog.html">Blog</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="about.html">About</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
