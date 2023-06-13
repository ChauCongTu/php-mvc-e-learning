<?php

/**
 * Summary of User
 */
class Admin extends Controller
{
    public $data = [];
    private $model = 'AdminModel';
    private $errors = [];
    public function index()
    {
        if (Session::data('User') == null) {
            echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
            exit;
        } else {
            if (Session::data('User')['role'] < 1) {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            }
            else {
                $this->data['page_title'] = 'Bảng điều khiển';
                $this->data['content'] = 'admin/index';
                $this->render('layouts/client-layout', $this->data);
            }
        }        
    }
    public function forum()
    {
        if (Session::data('User') == null) {
            echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
            exit;
        } else {
            if (Session::data('User')['role'] == 1 || Session::data('User')['role'] == 3) {
                if (isset($_POST['add'])) {
                    $request = new Request();
                    $request->rules([
                        'name' =>'required'
                    ]);
                    $request->message([
                        'name.required' => 'Không thành công! Bạn chưa nhập tên danh mục'
                    ]);
                    $validate = $request->validate();
                    if (!$validate) {
                        $this->data['sub_content']['errors'] = $request->errors();
                    }
                    else {
                        $this->model('ForumModel')->createCategory($_POST['name']);
                    }
                }
                if (isset($_POST['edit'])) {
                    $request = new Request();
                    $request->rules([
                        'name' =>'required'
                    ]);
                    $request->message([
                        'name.required' => 'Không thành công! Bạn chưa nhập tên danh mục'
                    ]);
                    $validate = $request->validate();
                    if (!$validate) {
                        $this->data['sub_content']['errors'] = $request->errors();
                    }
                    else {
                        $this->model('ForumModel')->updateCategory($_POST['id'], $_POST['name']);
                    }
                }
                if (isset($_POST['del'])) {
                    $this->model('ForumModel')->deleteCategory($_POST['id']);
                }
                $categories = $this->model('ForumModel')->getCategories();
                $recordsPerPage = 10;
                $totalRows = count($categories);
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                
                $start = ($currentPage - 1) * $recordsPerPage;
                $end = $start + $recordsPerPage;
                
                $pagedData = array_slice($categories, $start, $recordsPerPage);
                // Pagination
                $pagination = array(
                    'total_rows' => $totalRows,
                    'recordsPerPage' => $recordsPerPage,
                    'currentPage' => $currentPage
                );
                $this->data['sub_content']['categories'] = $pagedData;
                $this->data['sub_content']['pagination'] = $pagination;
                $this->data['page_title'] = 'Quản lý danh mục diễn đàn';
                $this->data['content'] = 'admin/forum';
                $this->render('layouts/client-layout', $this->data);
            }
            else {
                echo '<h1 style="text-align:center">Không đủ thẩm quyền</h1>';
                exit;
            }
        }        
    }
}
