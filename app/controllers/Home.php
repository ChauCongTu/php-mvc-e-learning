<?php
class Home extends Controller
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
        $this->data['page_title'] = 'Trang Web học Tiếng Anh trực tuyến';
        $this->data['content'] = 'home/index';
        $this->render('layouts/client-layout', $this->data);
    }
    public function translate($type)
    {
        if ($type == 'viet-anh') {
            $this->data['sub_content']['type_translate'] = 0;
            $from = 'vi';
            $to = 'en';
            $this->data['page_title'] = 'Công cụ dịch văn Việt - Anh';
        } else {
            $this->data['sub_content']['type_translate'] = 1;
            $from = 'en';
            $to = 'vi';
            $this->data['page_title'] = 'Công cụ dịch văn bản Anh - Việt';
        }
        if (isset($_POST['translate'])) {
            $this->data['sub_content']['translated_text'] = Helpers::translate($_POST['textToTranslate'], $from, $to);
            // if (!Helpers::translate($_POST['textToTranslate'], $from, $to)) {
            //     $this->data['sub_content']['translated_text'] = Helpers::translate($_POST['textToTranslate'], $from, $to);
            // } else {
            //     $this->data['sub_content']['translated_text'] = 'Có lỗi xảy ra, vui lòng thử lại!';
            // }
            $this->data['sub_content']['textToTranslate'] = $_POST['textToTranslate'];
        }
        $this->data['content'] = 'home/translate';
        $this->render('layouts/client-layout', $this->data);
    }
    public function ajax_translate()
    {
        echo 'Xin chào';
    }
}
