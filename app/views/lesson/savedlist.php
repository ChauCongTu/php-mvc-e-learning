<div class="container">
    <h3 class="bg-light p-2 border-top border-bottom mt-3">Danh sách bài học đã lưu</h3>
    <div class="row" id="grade_10_list">
        <?php foreach ($savedList as $value) { ?>
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="/public/Image/lesson/<?php echo $value['thumb']; ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"><?php echo $value['title']; ?></p>
                                    <p class="text-muted mb-0"><i class="fa-solid fa-clock me-2"></i>Đã lưu <?php echo Helpers::displayTime($value['saved_at']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a class="m-0 text-reset" href="/Lesson/unSave/<?php echo $value['lesson_id']; ?>" role="button" data-ripple-color="primary">Bỏ lưu<i class="fa-solid fa-bookmark ms-2"></i></a>
                        <a class="m-0 text-reset" href="/bai-hoc/<?php echo Helpers::to_slug($value['title']) . '_' . $value['lesson_id'] . '.html'; ?>" role="button" data-ripple-color="primary">Bắt đầu học<i class="fa-solid fa-angles-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <a href="/bai-hoc" class="btn btn-light border"><i class="fa-solid fa-angles-left me-2"></i>Quay lại</a>
</div>