<section class="forum mt-3 mb-3">
    <div class="pt-2 pb-2">
        <div class="container link-to fw-bold" style="cursor: pointer;">Trang chủ <i class="fa-solid fa-angle-right"></i> Danh mục diễn đàn</div>
    </div>
    <div class="container">
        <div class="bg-light h4 p-3 border-top border-bottom mt-3"><?php echo $posts['category_name']; ?></div>
        <?php
        if (Session::data('User') != null) {
            echo '<p><a href="/dien-dan/them-bai-viet_' . $posts['category_id'] . '.html" class="btn btn-danger mb-2"><i class="fa-solid fa-plus"></i> Thêm bài viết</a></p>';
        }
        ?>
        <ul class="list-group list-group-light mb-3">
            <?php foreach ($pagedData as $values) {
                echo '<li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="/public/image/user/' . $values['user']['avatar'] . '" alt="" style="width: 50px; height: 50px" class="rounded-circle" />
                                <div class="ms-3">
                                    <h5 class="fw-bold"><a href="/dien-dan/' . Helpers::to_slug($values['title']) . '_' . $values['post_id'] . '.html"> ' . $values['title'] . '</a></h5>
                                    <p class="text-muted mb-2"><i class="fa-solid fa-clock me-2"></i>' . Helpers::displayTime($values['updated_at']) . '<i class="fa-solid fa-user ms-3"></i><span class="ms-2"><a class="text-muted" href="/nguoi-dung/' . Helpers::to_slug($values['user']['name']) . '_' . $values['user']['user_id'] . '.html">' . $values['user']['name'] . '</a></span></p>
                                    <div class="text-muted mb-0 text-cut">
                                        Some placeholder content in a paragraph relating to "Our company starts its operations". And
                                        some
                                        more content, used here just to pad out and fill this tab panel. In production, you would
                                        obviously
                                        have more real content here. And not just text. It could be anything, really. Text, images,
                                        forms.
                                    </div>
                                </div>
                            </div>
                        </li>';
            }
            echo '</ul>';
            Helpers::pagination($pagination['total_rows'], $pagination['recordsPerPage'], $pagination['currentPage']);
            ?>
        </ul>
    </div>
</section>