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
        // if (isset($_POST['translate'])) {
        //     $this->data['sub_content']['translated_text'] = Helpers::translate($_POST['textToTranslate'], $from, $to);
        //     // if (!Helpers::translate($_POST['textToTranslate'], $from, $to)) {
        //     //     $this->data['sub_content']['translated_text'] = Helpers::translate($_POST['textToTranslate'], $from, $to);
        //     // } else {
        //     //     $this->data['sub_content']['translated_text'] = 'Có lỗi xảy ra, vui lòng thử lại!';
        //     // }
        //     $this->data['sub_content']['textToTranslate'] = $_POST['textToTranslate'];
        // }
        $this->data['content'] = 'home/translate';
        $this->render('layouts/client-layout', $this->data);
    }
    public function translate_ajax()
    {
        $inputVal = $_POST['inputVal'];
        $type = $_POST['type'];
        if ($type == 0) {
            $from = 'vi';
            $to = 'en';
        } else {
            $from = 'en';
            $to = 'vi';
        }
        $data = ['result' => Helpers::translate($inputVal, $from, $to)];
        if (!$data['result']) {
            $data['result'] = ' ';
        }
        echo json_encode($data);
    }
    public function sendContact()
    {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_SPECIAL_CHARS);
        $data = [
            'name' => $name,
            'email' => $mail,
            'content' => $content
        ];
        $this->db->table('contact')->insert($data);
    }
    public function search()
    {
        $postData = [];
        $this->data['sub_content']['posts'] = [];
        $this->data['sub_content']['users'] = [];
        $this->data['sub_content']['vocabulary'] = [];
        if ($_GET['key']) {
            $key = filter_var($_GET['key'], FILTER_SANITIZE_SPECIAL_CHARS);
            $this->data['sub_content']['keyword'] = $key;
            $posts = $this->db->table('posts')->select('post_id')->where('title', 'LIKE', '%' . $key . '%')->orderBy('post_id', 'DESC')->get();
            $users = $this->db->table('users')->where('name', 'LIKE', '%' . $key . '%')->orderBy('user_id', 'DESC')->get();
            $vocabulary = $this->db->table('vocabulary')->where('vocab_id', 'LIKE', '%' . $key . '%')->orderBy('vocab_id', 'DESC')->get();
            for ($i = 0; $i < count($posts); $i++) {
                $postData[$i] = $this->model('ForumModel')->getFullPostById($posts[$i]['post_id']);
            }
            $this->data['sub_content']['posts'] = $postData;
            $this->data['sub_content']['users'] = $users;
            $this->data['sub_content']['vocabulary'] = $vocabulary;
        }
        $this->data['page_title'] = 'Tìm kiếm';
        $this->data['content'] = 'home/search';
        $this->render('layouts/client-layout', $this->data);
    }
}
