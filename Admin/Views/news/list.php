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
                    <div class="header"><h4>News List</h4></div>
                    <table class="table table-hover">
                        <thead>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($news as $article):
                            ?>
                            <tr>
                                <td><?= $article['id'] ?></td>
                                <td><?= $article['title'] ?></td>
                                <td><?= $article['created_at'] ?></td>
                                <td class="td-actions text-right">
                                    <a rel="tooltip" title="Edit" class="btn btn-success btn-simple btn-xs"
                                       href="?controller=NewsController&action=edit&id=<?= $article['id'] ?>"><i
                                                class="fa fa-edit"></i></a>

                                    <a rel="tooltip" title="Delete" class="btn btn-danger btn-simple btn-xs"
                                       href="?controller=NewsController&action=delete&id=<?= $article['id'] ?>"><i
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

        <!-- Nút "Thêm Tin Tức" -->
        <div class="row">
            <a class="btn btn-primary" href="?controller=NewsController&action=add">Add New</a>
        </div>
    </div>
</div>
