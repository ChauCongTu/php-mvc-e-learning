<div class="photo">
    <div class="text">Thi tiếng Anh trực tuyến</div>
    <div class="photo-blur"></div>
</div>
<div class="container">
    <h3 class="bg-light p-2 border-top border-bottom mt-3">Bộ đề thi trắc nghiệm lớp 10</h3>
    <?php
    if (Session::data('User') != null) {
        echo '<a href="/thi-truc-tuyen/them/' . $grade . '.html" class="btn btn-danger mb-2"><i class="fa-solid fa-plus"></i> Thêm đề thi</a>';
    }
    ?>
    <div class="row" id="grade_10_list">
        <?php foreach ($test as $value) { ?>
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-bold mb-1"><?php echo $value['title']; ?></p>
                                <p class="text-muted">Số lượt thi: <?php echo $value['numbUser']; ?></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="text-muted mb-0">| Thời gian: <?php echo $value['time']; ?> phút</p>
                                </div>
                                <div class="ms-3">
                                    <p>Số câu: <?php echo $value['size']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a class="m-0 text-reset" href="/thi-truc-tuyen/<?php echo Helpers::to_slug($value['title']) . '_' . $value['exam_id'] . '.html'; ?>" role="button" data-ripple-color="primary">Bắt đầu thi<i class="fa-solid fa-angles-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php echo Helpers::pagination($pagination['total_rows'], $pagination['recordsPerPage'], $pagination['currentPage']); ?>
</div>