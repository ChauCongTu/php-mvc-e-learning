<section class="search mt-2">
    <div class="container">
        <form action="" class="mt-2 mb-2" method="get">
            <div class="input-group">
                <input type="search" class="form-control rounded" name="key" placeholder="Nhập từ khóa" value="<?php echo (isset($keyword)) ? $keyword : false; ?>" echo aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">Tìm kiếm</button>
            </div>
        </form>
        <!-- Tabs navs -->
        <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="ex2-tab-1" data-bs-toggle="tab" href="#bai-viet" role="tab" aria-controls="ex2-tabs-1" aria-selected="true">Bài viết</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex2-tab-2" data-bs-toggle="tab" href="#nguoi-dung" role="tab" aria-controls="ex2-tabs-2" aria-selected="false">Người dùng</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex2-tab-3" data-bs-toggle="tab" href="#tu-vung" role="tab" aria-controls="ex2-tabs-3" aria-selected="false">Từ vựng</a>
            </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex2-content">
            <div class="tab-pane fade show active" id="bai-viet" role="tabpanel" aria-labelledby="ex2-tab-1">
                <ul class="list-group list-group-light mb-3">
                    <?php if (count($posts) == 0) { ?>
                        <p class="p-3">Không tìm thấy bài viết phù hợp</p>
                    <?php } else { ?>
                        <?php foreach ($posts as $values) {
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
                        ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="nguoi-dung" role="tabpanel" aria-labelledby="ex2-tab-2">
                <?php if (count($users) == 0) { ?>
                    <p class="p-3">Không tìm thấy người dùng phù hợp</p>
                <?php } else { ?>
                    <div class="row">
                        <?php foreach ($users as $values) {
                            echo '<div class="col-xl-6 col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="/public/Image/user/'.$values['avatar'].'" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1 h5"><a href="/nguoi-dung/'.Helpers::to_slug($values['name']).'_'.$values['user_id'].'.html">'.$values['name'].'</a></p>
                                            <p class="text-muted mb-0">'.$values['email'].'</p>
                                        </div>
                                        <div class="ms-3">
                                            <p class="mb-1">'.Helpers::display_role($values['role']).'</p>
                                            <p class="text-muted mb-0">Tham gia: '.Helpers::displayTime($values['create_at']).'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
            <div class="tab-pane fade" id="tu-vung" role="tabpanel" aria-labelledby="ex2-tab-3">
                <?php if (count($vocabulary) == 0) { ?>
                    <p class="p-3">Không tìm thấy từ vựng phù hợp</p>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">John Doe</p>
                                            <p class="text-muted mb-0">john.doe@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">Alex Ray</p>
                                            <p class="text-muted mb-0">alex.ray@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">Kate Hunington</p>
                                            <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="https://mdbootstrap.com/img/new/avatars/9.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">Soraya Letto</p>
                                            <p class="text-muted mb-0">soraya.letto@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="https://mdbootstrap.com/img/new/avatars/11.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">Zeynep Dudley</p>
                                            <p class="text-muted mb-0">zeynep.dudley@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="https://mdbootstrap.com/img/new/avatars/15.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">Ayat Black</p>
                                            <p class="text-muted mb-0">ayat.black@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Tabs content -->
    </div>
</section>