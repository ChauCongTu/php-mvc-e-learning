<section class="profile container">
    <form action="" method="post">
        <div class="row mt-5 mb-5">
            <div class="col-md-8">
                <div class="user-info">
                    <div class="title">Thông tin cơ bản</div>
                    <div class="content">
                        <div class="row mb-2">
                            <div class="col-sm-2 fw-bold mt-2">
                                Họ tên:
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="<?php echo (isset($user['name'])) ? $user['name'] : false; ?>">
                                <div class="mt-2">
                                    <div class="text-alert"><?php (isset($errors['name'])) ? $errors['name'] : false; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 fw-bold mt-2">
                                Giới tính:
                            </div>
                            <div class="col-sm-10">
                                <select name="gender" class="form-control">
                                    <option value="0" <?php echo ($user['gender'] == 0) ? "selected" : false; ?>>Nam</option>
                                    <option value="1" <?php echo ($user['gender'] == 1) ? "selected" : false; ?>>Nữ</option>
                                    <option value="2" <?php echo ($user['gender'] == 2) ? "selected" : false; ?>>Bê đê</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 fw-bold mt-2">
                                Ngày sinh:
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="birthday" value="<?php echo (isset($user['birthday'])) ? $user['birthday'] : false; ?>">
                                <div class="mt-2">
                                    <div class="text-alert"><?php (isset($errors['phone_number'])) ? $errors['phone_number'] : false; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <div class="title">Thông tin liên hệ</div>
                    <div class="content">
                        <div class="row mb-2">
                            <div class="col-sm-2 fw-bold mt-2">
                                Số điện thoại:
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone_number" value="<?php echo (isset($user['phone_number'])) ? $user['phone_number'] : false; ?>">
                                <div class="mt-2">
                                    <div class="text-alert"><?php (isset($errors['phone_number'])) ? $errors['phone_number'] : false; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 fw-bold mt-2">
                                Địa chỉ:
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address" value="<?php echo (isset($user['address'])) ? $user['address'] : false; ?>">
                                <div class="mt-2">
                                    <div class="text-alert"><?php (isset($errors['address'])) ? $errors['address'] : false; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 fw-bold mt-2">
                                Địa chỉ Email:
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="<?php echo (isset($user['email'])) ? $user['email'] : false; ?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 fw-bold mt-2">
                                Liên kết:
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="link" value="<?php echo (isset($user['link'])) ? $user['link'] : false; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="user-info">
                    <div class="title">Giới thiệu</div>
                    <div class="content">
                        <textarea name="description" class="form-control" id="" rows="10"><?php echo $user['description']; ?></textarea>
                        <div class="mt-2">
                            <div class="text-alert"><?php (isset($errors['description'])) ? $errors['description'] : false; ?></div>
                        </div>
                    </div>
                </div>
                <?php
                if (Session::data('User')['role'] == 3) {
                ?>
                    <div class="user-info">
                        <div class="title">Chức vụ</div>
                        <div class="content">
                            <select name="role" class="form-control">
                                <option value="0" <?php echo ($user['role'] == 0) ? "selected" : false; ?>>Thành viên</option>
                                <option value="1" <?php echo ($user['role'] == 1) ? "selected" : false; ?>>Moderator</option>
                                <option value="2" <?php echo ($user['role'] == 2) ? "selected" : false; ?>>Content Manager</option>
                                <option value="3" <?php echo ($user['role'] == 3) ? "selected" : false; ?>>Admin</option>
                            </select>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div>
                <button name="saveChange" class="btn btn-danger">Lưu thay đổi</button>
                <a href="/nguoi-dung/<?php echo Helpers::to_slug($user['name']) . '_' . $user['user_id'] . '.html'; ?>" class="btn btn-outline-danger">Quay lại</a>
            </div>
        </div>
    </form>
</section>