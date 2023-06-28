<section class="admin">
    <div class="container mt-3 mb-3">
        <div class="h3 p-2 bg-light border-top border-bottom">Quản lý đề thi</div>
        <form action="" method="get">
            <div class="input-group mb-2">
                <div class="form-outline">
                    <input type="search" name="tra-cuu" placeholder="Tra cứu đề thi" value="<?php echo (isset($keyword)) ? $keyword : false; ?>" class="form-control" />
                </div>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered align-middle bg-white">
                <thead class="bg-light">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Đề</th>
                        <th>Số câu</th>
                        <th>Thời gian</th>
                        <th>Khối lớp</th>
                        <th>Ngày tạo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pagedData as $value) {
                        echo '<tr>
                                <td class="text-center">' . $i++ . '</td>
                                <td>' . $value['title'] . '</td>
                                <td class="text-center">' . $value['size'] . '</td>
                                <td class="text-center">' . $value['time'] . '</td>
                                <td class="text-center">' . $value['grade'] . '</td>
                                <td class="text-center">' . Helpers::displayTime($value['created_at']) . '</td>
                                <td class="text-center">
                                    <a href="/bang-dieu-khien/quan-ly-de-thi/chinh-sua/' . $value['exam_id'] . '" class="btn btn-success btn-sm"><i class="fa-solid fa-pen me-2"></i>Sửa</a>
                                    <a data-bs-toggle="modal" data-bs-target="#del_' . $value['exam_id'] . '" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash me-2"></i>Xóa</a>
                                </td>
                            </tr>'; ?>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="del_<?php echo $value['exam_id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xóa liên hệ</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                Bạn có chắc muốn xóa đề thi này?
                                                <p class="text-muted">Lưu ý: Tất cả câu hỏi thuộc bộ đề này cũng sẽ bị xóa theo</p>
                                                <input type="hidden" name="id" value="<?php echo $value['exam_id']; ?>" class="form-control" />
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" name="delete">Xóa</button>
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </tbody>
            </table>
            <?php
            echo Helpers::pagination($pagination['total_rows'], $pagination['recordsPerPage'], $pagination['currentPage']);
            ?>
        </div>
    </div>
</section>