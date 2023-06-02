<div class="photo">
    <div class="text">Thi tiếng Anh trực tuyến</div>
    <div class="photo-blur"></div>
</div>
<?php
$minute = 60;
?>
<div class="container mt-3">
    <a href="" class="btn btn-success btn-rectangle rounded-0 shadow float-end">Nộp bài</a>
</div>

<body class="test" onload="start(<?php echo $minute; ?>)">
    <div class="container shadow-lg mt-3 pt-5 pb-3">
        <div class="clock">
            <span id="m">Phút</span> :
            <span id="s">Giây</span>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="question" id="questionInfo">
                    <div class="h5">Câu <span class="number_question">1</span>. Find the word which has a different sound in the part underlined: weather, hearty, meadow, breath</div>
                    <div>
                        <form action="">
                            <div class="mt-2">
                                <input class="form-check-input" type="radio" name="answer" id="a" value="1">
                                <label class="form-check-label text-uppercase" for="a">
                                    A. W<u>ea</u>ther
                                </label>
                            </div>
                            <div class="mt-2">
                                <input class="form-check-input" type="radio" name="answer" id="b" value="2">
                                <label class="form-check-label text-uppercase" for="b">
                                    B. H<u>ea</u>rty
                                </label>
                            </div>
                            <div class="mt-2">
                                <input class="form-check-input" type="radio" name="answer" id="c" value="3">
                                <label class="form-check-label text-uppercase" for="c">
                                    C. M<u>ea</u>dow
                                </label>
                            </div>
                            <div class="mt-2">
                                <input class="form-check-input" type="radio" name="answer" id="d" value="4">
                                <label class="form-check-label text-uppercase" for="d">
                                    D. Br<u>ea</u>th
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-2">
                    <button id="nextBtn" class="btn btn-danger btn-rectangle rounded-0">Câu tiếp theo &#187;</button>
                </div>
                <div class="mt-2">
                    <span class="fw-bold">Lưu ý:</span>
                    <p>- Nếu qua câu sau thì sẽ không quay lại được câu trước</p>
                    <p>- Bạn cần nộp bài trước khi thời gian kết thúc, nếu không, bài làm sẽ bị hủy bỏ</p>
                    <p>- Bạn không được tải lại trang hoặc nhấn F5, nếu không tiến trình lại bài của bạn sẽ không được lưu lại</p>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        var question = 0;
        var numb_question = 0;
        var answer = 0;
        var result = [];

        $('#nextBtn').click(function() {
            numb_question = parseInt($('.number_question').text(), 10);
            answer = $('input[name="answer"]:checked').val();
            question++;
            $.ajax({
                url: '/test/save_anwser',
                type: 'post',
                data: {
                    numb_question: numb_question,
                    answer: answer
                },
                success: function() {
                    console.log('saved: ' + numb_question + ': ' + answer);
                }
            });
            $.ajax({
                url: '/test/process',
                type: 'post',
                data: {
                    question: question
                },
                dataType: 'json',
                success: function(data) {
                    // Hiển thị thông tin học sinh mới lấy được vào khối div
                    $('#questionInfo').html(
                        '<div class="h5">Câu <span class="number_question">' + data.numb + '</span>. ' + data.content + '</div>' +
                        '<div>' +
                        '    <form action="">' +
                        '        <div class="mt-2">' +
                        '            <input class="form-check-input" type="radio" name="answer" id="a" value="1">' +
                        '            <label class="form-check-label text-uppercase" for="a">' +
                        '               A. ' + data.answer_1 +
                        '            </label>' +
                        '        </div>' +
                        '        <div class="mt-2">' +
                        '            <input class="form-check-input" type="radio" name="answer" id="b" value="2">' +
                        '            <label class="form-check-label text-uppercase" for="b">' +
                        '                B. ' + data.answer_2 +
                        '            </label>' +
                        '        </div>' +
                        '        <div class="mt-2">' +
                        '            <input class="form-check-input" type="radio" name="answer" id="c" value="3">' +
                        '            <label class="form-check-label text-uppercase" for="c">' +
                        '                C. ' + data.answer_3 +
                        '            </label>' +
                        '        </div>' +
                        '        <div class="mt-2">' +
                        '            <input class="form-check-input" type="radio" name="answer" id="d" value="4">' +
                        '            <label class="form-check-label text-uppercase" for="d">' +
                        '                 D. ' + data.answer_4 +
                        '           </label>' +
                        '       </div>' +
                        '   </form>' +
                        '</div>'
                    );
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        });
    });
</script>