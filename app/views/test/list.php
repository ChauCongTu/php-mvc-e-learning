<div class="photo">
    <div class="text">Thi tiếng Anh trực tuyến</div>
    <div class="photo-blur"></div>
</div>
<section class="test">
    <div class="container pt-3 pb-3">
        <div class="h1"><a href="">Đề thi lớp <?php echo $grade; ?></a></div>
        <a href="/thi-truc-tuyen/them/<?php echo $grade; ?>.html" class="btn btn-danger btn-rectangle rounded-0 mb-2"><i class="fa-solid fa-plus"></i> Thêm đề thi</a>
        <div class="row">
            <?php
            foreach ($test as $value) {
                echo '<div class="col-md-4 test-item">
                        <div class="p-3 pb-0 mt-2 border border-danger">
                            <div class="title h5"><a href="/thi-truc-tuyen/'.Helpers::to_slug($value['title']).'_'.$value['exam_id'].'.html"> ' . $value['title'] . '</a></div>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><i class="fa-solid fa-check"></i> Số câu: ' . $value['size'] . '</td>
                                        <td><i class="fa-solid fa-clock"></i> Thời gian: ' . $value['time'] . ' phút</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>

    </div>
</section>