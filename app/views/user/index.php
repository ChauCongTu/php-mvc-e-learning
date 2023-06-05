<section class="container user-list">
    <h1 class="mt-3 mb-3">Thành viên diễn đàn</h1>
    <div class="row">
        <div class="col-md-4">
            <form action="" method="get">
                <i class="fa-solid fa-magnifying-glass icon"></i>
                <input type="text" placeholder="Tìm kiếm thành viên">
            </form>
        </div>
        <div class="col-md-8 text-end mt-3">
            <button id="banned" class="r-banned"> Banned </button> |
            <button id="member" class="r-member"> Member </button> |
            <button id="mod" class="r-mod"> Mod </button> |
            <button id="cm" class="r-cm"> Content Manager </button> |
            <button id="admin" class="r-admin"> Admin </button> |
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($pagedData as $value) {
            echo '<div class="col-md-4 user-item">
                    <div class="user-item-border">
                        <div class="user-item-img">
                            <img src="/public/Image/user/' . $value['avatar'] . '" class="rounded-circle shadow-4-strong" alt="' . $value['name'] . '">
                        </div>
                        <div class="user-item-info">
                            <div class="name">
                                <a href="/nguoi-dung/'.Helpers::to_slug($value['name']).'_'.$value['user_id'].'.html">' . $value['name'] . '</a>
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