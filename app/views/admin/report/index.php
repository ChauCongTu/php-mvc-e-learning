<section class="admin">
    <div class="container mt-3 mb-3">
        <div class="h3 p-2 bg-light border-top border-bottom">Quản lý báo cáo</div>
        <div class="table-responsive">
            <table class="table table-bordered align-middle bg-white">
                <thead class="bg-light">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Người báo cáo</th>
                        <th>Người bị báo cáo</th>
                        <th>Lý do</th>
                        <th>Tình trạng</th>
                        <th>Ngày báo cáo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($pagedData as $value) { ?>
                        <tr class="text-center">
                            <td><?php echo ++$i; ?></th>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo '<a href="/nguoi-dung/' . Helpers::to_slug($value['reported_name']) . '_' . $value['reported_user_id'] . '.html">' . $value['reported_name'] . '</a>'; ?></td>
                            <td><?php echo $value['reason']; ?></td>
                            <td>
                                <?php echo ($value['is_handled'] == 0) ? '<i class="fa-solid fa-x text-danger me-2"></i>Chưa xử lý ' : '<i class="fa-solid fa-check text-success me-2"></i>Đã xử lý ' ?>
                            </td>
                            <td><?php echo Helpers::displayTime($value['created_at']); ?></td>
                            <td class="d-flex justify-content-center">
                                <a data-bs-toggle="modal" data-bs-target="#see_<?php echo $value['report_id']; ?>" class="btn btn-success btn-sm border"><i class="fa-solid fa-eye me-1"></i> Xem</a>
                                <a data-bs-toggle="modal" data-bs-target="#del_<?php echo $value['report_id']; ?>" class="btn btn-danger btn-sm border"><i class="fa-solid fa-trash me-1"></i> Xóa</a>
                                <?php if ($value['is_handled'] == 0) { ?>
                                    <form action="" method="post">
                                        <input type="hidden" value="<?php echo $value['report_id']; ?>" name="report_id">
                                        <button class="btn btn-primary btn-sm border" name="mark"><i class="fa-solid fa-paperclip me-1"></i> Đánh dấu đã xử lý</a></button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="del_<?php echo $value['report_id']; ?>">
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
                                                <input type="hidden" name="report_id" value="<?php echo $value['report_id']; ?>" class="form-control" />
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
                        <div class="modal fade modal-mv" id="see_<?php echo $value['report_id']; ?>">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <form action="" method="post">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Chi tiết báo cáo #<?php echo $value['report_id'] ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="title" class="h5">Tiêu đề: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['title']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Lý do: </label>
                                                <div class="text_pane">
                                                    <?php echo $value['reason']; ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="h5">Chi tiết: </label>
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
            <?php
            echo Helpers::pagination($pagination['total_rows'], $pagination['recordsPerPage'], $pagination['currentPage']);
            ?>
        </div>
        <a href="/bang-dieu-khien" class="btn btn-light border">Quay lại</a>
    </div>
</section>