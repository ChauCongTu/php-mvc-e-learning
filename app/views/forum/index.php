<section class="forum mt-3 mb-3">
    <div class="pt-2 pb-2">
        <div class="container link-to fw-bold" style="cursor: pointer;">Trang chủ <i class="fa-solid fa-angle-right"></i> Danh mục diễn đàn</div>
    </div>
    <div class="container">
        <button class="btn btn-light rounded-0 border" data-bs-toggle="collapse" data-bs-target="#category">Danh mục diễn đàn</button>
        <div class="bg-light collapse" id="category">
            <?php $i = 0; ?>
            <?php foreach ($categories as $value) { ?>
                <a href="#<?php echo Helpers::to_slug($value['category_name']); ?>" class="d-block border-top border-bottom ps-5 pt-2 pb-2"><?php echo ++$i . '. ' . $value['category_name']; ?></a>
            <?php } ?>
        </div>
        <?php foreach ($categories as $value) {
            echo '<div class="bg-light h4 p-3 border-top border-bottom mt-3" id="' . Helpers::to_slug($value['category_name']) . '"><a href="/dien-dan/' . Helpers::to_slug($value['category_name']) . '_' . $value['category_id'] . '">' . $value['category_name'] . '</a></div>
                    <ul class="list-group list-group-light mb-3">';
            foreach ($value['post'] as $values) {
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
            echo '</ul>
                <div class="text-center"><a class="btn btn-light btn-rounded border" href="/dien-dan/' . Helpers::to_slug($value['category_name']) . '_' . $value['category_id'] . '" role="button" data-ripple-color="dark">Xem tất cả</a></div>';
        } ?>
    </div>
</section>