<div class="photo">
    <div class="text">10th Grade Lesson</div>
    <div class="photo-blur"></div>
</div>
<section class="container lesson">
    <div class="row">
        <div class="col-md-8 bg-white">
            <div class="title"><?php echo $lesson['title']; ?></div>
            <div class="main">
                <div class="sub_title">Từ vựng</div>
                <div class="sub_content">
                    <table class="table table-bordered">
                        <thead class="fw-bold text-center">
                            <td></td>
                            <td>Từ vựng</td>
                            <td>Phiên âm</td>
                            <td>Nghĩa</td>
                        </thead>
                        <?php
                        $index = 1;
                        foreach ($lesson['vocabulary'] as $value) {
                            echo '<tr class="text-center">
                                    <td>'.$index++.'</td>
                                    <td>'.$value['word'].'</td>
                                    <td>'.$value['spelling'].'</td>
                                    <td>'.$value['meaning'].'</td>
                                </tr>';
                        }
                        ?>
                    </table>

                </div>
                <hr />
                <div class="sub_title">Ngữ pháp</div>
                <?php
                foreach ($lesson['grammar'] as $value) {
                    echo '<div class="sub_content mb-2 border p-3">
                            <h5><strong><a href="">' . $value['title'] . '</a> </strong></h5>
                            <div><strong> Khái niệm:</strong> ' . $value['define'] . '</div>  
                            <div><strong> Cấu trúc:</strong>' . $value['content'] . '</div>
                            <div>
                                <strong>Ví dụ:</strong>
                                ' . $value['example'] . '
                            </div>
                        </div>';
                }
                ?>
                <hr />
            </div>
            <?php 
            if (!empty($lesson['content'])) {
                echo '<div class="main">
                        <div class="sub_title text-center p-3">Bài tập áp dụng</div>
                        <div class="sub_content">
                            '. $lesson['content'] .'
                        </div>
                    </div>';
            }
            ?>
        </div>
        <div class="col-md-4 bg-white">
            <div class="title">Cùng khối lớp</div>
            <article class="content">
                <?php
                foreach ($other_lesson as $value) {
                    echo '<div class="other-lesson">
                            <div class="other-lesson-img">
                                <img src="/public/Image/lesson/' . $value['thumb'] . '" alt="">
                            </div>
                            <div class="other-lesson-content">
                                <a href="/bai-hoc/' . Helpers::to_slug($value['title']) . '_' . $value['lesson_id'] . '.html">' . $value['title'] . '</a><br />
                                <span>Cập nhật: ' . Helpers::displayTime($value['updated_at']) . '</span>
                            </div>
                        </div>';
                }
                ?>
            </article>
        </div>
    </div>
</section>