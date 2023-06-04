<section class="test">
    <div class="container pb-4 pt-4">
        <div class="h2">Thêm đề thi</div>
        <div class="row">
            <div class="col-md-8">
                <form action="" method="post">
                    <label for="category" class="fw-bold">Loại đề thi: </label> Lớp <?php echo $grade; ?>
                    <div class="mt-2 h5">
                        <label for="title">Tiêu đề:</label>
                    </div>
                    <div class="mt-2">
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mt-2">
                        <div class="text-danger"><?php echo (isset($errors['title'])) ? $errors['title'] : false; ?></div>
                    </div>
                    <div class="mt-2 h5">
                        <label for="title">Số câu:</label>
                    </div>
                    <div class="mt-2">
                        <input type="number" name="size" class="form-control">
                    </div>
                    <div class="mt-2">
                        <div class="text-danger"><?php echo (isset($errors['size'])) ? $errors['size'] : false; ?></div>
                    </div>
                    <div class="mt-2 h5">
                        <label for="title">Thời gian làm bài (nhập số phút):</label>
                    </div>
                    <div class="mt-2">
                        <input type="number" name="time" class="form-control">
                    </div>
                    <div class="mt-2">
                        <div class="text-danger"><?php echo (isset($errors['time'])) ? $errors['time'] : false; ?></div>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary" name="create_submit">Bắt đầu thêm câu hỏi</button>
                        <a class="btn btn-outline-primary" href="">Quay lại</a>
                    </div>
                    <div class="mt-2">
                        <div class="text-danger"><?php echo (isset($msg)) ? $msg : false; ?></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>