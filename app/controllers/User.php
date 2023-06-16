<?php

/**
 * Summary of User
 */
class User extends Controller
{
    public $data = [];
    private $model = 'UserModel';
    public function index()
    {
        if (isset($_GET['key'])) {
            $users = $this->model($this->model)->findUsers();
        } else {
            $users = $this->model($this->model)->getUsers();
        }
        $recordsPerPage = 9;
        $totalRows = count($users);
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($currentPage - 1) * $recordsPerPage;
        $end = $start + $recordsPerPage;

        $pagedData = array_slice($users, $start, $recordsPerPage);
        // Pagination
        $pagination = array(
            'total_rows' => $totalRows,
            'recordsPerPage' => $recordsPerPage,
            'currentPage' => $currentPage
        );
        $this->data['sub_content']['users'] = $users;
        $this->data['sub_content']['pagedData'] = $pagedData;
        $this->data['sub_content']['pagination'] = $pagination;
        $this->data['page_title'] = 'Danh sách người dùng';
        $this->data['content'] = 'user/index';
        $this->render('layouts/client-layout', $this->data);
    }
    public function profile($slug, $user_id)
    {
        $user = $this->model($this->model)->getUserByID($user_id);
        $this->data['sub_content']['user'] = $user;
        $this->data['sub_content']['topic'] = $this->db->table('posts')->where('user_id', '=', $user_id)->get();
        $this->data['sub_content']['comment'] = $this->db->table('comments')->where('user_id', '=', $user_id)->get();
        $this->data['page_title'] = 'Thông tin người dùng';
        $this->data['content'] = 'user/profile';
        $this->render('layouts/client-layout', $this->data);
    }
    public function profileEdit($slug, $user_id)
    {
        $user = $this->model($this->model)->getUserByID($user_id);
        if (isset($_POST['saveChange'])) {
            // Validate
            $request = new Request();
            if ($request->isPost()) {
                $request->rules([
                    'name' => 'required',
                    'birthday' => 'required',
                    'phone_number' => 'required',
                    'address' => 'required'
                ]);
                $request->message([
                    'name.required' => '*Họ tên không được để trống',
                    'birthday.required' => '*Vui lòng chọn ngày sinh',
                    'phone_number.required' => '*Số điện thoại không được để trống',
                    'address.required' => '*Địa chỉ không được để trống'
                ]);
                $validate = $request->validate();
                if (!$validate) {
                    $this->data['sub_content']['errors'] = $request->errors();
                } else {
                    if (!isset($_POST['role'])) {
                        $role = $user['role'];
                    } else {
                        $role = $_POST['role'];
                    }
                    $this->model($this->model)->editAccount($user_id, $_POST['name'], $_POST['gender'], $_POST['birthday'], $_POST['phone_number'], $_POST['address'], $_POST['link'], $_POST['description'], $role);
                    if ($user_id == Session::data('User')['user_id']) {
                        $user = $this->model($this->model)->getUserByID($user_id);
                        Session::data('User', $user);
                    }
                    Helpers::redirect_to('/nguoi-dung/' . Helpers::to_slug($_POST['name']) . '_' . $user_id . '.html');
                }
            }
        }
        $this->data['sub_content']['user'] = $user;
        $this->data['page_title'] = 'Chỉnh sửa thông tin người dùng';
        $this->data['content'] = 'user/profile_edition';
        $this->render('layouts/client-layout', $this->data);
    }
    public function changeAvatar($user_id)
    {
        if (isset($_POST['upload'])) {
            $duoi = ".png";
            $img_name = $user_id . $duoi;
            if (isset($_FILES['avatar'])) {
                $file = $_FILES['avatar'];
                $filename = $file['name'];
                $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    // file không định dạng ảnh hợp lệ
                    // codes xử lý lỗi tại đây
                    $msg = 'Hình ảnh không hợp lệ!';
                } else {
                    $target_path = "./public/Image/user";
                    $img_path = $target_path . '/' . $img_name;
                    move_uploaded_file($file['tmp_name'], $img_path);
                    $msg = 'Thay đổi thành công!';
                    $data = array(
                        'avatar' => $user_id . '.png'
                    );
                    $this->db->table('users')->where('user_id', '=', $user_id)->update($data);
                }
            } else {
                $msg = 'Bạn chưa chọn hình ảnh!';
            }
        }
        Session::data('message', $msg);
        $user = $this->model($this->model)->getUserByID($user_id);
        Helpers::redirect_to('/nguoi-dung/' . Helpers::to_slug($user['name']) . '_' . $user_id . '.html');
    }
    public function logout()
    {
        Session::delete('User');
        Helpers::redirect_to('/');
    }
    public function login()
    {
        $this->data['page_title'] = 'Đăng nhập diễn đàn';

        if (Session::data('User') == null) {
            // Validate
            $request = new Request();
            if ($request->isPost()) {
                $request->rules([
                    'username' => 'required',
                    'password' => 'required'
                ]);
                $request->message([
                    'username.required' => '*Vui lòng nhập tên đăng nhập',
                    'password.required' => '*Vui lòng nhập mật khẩu'
                ]);
                $validate = $request->validate();
                if (!$validate) {
                    $this->data['sub_content']['errors'] = $request->errors();
                } else {
                    $result = $this->model($this->model)->accountVerification($_POST['username'], $_POST['password']);
                    if (!$result) {
                        $this->data['sub_content']['msg'] = 'Tên đăng nhập hoặc mật khẩu không chính xác';
                    } else {
                        if ($result['role'] == -1) {
                            $this->data['sub_content']['msg'] = 'Tài khoản của bạn đã bị khóa truy cập, liên hệ Admin để biết thêm chi tiết';
                        } else {
                            Session::data('User', $result);
                            Helpers::redirect_to("/");
                        }
                    }
                }
            }
            $this->data['content'] = 'user/login';
            $this->render('layouts/client-layout', $this->data);
        } else {
            Helpers::redirect_to('/');
        }
    }
    public function register()
    {
        $this->data['page_title'] = 'Đăng ký diễn đàn';

        // Validate
        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'username' => 'required|min:5|max:10|unique:users:username',
                'password' => 'required|min:6',
                'email' => 'required|email|unique:users:email',
                'name' => 'required'
            ]);
            $request->message([
                'username.required' => '*Không được để trống tên đăng nhập!',
                'username.min' => '*Tên đăng nhập phải ít nhất 5 kí tự!',
                'username.max' => '*Tên đăng nhập chỉ được tối đa 10 kí tự!',
                'username.unique' => '*Tên đăng nhập đã tồn tại!',
                'password.required' => '*Không được để trống mật khẩu!',
                'password.min' => '*Mật khẩu phải ít nhất 6 kí tự',
                'email.required' => '*Không được để trống địa chỉ Email!',
                'email.email' => '*Định dạng email không hợp lệ!',
                'email.unique' => '*Email đã tồn tại',
                'name.required' => '*Họ tên không được để trống'
            ]);
            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = 'Đã xảy ra lỗi, vui lòng kiểm tra lại!';
            } else {
                $this->model($this->model)->createAccount($_POST['username'], $_POST['password'], $_POST['email'], $_POST['name']);
                Helpers::redirect_to("/dang-nhap.html");
            }
        }
        $this->data['content'] = 'user/register';
        $this->render('layouts/client-layout', $this->data);
    }
    public function active($user_id)
    {
        $user = $this->model($this->model)->getUserByID($user_id);
        if ($user['active']) {
            Helpers::redirect_to("/");
        } else {
            if (isset($_GET['key'])) {
                if ($_GET['key'] == Session::data('active_key')) {
                    $this->model($this->model)->activeUser($user['user_id']);
                    $this->data['sub_content']['msg'] = 'Kích hoạt thành công';
                    $user = $this->model($this->model)->getUserByID($user_id);
                    Session::data('User', $user);
                } else {
                    $this->data['sub_content']['msg'] = 'Có lỗi xảy ra, vui lòng thử lại';
                }
                $this->data['page_title'] = 'Kích hoạt tài khoản | ' . $user['name'];
                $this->data['content'] = 'home/active_result';
                $this->render('layouts/client-layout', $this->data);
            } else {
                $active_key = Helpers::generate_key(32);
                Session::data('active_key', $active_key);
                $htmlContent = '<p style="text-align: center;"><strong><img src="https://cdn.discordapp.com/attachments/1100753623849377835/1115201661795827742/bg.png" alt="" width="40%" height="auto" /></strong></p>
                <p style="text-align: center;"><strong>&nbsp;</strong></p>
                <h3 style="text-align: left;"><strong>Ch&agrave;o mừng <strong>' . $user['name'] . '</strong> đến với trang web!</strong></h3>
                <p style="text-align: left;"><strong>Trang Web học tiếng Anh d&agrave;nh cho đối tượng ch&iacute;nh l&agrave; học sinh THPT, &ocirc;n thi THPT Quốc Gia. Cung cấp c&aacute;c b&agrave;i giảng về từ vựng ngữ ph&aacute;p, trang bị cho bạn đủ kiến thức để tăng cường khả năng tiếng Anh của m&igrave;nh. Ngo&agrave;i ra, bạn c&oacute; thể tham gia v&agrave;o c&aacute;c b&agrave;i thi thử trực tuyến để thử sức với c&aacute;c th&agrave;nh vi&ecirc;n kh&aacute;c.</strong></p>
                <p style="text-align: left;"><span style="color: #000000;"><strong>Để k&iacute;ch hoạt t&agrave;i, khoản diễn đ&agrave;n. H&atilde;y click v&agrave;o link sau đ&acirc;y: <a href="http://localhost:8080/kich-hoat/' . $user['user_id'] . '.html?key=' . $active_key . '" target="_blank">http://localhost:8080/kich-hoat/' . $user['user_id'] . '.html?key=' . $active_key . '</a></strong></span></p>
                <p style="text-align: left;"><strong>Cảm ơn!</strong></p>';
                $this->data['page_title'] = 'Kích hoạt tài khoản | ' . $user['name'];
                Helpers::sendMail($user['email'], 'Kích hoạt tài khoản' . $user['name'], $htmlContent);
                $this->data['content'] = 'home/active';
                $this->render('layouts/client-layout', $this->data);
            }
        }
    }
    public function banUser($user_id)
    {
        $user = $this->model($this->model)->getUserByID($user_id);
        if (Session::data('User') != null) {
            if (Session::data('User')['role'] == 1 || Session::data('User')['role'] == 3) {
                $this->model($this->model)->banUser($user_id);
                Helpers::redirect_to('/nguoi-dung/' . Helpers::to_slug($user['name']) . '_' . $user_id . '.html');
            }
        } else {
            App::$app->loadError('404');
        }
    }
    public function unbanUser($user_id)
    {
        $user = $this->model($this->model)->getUserByID($user_id);
        if (Session::data('User') != null) {
            if (Session::data('User')['role'] == 3) {
                $this->model($this->model)->unbanUser($user_id);
                Helpers::redirect_to('/nguoi-dung/' . Helpers::to_slug($user['name']) . '_' . $user_id . '.html');
            }
        } else {
            App::$app->loadError('404');
        }
    }
    public function deleteUser($user_id)
    {
        $user = $this->model($this->model)->getUserByID($user_id);
        if (Session::data('User') != null) {
            if (Session::data('User')['role'] == 3) {
                $this->model($this->model)->deleteUser($user_id);
                Helpers::redirect_to('/nguoi-dung/' . Helpers::to_slug($user['name']) . '_' . $user_id . '.html');
            }
        } else {
            App::$app->loadError('404');
        }
    }
}
