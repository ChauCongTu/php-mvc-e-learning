<section class="forum mt-3 mb-3">
    <div class="container">
        <p class="link-to fw-bold">Trang chủ <i class="fa-solid fa-angle-right"></i> Diễn đàn <i class="fa-solid fa-angle-right"></i> <?php echo $post['title']; ?></p>
        <div class="row">
            <div class="col-sm-8">
                <div class="content post shadow mt-3 p-3">
                    <div class="post-content">
                        <div class="post__author">
                            <div class="__img"><img src="/public/Image/user/<?php echo $post['user']['avatar']; ?>" alt="" class="rounded-circle"></div>
                            <div>
                                <div class="__name"><a href="" class="fw-bold"><?php echo $post['user']['name']; ?></a></div>
                                <div class="post__date"><i class="fa-solid fa-calendar-days"></i> <?php echo $post['created_at']; ?> &#8226; Cập nhật mới nhất <?php echo Helpers::displayTime($post['updated_at']); ?></div>
                            </div>
                        </div>
                        <hr />
                        <div class="post__name"><?php echo $post['title']; ?></div>
                        <div class="post__content">
                            <?php echo $post['content']; ?>
                        </div>
                        <div class="post__social">
                            <a href="#" class="btn btn-primary btn-sm"><i class="fab fa-facebook-f"></i> Share on Facebook</a>
                            <a href="#" class="btn btn-info btn-sm"><i class="fab fa-twitter"></i> Share on Twitter</a>
                            <a href="#" class="btn btn-secondary btn-sm"><i class="fab fa-linkedin"></i> Share on LinkedIn</a>
                        </div>
                        <?php
                        if (Session::data('User') != null) {
                            if ($post['user_id'] == Session::data('User')['user_id']) {
                                echo '<small><a href="/dien-dan/chinh-sua-bai-viet_' . $post['post_id'] . '.html" class="fw-bold">[ <i class="fa-solid fa-pen"></i> Sửa ]</a></small>';
                            }
                            if ($post['user_id'] == Session::data('User')['user_id'] || Session::data('User')['role'] > 1) {
                                echo '<small><a data-bs-toggle="modal" data-bs-target="#delete_cfm" style="cursor:pointer" class="fw-bold">[ <i class="fa-solid fa-trash"></i> Xóa ]</a></small>';
                            }
                        }
                        ?>
                        <div class="post__interact">
                            <a href=""><i class="fa-solid fa-heart"></i>/<i class="fa-regular fa-heart"></i></a> 120
                            <a href="#comment"><i class="fa-solid fa-message"></i></a> <?php echo count($post['comment']) ?>
                        </div>
                    </div>
                    <?php
                    if (Session::data('User') != null) {
                    ?>
                        <div class="comment-side mt-5" id="comment">
                            <form action="/dien-dan/binh-luan/<?php echo $post['post_id']; ?>" method="post">
                                <textarea name="content" rows="5" placeholder="Nội dung bình luận" class="input-comment"></textarea>
                                <div class="text-danger"><?php echo (isset($errors['content']))?$errors['content']:false; ?></div>
                                <button name="cmt_submit" class="btn btn-danger">Bình luận</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <!-- Mỗi bình luận -->
                <?php
                foreach ($post['comment'] as $value) {
                    echo '<div class="modal fade" id="edit_cmt_'.$value['comment_id'].'">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                        <form action="/dien-dan/chinh-sua-binh-luan/'.$value['comment_id'].'" method="post">
                                            <div class="comment-side p-3">
                                                <label for="content" class="h5">Nội dung:</label>
                                                <textarea name="content" rows="5" placeholder="Nội dung bình luận" class="input-comment">'.$value['content'].'</textarea>
                                            </div>
                                            <div class="text-end">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button name="edit_cmt_submit" class="btn btn-danger" style="width:100%" rows="5">Chỉnh sửa</button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a style="cursor:pointer" data-bs-dismiss="modal" class="btn btn-outline-danger d-block">Hủy</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        echo '<div class="modal fade" id="delete_cmt_'.$value['comment_id'].'">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="p-3">
                                                Bạn có chắc muốn xóa bình luận này? '.$value['comment_id'].'
                                            </div>
                                            <div class="text-end">
                                                <a href="/dien-dan/xoa-binh-luan/'.$value['comment_id'].'">Xóa</a> |
                                                <a style="cursor:pointer" data-bs-dismiss="modal">Hủy</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    echo '<div class="content comment shadow mt-3 p-3">
                            <div class="comment">
                                <div class="comment-img">
                                    <img src="/public/Image/user/' . $value['user_id'] . '.png" class="rounded-circle" alt="">
                                </div>
                                <div class="comment-content">
                                    <div class="comment__name">
                                        <a href=""> ' . $value['user_name'] . '</a>';
                                        if (Session::data('User') != null) {
                                            if ($value['user_id'] == Session::data('User')['user_id']) {
                                                echo '<small><a data-bs-toggle="modal" data-bs-target="#edit_cmt_'.$value['comment_id'].'" style="cursor:pointer" class="fw-bold"> [ <i class="fa-solid fa-pen"></i> Sửa ]</a></small>';
                                            }
                                            if ($value['user_id'] == Session::data('User')['user_id'] || Session::data('User')['role'] > 1) {
                                                echo '<small><a data-bs-toggle="modal" data-bs-target="#delete_cmt_'.$value['comment_id'].'" style="cursor:pointer" class="fw-bold"> [ <i class="fa-solid fa-trash"></i> Xóa ]</a></small>';
                                            }
                                        }
                                    echo '</div>
                                    <div class="comment__content">
                                        ' . $value['content'] . '
                                    </div>
                                    <div class="comment__date">';
                                    if ($value['created_at'] != $value['updated_at']){
                                        echo 'Chỉnh sửa gần nhất '. Helpers::displayTime($value['updated_at']) . ' &#8226; ';
                                    }
                                    echo Helpers::displayTime($value['created_at']) . '
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                ?>

            </div>
            <div class="col-sm-4">
                <div class="shadow mt-3 p-3">
                    <div class="h4 border-bottom pb-1">Cùng chuyên mục</div>
                    <article class="forum-list" id="list-scroll">
                        <?php 
                        foreach ($post_same_category as $values) {
                            echo '<div class="forum-item">
                                    <div>
                                        <a href="/dien-dan/'.Helpers::to_slug($values['title']).'_'.$values['post_id'].'.html" class="fw-bold"> '.$values['title'].'</a>
                                        <br />
                                        <div class="information">
                                            <a href="" class="information-user"><i class="fa-solid fa-pen"></i> '.$values['user']['name'].'</a> &#8226; Cập nhật '.Helpers::displayTime($values['updated_at']).'
                                        </div>
                                    </div>
                                </div>';
                        }
                        ?>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Delete modal -->
<div class="modal fade" id="delete_cfm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="p-3">
                    Bạn có chắc muốn xóa bài viết này?
                </div>
                <div class="text-end">
                    <a href="/forum/delete/<?php echo $post['post_id']; ?>">Xóa</a> |
                    <a style="cursor:pointer" data-bs-dismiss="modal">Hủy</a>
                </div>
            </div>
        </div>
    </div>
</div>