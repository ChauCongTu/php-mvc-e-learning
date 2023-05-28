<?php

/**
 * Summary of Lesson
 */
class Lesson extends Controller
{
    public $data = [];
    private $model = 'LessonModel';
    public function index (){
        $this->data['page_title'] = 'Danh sách bài học';
        $this->data['content'] = 'lesson/index';
        $this->data['sub_content']['grade10lesson'] = $this->model($this->model)->getLessonByGrade(10);
        $this->data['sub_content']['grade11lesson'] = $this->model($this->model)->getLessonByGrade(11);
        $this->data['sub_content']['grade12lesson'] = $this->model($this->model)->getLessonByGrade(12);
        $this->render('layouts/client-layout', $this->data);
    }
    /**
     * Lesson list controller
     * Input: grade
     * Output: Lesson of grade
     * 
     */
    public function list () {

    }
    /**
     * Lesson detail controll
     * Input: lesson_id
     * Output: Lesson
     */
    public function detail($slug = '', $id) {
        $lesson = $this->model($this->model)->getLessonById($id);
        $this->data['sub_content']['other_lesson'] = $this->model($this->model)->getLessonSimilarGrade($id);
        $this->data['sub_content']['lesson'] = $lesson;
        $this->data['page_title'] = 'Unit 1: Family Life | Grade 10';
        $this->data['content'] = 'lesson/detail';
        $this->render('layouts/client-layout', $this->data);
    }
    public function vocabulary($vocab_id = ''){
        $this->data['page_title'] = 'Unit 1: Family Life | Grade 10';
        $this->data['content'] = 'lesson/vocabulary';
        $this->render('layouts/client-layout', $this->data);
    }
    public function grammar($grammar_id = ''){
        $this->data['page_title'] = 'Unit 1: Family Life | Grade 10';
        $this->data['content'] = 'lesson/grammar';
        $this->render('layouts/client-layout', $this->data);
    }
}
?>