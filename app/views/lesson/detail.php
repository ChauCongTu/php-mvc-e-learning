<div class="photo">
    <div class="text">10th Grade Lesson</div>
    <div class="photo-blur"></div>
</div>
<section class="container lesson">
    <div class="row">
        <div class="col-md-8 bg-white">
            <div class="title">Unit 1: Family Life</div>
            <div class="main">
                <div class="sub_title">Từ vựng</div>
                <div class="sub_content">
                    <?php
                    foreach ($lesson['vocabulary'] as $value) {
                        echo ' <p><a href="">' . $value['word'] . '</a> ' . $spelling . ' ' . $meaning . '</p>';
                    }
                    ?>
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
                                '.$value['example'].'
                            </div>
                        </div>';
                }
                ?>
                <hr />
            </div>
            <div class="main">
                <div class="sub_title text-center p-3">Bài tập áp dụng</div>
                <div class="sub_content">
                    <?php echo (isset($content))?$content:false; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 bg-white">
            <div class="title">Cùng khối lớp</div>
            <article class="content">
                <?php 
                foreach ($other_lesson as $value){
                    echo '<div class="other-lesson">
                            <div class="other-lesson-img">
                                <img src="/public/Image/lesson/'.$value['thumb'].'" alt="">
                            </div>
                            <div class="other-lesson-content">
                                <a href="">'.$value['title'].'</a><br />
                                <span>Ngày cập nhật: '.$value['updated_at'].'</span>
                            </div>
                        </div>';
                }
                ?>
            </article>
        </div>
    </div>
</section>