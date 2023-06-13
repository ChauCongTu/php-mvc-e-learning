<div class="photo">
    <div class="text">Danh sách bài học</div>
    <div class="photo-blur"></div>
</div>
<section class="container lesson  bg-white">
    <div class="main">
        <div class="title">Bài học lớp 10 - Chương trình mới</div>
        <div class="content slick-pane">
            <?php
            foreach ($grade10lesson as $value) {
                echo '<div class="lesson-item">
                        <img src="/public/Image/lesson/' . $value['thumb'] . '" alt="">
                        <a class="p-3" href="/bai-hoc/'.Helpers::to_slug($value['title']).'_'.$value['lesson_id'].'.html">' . $value['title'] . '</a>
                    </div>';
            }
            ?>
        </div>
    </div>

    </div>
    <div class="main">
        <div class="title">Bài học lớp 11 - Chương trình mới</div>
        <div class="content slick-pane">
            <?php
            foreach ($grade11lesson as $value) {
                echo '<div class="lesson-item">
                        <img src="/public/Image/lesson/' . $value['thumb'] . '" alt="">
                        <a href="/bai-hoc/'.Helpers::to_slug($value['title']).'_'.$value['lesson_id'].'.html">' . $value['title'] . '</a>
                    </div>';
            }
            ?>
        </div>
    </div>
    <div class="main">
        <div class="title">Bài học lớp 12 - Chương trình mới</div>
        <div class="content slick-pane">
            <?php
            foreach ($grade12lesson as $value) {
                echo '<div class="lesson-item">
                        <img src="/public/Image/lesson/' . $value['thumb'] . '" alt="">
                        <a href="/bai-hoc/'.Helpers::to_slug($value['title']).'_'.$value['lesson_id'].'.html">' . $value['title'] . '</a>
                    </div>';
            }
            ?>
        </div>
    </div>
</section>

<section class="container lesson">
    <div class="row">
        <div class="col-md-7  bg-white">
            <div class="title">Đề xuất cho bạn</div>
            <div class="content">
                <p><a href=""><i class="fa-solid fa-file-pen"></i> Đề thi lớp 10 - ND01</a><br /> >> Số người đã thi: 122 | Điểm số cao nhất: 9.75</p>
                <p><a href=""><i class="fa-solid fa-file-pen"></i> Đề thi lớp 10 - ND02</a><br /> >> Số người đã thi: 122 | Điểm số cao nhất: 9.75</p>
                <p><a href=""><i class="fa-solid fa-file-pen"></i> Đề thi lớp 10 - ND01</a><br /> >> Số người đã thi: 122 | Điểm số cao nhất: 9.75</p>
                <p><a href=""><i class="fa-solid fa-file-pen"></i> Đề thi lớp 10 - ND01</a><br /> >> Số người đã thi: 122 | Điểm số cao nhất: 9.75</p>
                <p><a href=""><i class="fa-solid fa-file-pen"></i> Đề thi lớp 10 - ND01</a><br /> >> Số người đã thi: 122 | Điểm số cao nhất: 9.75</p>
                <p><a href=""><i class="fa-solid fa-file-pen"></i> Đề thi lớp 10 - ND01</a><br /> >> Số người đã thi: 122 | Điểm số cao nhất: 9.75</p>
            </div>
        </div>
        <div class="col-md-5 mt-4">
            <a href="https://www.facebook.com/Tienganhgiaotieplangmaster/posts/2191227677635416/">
                <img src="/public/Image/banner/58761519_2191225317635652_2107690685808246784_n.jpg" width="100%" alt="">
            </a>
            <a href="">
                <img src="/public/Image/banner/bo-anh-hoc-mien-mien-phi-0-dong-adweb-1652950316.jpg" class="mt-2" width="100%" alt="">
            </a>
        </div>
    </div>

</section>