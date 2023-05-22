<?php
class Home extends Controller{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('Coupon');
    }
    public function index(){
        $lesson = array(
            'title' => 'Unit 2: Family',
            'grade' => 2
        );
        $this->data['page_title'] = 'Mua sắm trực tuyến với giá ưu đãi';
        $this->data['content'] = 'home/index';
        $arr = $this->db->table('lessons')->get();
        $this->data['sub_content']['arr'] = $arr;
        $this->render('layouts/client-layout', $this->data);
    }
}
?>
