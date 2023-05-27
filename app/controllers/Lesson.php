<?php

/**
 * Summary of Lesson
 */
class Lesson extends Controller
{
    public $data = [];
    private $model = 'UserModel';
    public function index (){
        $this->data['page_title'] = 'Danh sách bài học';
        $this->data['content'] = 'lesson/index';
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
    public function detail() {
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