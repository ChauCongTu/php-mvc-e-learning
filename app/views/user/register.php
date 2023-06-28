<section class="container login">
    <div class="row">
        <div class="col-md-7 img">
            <img src="/public/Image/icon/authen.png" alt="learning english">
        </div>
        <div class="col-md-5">
            <div class="login-form">
                <div class="title">Đăng ký người dùng</div>
                <form action="" method="post">
                    <div class="mb-2">
                        <input type="text" name="username" placeholder="Tên đăng nhập" class="form-control">
                        <div class="text-danger"><?php echo (isset($errors['username'])) ? $errors['username'] : false; ?></div>
                    </div>

                    <div class="mb-2">
                        <input type="password" name="password" placeholder="Mật khẩu" class="form-control">
                        <div class="text-danger"><?php echo (isset($errors['password'])) ? $errors['password'] : false; ?></div>
                    </div>
                    <div class="mb-2">
                        <input type="email" name="email" placeholder="Địa chỉ Email" class="form-control">
                        <div class="text-danger"><?php echo (isset($errors['email'])) ? $errors['email'] : false; ?></div>
                    </div>
                    <div class="mb-2">
                        <input type="name" name="name" placeholder="Họ tên" class="form-control">
                        <div class="text-danger"><?php echo (isset($errors['name'])) ? $errors['name'] : false; ?></div>
                    </div>
                    <div class="mb-2 text-muted">
                        <p>Bằng cách bấm vào nút đăng ký nghĩa là bạn đã đồng ý với <a href="" class="action-theme">Quy định diễn đàn</a></p>
                    </div>
                    <div class="mb-2">
                        <button class="btn btn-primary form-control">Đăng ký</button>
                    </div>
                </form>
                <a href="/dang-nhap.html" class="btn btn-outline-primary d-block">Đăng nhập</a>
            </div>
        </div>
    </div>
</section>