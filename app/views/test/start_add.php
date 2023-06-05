<section class="test">
    <div class="container pb-4 pt-4">
        <div class="h1">Thêm câu hỏi</div>

        <form action="/test/process_add_question" method="post">
            <label for="category" class="fw-bold">Loại đề thi: </label> Lớp 10<br />
            <label for="category" class="fw-bold">Số câu hỏi: </label> <?php echo $test['size']; ?>
            <div class="row">
                <?php
                for ($i = 1; $i <= $test['size']; $i++) {
                ?>
                    <div class="col-md-4 mt-2 p-2 rounded">
                        <div class="border border-primary p-3">
                            <div class="mt-2 h5">
                                <label for="title">Nội dung câu hỏi <?php echo $i; ?>:</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="content_<?php echo $i; ?>" class="form-control">
                            </div>
                            <div class="mt-2 h5">
                                <label for="title">Đáp án 1:</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="answer_1_<?php echo $i; ?>" class="form-control">
                            </div>
                            <div class="mt-2 h5">
                                <label for="title">Đáp án 2:</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="answer_2_<?php echo $i; ?>" class="form-control">
                            </div>
                            <div class="mt-2 h5">
                                <label for="title">Đáp án 3:</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="answer_3_<?php echo $i; ?>" class="form-control">
                            </div>
                            <div class="mt-2 h5">
                                <label for="title">Đáp án 4:</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="answer_4_<?php echo $i; ?>" class="form-control">
                            </div>
                            <div class="mt-2 h5">
                                <label for="title">Đáp án chính xác:</label>
                            </div>
                            <div class="mt-2">
                                <select name="correct_<?php echo $i; ?>" class="form-control">
                                    <option value="1">Đáp án 1</option>
                                    <option value="2">Đáp án 2</option>
                                    <option value="3">Đáp án 3</option>
                                    <option value="4">Đáp án 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="mt-2">
                    <button class="btn btn-primary" name="add_submit">Thêm</button>
                    <a class="btn btn-outline-primary" href="">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
</section>