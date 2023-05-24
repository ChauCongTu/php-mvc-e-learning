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
}
?>