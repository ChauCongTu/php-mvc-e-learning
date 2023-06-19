<?php

/**
 * Summary of User
 */
class Admin extends Controller
{
    public $data = [];
    private $model = 'AdminModel';
    private $errors = [];
    public function index()
    {
        if (Session::data('User') == null) {
            echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
            exit;
        } else {
            if (Session::data('User')['role'] < 1) {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            } else {
                $this->data['page_title'] = 'Bảng điều khiển';
                $this->data['content'] = 'admin/index';
                $this->render('layouts/client-layout', $this->data);
            }
        }
    }
    public function forum()
    {
        if (Session::data('User') == null) {
            echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
            exit;
        } else {
            if (Session::data('User')['role'] == 1 || Session::data('User')['role'] == 3) {
                // Add category
                if (isset($_POST['add'])) {
                    $request = new Request();
                    $request->rules([
                        'name' => 'required'
                    ]);
                    $request->message([
                        'name.required' => 'Không thành công! Bạn chưa nhập tên danh mục'
                    ]);
                    $validate = $request->validate();
                    if (!$validate) {
                        $this->data['sub_content']['errors'] = $request->errors();
                    } else {
                        $this->model('ForumModel')->createCategory($_POST['name']);
                    }
                }
                // Update category
                if (isset($_POST['edit'])) {
                    $request = new Request();
                    $request->rules([
                        'name' => 'required'
                    ]);
                    $request->message([
                        'name.required' => 'Không thành công! Bạn chưa nhập tên danh mục'
                    ]);
                    $validate = $request->validate();
                    if (!$validate) {
                        $this->data['sub_content']['errors'] = $request->errors();
                    } else {
                        $this->model('ForumModel')->updateCategory($_POST['id'], $_POST['name']);
                    }
                }
                // Delete category
                if (isset($_POST['del'])) {
                    $this->model('ForumModel')->deleteCategory($_POST['id']);
                }
                $categories = $this->model('ForumModel')->getCategories();
                $recordsPerPage = 10;
                $totalRows = count($categories);
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                $start = ($currentPage - 1) * $recordsPerPage;
                $end = $start + $recordsPerPage;

                $pagedData = array_slice($categories, $start, $recordsPerPage);
                // Pagination
                $pagination = array(
                    'total_rows' => $totalRows,
                    'recordsPerPage' => $recordsPerPage,
                    'currentPage' => $currentPage
                );
                $this->data['sub_content']['categories'] = $pagedData;
                $this->data['sub_content']['pagination'] = $pagination;
                $this->data['page_title'] = 'Quản lý danh mục diễn đàn';
                $this->data['content'] = 'admin/forum';
                $this->render('layouts/client-layout', $this->data);
            } else {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            }
        }
    }
    public function lesson()
    {
        if (Session::data('User') == null) {
            echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
            exit;
        } else {
            if (Session::data('User')['role'] == 2 || Session::data('User')['role'] == 3) {
                if (isset($_POST['add'])) {
                    $request = new Request();
                    $request->rules([
                        'title' => 'required'
                    ]);
                    $request->message([
                        'title.required' => 'Vui lòng nhập tiêu đề'
                    ]);
                    $validate = $request->validate();
                    if (!$validate) {
                        $this->data['sub_content']['errors'] = $request->errors();
                        if (!isset($_FILES['thumb'])) {
                            $this->data['sub_content']['errors']['thumb'] = "Bạn chưa chọn hình ảnh";
                        }
                    } else {
                        if (isset($_FILES['thumb'])) {
                            $file = $_FILES['thumb'];
                            $filename = $file['name'];
                            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
                            if (!in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                // file không định dạng ảnh hợp lệ
                                // codes xử lý lỗi tại đây
                                $this->data['sub_content']['errors']['thumb'] = "File được tải lên không đúng định dạng ";
                            } else {
                                $img_name = Helpers::to_slug($_POST['title']) . '.png';
                                $target_path = "./public/Image/lesson";
                                $img_path = $target_path . '/' . $img_name;
                                move_uploaded_file($file['tmp_name'], $img_path);
                                $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
                                $data = array(
                                    'thumb' => $img_name,
                                    'title' => $title,
                                    'content' => $_POST['content'],
                                    'grade' => $_POST['grade'],
                                    'created_by' => Session::data('User')['user_id']
                                );
                                // Insert
                                $this->db->table("lessons")->insert($data);
                            }
                        } else {
                            $this->data['sub_content']['errors']['thumb'] = "Bạn chưa chọn hình ảnh";
                        }
                    }
                }
                if (isset($_POST['edit'])) {
                    $request = new Request();
                    $request->rules([
                        'title' => 'required'
                    ]);
                    $request->message([
                        'title.required' => 'Vui lòng nhập tiêu đề'
                    ]);
                    $validate = $request->validate();
                    if (!$validate) {
                        $this->data['sub_content']['errors'] = $request->errors();
                    } else {
                        $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $data = array(
                            'title' => $title,
                            'content' => $_POST['content'],
                            'grade' => $_POST['grade'],
                            'created_by' => Session::data('User')['user_id']
                        );

                        if ($_FILES['thumb']['name'] != null) {
                            $file = $_FILES['thumb'];
                            $filename = $file['name'];
                            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
                            if (!in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                $this->data['sub_content']['errors']['thumb'] = "File được tải lên không đúng định dạng ";
                            } else {
                                $img_name = Helpers::to_slug($_POST['title']) . '.png';
                                $target_path = "./public/Image/lesson";
                                $img_path = $target_path . '/' . $img_name;
                                move_uploaded_file($file['tmp_name'], $img_path);
                                $data['thumb'] = $img_name;
                            }
                        }
                        // Update
                        $this->db->table("lessons")->where('lesson_id', '=', $_POST['id'])->update($data);
                    }
                }
                if (isset($_POST['del'])) {
                    $this->model("LessonModel")->deleteLesson($_POST['id']);
                }
                $lessons = $this->model("LessonModel")->getLesson();
                $this->data['sub_content']['lessons'] = $lessons;
                $this->data['page_title'] = 'Quản lý bài học';
                $this->data['content'] = 'admin/lesson/index';
                $this->render('layouts/client-layout', $this->data);
            } else {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            }
        }
    }
    public function lesson_detail($lesson_id)
    {
        if (Session::data('User') == null) {
            echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
            exit;
        } else {
            if (Session::data('User')['role'] == 2 || Session::data('User')['role'] == 3) {
                if (isset($_POST['add_vocab'])) {
                    $request = new Request();
                    $request->rules([
                        'word' => 'required',
                        'spelling' => 'required',
                        'meaning' => 'required',
                        'example' => 'required'
                    ]);
                    $request->message([
                        'word.required' => 'vui lòng nhập từ tiếng anh',
                        'spelling.required' => 'vui lòng nhập phiên âm',
                        'meaning.required' => 'vui lòng nhập nghĩa',
                        'example.required' => 'vui lòng nhập ví dụ'
                    ]);
                    $validate = $request->validate();
                    if (!$validate) {
                        $this->data['sub_content']['errors'] = $request->errors();
                    }
                    else {
                        // Thục hiện thêm
                        $this->model('LessonModel')->addVocab($_POST['lesson_id'], $_POST['word'], $_POST['spelling'], $_POST['meaning'], $_POST['example'], $_POST['synonyms'], $_POST['antonyms']);
                    }
                }
                if (isset($_POST['edit_vocab'])) {
                    $request = new Request();
                    $request->rules([
                        'word' => 'required',
                        'spelling' => 'required',
                        'meaning' => 'required',
                        'example' => 'required'
                    ]);
                    $request->message([
                        'word.required' => 'vui lòng nhập từ tiếng anh',
                        'spelling.required' => 'vui lòng nhập phiên âm',
                        'meaning.required' => 'vui lòng nhập nghĩa',
                        'example.required' => 'vui lòng nhập ví dụ'
                    ]);
                    $validate = $request->validate();
                    if (!$validate) {
                        $this->data['sub_content']['errors'] = $request->errors();
                    }
                    else {
                        // Thục hiện cập nhật
                        $this->model('LessonModel')->updateVocab($_POST['vocab_id'], $_POST['word'], $_POST['spelling'], $_POST['meaning'], $_POST['example'], $_POST['synonyms'], $_POST['antonyms']);
                    }
                }
                if (isset($_POST['del_vocab'])) {
                    $this->model('LessonModel')->deleteVocab($_POST['id']);
                }
                $lesson_id = filter_var($lesson_id, FILTER_SANITIZE_NUMBER_INT);
                $lesson = $this->model("LessonModel")->getLessonById($lesson_id);
                $this->data['sub_content']['lesson'] = $lesson;
                $this->data['page_title'] = 'Chi tiết bài học';
                $this->data['content'] = 'admin/lesson/detail';
                $this->render('layouts/client-layout', $this->data);
            } else {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            }
        }
    }
}
