<div class="photo">
    <div class="text">Thi tiếng Anh trực tuyến</div>
    <div class="photo-blur"></div>
</div>
<section class="test">
    <div class="container pt-3 pb-3">
        <div class="h1"><a href="/thi-truc-tuyen/bo-de-10.html">Đề thi lớp 10</a></div>
        <div class="row">
            <?php 
            foreach($grade_10 as $value) {
                echo '<div class="col-md-4 test-item">
                        <div class="p-3 pb-0 mt-2 border border-danger">
                            <div class="title h5"><a href="/thi-truc-tuyen/'.Helpers::to_slug($value['title']).'_'.$value['exam_id'].'.html"> '.$value['title'].'</a></div>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><i class="fa-solid fa-check"></i> Số câu: '.$value['size'].'</td>
                                        <td><i class="fa-solid fa-clock"></i> Thời gian: '.$value['time'].' phút</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
        <hr>
        <div class="h1 mt-2"><a href="/thi-truc-tuyen/bo-de-11.html">Đề thi lớp 11</a></div>
        <div class="row">
            <?php 
            foreach($grade_11 as $value) {
                echo '<div class="col-md-4 test-item">
                        <div class="p-3 pb-0 mt-2 border border-danger">
                            <div class="title h5"><a href=""> '.$value['title'].'</a></div>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><i class="fa-solid fa-check"></i> Số câu: '.$value['size'].'</td>
                                        <td><i class="fa-solid fa-clock"></i> Thời gian: '.$value['time'].' phút</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
        <hr>
        <div class="h1 mt-2"><a href="/thi-truc-tuyen/bo-de-12.html">Đề thi lớp 12</a></div>
        <div class="row">
            <?php 
            foreach($grade_12 as $value) {
                echo '<div class="col-md-4 test-item">
                        <div class="p-3 pb-0 mt-2 border border-danger">
                            <div class="title h5"><a href=""> '.$value['title'].'</a></div>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><i class="fa-solid fa-check"></i> Số câu: '.$value['size'].'</td>
                                        <td><i class="fa-solid fa-clock"></i> Thời gian: '.$value['time'].' phút</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
        <hr>
        <div class="h1 mt-2"><a href="/thi-truc-tuyen/bo-de-13.html">Đề thi Trung Học Phổ Thông</a></div>
        <div class="row">
            <?php 
            foreach($grade_12 as $value) {
                echo '<div class="col-md-4 test-item">
                        <div class="p-3 pb-0 mt-2 border border-danger">
                            <div class="title h5"><a href=""> '.$value['title'].'</a></div>
                            <div class="content">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><i class="fa-solid fa-check"></i> Số câu: '.$value['size'].'</td>
                                        <td><i class="fa-solid fa-clock"></i> Thời gian: '.$value['time'].' phút</td>
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