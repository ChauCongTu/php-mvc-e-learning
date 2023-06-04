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
                echo '<a href=""><i class="fa-solid fa-user"></i> ' . Session::data('User')['name'] . '</a><a href="/dang-xuat.html"><i class="fa-solid fa-right-from-bracket"></i></a>';
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
                echo '<a href=""><i class="fa-solid fa-user"></i> ' . Session::data('User')['name'] . '</a><a href="/dang-xuat.html"> <i class="fa-solid fa-right-from-bracket"></i></a>';
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