<section class="admin">
    <div class="container mt-3 mb-3">
        <?php
        if (isset($errors)) {
            echo '<div class="alert alert-danger"> Không thành công: ';
            echo (isset($errors['thumb']) ? '<p>&#8226; ' . $errors['thumb'] . '</p>' : false);
            echo (isset($errors['title']) ? '<p>&#8226; ' . $errors['title'] . '</p>' : false);
            echo '</div>';
        }
        ?>
        <div class="h1">Quản lý bài học</div>
        <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#add" class="btn btn-danger mb-3"><i class="fa-solid fa-plus"></i> Thêm bài học</a>
        <div class="table-responsive">
            <table class="table table-bordered align-middle bg-white">
                <thead class="bg-light">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Khối lớp</th>
                        <th>Ngày cập nhật</th>
                        <th>Ngày tạo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 0;
                    foreach ($lessons as $value) {
                    ?>
                        <tr class="text-center">
                            <td>
                                <?php echo ++$index; ?>
                            </td>
                            <td>
                                <?php echo $value['title']; ?>
                            </td>
                            <td>
                                <?php echo $value['grade']; ?>
                            </td>
                            <td>
                                <?php echo Helpers::displayTime($value['updated_at']); ?>
                            </td>
                            <td>
                                <?php echo Helpers::displayTime($value['created_at']);  ?>
                            </td>
                            <td>
                                <a href="<?php echo ++$i; ?>" class="btn btn-link btn-sm fw-bold">
                                    <i class="fa-solid fa-circle-info"></i> Chi tiết
                                </a>
                                <a  style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#edit_<?php echo $value['lesson_id']; ?>" class="btn btn-link btn-sm fw-bold">
                                    <i class="fa-solid fa-pen"></i> Sửa
                                </a>
                                <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#del_<?php echo $value['lesson_id']; ?>" class="btn btn-link btn-sm fw-bold">
                                    <i class="fa-solid fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                        <!-- Edit Modal -->
                        <div class="modal fade modal-mv" id="edit_<?php echo $value['lesson_id']; ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Chỉnh sửa bài học</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="thumb" class="h5">Ảnh Thumb: </label><br/>
                                                <small>Nếu không muốn thay đổi ảnh Thumb thì bỏ qua phần này</small>
                                                <input type="file" name="thumb" class="form-control" />
                                            </div>
                                            <div>
                                                <input type="hidden" name="id" value="<?php echo $value['lesson_id']; ?>" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Tiêu đề: </label>
                                                <input type="text" name="title" placeholder="Nhập tiêu đề" class="form-control" value="<?php echo $value['title']; ?>" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Loại bài học: </label>
                                                <select name="grade" class="form-control">
                                                    <option value="10" <?php echo ($value['grade'] == 10)?"selected":false; ?>>Lớp 10</option>
                                                    <option value="11" <?php echo ($value['grade'] == 11)?"selected":false; ?>>Lớp 11</option>
                                                    <option value="12" <?php echo ($value['grade'] == 12)?"selected":false; ?>>Lớp 12</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="content_edit_<?php echo $value['lesson_id']; ?>" class="h5">Bài tập áp dụng (không bắt buộc): </label>
                                                <textarea name="content" id="content_edit_<?php echo $value['lesson_id']; ?>"><?php echo $value['content']; ?></textarea>
                                                <script>
                                                    CKEDITOR.replace('content_edit_<?php echo $value['lesson_id']; ?>');
                                                </script>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" name="edit">Chỉnh sửa</button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Model -->
                        <div class="modal fade" id="del_<?php echo $value['lesson_id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Xóa bài học</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                        
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="">
                                                    Bạn có chắc muốn xóa bài học này?
                                                    <input type="hidden" name="id" value="<?php echo $value['lesson_id']; ?>">
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
                        </div>
                    <?php } ?>
                </tbody>
            </table>
            <?php
            echo Helpers::pagination($pagination['total_rows'], $pagination['recordsPerPage'], $pagination['currentPage']);
            ?>
        </div>
    </div>
</section>

<!-- Add Modal -->
<div class="modal fade modal-mv" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm bài học</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="thumb" class="h5">Ảnh Thumb: </label>
                        <input type="file" name="thumb" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="title" class="h5">Tiêu đề: </label>
                        <input type="text" name="title" placeholder="Nhập tiêu đề" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="title" class="h5">Loại bài học: </label>
                        <select name="grade" class="form-control">
                            <option value="10">Lớp 10</option>
                            <option value="11">Lớp 11</option>
                            <option value="12">Lớp 12</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="h5">Bài tập áp dụng (không bắt buộc): </label>
                        <textarea name="content" id="content"></textarea>
                        <script>
                            CKEDITOR.replace('content');
                        </script>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-danger" name="add">Thêm</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>