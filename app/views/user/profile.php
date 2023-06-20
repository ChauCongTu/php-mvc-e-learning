<section class="profile container">
    <div class="row mt-5 mb-5">
        <div class="col-md-4">
            <div class="user-avatar">
                <a href="/public/Image/user/original/<?php echo $user['avatar']; ?>" target="_blank">
                    <img src="/public/Image/user/<?php echo $user['avatar']; ?>" class="rounded-circle shadow-4-strong" alt="thong tin nguoi dung" />
                </a>
                <?php echo ($user['user_id'] == Session::data('User')['user_id']) ? '<a data-bs-toggle="modal" data-bs-target="#change_avatar" style="cursor:pointer" id="avatar_changer"><i class="fa-solid fa-camera"></i></a>' : false; ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="user-info mobile-center border-start p-3">
                <div class="name"><?php echo $user['name']; ?></div>
                <div><?php echo Helpers::display_role($user['role']); ?></div>
                <div class="stats">
                    <p><i class="fa-solid fa-file"></i><strong> Chủ đề:</strong> <?php echo count($topic); ?></p>
                    <p><i class="fa-solid fa-reply"></i><strong> Thảo luận:</strong> <?php echo count($comment); ?></p>
                </div>
                <?php
                if (Session::data('User') != null) {
                    if ($user['user_id'] == Session::data('User')['user_id']) {
                        echo '<a href="/nguoi-dung/chinh-sua-thong-tin/' . Helpers::to_slug($user['name']) . '_' . $user['user_id'] . '.html" class="btn btn-primary rounded-0 btn-sm"><i class="fa-solid fa-pen"></i> Chỉnh sửa</a>';
                    } else {
                        echo '<a data-bs-toggle="modal" data-bs-target="#report" class="btn btn-warning rounded-0 btn-sm"><i class="fa-solid fa-flag"></i> Báo cáo người dùng</a>';
                    }
                    if (Session::data('User')['role'] == 1) {
                        if ($user['role'] != -1) {
                            echo ' <a data-bs-toggle="modal" data-bs-target="#ban" style="cursor:pointer" class="btn btn-danger rounded-0 btn-sm"><i class="fa-solid fa-lock"></i> Khóa</a>';
                        }
                    }
                    if (Session::data('User')['role'] == 3) {
                        if ($user['role'] == -1) {
                            echo ' <a data-bs-toggle="modal" data-bs-target="#unban" style="cursor:pointer" class="btn btn-danger rounded-0 btn-sm"><i class="fa-solid fa-lock-open"></i> Mở Khóa</a>';
                        } else {
                            echo ' <a data-bs-toggle="modal" data-bs-target="#ban" style="cursor:pointer" class="btn btn-danger rounded-0 btn-sm"><i class="fa-solid fa-lock"></i> Khóa</a>';
                        }
                        if ($user['user_id'] != Session::data('User')['user_id']) {
                            echo ' <a href="/nguoi-dung/chinh-sua-thong-tin/' . Helpers::to_slug($user['name']) . '_' . $user['user_id'] . '.html" class="btn btn-primary rounded-0 btn-sm"><i class="fa-solid fa-pen"></i> Chỉnh sửa</a>';
                        }
                        echo ' <a data-bs-toggle="modal" data-bs-target="#delete" style="cursor:pointer" class="btn btn-danger rounded-0 btn-sm"><i class="fa-solid fa-trash"></i> Xóa tài khoản</a>';
                    }
                }
                ?>
                <?php 
                echo (isset($msg))?'<div class="alert alert-success mt-3">'.$msg.'</div>':false;
                echo (isset($errors['title']))?'<div class="alert alert-danger mt-3">'.$errors['title'].'</div>':false;
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="user-info">
                <div class="title">Giới thiệu</div>
                <div class="content">
                    <?php echo $user['description']; ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="user-info">
                <div class="title">Thông tin liên hệ</div>
                <div class="content">
                    <table>
                        <tr>
                            <td class="fw-bold" width="40%">Số điện thoại: </td>
                            <td><a href="tel:<?php echo $user['phone_number']; ?>"><?php echo $user['phone_number']; ?></a></td>
                        </tr>
                        <tr>
                            <td class="fw-bold" width="40%">Địa chỉ: </td>
                            <td><?php echo $user['address']; ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold" width="40%">Địa chỉ e-mail: </td>
                            <td><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a>
                                <?php
                                if ($user['active'] == 0) {
                                    echo ' <span class="text-warning"><i class="fa-solid fa-triangle-exclamation"></i></span>';
                                } else {
                                    echo ' <span class="text-success"><i class="fa-solid fa-check"></i></span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold" width="40%">Liên kết: </td>
                            <td><a href="<?php echo $user['link']; ?>"><?php echo $user['link']; ?></a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="user-info">
                <div class="title">Thông tin cơ bản</div>
                <div class="content">
                    <table>
                        <tr>
                            <td class="fw-bold" width="60%">Ngày sinh: </td>
                            <td>
                                <?php
                                $date = date_create($user['birthday']);
                                echo date_format($date, "d/m/Y");
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold" width="40%">Giới tính: </td>
                            <?php
                            if ($user['gender'] == 0) {
                                echo '<td>Nam</td>';
                            } else {
                                echo '<td>Nữ</td>';
                            }
                            ?>
                        </tr>
                        <tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- The Modal -->
<div class="modal fade modal-mv" id="report">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Báo cáo người dùng</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <input type="hidden" name="reported_user_id" value="<?php echo $user['user_id']; ?>">
                    <div class="mb-3">
                        <label for="title" class="h5 mb-3">Tiêu đề: </label>
                        <input type="text" name="title" placeholder="Nhập tiêu đề" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="h5 mb-3">Lý do: </label>
                        <select name="type" class="form-control">
                            <option value="1"><?php echo Helpers::display_type_report(1); ?></option>
                            <option value="2"><?php echo Helpers::display_type_report(2); ?></option>
                            <option value="3"><?php echo Helpers::display_type_report(3); ?></option>
                            <option value="4"><?php echo Helpers::display_type_report(4); ?></option>
                            <option value="5"><?php echo Helpers::display_type_report(5); ?></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="h5 mb-3">Chi tiết (không bắt buộc): </label>
                        <textarea name="content" placeholder="Nhập tiêu đề" class="form-control editor"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="sendReport" class="btn btn-danger">Gửi báo cáo</a>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ban">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc muốn khóa người dùng này
            </div>
            <div class="modal-footer">
                <a href="/user/banUser/<?php echo $user['user_id']; ?>" class="btn btn-danger">Khóa</a>
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="unban">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc muốn mở khóa người dùng này
            </div>
            <div class="modal-footer">
                <a href="/user/unbanUser/<?php echo $user['user_id']; ?>" class="btn btn-danger">Mở khóa</a>
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc muốn xóa người dùng này
            </div>
            <div class="modal-footer">
                <a href="/user/deleteUser/<?php echo $user['user_id']; ?>" class="btn btn-danger">Xóa</a>
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="change_avatar">
    <div class="modal-dialog">
        <form action="/user/changeAvatar/<?php echo $user['user_id']; ?>" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Đổi ảnh đại diện</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="modal-footer">
                    <button name="upload" class="btn btn-danger"><i class="fa-solid fa-upload"></i> Tải lên</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                </div>
            </div>
        </form>
    </div>
</div>