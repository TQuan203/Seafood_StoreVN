<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php
            if (isset($message)):
                ?>
                <div class="text-danger" role="alert">
                    <h5><?= $message ?></h5>
                </div>
            <?php
            endif;
            ?>
            <div class="col-md-8">
                <div class="card">
                    <div class="header"><h4>Products</h4></div>
                    <table class="table table-hover">
                        <thead>
                        <th>ID</th>
                        <th>Mã loại</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($products as $product):
                            // Tính giá khuyến mãi nếu có
                            $originalPrice = $product['price'];
                            $discountedPrice = $originalPrice;

                            if ($product['sale'] > 0) {
                                $discountedPrice = $originalPrice - ($originalPrice * $product['sale'] / 100);
                            }
                            ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['category_id'] ?></td>
                                <td><?= $product['name'] ?></td>
                                <td>
                                    <?php if ($product['sale'] > 0): ?>
                                        <span class="text-muted" style="text-decoration: line-through;">
                                            <?= number_format($originalPrice) ?> VND
                                        </span>
                                        <span style="color: green;">
                                            <?= number_format($discountedPrice) ?> VND
                                        </span>
                                    <?php else: ?>
                                        <?= number_format($originalPrice) ?> VND
                                    <?php endif; ?>
                                </td>
                                <td><?= $product['amount'] ?></td>
                                <td class="td-actions text-right">
                                    <a rel="tooltip" title=""
                                       class="btn btn-info btn-simple btn-sm"
                                       data-original-title="View"
                                       href="?controller=ProductController&action=view&id=<?= $product['id'] ?>"><i
                                            class="pe-7s-look"></i></a>

                                    <a rel="tooltip" title="" class="btn btn-success btn-simple btn-xs"
                                       data-original-title="Edit"
                                       href="?controller=ProductController&action=edit&id=<?= $product['id'] ?>"><i
                                            class="fa fa-edit"></i></a>

                                    <a rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"
                                       data-original-title="Delete"
                                       href="?controller=ProductController&action=delete&id=<?= $product['id'] ?>"><i
                                            class="pe-7s-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <a class="btn btn-primary"
               href="?controller=ProductController&action=add">Add New</a>
        </div>
    </div>
</div>
