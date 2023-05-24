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
                echo '<a href=""><i class="fa-solid fa-user"></i> ' . Session::data('User')['name'] . '</a><a href="/dang-xuat.html">(Đăng xuất)</a>';
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
                echo '<a href=""><i class="fa-solid fa-user"></i> ' . Session::data('User')['name'] . '</a><a href="/dang-xuat.html">(Thoát)</a>';
            }
            ?>
        </div>
        <div class="toogle">
            <i class="fa-solid fa-bars" id="open-menu"></i>
        </div>
    </div>
</header>
<nav class="nav-bar-home">
    <ul class="container">
        <a href="">
            <li>trang chủ</li>
        </a>
        <a href="">
            <li>bài học</li>
        </a>
        <a href="">
            <li>diễn đàn</li>
        </a>
        <a href="">
            <li>thi thử</li>
        </a>
        <a href="">
            <li>bảng xếp hạng</li>
        </a>
        <form method="get" action="">
            <input type="text" name="key" placeholder="Tìm kiếm ...">
            <button name="seach"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </ul>
</nav>