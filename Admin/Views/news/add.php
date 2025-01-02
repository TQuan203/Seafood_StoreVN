<div class="content">
    <div class="container-fluid">
        <div class="row">
           
            
            <h4>Add New News</h4>
            <?php
                if (isset($message)):
                    ?>
                    <div class="text-danger" role="alert">
                        <h5><?= $message ?></h5>
                    </div>
                <?php
                endif;
                ?>
            
            <!-- Form để thêm tin tức mới -->
            <form action="?controller=NewsController&action=add" method="post">
                <!-- <input type="hidden" name="action" value="add"> -->
                <input type="hidden" name="controller" value="NewsController">

                <!-- Title -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="content">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <!-- Content -->
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="form-control" rows="6" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit button -->
                <div class="form-group">
                    <div class="content">
                        <input type="submit" name="ok" value="Add News" class="btn btn-warning">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
