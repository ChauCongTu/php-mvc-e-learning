<div class="container">
    <?php if (Session::data('User') != null) { ?>
        <a href="/bai-hoc/danh-sach-da-luu" class="btn btn-primary mt-3"><i class="fa-solid fa-bookmark me-2"></i>Danh sách bài học đã lưu <?php echo (isset($numbSaved))?'<span class="badge bg-danger ms-1">'.$numbSaved.'</span></a>':false; ?>
    <?php } ?>
    <h3 class="bg-light p-2 border-top border-bottom mt-3">Bài học tiếng Anh lớp 10</h3>
    <div class="row" id="grade_10_list">
        <?php foreach ($grade10lesson as $value) { ?>
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="/public/Image/lesson/<?php echo $value['thumb']; ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"><?php echo $value['title']; ?></p>
                                    <p class="text-muted mb-0"><i class="fa-solid fa-clock me-2"></i><?php echo Helpers::displayTime($value['created_at']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a class="m-0 text-reset" href="/Lesson/Save/<?php echo $value['lesson_id']; ?>" role="button" data-ripple-color="primary">Lưu bài học<i class="fa-solid fa-bookmark ms-2"></i></a>
                        <a class="m-0 text-reset" href="/bai-hoc/<?php echo Helpers::to_slug($value['title']) . '_' . $value['lesson_id'] . '.html'; ?>" role="button" data-ripple-color="primary">Bắt đầu học<i class="fa-solid fa-angles-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="text-center">
            <div class="btn btn-light border" id="see_all_10_grade">Xem toàn bộ</div>
        </div>
    </div>
    <h3 class="bg-light p-2 border-top border-bottom mt-3">Bài học tiếng Anh lớp 11</h3>
    <div class="row" id="grade_11_list">
        <?php foreach ($grade11lesson as $value) { ?>
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="/public/Image/lesson/<?php echo $value['thumb']; ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"><?php echo $value['title']; ?></p>
                                    <p class="text-muted mb-0"><i class="fa-solid fa-clock me-2"></i><?php echo Helpers::displayTime($value['created_at']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a class="m-0 text-reset" href="/Lesson/Save/<?php echo $value['lesson_id']; ?>" role="button" data-ripple-color="primary">Lưu bài học<i class="fa-solid fa-bookmark ms-2"></i></a>
                        <a class="m-0 text-reset" href="/bai-hoc/<?php echo Helpers::to_slug($value['title']) . '_' . $value['lesson_id'] . '.html'; ?>" role="button" data-ripple-color="primary">Bắt đầu học<i class="fa-solid fa-angles-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="text-center">
            <div class="btn btn-light border" id="see_all_11_grade">Xem toàn bộ</div>
        </div>
    </div>
    <h3 class="bg-light p-2 border-top border-bottom mt-3">Bài học tiếng Anh lớp 12</h3>
    <div class="row" id="grade_12_list">
        <?php foreach ($grade12lesson as $value) { ?>
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="/public/Image/lesson/<?php echo $value['thumb']; ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"><?php echo $value['title']; ?></p>
                                    <p class="text-muted mb-0"><i class="fa-solid fa-clock me-2"></i><?php echo Helpers::displayTime($value['created_at']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a class="m-0 text-reset" href="/Lesson/Save/<?php echo $value['lesson_id']; ?>" role="button" data-ripple-color="primary">Lưu bài học<i class="fa-solid fa-bookmark ms-2"></i></a>
                        <a class="m-0 text-reset" href="/bai-hoc/<?php echo Helpers::to_slug($value['title']) . '_' . $value['lesson_id'] . '.html'; ?>" role="button" data-ripple-color="primary">Bắt đầu học<i class="fa-solid fa-angles-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="text-center">
            <div class="btn btn-light border" id="see_all_12_grade">Xem toàn bộ</div>
        </div>
    </div>
</div>