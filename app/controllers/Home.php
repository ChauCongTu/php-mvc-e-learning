<?php
class Home extends Controller{
    public $data = [];
    public $model_home;
    public function index(){
        $this->data['page_title'] = 'Trang Web học Tiếng Anh trực tuyến';
        $this->data['content'] = 'home/index';
        $this->render('layouts/client-layout', $this->data);
    }
}
?>
