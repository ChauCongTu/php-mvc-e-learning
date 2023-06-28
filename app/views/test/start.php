<?php
$minute = $test['time'];
?>
<div class="bg-light p-3">
    <div class="container">
        <div class="d-flex justify-content-end">
            <div class="bg-primary me-3 p-2 ps-3 pe-3 fw-bold text-light">
                <span id="m"></span> :
                <span id="s"></span>
            </div>
            <form action="/thi-truc-tuyen/ket-qua" method="post">
                <div class="text-end">
                    <button class="btn btn-success " name="submit_result">Nộp bài</button>
                </div>
            </form>
        </div>
    </div>
</div>

<body class="test" onload="start(<?php echo $minute; ?>)">
    <div class="container mt-3 pt-5 pb-3">
        <div class="row">
            <div class="col-md-9">
                <div class="question" id="questionInfo">
                    <div class="h3">Câu <span class="number_question">1</span>: </div>
                    <p class="fw-bold"><?php echo $test['question'][0]['content']; ?></p>
                    <div>
                        <form action="">
                            <div class="mt-2 border p-3 rounded">
                                <input class="form-check-input" type="radio" name="answer" id="a" value="1">
                                <label class="form-check-label" for="a">
                                    A. <?php echo $test['question'][0]['answer_1']; ?>
                                </label>
                            </div>
                            <div class="mt-2 border p-3 rounded">
                                <input class="form-check-input" type="radio" name="answer" id="b" value="2">
                                <label class="form-check-label" for="a">
                                    B. <?php echo $test['question'][0]['answer_2']; ?>
                                </label>
                            </div>
                            <div class="mt-2 border p-3 rounded">
                                <input class="form-check-input" type="radio" name="answer" id="c" value="3">
                                <label class="form-check-label" for="a">
                                    C. <?php echo $test['question'][0]['answer_3']; ?>
                                </label>
                            </div>
                            <div class="mt-2 border p-3 rounded">
                                <input class="form-check-input" type="radio" name="answer" id="d" value="4">
                                <label class="form-check-label" for="a">
                                    D. <?php echo $test['question'][0]['answer_4']; ?>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-2 text-end">
                    <button id="nextBtn" class="btn btn-danger">Xác nhận<i class="fa-solid fa-check ms-2"></i></button>
                </div>
                <div class="mt-2">
                    <span class="fw-bold">Lưu ý:</span>
                    <p>- Hãy note lại những câu chưa làm hoặc bạn không chắc đáp án để tránh thiếu sót</p>
                    <p>- Bạn cần nộp bài trước khi thời gian kết thúc, nếu không, bài làm sẽ bị hủy bỏ</p>
                    <p>- Bạn không được tải lại trang hoặc nhấn F5, nếu không tiến trình lại bài của bạn sẽ không được lưu lại</p>
                </div>
            </div>
            <div class="col-md-3 border-start">
                <input type="hidden" value="<?php echo $test['size']; ?>" id="test_size">
                <div class="question-selector">
                    <?php
                    for ($i = 1; $i <= $test['size']; $i++) {
                        echo '<div><button id="' . $i . '" class="question__selector">' . $i . '</a></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div class="toast test-warning">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto"><i class="fa-solid fa-warning"></i> Cảnh báo</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body bg-light">
                <p>Thời gian chỉ còn lại <span id="timeleft"></span> phút. Hãy chuẩn bị nộp bài trước khi hết giờ, nếu không bài làm của bạn sẽ không được công nhận</p>
            </div>
        </div>
    </div>
</body>