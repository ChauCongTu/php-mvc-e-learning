<header class="bg-theme">
    <div class="container header">
        <div class="logo"><a href="/"><img src="/public/Image/icon/bg.png" width="80%" alt=""></a></div>
        <div class="search-bar">
            <form action="" method="GET">
                <input type="text" name="key" placeholder="Tìm kiếm ...">
                <button name="seach"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="authen">
            <?php
            if (Session::data('User') == null) {
                echo '<a href="/dang-nhap.html"><i class="fa-solid fa-right-to-bracket"></i> Đăng nhập</a> |
                      <a href="/dang-ky.html"><i class="fa-solid fa-user"></i> Đăng ký</a>';
            } else {
                echo '<div class="dropdown">
                        <a style="cursor:pointer" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-user"></i> ' . Session::data('User')['name'] . '
                        </a>
                        <ul class="dropdown-menu">';
                echo '<li><a class="dropdown-item" href="/nguoi-dung/' . Helpers::to_slug(Session::data('User')['name']) . '_' . Session::data('User')['user_id'] . '.html"><i class="fa-solid fa-circle-info"></i> Thông tin cá nhân</a></li>';
                echo '<li><a class="dropdown-item" href="/nguoi-dung/doi-mat-khau/' . Helpers::to_slug(Session::data('User')['name']) . '_' . Session::data('User')['user_id'] . '.html"><i class="fa-solid fa-key"></i> Đổi mật khẩu</a></li>';
                echo '<li><a class="dropdown-item" href="/nguoi-dung/chinh-sua-thong-tin/' . Helpers::to_slug(Session::data('User')['name']) . '_' . Session::data('User')['user_id'] . '.html"><i class="fa-solid fa-gears"></i> Thiết lập</a></li>';

                echo (Session::data('User')['role'] >= 1) ? '<li><a class="dropdown-item" href="/admin"><i class="fa-solid fa-sliders"></i> Bảng điều khiển</a></li>' : false;

                echo '<hr/>
                            <li><a class="dropdown-item" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#logout"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
                        </ul>
                    </div>
                ';
            }
            ?>
        </div>
    </div>
    <div class="container header-mobile">
        <div class="logo"><a href="/"><img src="/public/Image/icon/bg.png" width="80%" alt=""></a></div>
        <div class="authen">
            <?php
            if (Session::data('User') == null) {
                echo '<a href="/dang-nhap.html"><i class="fa-solid fa-user"></i> Tài khoản</a>';
            } else {
                echo '<div class="dropdown">
                        <a style="cursor:pointer" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-user"></i> ' . Session::data('User')['name'] . '
                        </a>
                        <ul class="dropdown-menu">';
                echo '<li><a class="dropdown-item" href="/nguoi-dung/' . Helpers::to_slug(Session::data('User')['name']) . '_' . Session::data('User')['user_id'] . '.html"><i class="fa-solid fa-circle-info"></i> Thông tin cá nhân</a></li>';
                echo '<li><a class="dropdown-item" href="/nguoi-dung/doi-mat-khau/' . Helpers::to_slug(Session::data('User')['name']) . '_' . Session::data('User')['user_id'] . '.html"><i class="fa-solid fa-key"></i> Đổi mật khẩu</a></li>';
                echo '<li><a class="dropdown-item" href="/nguoi-dung/chinh-sua-thong-tin/' . Helpers::to_slug(Session::data('User')['name']) . '_' . Session::data('User')['user_id'] . '.html"><i class="fa-solid fa-gears"></i> Thiết lập</a></li>';

                echo (Session::data('User')['role'] >= 1) ? '<li><a class="dropdown-item" href="/admin"><i class="fa-solid fa-sliders"></i> Bảng điều khiển</a></li>' : false;

                echo '<hr/>
                            <li><a class="dropdown-item" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#logout"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
                        </ul>
                    </div>
                ';
            }
            ?>
        </div>
        <div class="toogle" data-bs-toggle="offcanvas" data-bs-target="#menu-offcanvas">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
</header>
<nav class="nav-bar-home">
    <ul class="container">
        <a href="/">
            <li>trang chủ</li>
        </a>
        <a href="/bai-hoc">
            <li>bài học</li>
        </a>
        <a href="/dien-dan">
            <li>diễn đàn</li>
        </a>
        <a href="/thi-truc-tuyen">
            <li>thi trục tuyến</li>
        </a>
        <a href="/dich/anh-viet">
            <li>Dịch</li>
        </a>
        <form method="get" action="">
            <input type="text" name="key" placeholder="Tìm kiếm ...">
            <button name="seach"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </ul>
</nav>
<div class="offcanvas offcanvas-start" id="menu-offcanvas">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title"><strong><span style="color:red">English</span> <span style="color:blue">We Can</span></strong></h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <a href="/">
            <li><i class="fa-solid fa-house"></i> trang chủ</li>
        </a>
        <a href="/bai-hoc">
            <li><i class="fa-solid fa-book-open"></i> bài học</li>
        </a>
        <a href="/dien-dan">
            <li><i class="fa-solid fa-users"></i> diễn đàn</li>
        </a>
        <a href="/thi-truc-tuyen">
            <li><i class="fa-solid fa-file-pen"></i> thi trực tuyến</li>
        </a>
        <a href="/dich/anh-viet">
            <li><i class="fa-solid fa-language"></i> dịch</li>
        </a>
        <form method="get" action="" class="container">
            <input type="text" name="key" placeholder="Tìm kiếm ...">
            <button name="seach"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</div>
<?php if (Session::data('User') != null && Session::data('User')['active'] == 0) { ?>
    <div class="alert alert-danger"><div class="container"> Tài khoản của bạn chưa được kích hoạt. Hãy kích hoạt tài khoản để xác nhận Email dùng để lấy lại mật khẩu sau này! <a href="" class="fw-bold">Kích hoạt ngay</a></div></div>
<?php } ?>
<?php if (Session::data('User') != null && Session::data('User')['phone_number'] == null) { ?>
    <div class="alert alert-danger"><div class="container"> Hoàn tất hồ sơ của bạn để được hỗ trợ tốt hơn từ trang web! <a href="" class="fw-bold">Hoàn tất ngay</a></div></div>
<?php } ?>
<!-- Modal Logout -->
<div class="modal fade" id="logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="p-3 h5 text-center">Bạn có chắc muốn đăng xuất?</div>
                <div class="mt-2 text-center">
                    <a href="/dang-xuat.html" class="btn btn-danger btn-sm">Đăng xuất</a>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>