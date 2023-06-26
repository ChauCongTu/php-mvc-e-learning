<div class="photo">
    <div class="text">Thi tiếng Anh trực tuyến</div>
    <div class="photo-blur"></div>
</div>
<div class="container">
    <h3 class="bg-light p-2 border-top border-bottom mt-3">Lịch sử của tôi</h3>
    <div class="row" id="grade_10_list">
        <?php foreach ($result as $value) { ?>
            <div class="col-xl-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-bold mb-1 h5"><?php echo $value['title']; ?></p>
                                <div class="d-flex align-items-center">
                                    <p class="text-muted me-2">Thi lúc: <?php echo $value['created_at']; ?></p>|
                                    <p class="text-muted ms-2">Điểm số: <?php echo $value['score']; ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a class="m-0 text-reset" href="/thi-truc-tuyen/<?php echo Helpers::to_slug($value['title']) . '_' . $value['exam_id'] . '.html'; ?>" role="button" data-ripple-color="primary">Thi lại<i class="fa-solid fa-angles-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <a href="/thi-truc-tuyen" class="btn btn-light border"><< Quay lại</a>
</div>