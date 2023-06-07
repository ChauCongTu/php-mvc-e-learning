<section class="forum mt-3 mb-3">
    <div class="container">
        <p class="link-to fw-bold">Trang chủ <i class="fa-solid fa-angle-right"></i> Diễn đàn</p>
        <div class="title h2">Danh mục diễn đàn</div>
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($categories as $value) {
                    echo '<div class="content shadow p-3 mb-3">
                            <div class="subtitle h4 mt-3  mb-3"><a href="/dien-dan/'.Helpers::to_slug($value['category_name']).'_'.$value['category_id'].'">'.$value['category_name'].'</a></div>';
                                echo' <div class="subcontent">
                                <article class="forum-list mt-2" id="list-scroll">';
                                foreach ($value['post'] as $values) {
                                    echo'<div class="forum-item">
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
                                    </div>';
                                }
                                echo '</article>
                            </div>
                        </div>';
                }
                ?>
            </div>
            <div class="col-sm-3">
                <div class="shadow p-3">
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