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
        <div class="h3 p-2 bg-light border-top border-bottom">Quản lý liên hệ</div>
        <div class="table-responsive">
            <table class="table table-bordered align-middle bg-white">
                <thead class="bg-light">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Người gửi</th>
                        <th>Email</th>
                        <th>Tình trạng</th>
                        <th>Ngày gửi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($pagedData as $value) { ?>
                        <tr class="text-center">
                            <td><?php echo ++$i; ?></th>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td>
                                <?php echo ($value['status'] == 0) ? '<i class="fa-solid fa-x text-danger me-2"></i>Chưa hỗ trợ ' : '<i class="fa-solid fa-check text-success me-2"></i>Đã hỗ trợ ' ?>
                            </td>
                            <td><?php echo Helpers::displayTime($value['created_at']); ?></td>
                            <td class="d-flex justify-content-center">
                                <a data-bs-toggle="modal" data-bs-target="#see_<?php echo $value['id']; ?>" class="btn btn-success btn-sm border"><i class="fa-solid fa-eye me-1"></i> Xem</a>
                                <a data-bs-toggle="modal" data-bs-target="#del_<?php echo $value['id']; ?>" class="btn btn-danger btn-sm border"><i class="fa-solid fa-trash me-1"></i> Xóa</a>
                                <?php if ($value['status'] == 0) { ?>
                                    <form action="" method="post">
                                        <input type="hidden" value="<?php echo $value['id']; ?>" name="id">
                                        <button class="btn btn-primary btn-sm border" name="mark"><i class="fa-solid fa-paperclip me-1"></i> Đánh dấu đã hỗ trợ</a></button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="del_<?php echo $value['id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xóa liên hệ</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                Bạn có chắc muốn xóa liên hệ này?
                                                <p class="text-muted">Lưu ý: bạn chỉ nên xóa những liên hệ spam</p>
                                                <input type="hidden" name="id" value="<?php echo $value['id']; ?>" class="form-control" />
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
                        <!-- Detail Modal -->
                        <div class="modal fade modal-mv" id="see_<?php echo $value['id']; ?>">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <form action="" method="post">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Liên hệ từ <?php echo $value['name'] ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="title" class="h5">Địa chỉ Email: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['email']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Nội dung liên hệ: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['content']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>