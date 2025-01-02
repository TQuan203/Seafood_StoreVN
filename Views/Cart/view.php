<?php include "./Views/Common/header.php" ?>
<?php include "./Views/Common/menu.php" ?>

<!-- Cart -->
<h2 class="text-center">Giỏ hàng</h2>

<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="update"/>
            <input type="hidden" name="controller" value="CartController"/>
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-2">Sản phẩm</th>
                            <th class="column-3">Giá</th>
                            <th class="column-4">Số lượng</th>
                            <th class="column-5">Tổng tiền</th>
                            <th class="column-6">Xóa</th>
                        </tr>
                        <?php
                        $subtotal = 0; // Khởi tạo tổng tiền
                        if (isset($cart) && count($cart) > 0) {
                            foreach ($cart as $product_id => $item):
                                $subtotal += $item['total']; // Thêm tổng tiền của sản phẩm vào $subtotal
                                ?>
                                <tr class="table-row">
                                    <td class="column-1">
                                        <div class="cart-img-product b-rad-4 o-f-hidden">
                                            <img src="Admin/Assets/img/products/<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
                                        </div>
                                    </td>
                                    <td class="column-2"><?= htmlspecialchars($item['name']) ?></td>
                                    <td class="column-3"><?= number_format($item['price']) ?> VND</td>
                                    <td class="column-4">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" type="button" data-product-id="<?= $product_id ?>">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>

                                            <input class="size8 m-text18 t-center num-product" type="number" name="items[<?= $product_id ?>]" value="<?= $item['quantity'] ?>" min="1">

                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" type="button" data-product-id="<?= $product_id ?>">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="column-5"><?= number_format($item['total']) ?> VND</td>
                                    <td class="column-6">
                                        <a href="#" class="btn btn-danger remove-item" data-product-id="<?= $product_id ?>">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach;
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Giỏ hàng của bạn đang trống.</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>

            <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                <div class="flex-w flex-m w-full-sm"></div>

                <div class="size10 trans-0-4 m-t-10 m-b-10">
                    <!-- Cập nhật giỏ hàng -->
                    <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Cập nhật giỏ hàng
                    </button>
                </div>
            </div>
        </form>

        <!-- Xóa tất cả sản phẩm trong giỏ -->
        <div class="size10 trans-0-4 m-t-10 m-b-10">
            <button type="button" class="flex-c-m sizefull bg2 bo-rad-23 hov1 s-text1 trans-0-4" id="clear-cart">
                Xóa tất cả
            </button>
        </div>

        <!-- Total -->
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="check_out1"/>
            <input type="hidden" name="controller" value="CartController"/>
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <h5 class="m-text20 p-b-24">Thông tin đơn hàng</h5>

                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Tên người nhận">
                    </div>
                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="telephone" placeholder="Số điện thoại">
                    </div>
                    <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address" placeholder="Địa chỉ"></textarea>
                    <span class="s-text18 w-size19 w-full-sm">Chú ý:</span>
                    <div class="w-size20 w-full-sm">
                        <p class="s-text8 p-b-23">
                            Thanh toán trực tiếp khi nhận hàng.
                        </p>
                    </div>
                </div>

                <!-- Tổng tiền -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <span class="m-text22 w-size19 w-full-sm">Tổng tiền:</span>
                    <span class="m-text21 w-size20 w-full-sm"><?= number_format($subtotal) ?> VND</span>
                    <input type="hidden" name="total" value="<?= $subtotal ?>">
                    <input type="hidden" name="status" value="1">
                </div>

                <div class="size15 trans-0-4">
                    <?php if (isset($_SESSION['user'])): ?>
                        <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Thanh toán
                        </button>
                    <?php else: ?>
                        <p>Bạn phải đăng nhập để tiến hành thanh toán.</p>
                    <?php endif; ?>

                    <?php
                    if (isset($_SESSION['message'])) {
                        echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
                        unset($_SESSION['message']);
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include "./Views/Common/footer.php" ?>
<script>
    $(document).ready(function() {
        // Lắng nghe sự kiện click trên nút "Xóa tất cả"
        $('#clear-cart').on('click', function() {
            // Gửi yêu cầu AJAX để xóa tất cả sản phẩm trong giỏ hàng
            $.ajax({
                url: 'index.php',
                type: 'GET',
                data: {
                    controller: 'CartController',
                    action: 'clear_cart'  // Tham số action cho controller
                },
                success: function(response) {
                    // Reload trang sau khi giỏ hàng được xóa
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log("Lỗi khi xóa tất cả sản phẩm: " + error);
                }
            });
        });

        // Lắng nghe sự kiện click trên nút xóa sản phẩm riêng lẻ
        $('.remove-item').on('click', function(e) {
            e.preventDefault(); // Ngừng hành động mặc định của thẻ <a>

            var productId = $(this).data('product-id'); // Lấy product_id từ data attribute của nút xóa

            // Gửi yêu cầu AJAX để xóa sản phẩm cụ thể
            $.ajax({
                url: 'index.php',
                type: 'GET',
                data: {
                    controller: 'CartController',
                    action: 'remove',
                    product_id: productId
                },
                success: function(response) {
                    // Cập nhật lại giỏ hàng sau khi xóa thành công
                    location.reload();

                },
                error: function(xhr, status, error) {
                    console.log("Lỗi khi xóa sản phẩm: " + error);
                }
            });
        });
    });
</script>