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
                $paged = Helpers::handlePaged(10, $categories);
                $this->data['sub_content']['categories'] = $paged['pagedData'];
                $this->data['sub_content']['pagination'] = $paged['pagination'];
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
                $paged = Helpers::handlePaged(10, $lessons);
                $this->data['sub_content']['lessons'] = $paged['pagedData'];
                $this->data['sub_content']['pagination'] = $paged['pagination'];
                $this->data['page_title'] = 'Quản lý bài học';
                $this->data['content'] = 'admin/lesson/index';
                $this->render('layouts/client-layout', $this->data);
            } else {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            }
        }
    }
    public function lesson_detail($slug, $lesson_id)
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
                    } else {
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
                    } else {
                        // Thục hiện cập nhật
                        $this->model('LessonModel')->updateVocab($_POST['vocab_id'], $_POST['word'], $_POST['spelling'], $_POST['meaning'], $_POST['example'], $_POST['synonyms'], $_POST['antonyms']);
                    }
                }
                if (isset($_POST['del_vocab'])) {
                    $this->model('LessonModel')->deleteVocab($_POST['id']);
                }
                if (isset($_POST['add_grammar'])) {
                    $request = new Request();
                    $request->rules([
                        'title' => 'required',
                        'content' => 'required',
                        'example' => 'required',
                        'define' => 'required',
                        'sign' => 'required'
                    ]);
                    $request->message([
                        'title.required' => 'Vui lòng nhập tiêu đề',
                        'content.required' => 'Vui lòng nhập cấu trúc',
                        'example.required' => 'Vui lòng nhập ví dụ',
                        'define.required' => 'Vui lòng nhập định nghĩa',
                        'sign.required' => 'Vui lòng nhập dấu hiệu nhận biết'
                    ]);
                    $validate = $request->validate();
                    if (!$validate) {
                        $this->data['sub_content']['errors'] = $request->errors();
                    } else {
                        // Thục hiện thêm
                        $this->model('LessonModel')->addGrammar($_POST['lesson_id'], $_POST['title'], $_POST['content'], $_POST['example'], $_POST['define'], $_POST['sign']);
                    }
                }
                if (isset($_POST['edit_grammar'])) {
                    $request = new Request();
                    $request->rules([
                        'title' => 'required',
                        'content' => 'required',
                        'example' => 'required',
                        'define' => 'required',
                        'sign' => 'required'
                    ]);
                    $request->message([
                        'title.required' => 'Vui lòng nhập tiêu đề',
                        'content.required' => 'Vui lòng nhập cấu trúc',
                        'example.required' => 'Vui lòng nhập ví dụ',
                        'define.required' => 'Vui lòng nhập định nghĩa',
                        'sign.required' => 'Vui lòng nhập dấu hiệu nhận biết'
                    ]);
                    $validate = $request->validate();
                    if (!$validate) {
                        $this->data['sub_content']['errors'] = $request->errors();
                    } else {
                        // Thục hiện thêm
                        $this->model('LessonModel')->updateGrammar($_POST['id'], $_POST['title'], $_POST['content'], $_POST['example'], $_POST['define'], $_POST['sign']);
                    }
                    if (isset($_POST['del_grammar'])) {
                    }
                }
                if (isset($_POST['del_grammar'])) {
                    $this->model('LessonModel')->deleteGrammar($_POST['id']);
                }
                $lesson_id = filter_var($lesson_id, FILTER_SANITIZE_NUMBER_INT);
                $lesson = $this->model("LessonModel")->getLessonById($lesson_id);
                if (!$lesson) {
                    App::$app->loadError('404');
                    die;
                }
                if (isset($_GET['word'])) {
                    $lesson['vocabulary'] = $this->model('LessonModel')->findVocabulary($lesson['vocabulary'], $_GET['word']);
                    $this->data['sub_content']['word'] = $_GET['word'];
                }
                $paged = Helpers::handlePaged(10, $lesson['vocabulary']);
                $this->data['sub_content']['pagedData'] = $paged['pagedData'];
                $this->data['sub_content']['pagination'] = $paged['pagination'];
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
    public function load_user()
    {
        $role = $_POST['role'];
        $users = $this->model('UserModel')->getUsers();
        if ($role == 4) {
            for ($i = 0; $i < count($users); $i++) {
                $users[$i]['slug'] = Helpers::to_slug($users[$i]['name']);
                $users[$i]['role'] = Helpers::display_role($users[$i]['role']);
                $users[$i]['create_at'] = Helpers::displayTime($users[$i]['create_at']);
            }
            echo json_encode($users);
            die;
        }
        $data = [];
        $i = 0;
        foreach ($users as $val) {
            if ($val['role'] == $role) {
                $data[$i] = $val;
                $data[$i]['slug'] = Helpers::to_slug($data[$i]['name']);
                $data[$i]['role'] = Helpers::display_role($role);
                $data[$i]['create_at'] = Helpers::displayTime($data[$i]['create_at']);
                $i++;
            }
        }
        echo json_encode($data);
    }
    public function contact()
    {
        if (Session::data('User') == null) {
            echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
            exit;
        } else {
            if (Session::data('User')['role'] == 1 || Session::data('User')['role'] == 3) {
                if (isset($_POST['delete'])) {
                    $this->db->table('contact')->where('id', '=', $_POST['id'])->delete();
                }
                if (isset($_POST['mark'])) {
                    $data = ['status' => 1];
                    $this->db->table('contact')->where('id', '=', $_POST['id'])->update($data);
                }
                $contact = $this->db->table('contact')->orderBy('id', 'DESC')->get();
                $paged = Helpers::handlePaged(10, $contact);
                $this->data['sub_content']['pagedData'] = $paged['pagedData'];
                $this->data['sub_content']['pagination'] = $paged['pagination'];
                $this->data['page_title'] = 'Quản lý liên hệ';
                $this->data['content'] = 'admin/contact/index';
                $this->render('layouts/client-layout', $this->data);
            } else {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            }
        }
    }
    public function report()
    {
        if (Session::data('User') == null) {
            echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
            exit;
        } else {
            if (Session::data('User')['role'] == 1 || Session::data('User')['role'] == 3) {
                if (isset($_POST['delete'])) {
                    $this->db->table('report')->where('report_id', '=', $_POST['report_id'])->delete();
                    Helpers::redirect_to('/bang-dieu-khien/quan-ly-bao-cao.html');
                }
                if (isset($_POST['mark'])) {
                    $data = ['is_handled' => 1];
                    $this->db->table('report')->where('report_id', '=', $_POST['report_id'])->update($data);
                    Helpers::redirect_to('/bang-dieu-khien/quan-ly-bao-cao.html');
                }
                $report = $this->db->table('report')->orderBy('report_id', 'DESC')->get();
                for ($i = 0; $i < count($report); $i++) {
                    $report[$i]['reason'] = Helpers::display_type_report($report[$i]['type']);
                    $report[$i]['name'] = $this->model('UserModel')->getUserByID($report[$i]['user_id'])['name'];
                    $report[$i]['reported_name'] = $this->model('UserModel')->getUserByID($report[$i]['reported_user_id'])['name'];
                }
                $paged = Helpers::handlePaged(10, $report);
                $this->data['sub_content']['pagedData'] = $paged['pagedData'];
                $this->data['sub_content']['pagination'] = $paged['pagination'];
                $this->data['page_title'] = 'Quản lý báo cáo';
                $this->data['content'] = 'admin/report/index';
                $this->render('layouts/client-layout', $this->data);
            } else {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            }
        }
    }
    public function test()
    {
        if (Session::data('User') == null) {
            echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
            exit;
        } else {
            if (Session::data('User')['role'] == 2 || Session::data('User')['role'] == 3) {
                if (isset($_POST['delete'])) {
                    $this->db->table('questions')->where('exam_id', '=', $_POST['id'])->delete();
                    $this->db->table('exams')->where('exam_id', '=', $_POST['id'])->delete();
                    Helpers::redirect_to('/bang-dieu-khien/quan-ly-de-thi.html');
                }
                if (isset($_GET['tra-cuu'])) {
                    $keyword = $_GET['tra-cuu'];
                    $this->data['sub_content']['keyword'] = $keyword;
                    $exams = $this->db->table('exams')->where('title', 'LIKE', '%' . $keyword . '%')->orderBy('exam_id', 'DESC')->get();
                } else {
                    $exams = $this->db->table('exams')->orderBy('exam_id', 'DESC')->get();
                }
                $paged = Helpers::handlePaged(10, $exams);
                $this->data['sub_content']['pagedData'] = $paged['pagedData'];
                $this->data['sub_content']['pagination'] = $paged['pagination'];
                $this->data['page_title'] = 'Quản lý đề thi';
                $this->data['content'] = 'admin/test/index';
                $this->render('layouts/client-layout', $this->data);
            } else {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            }
        }
    }
    public function test_edit($exam_id)
    {
        if (Session::data('User') == null) {
            echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
            exit;
        } else {
            if (Session::data('User')['role'] == 2 || Session::data('User')['role'] == 3) {
                $exam = $this->db->table('exams')->where('exam_id', '=', $exam_id)->first();
                $exam['question'] = $this->db->table('questions')->where('exam_id', '=', $exam_id)->get();
                if (isset($_POST['submit'])) {
                    $arr = ['time' => $_POST['time']];
                    $this->db->table('exams')->where('exam_id', '=', $exam_id)->update($arr);
                    for ($i = 0; $i < $exam['size']; $i++) {
                        $arr_question = [
                            'content' => $_POST['content_' . $i],
                            'answer_1' => $_POST['answer_1_' . $i],
                            'answer_2' => $_POST['answer_2_' . $i],
                            'answer_3' => $_POST['answer_3_' . $i],
                            'answer_4' => $_POST['answer_4_' . $i],
                            'correct_answer' => $_POST['correct_' . $i]
                        ];
                        $this->db->table('questions')->where('question_id', '=', $_POST['question_id_' . $i])->update($arr_question);
                        Helpers::redirect_to('/bang-dieu-khien/quan-ly-de-thi.html');
                    }
                }
                $this->data['sub_content']['exam'] = $exam;
                $this->data['page_title'] = 'Chỉnh sửa đề thi';
                $this->data['content'] = 'admin/test/edit';
                $this->render('layouts/client-layout', $this->data);
            } else {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            }
        }
    }
}
