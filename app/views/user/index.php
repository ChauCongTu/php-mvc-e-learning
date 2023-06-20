<section class="container user-list">
    <h1 class="mt-3 mb-3">Thành viên diễn đàn</h1>
    <div class="row">
        <div class="col-md-3">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên người dùng" value="<?php echo (isset($name)) ? $name : false; ?>">
                    <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
        <div class="col text-end">
            <button id="all" class="btn btn-link filter"> Tất cả </button>
            <button id="banned" class="btn btn-light filter"> Banned </button> 
            <button id="member" class="btn btn-light filter"> Member </button> 
            <button id="mod" class="btn btn-light filter"> Mod </button> 
            <button id="cm" class="btn btn-light filter"> Content Manager </button> 
            <button id="admin" class="btn btn-light filter"> Admin </button> 
        </div>
    </div>
    <div class="row" id="user_list">
        <?php
        foreach ($pagedData as $value) {
            echo '<div class="col-md-4 user-item">
                    <div class="user-item-border">
                        <div class="user-item-img">
                            <img src="/public/Image/user/' . $value['avatar'] . '" class="rounded-circle shadow-4-strong" alt="' . $value['name'] . '">
                        </div>
                        <div class="user-item-info">
                            <div class="name">
                                <a href="/nguoi-dung/' . Helpers::to_slug($value['name']) . '_' . $value['user_id'] . '.html">' . $value['name'] . '</a>
                            </div>
                            <div class="username">' . Helpers::display_role($value['role']) . '</div>
                            <div class="location"><i class="fa-solid fa-clock"></i> Tham gia ' . Helpers::displayTime($value['create_at']) . '</div>
                        </div>
                    </div>
                </div>';
        }
        ?>
        <?php
        echo Helpers::pagination($pagination['total_rows'], $pagination['recordsPerPage'], $pagination['currentPage']);
        ?>
    </div>
</section>