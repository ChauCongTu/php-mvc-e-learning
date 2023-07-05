<?php

/**
 * Summary of User
 */
class Forum extends Controller
{
    public $data = [];
    private $model = 'ForumModel';
    private $errors = [];
    public function index()
    {
        $categories = $this->model($this->model)->getCategories();
        $this->data['sub_content']['categories'] = $categories;
        $this->data['sub_content']['stats'] = $this->model($this->model)->getStats();
        $this->data['page_title'] = 'Danh mục diễn đàn';
        $this->data['content'] = 'forum/index';
        $this->render('layouts/client-layout', $this->data);
    }
    public function list($slug, $category_id)
    {
        $posts = $this->model($this->model)->getCategoryById($category_id);
        if (!isset($posts['category_id'])) {
            App::$app->loadError();
            exit;
        }

        $recordsPerPage = 10;
        $totalRows = count($posts['post']);
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        
        $start = ($currentPage - 1) * $recordsPerPage;
        $end = $start + $recordsPerPage;
        
        $pagedData = array_slice($posts['post'], $start, $recordsPerPage);
        // Pagination
        $pagination = array(
            'total_rows' => $totalRows,
            'recordsPerPage' => $recordsPerPage,
            'currentPage' => $currentPage
        );
        // Send data to view
        $this->data['sub_content']['posts'] = $posts;
        $this->data['sub_content']['pagedData'] = $pagedData;
        $this->data['sub_content']['pagination'] = $pagination;
        $this->data['sub_content']['stats'] = $this->model($this->model)->getStats();
        $this->data['page_title'] = $posts['category_name'];
        $this->data['content'] = 'forum/list';
        $this->render('layouts/client-layout', $this->data);
    }
    public function detail($slug, $post_id)
    {
        $post = $this->model($this->model)->getFullPostById($post_id);
        if (!isset($post['post_id'])) {
            App::$app->loadError();
            exit;
        }
        // Comment
        $this->data['sub_content']['errors'] = $this->errors;
        $this->data['sub_content']['post'] = $post;
        $this->data['sub_content']['post_same_category'] = $this->model($this->model)->getPostsSameCategory($post_id);
        $this->data['page_title'] = $post['title'];
        $this->data['content'] = 'forum/detail';
        $this->render('layouts/client-layout', $this->data);
    }
    public function create($category_id)
    {
        $category_id = filter_var($category_id, FILTER_SANITIZE_SPECIAL_CHARS);
        if (Session::data('User') != null){
            $user_id = Session::data('User')['user_id'];
            $category = $this->model($this->model)->getCategoryById($category_id);
            $this->data['sub_content']['category'] = $category['category_name'];
            if (isset($_POST['create_submit'])){
                $request = new Request();
                $request->rules([
                    'title' => 'required',
                    'content' => 'required'
                ]);
                $request->message([
                    'title.required' => '*Vui lòng nhập tiêu đề bài viết',
                    'content.required' => '*Vui lòng nhập nội dung bài viết'
                ]);
                $validate = $request->validate();
                if (!$validate) {
                    $this->data['sub_content']['errors'] = $request->errors();
                }
                else {
                    $title = addslashes($_POST['title']);
                    $content = $_POST['content'];
                    $post = array([
                        'user_id' => $user_id,
                        'category_id' => $category_id,
                        'title' => $title,
                        'content' => $content
                    ]);
                    $this->db->table('posts')->insert($post[0]);
                    $this->data['sub_content']['msg'] = 'Đăng bài thành công';
                    Helpers::redirect_to('/dien-dan');
                }
            }
        }
        $this->data['page_title'] = 'Thêm bài viết';
        $this->data['content'] = 'forum/create';
        $this->render('layouts/client-layout', $this->data);
    }
    public function edit($post_id)
    {
        $post_id = filter_var($post_id, FILTER_SANITIZE_SPECIAL_CHARS);
        if (Session::data('User') != null){
            $user_id = Session::data('User')['user_id'];
            $post = $this->model($this->model)->getFullPostById($post_id);
            $this->data['sub_content']['post'] = $post;
            if (isset($_POST['edit_submit'])){
                $request = new Request();
                $request->rules([
                    'title' => 'required',
                    'content' => 'required'
                ]);
                $request->message([
                    'title.required' => '*Vui lòng nhập tiêu đề bài viết',
                    'content.required' => '*Vui lòng nhập nội dung bài viết'
                ]);
                $validate = $request->validate();
                if (!$validate) {
                    $this->data['sub_content']['errors'] = $request->errors();
                }
                else {
                    $title = addslashes($_POST['title']);
                    $content = $_POST['content'];
                    $data_edit = array([
                        'title' => $title,
                        'content' => $content
                    ]);
                    $this->db->table('posts')->where('post_id', '=', $post_id)->update($data_edit[0]);
                    Helpers::redirect_to('/dien-dan/'.Helpers::to_slug($post['title']).'_'.$post['post_id'].'.html');
                }
            }
        }
        $this->data['page_title'] = 'Chỉnh sửa bài viết';
        $this->data['content'] = 'forum/edit';
        $this->render('layouts/client-layout', $this->data);
    }
    public function delete ($post_id){
        $post_id = filter_var($post_id, FILTER_SANITIZE_NUMBER_INT);
        $post = $this->model($this->model)->getFullPostById($post_id);
        if ($post != null) {
            $this->db->table('comments')->where('post_id', '=', $post_id)->delete();
            $this->db->table('posts')->where('post_id', '=', $post_id)->delete();
            Helpers::redirect_to('/dien-dan/');
        }
        else {
            Helpers::redirect_to('/dien-dan/'.Helpers::to_slug($post['title']).'_'.$post['post_id'].'.html');
        }
    }
    public function comment ($post_id) {
        $post_id = filter_var($post_id, FILTER_SANITIZE_NUMBER_INT);
        $post = $this->model($this->model)->getFullPostById($post_id);
        $user = $this->model($this->model)->getUsers(Session::data('User')['user_id']);
        if (Session::data('User') != null) {
            if (isset($_POST['cmt_submit'])){
                $request = new Request();
                $request->rules([
                    'content' => 'required'
                ]);
                $request->message([
                    'content.required' => '*Vui lòng nhập nội dung bình luận'
                ]);
                $validate = $request->validate();
                if (!$validate) {
                    $this->errors = $request->errors();
                }
                else {
                    $content = filter_var($_POST['content'], FILTER_SANITIZE_SPECIAL_CHARS);
                    $data_cmt = array(
                        'user_id' => $user['user_id'],
                        'user_name' => $user['name'],
                        'post_id' => $post_id,
                        'content' => $content
                    );
                    var_dump($data_cmt);
                    $this->db->table('comments')->insert($data_cmt);
                }
            }
        }
        Helpers::redirect_to('/dien-dan/'.Helpers::to_slug($post['title']).'_'.$post['post_id'].'.html');
    }
    public function edit_comment ($comment_id) {
        $comment_id = filter_var($comment_id, FILTER_SANITIZE_NUMBER_INT);
        $comment = $this->model($this->model)->getCommentById($comment_id);
        $post = $this->model($this->model)->getFullPostById($comment['post_id']);
        if (Session::data('User') != null) {
            if (isset($_POST['edit_cmt_submit'])){
                $request = new Request();
                $request->rules([
                    'content' => 'required'
                ]);
                $request->message([
                    'content.required' => '*Vui lòng nhập nội dung bình luận'
                ]);
                $validate = $request->validate();
                if (!$validate) {
                    $this->errors = $request->errors();
                }
                else {
                    $content = filter_var($_POST['content'], FILTER_SANITIZE_SPECIAL_CHARS);
                    $data_cmt = array(
                        'content' => $content
                    );
                    var_dump($data_cmt);
                    $this->db->table('comments')->where('comment_id', '=', $comment_id)->update($data_cmt);
                }
            }
        }
        Helpers::redirect_to('/dien-dan/'.Helpers::to_slug($post['title']).'_'.$post['post_id'].'.html');
    }
    public function delete_comment ($comment_id){
        $comment_id = filter_var($comment_id, FILTER_SANITIZE_NUMBER_INT);
        $comment = $this->model($this->model)->getCommentById($comment_id);
        $post = $this->model($this->model)->getFullPostById($comment['post_id']);
        if ($comment != null) {
            $this->db->table('comments')->where('comment_id', '=', $comment_id)->delete();
            Helpers::redirect_to('/dien-dan/'.Helpers::to_slug($post['title']).'_'.$post['post_id'].'.html');
        }
        else {
            Helpers::redirect_to('/dien-dan/'.Helpers::to_slug($post['title']).'_'.$post['post_id'].'.html');
        }
    }
}
?>