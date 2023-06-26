<div class="container">
    <?php if (Session::data('User') != null) { ?>
        <a href="/thi-truc-tuyen/lich-su.html" class="btn btn-primary mt-3"><i class="fa-solid fa-clock-rotate-left me-2"></i> Lịch sử làm bài</a>
    <?php } ?>
    <h3 class="bg-light p-2 border-top border-bottom mt-3">Bộ đề thi trắc nghiệm lớp 10</h3>
    <div class="row" id="grade_10_list">
        <?php foreach ($grade_10 as $value) { ?>
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
        <div class="text-center">
            <a href="/thi-truc-tuyen/bo-de-10.html" class="btn btn-light border"> Xem toàn bộ</a>
        </div>
    </div>
    <h3 class="bg-light p-2 border-top border-bottom mt-3">Bộ đề thi trắc nghiệm lớp 11</h3>
    <div class="row" id="grade_10_list">
        <?php foreach ($grade_11 as $value) { ?>
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
        <div class="text-center">
            <a href="/thi-truc-tuyen/bo-de-11.html" class="btn btn-light border"> Xem toàn bộ</a>
        </div>
    </div>
    <h3 class="bg-light p-2 border-top border-bottom mt-3">Bộ đề thi trắc nghiệm lớp 12</h3>
    <div class="row" id="grade_10_list">
        <?php foreach ($grade_12 as $value) { ?>
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
        <div class="text-center">
            <a href="/thi-truc-tuyen/bo-de-12.html" class="btn btn-light border"> Xem toàn bộ</a>
        </div>
    </div>
</div>