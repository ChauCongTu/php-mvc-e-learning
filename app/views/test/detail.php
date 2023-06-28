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
        <div class="container border bg-light mt-3 pt-5 pb-3 text-center">
            <div class="h3"><?php echo $test['title']; ?></div>
            <div class="d-flex justify-content-center p-3">
                <div class="me-3"><span class="fw-bold"><i class="fa-solid fa-list me-2"></i>Loại đề thi: </span>Lớp <?php echo $test['grade']; ?></div>
                <div class="me-3"><span class="fw-bold"><i class="fa-solid fa-check me-2"></i>Số câu: </span><?php echo $test['size']; ?></div>
                <div class="me-3"><span class="fw-bold"><i class="fa-solid fa-clock me-2"></i>Thời gian làm bài: </span><?php echo $test['time']; ?> phút</div>
            </div>
            <div class="mt-2">
                <form action="" method="post">
                    <button name="start" class="btn btn-danger">Bắt đầu thi<i class="fa-solid fa-play ms-2"></i></a>
                </form>
            </div>
        </div>
        <div class="container mt-3 pt-5 pb-3">
            <div class="gradient-custom-1 h-100">
                <div class="mask d-flex align-items-center h-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="table-responsive bg-white">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col"># THỨ HẠNG</th>
                                                <th scope="col">HỌ TÊN</th>
                                                <th scope="col">ĐIỂM SỐ</th>
                                                <th scope="col">NGÀY THI</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $rank = 1;
                                            foreach ($ranking as $value) {
                                                $date = date_create($value['created_at']);
                                                if ($rank == 1) {
                                                    echo '<tr class="fw-bold text-danger">
                                                            <td>#' . $rank++ . 'st</td>
                                                            <td><a class="text-danger" href="/nguoi-dung/' . Helpers::to_slug($value['user_name']) . '_' . $value['user_id'] . '.html">' . $value['user_name'] . '</a></td>
                                                            <td>' . $value['score'] . '</td>
                                                            <td>' . date_format($date, "d/m/Y H:i") . '</td>
                                                        </tr>';
                                                } else if ($rank == 2) {
                                                    echo '<tr class="fw-bold text-warning">
                                                            <td>#' . $rank++ . 'nd</td>
                                                            <td><a class="text-warning" href="/nguoi-dung/' . Helpers::to_slug($value['user_name']) . '_' . $value['user_id'] . '.html">' . $value['user_name'] . '</a></td>
                                                            <td>' . $value['score'] . '</td>
                                                            <td>' . date_format($date, "d/m/Y H:i") . '</td>
                                                        </tr>';
                                                } else if ($rank == 3) {
                                                    echo '<tr  class="fw-bold text-success">
                                                            <td>#' . $rank++ . 'th</td>
                                                            <td><a class="text-success" href="/nguoi-dung/' . Helpers::to_slug($value['user_name']) . '_' . $value['user_id'] . '.html">' . $value['user_name'] . '</a></td>
                                                            <td>' . $value['score'] . '</td>
                                                            <td>' . date_format($date, "d/m/Y H:i") . '</td>
                                                        </tr>';
                                                } else {
                                                    echo '<tr>
                                                            <td>#' . $rank++ . '</td>
                                                            <td><a href="/nguoi-dung/' . Helpers::to_slug($value['user_name']) . '_' . $value['user_id'] . '.html">' . $value['user_name'] . '</a></td>
                                                            <td>' . $value['score'] . '</td>
                                                            <td>' . date_format($date, "d/m/Y H:i") . '</td>
                                                        </tr>';
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>