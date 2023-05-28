<?php

/**
 * Summary of User
 */
class Forum extends Controller
{
    public $data = [];
    private $model = 'PostModel';
    public function index()
    {
        $this->data['page_title'] = 'Danh sách người dùng';
        $this->data['content'] = 'forum/index';
        $this->render('layouts/client-layout', $this->data);
    }
    public function list()
    {
        $this->data['page_title'] = 'Danh sách người dùng';
        $this->data['content'] = 'forum/list';
        $this->render('layouts/client-layout', $this->data);
    }
    public function detail()
    {
        $this->data['page_title'] = 'Danh sách người dùng';
        $this->data['content'] = 'forum/detail';
        $this->render('layouts/client-layout', $this->data);
    }
}
?>