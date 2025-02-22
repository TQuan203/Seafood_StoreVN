<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="content">
                    <h3>Tên sản phẩm: <?=$product['name']?></h3>
                    <div class="row">
                        <div class="col-7 col-md-3">
                            <img class="thumbnail rounded mx-auto d-block" width="280" height="280" src="Assets/img/products/<?=$product['image']?>" alt="...">
                        </div>
                        <div class="col-12 col-md-9">
                            <!-- Hiển thị giá gốc và giá khuyến mãi -->
                            <h4>
                                Giá: 
                                <?php if ($product['sale'] > 0): ?>
                                    <span class="text-muted" style="text-decoration: line-through;">
                                        <?= number_format($product['price']) ?> VND
                                    </span>
                                    <span style="color: green;">
                                        <?= number_format($product['price'] - ($product['price'] * $product['sale'] / 100)) ?> VND
                                    </span>
                                <?php else: ?>
                                    <?= number_format($product['price']) ?> VND
                                <?php endif; ?>
                            </h4>
                            <h5>Khuyến mãi: <?=$product['sale']?>%</h5>
                            <h5>Ngày nhập: <?=$product['date']?></h5>
                            <h5>Số lượng: <?=$product['amount']?></h5>
                            <h5>Số lượt xem: <?=$product['view']?></h5>
                            <h4>Mô tả: </h4>
                            <p>
                                <?=$product['description']?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
