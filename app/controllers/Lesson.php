<?php

/**
 * Summary of Lesson
 */
class Lesson extends Controller
{
    public $data = [];
    private $model = 'LessonModel';
    public function index()
    {
        $this->data['page_title'] = 'Danh sách bài học';
        $this->data['content'] = 'lesson/index';
        if (Session::data('User') != null) {
            $this->data['sub_content']['numbSaved'] = count($this->model($this->model)->getSavedList(Session::data('User')['user_id']));
        }
        $this->data['sub_content']['grade10lesson'] = $this->model($this->model)->getLessonByGrade(10, 4);
        $this->data['sub_content']['grade11lesson'] = $this->model($this->model)->getLessonByGrade(11, 4);
        $this->data['sub_content']['grade12lesson'] = $this->model($this->model)->getLessonByGrade(12, 4);
        $this->render('layouts/client-layout', $this->data);
    }
    /**
     * Lesson list controller
     * Input: grade
     * Output: Lesson of grade
     * 
     */
    public function list()
    {
    }
    /**
     * Lesson detail controll
     * Input: lesson_id
     * Output: Lesson
     */
    public function detail($slug = '', $id)
    {
        $lesson = $this->model($this->model)->getLessonById($id);
        $this->data['sub_content']['other_lesson'] = $this->model($this->model)->getLessonSimilarGrade($id);
        $this->data['sub_content']['lesson'] = $lesson;
        $this->data['page_title'] = 'Unit 1: Family Life | Grade 10';
        $this->data['content'] = 'lesson/detail';
        $this->render('layouts/client-layout', $this->data);
    }
    public function vocabulary($vocab_id = '')
    {
        $this->data['page_title'] = 'Unit 1: Family Life | Grade 10';
        $this->data['content'] = 'lesson/vocabulary';
        $this->render('layouts/client-layout', $this->data);
    }
    public function grammar($grammar_id = '')
    {
        $this->data['page_title'] = 'Unit 1: Family Life | Grade 10';
        $this->data['content'] = 'lesson/grammar';
        $this->render('layouts/client-layout', $this->data);
    }
    public function Save($lesson_id = 0)
    {
        if (Session::data('User') == null) {
            Helpers::redirect_to("/dang-nhap.html");
        } else {
            if (Session::data('User')['user_id'] != null) {
                $user_id = Session::data('User')['user_id'];
                if (!$this->model('LessonModel')->checkSaved($user_id, $lesson_id)) {
                    $this->model('LessonModel')->Save($user_id, $lesson_id);
                }
            }
        }
        Helpers::redirect_to("/bai-hoc");
    }
    public function unSave($lesson_id = 0)
    {
        if (Session::data('User') == null) {
            Helpers::redirect_to("/dang-nhap.html");
        } else {
            if (Session::data('User')['user_id'] != null) {
                $user_id = Session::data('User')['user_id'];
                if ($this->model('LessonModel')->checkSaved($user_id, $lesson_id)) {
                    $this->model('LessonModel')->removeSaved($user_id, $lesson_id);
                }
            }
        }
        Helpers::redirect_to("/bai-hoc/danh-sach-da-luu");
    }
    public function SavedList()
    {
        if (Session::data('User') == null) {
            Helpers::redirect_to("/dang-nhap.html");
        } else {
            if (Session::data('User')['user_id'] != null) {
                $user_id = Session::data('User')['user_id'];
                $savedList = $this->model('LessonModel')->getSavedList($user_id, 5);
                $data = [];
                for($i = 0; $i < count($savedList); $i++) {
                    $data[$i] = $this->model('LessonModel')->getLessonById($savedList[$i]['lesson_id']);
                    $data[$i]['saved_at'] = $savedList[$i]['created_at'];
                }
                $this->data['sub_content']['savedList'] = $data;
            }
            $this->data['page_title'] = 'Danh sách bài học đã lưu';
            $this->data['content'] = 'lesson/savedlist';
            $this->render('layouts/client-layout', $this->data);
        }
    }
    public function LoadLesson()
    {
        $grade = $_POST['grade'];
        $listLesson = $this->model($this->model)->getLessonByGrade($grade);
        for ($i = 0; $i < count($listLesson); $i++) {
            $listLesson[$i]['created_at'] = Helpers::displayTime($listLesson[$i]['created_at']);
            $listLesson[$i]['slug'] = Helpers::to_slug($listLesson[$i]['title']);
        }
        echo json_encode($listLesson);
    }
}
