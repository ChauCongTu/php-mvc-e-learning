<?php
class Home extends Controller{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('Coupon');
    }
    public function index(){
        $coupon = array(
            'Used' => 1
        );
        $this->data['page_title'] = 'Mua sắm trực tuyến với giá ưu đãi';
        $this->data['content'] = 'home/index';
        $arr = $this->model('CouponModel')->getList();
        $this->data['sub_content']['arr'] = $arr;
        $this->render('layouts/client-layout', $this->data);
    }
    public function logout(){
        var_dump(Session::delete('user'));
    }

    public function login(){
        
    }
}
?>
