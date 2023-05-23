<?php
/**
 * Summary of User
 */
class User extends Controller{
    public $data = [];
    public $model_home;
    public function index(){
        $this->data['sub_content']['arr'] = array ();
        $this->data['content'] = 'home/index';
        $this->render('layouts/client-layout', $this->data);
    }
    public function login(){
        $this->data['page_title'] = 'Đăng nhập diễn đàn';
        $this->data['content'] = 'user/login';
        $this->render('layouts/client-layout', $this->data);
    }
    public function register(){
        $this->data['page_title'] = 'Đăng ký diễn đàn';
        
        // Validate
        $request = new Request();
        if ($request->isPost()){
            $request->rules([
                'username' => 'required|min:5|max:10|unique:users:username',
                'password' => 'required|min:6',
                'email' => 'required|email|unique:users:email',
                'name' => 'required'
            ]);
            $request->message([
                'username.required'=> '*Không được để trống tên đăng nhập!',
                'username.min' => '*Tên đăng nhập phải ít nhất 5 kí tự!',
                'username.max' => '*Tên đăng nhập chỉ được tối đa 10 kí tự!',
                'username.unique' => '*Tên đăng nhập đã tồn tại!',
                'password.required'=> '*Không được để trống mật khẩu!',
                'password.min' => '*Mật khẩu phải ít nhất 6 kí tự',
                'email.required'=> '*Không được để trống địa chỉ Email!',
                'email.email' => '*Định dạng email không hợp lệ!',
                'email.unique' => '*Email đã tồn tại',
                'name.required' => '*Họ tên không được để trống'
            ]);
            $validate = $request->validate();
            $validate = $request->validate();
            if(!$validate){
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = 'Đã xảy ra lỗi, vui lòng kiểm tra lại!';
            }else{
                $this->data['sub_content']['msg'] = 'Tạo người dùng thành công';
            }
        }
        $this->data['content'] = 'user/register';
        $this->render('layouts/client-layout', $this->data);
    }
}
?>