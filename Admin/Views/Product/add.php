<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if (isset($message)): ?>
                <div class="text-danger" role="alert">
                    <h5><?= $message ?></h5>
                </div>
            <?php endif; ?>

            <h4>Thêm sản phẩm mới</h4>

            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_save">
                <input type="hidden" name="controller" value="ProductController">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="content">
                            <div class="form-group">
                                <label>Mã sản phẩm (Tự động)</label>
                                <input type="text" class="form-control" disabled placeholder="Mã sản phẩm">
                            </div>

                            <div class="form-group">
                                <label>Danh mục<span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control pro-edt-select form-control-primary">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>" <?= isset($product->category_id) && $product->category_id == $category['id'] ? 'selected' : '' ?>><?= $category['name_category'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Tên sản phẩm <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" 
                                    value="<?= isset($product->Name) ? htmlspecialchars($product->Name) : '' ?>">
                                
                                <?php if (isset($errors['name'])): ?>
                                    <span class="text-danger"><?= $errors['name'] ?></span>
                                <?php endif; ?>

                                <?php if (isset($errors['name_length'])): ?>
                                    <span class="text-danger"><?= $errors['name_length'] ?></span>
                                <?php endif; ?>
                            </div>



                            <div class="form-group">
                                <label>Giá<span class="text-danger">*</span></label>
                                <input type="text" name="price" class="form-control" value="<?= isset($product->price) ? htmlspecialchars($product->price) : '' ?>">
                                <?php if (isset($errors['price'])): ?>
                                    <span class="text-danger"><?= $errors['price'] ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label>Giảm giá<span class="text-danger">*</span></label>
                                <input type="text" name="sale" class="form-control" value="<?= isset($product->sale) ? htmlspecialchars($product->sale) : '' ?>">
                            </div>

                            <div class="form-group">
                                    <label>Hình ảnh<span class="text-danger">*</span></label>
                                    <input type="file" name="file">
                                </div>

                                <div class="form-group">
                                    <label>Ngày nhập<span class="text-danger">*</span></label>
                                    <input type="date" name="date" class="form-control">
                                </div>

                                <div class="form-group">
                                <label for="amount">Số lượng<span class="text-danger">*</span></label>
                                <input type="text" name="amount" class="form-control" 
                                    value="<?php echo isset($product->Amount) ? $product->Amount : ''; ?>">

                                <?php if (isset($errors['amount'])): ?>
                                    <small class="text-danger"><?php echo $errors['amount']; ?></small>
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
                                    <label>Mô Tả</label>
                                    <textarea id="editor1" name="description" cols="6" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="content">
                                    <input type="submit" name="ok" value="Add" class="btn btn-warning">
                                </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>