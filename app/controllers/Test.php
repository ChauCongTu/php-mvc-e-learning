<?php
class Test extends Controller
{
    public $data = [];
    public $model_home;
    public function index()
    {
        $this->data['sub_content']['lastest_posts'] = $this->model('ForumModel')->getLastestPosts();
        $this->data['sub_content']['categories'] = $this->model('ForumModel')->getCategories(10);
        $this->data['sub_content']['most_comment_posts'] = $this->model('ForumModel')->getMostCommentPosts();
        // echo '<pre>';
        // print_r($this->data['sub_content']['categories']);
        // echo '</pre>';
        $this->data['page_title'] = 'Thi Tiếng Anh trực tuyến';
        $this->data['content'] = 'test/index';
        $this->render('layouts/client-layout', $this->data);
    }
    public function detail($exam_id)
    {
        if (isset($_GET['question'])) {
            $question = $_GET['question'];
        }
        else {
            $question = 1;
        }
        
        $this->data['sub_content']['lastest_posts'] = $this->model('ForumModel')->getLastestPosts();
        $this->data['sub_content']['categories'] = $this->model('ForumModel')->getCategories(10);
        $this->data['sub_content']['most_comment_posts'] = $this->model('ForumModel')->getMostCommentPosts();
        // echo '<pre>';
        // print_r($this->data['sub_content']['categories']);
        // echo '</pre>';
        $this->data['page_title'] = 'Trang Web học Tiếng Anh trực tuyến';
        $this->data['content'] = 'home/index';
        $this->render('layouts/client-layout', $this->data);
    }
}
