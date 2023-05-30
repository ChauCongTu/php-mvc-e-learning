<section class="container forum pt-4 pb-4">
    <div class="h2 mt-2 border-bottom pb-2">Chỉnh sửa bài viết</div>
    <?php 
    if (Session::data('User') != null) { 
        if ($post['user_id'] == Session::data('User')['user_id'] || Session::data('User')['role'] >= 2) {
    ?>
    <div class="row">
        <div class="col-md-8">
            <form action="" method="post">
                <div class="mt-2 h5">
                    <label for="title">Tiêu đề:</label>
                </div>
                <div class="mt-2">
                    <input type="text" name="title" class="form-control" value="<?php echo $post['title'];?>">
                </div>
                <div class="mt-2">
                    <div class="text-danger"><?php echo (isset($errors['title']))?$errors['title']:false; ?></div>
                </div>
                <div class="mt-2 h5">
                    <label for="content">Nội dung:</label>
                </div>
                <div class="mt-2">
                    <textarea type="text" name="content" id="content" class="form-control"><?php echo $post['content'];?></textarea>
                    <script>
                        CKEDITOR.replace( 'content' );
                    </script>
                </div>
                <div class="mt-2">
                    <div class="text-danger"><?php echo (isset($errors['content']))?$errors['content']:false; ?></div>
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary" name="edit_submit">Chỉnh sửa</button>
                    <a class="btn btn-outline-primary" href="../">Quay lại</a>
                </div>
                <div class="mt-2">
                    <div class="text-danger"><?php echo (isset($msg))?$msg:false; ?></div>
                </div>
            </form>
        </div>
    </div>
    <?php } else { ?>
        <div class="alert alert-danger">Bạn không thể chỉnh sửa bài viết này</div>
    <?php } }?>
</section>