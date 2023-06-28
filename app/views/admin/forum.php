<section class="admin mt-3 mb-3">
    <div class="container">
        <h1>Quản lý danh mục diễn đàn</h1>
        <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#add" class="btn btn-danger rounded-0"><i class="fa-solid fa-plus"></i> Thêm danh mục</a>
        <div class="text-danger mb-3">
            <?php echo (isset($errors['name'])) ? $errors['name'] : false; ?>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered align-middle bg-white">
                <thead class="bg-light">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Tên danh mục</th>
                        <th>Số bài viết</th>
                        <th>Ngày tạo</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                $index = 0;
                foreach ($categories as $values) {
                    echo '<tr class="text-center">
                            <td>' . ++$index . '</td>
                            <td>' . $values['category_name'] . '</td>
                            <td>' . count($values['post']) . '</td>
                            <td>' . Helpers::displayTime($values['created_at']) . '</td>
                            <td>
                                <a class="btn btn-primary btn-sm" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#edit_' . $values['category_id'] . '"><i class="fa-solid fa-pen"></i> Sửa </a>
                                <a class="btn btn-danger btn-sm" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#del_' . $values['category_id'] . '"><i class="fa-solid fa-trash"></i> Xóa</a>
                            </td>
                        </tr>';
                    echo '<div class="modal fade" id="edit_' . $values['category_id'] . '">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-content">
                                            <form action="" method="post">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Chỉnh sửa danh mục</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                            
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="">
                                                        <input type="hidden" name="id" value="' . $values['category_id'] . '">
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name" value="' . $values['category_name'] . '">
                                                    </div>
                                                </div>
                            
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button name="edit" class="btn btn-danger">Chỉnh sửa</button>
                                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    echo '<div class="modal fade" id="del_' . $values['category_id'] . '">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Xóa danh mục</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                        
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="">
                                                    Bạn có chắc muốn xóa danh mục này?
                                                    ';
                                                    if (count($values['post']) > 0) {
                                                        echo '
                                                        <p><small>Lưu ý: tất cả bài viết trong danh mục này cũng sẽ bị xóa theo</small></p>
                                                        <div class="overflow-auto">
                                                            <pre class="p-3 bg-light">';
                                                            foreach ($values['post'] as $post) {
                                                                echo '<p>&#8226; ' . $post['title'] . '</p>';
                                                            }
                                                        echo '</pre>
                                                        </div>';
                                                    }
                                                    echo '<input type="hidden" name="id" value="' . $values['category_id'] . '">
                                                </div>
                                            </div>
                        
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button name="del" class="btn btn-danger">Xóa</button>
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                ?>

            </table>
            <?php
            echo Helpers::pagination($pagination['total_rows'], $pagination['recordsPerPage'], $pagination['currentPage']);
            ?>
        </div>
        <a href="/bang-dieu-khien" class="btn btn-light border">Quay lại</a>
    </div>
</section>

<!-- Add category Model -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-content">
                <form action="" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm danh mục</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="">
                            <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button name="add" class="btn btn-danger">Thêm</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>