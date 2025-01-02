<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if (isset($message)): ?>
                <div class="text-danger" role="alert">
                    <h5><?= $message ?></h5>
                </div>
            <?php endif; ?>

            <h4>Cập nhật sản phẩm</h4>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="edit_save">
                <input type="hidden" name="controller" value="ProductController">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="content">
                            <div class="form-group">
                                <label>ID (Tự động)</label>
                                <input name="id" type="text" class="form-control" 
                                       value="<?= is_object($product) ? $product->Id : $product['id'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Danh mục<span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control pro-edt-select form-control-primary">
                                    <option value="<?= is_object($product) ? $product->CategoryId : $product['category_id'] ?>">
                                        <?= is_object($product) ? $product->CategoryId : $product['category_id'] ?>
                                    </option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>" <?= (is_object($product) && $product->CategoryId == $category['id']) ? 'selected' : '' ?>>
                                            <?= $category['name_category'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" 
                                       value="<?= is_object($product) ? $product->Name : $product['name'] ?>">
                                <?php if (isset($errors['name'])): ?>
                                    <span class="text-danger"><?= $errors['name'] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Giá<span class="text-danger">*</span></label>
                                <input type="text" name="price" class="form-control" 
                                       value="<?= is_object($product) ? $product->Price : $product['price'] ?>">
                                <?php if (isset($errors['price'])): ?>
                                    <span class="text-danger"><?= $errors['price'] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Giảm giá<span class="text-danger">*</span></label>
                                <input type="text" name="sale" class="form-control" 
                                       value="<?= is_object($product) ? $product->Sale : $product['sale'] ?>">
                                <?php if (isset($errors['sale'])): ?>
                                    <span class="text-danger"><?= $errors['sale'] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh<span class="text-danger">*</span></label>
                                <input type="file" name="file">
                                <input type="hidden" name="image" 
                                       value="<?= is_object($product) ? $product->Image : $product['image'] ?>">
                                (<?= is_object($product) ? $product->Image : $product['image'] ?>)
                                <?php if (isset($errors['file'])): ?>
                                    <span class="text-danger"><?= $errors['file'] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày nhập<span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" 
                                       value="<?= is_object($product) ? $product->Date : $product['date'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Số lượng<span class="text-danger">*</span></label>
                                <input type="text" name="amount" class="form-control" 
                                       value="<?= is_object($product) ? $product->Amount : $product['amount'] ?>">
                                <?php if (isset($errors['amount'])): ?>
                                    <span class="text-danger"><?= $errors['amount'] ?></span>
                                <?php endif; ?>
                                <input type="hidden" name="view" value="0" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="content">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor1" name="description" cols="6" rows="6" class="form-control"><?= is_object($product) ? $product->Description : $product['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="content">
                                <input type="submit" name="ok" value="Update" class="btn btn-warning">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
