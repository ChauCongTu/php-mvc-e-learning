<section class="forum mt-3 mb-3">
    <div class="container">
        <p class="link-to fw-bold">Trang chủ <i class="fa-solid fa-angle-right"></i> Diễn đàn <i class="fa-solid fa-angle-right"></i> <?php echo $posts['category_name']; ?></p>
        <div class="row">
            <div class="col-sm-9">
                <div class="content shadow p-3 mt-2">

                    <div class="subtitle h3 mt-2 mb-3"><?php echo $posts['category_name']; ?></div>
                    <?php
                    if (Session::data('User') != null) {
                        echo '<p><a href="/dien-dan/them-bai-viet_'.$posts['category_id'].'.html" class="btn btn-danger mb-3 btn-sm"><i class="fa-solid fa-plus"></i> Thêm bài viết</a></p>';
                    }
                    ?>
                    <?php 
                    foreach ($pagedData as $values) {
                        echo' <div class="subcontent">
                        <article class="forum-list mt-2">
                            <div class="forum-item">
                                <div class="forum-item-img">
                                    <img class="rounded-circle shadow-4-strong" alt="avatar2" src="/public/image/user/'.$values['user']['avatar'].'" />
                                </div>
                                <div class="forum-item-content">
                                    <a href="/dien-dan/'.Helpers::to_slug($values['title']).'_'.$values['post_id'].'.html" class="title"> '.$values['title'].'</a>
                                    <span class="float-end fw-bold"><i class="fa-solid fa-message"></i> '.count($values['comment']).'</span>
                                    <br />
                                    <div class="information">
                                        <a href="/nguoi-dung/'.Helpers::to_slug($values['user']['name']).'_'.$values['user']['user_id'].'.html" class="information-user"><i class="fa-solid fa-pen"></i> '.$values['user']['name'].'</a> &#8226; Cập nhật '.Helpers::displayTime($values['updated_at']).'
                                        <span class="information-view"><i class="fa-solid fa-eye"></i> '.$values['view'].'</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                        '.Helpers::pagination($pagination['total_rows'], $pagination['recordsPerPage'], $pagination['currentPage']).'
                    </div>';
                    }
                    ?>                    
                </div>
                
            </div>
            <div class="col-sm-3">
                <div class="shadow mt-2 p-3">
                    <div class="h4 border-bottom pb-1">Thống kê diễn đàn</div>
                    <table>
                        <tr>
                            <td>Chủ đề:</td>
                            <td><?php echo $stats['post']; ?></td>
                        </tr>
                        <tr>
                            <td>Thảo luận: </td>
                            <td><?php echo $stats['comment']; ?></td>
                        </tr>
                        <tr>
                            <td>Lượt thích: </td>
                            <td><?php echo $stats['like']; ?></td>
                        </tr>
                        <tr>
                            <td>Thành viên: </td>
                            <td><?php echo $stats['user']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>