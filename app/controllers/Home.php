<?php
class Home extends Controller{
    public $data = [];
    public $model_home;
    public function index(){
        $this->data['page_title'] = 'Mua sắm trực tuyến với giá ưu đãi';
        $this->data['sub_content']['arr'] = array ();
        $this->data['content'] = 'home/index';
        $this->render('layouts/client-layout', $this->data);
    }
}
?>
