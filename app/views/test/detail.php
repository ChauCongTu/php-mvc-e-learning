<div class="photo">
    <div class="text">Thi tiếng Anh trực tuyến</div>
    <div class="photo-blur"></div>
</div>
<?php if (Session::data('User') == null) {
    echo '<div class="container shadow-lg mt-3 pt-5 pb-3 text-center">
            <h2 class="text-danger">Vui lòng đăng nhập để sử dụng chức năng này</h2>
        </div>';
} else { ?>

    <section class="test">
        <div class="container shadow-lg mt-3 pt-5 pb-3 text-center">
            <div class="h3"><?php echo $test['title']; ?></div>
            <div><span class="fw-bold">Loại đề thi: </span>Lớp <?php echo $test['grade']; ?></div>
            <div><span class="fw-bold">Số câu: </span><?php echo $test['size']; ?></div>
            <div><span class="fw-bold">Thời gian làm bài: </span><?php echo $test['time']; ?> phút</div>
            <div class="mt-2">
                <form action="" method="post">
                    <button name="start" class="btn btn-danger btn-rectangle rounded-0">Bắt đầu thi</a>
                </form>
            </div>
        </div>
        <div class="container mt-3 pt-5 pb-3">
            <div class="h3">Top 10 bài thi có điểm số cao nhất</div>
            <div class="p-2">
                <div class="rank-item">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-danger text-white fw-bold text-center">
                                <td>#</td>
                                <td>Họ tên</td>
                                <td>Điểm số</td>
                                <td>Ngày thi</td>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $stt = 1;
                            foreach ($ranking as $value) {
                                echo '
                                <tr>
                                    <td>'.$stt ++.'</td>
                                    <td><a href="">'.$value['user_name'].'</a></td>
                                    <td>'.$value['score'].'</td>
                                    <td>'.$value['created_at'].'</td>
                                </tr>
                                ';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<?php } ?>