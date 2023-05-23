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
                        <div class="text-danger"><?php echo (isset($errors['username']))?$errors['username']:false; ?></div>
                    </div>
                    
                    <div class="mb-2">
                        <input type="password" name="password" placeholder="Mật khẩu" class="form-control">
                        <div class="text-danger"><?php echo (isset($errors['password']))?$errors['password']:false; ?></div>
                    </div>
                    <div class="mb-2">
                        <input type="email" name="email" placeholder="Địa chỉ Email" class="form-control">
                        <div class="text-danger"><?php echo (isset($errors['email']))?$errors['email']:false; ?></div>
                    </div>
                    <div class="mb-2">
                        <input type="name" name="name" placeholder="Họ tên" class="form-control">
                        <div class="text-danger"><?php echo (isset($errors['name']))?$errors['name']:false; ?></div>
                    </div>
                    <div class="mb-2">
                        <button class="btn btn-primary form-control">Đăng nhập</button>
                    </div>
                </form>
                <a href="" class="btn btn-outline-primary d-block">Tạo tài khoản</a>
                <a href="" class="text-primary mt-2 d-block">Quên mật khẩu?</a>
            </div>
        </div>
    </div>
</section>