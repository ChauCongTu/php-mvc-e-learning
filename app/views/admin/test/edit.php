<section class="test">
    <div class="container pb-4 pt-4">
        <div class="h3 bg-light border-top border-bottom p-3">Chỉnh sửa câu hỏi</div>
        <form action="" method="post">
            <p class="h4"><?php echo $exam['title']; ?></p>
            <div class="d-flex align-items-center">
                <label for="category" class="fw-bold">Thời gian: </label>
                <input type="text" name="time" value="<?php echo $exam['time']; ?>" class="form-control w-25 ms-3 me-3">
                <p>phút</p>
            </div>
            <div class="row">
                <?php
                for ($i = 0; $i < $exam['size']; $i++) {
                ?>
                    <div class="col-md-4 mt-2 p-2 rounded">
                        <div class="border border-primary p-3">
                            <div class="mt-2 h5">
                                <label for="title">Nội dung câu hỏi <?php echo $i+1; ?>:</label>
                                <input type="hidden" name="question_id_<?php echo $i; ?>" value="<?php echo $exam['question'][$i]['question_id']; ?>" class="form-control">
                            </div>
                            <div class="mt-2">
                                <input type="text" name="content_<?php echo $i; ?>" value="<?php echo $exam['question'][$i]['content']; ?>" class="form-control">
                            </div>
                            <div class="mt-2 h5">
                                <label for="title">Đáp án 1:</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="answer_1_<?php echo $i; ?>" value="<?php echo $exam['question'][$i]['answer_1']; ?>" class="form-control">
                            </div>
                            <div class="mt-2 h5">
                                <label for="title">Đáp án 2:</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="answer_2_<?php echo $i; ?>" value="<?php echo $exam['question'][$i]['answer_2']; ?>" class="form-control">
                            </div>
                            <div class="mt-2 h5">
                                <label for="title">Đáp án 3:</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="answer_3_<?php echo $i; ?>" value="<?php echo $exam['question'][$i]['answer_3']; ?>" class="form-control">
                            </div>
                            <div class="mt-2 h5">
                                <label for="title">Đáp án 4:</label>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="answer_4_<?php echo $i; ?>" value="<?php echo $exam['question'][$i]['answer_4']; ?>" class="form-control">
                            </div>
                            <div class="mt-2 h5">
                                <label for="title">Đáp án chính xác:</label>
                            </div>
                            <div class="mt-2">
                                <select name="correct_<?php echo $i; ?>" class="form-control">
                                    <option value="1" <?php echo ($exam['question'][$i]['correct_answer'] == 1) ? 'selected' : false; ?>>Đáp án 1</option>
                                    <option value="2" <?php echo ($exam['question'][$i]['correct_answer'] == 2) ? 'selected' : false; ?>>Đáp án 2</option>
                                    <option value="3" <?php echo ($exam['question'][$i]['correct_answer'] == 3) ? 'selected' : false; ?>>Đáp án 3</option>
                                    <option value="4" <?php echo ($exam['question'][$i]['correct_answer'] == 4) ? 'selected' : false; ?>>Đáp án 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="mt-2">
                    <button class="btn btn-primary" name="submit">Cập nhật</button>
                    <a class="btn btn-outline-primary" href="/bang-dieu-khien/quan-ly-de-thi.html">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
</section>