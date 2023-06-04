<div class="photo">
    <div class="text">Thi tiếng Anh trực tuyến</div>
    <div class="photo-blur"></div>
</div>
<?php
$minute = $test['time'];
?>
<div class="container mt-3">
    <form action="/thi-truc-tuyen/ket-qua" method="post">
        <button class="btn btn-success btn-rectangle rounded-0 shadow float-end" name="submit_result">Nộp bài</button>
    </form>
</div>

<body class="test" onload="start(<?php echo $minute; ?>)">
    <div class="container shadow-lg mt-3 pt-5 pb-3">
        <div class="clock">
            <span id="m"></span> :
            <span id="s"></span>
        </div>
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
                <div class="mt-2">
                    <button id="prevBtn" class="btn btn-danger btn-rectangle rounded-0">&#171; Trước</button>
                    <button id="nextBtn" class="btn btn-danger btn-rectangle rounded-0">Tiếp &#187;</button>
                </div>
                <div class="mt-2">
                    <span class="fw-bold">Lưu ý:</span>
                    <p>- Hãy note lại những câu chưa làm hoặc bạn không chắc đáp án để tránh thiếu sót</p>
                    <p>- Bạn cần nộp bài trước khi thời gian kết thúc, nếu không, bài làm sẽ bị hủy bỏ</p>
                    <p>- Bạn không được tải lại trang hoặc nhấn F5, nếu không tiến trình lại bài của bạn sẽ không được lưu lại</p>
                </div>
            </div>
            <div class="col-md-3 border-start">
                <div class="question-selector">
                    <?php
                    for ($i = 1; $i <= $test['size']; $i++) {
                        echo '<div><button id="' . $i . '" class="question__selector__done">' . $i . '</a></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>