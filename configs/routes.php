<?php
$routes['default_controller'] = 'home';
$routes['default_actions'] = 'index';

/*
 * Đường dẫn ảo => đường dẫn thật
 * 
 */
$routes['danh-muc-san-pham'] = 'product/index';
$routes['(.+)-category'] = 'product/categories/$1';


$routes['dang-nhap.html'] = 'user/login';
$routes['dang-ky.html'] = 'user/register';
$routes['dang-xuat.html'] = 'user/logout';

// Lesson
$routes['bai-hoc'] = 'lesson';
$routes['bai-hoc/(.+)_(\d+).html'] = 'lesson/detail/$1/$2';
$routes['bai-hoc/danh-sach-da-luu'] = 'Lesson/SavedList';

// Forum
$routes['dien-dan'] = 'forum';
$routes['dien-dan/(.+)_(\d+)'] = 'forum/list/$1/$2';
$routes['dien-dan/(.+)_(\d+).html'] = 'forum/detail/$1/$2';
$routes['dien-dan/them-bai-viet_(\d+).html'] = 'forum/create/$1';
$routes['dien-dan/chinh-sua-bai-viet_(\d+).html'] = 'forum/edit/$1';
$routes['dien-dan/binh-luan/(\d+)'] = 'forum/comment/$1';
$routes['dien-dan/chinh-sua-binh-luan/(\d+)'] = 'forum/edit_comment/$1';
$routes['dien-dan/xoa-binh-luan/(\d+)'] = 'forum/delete_comment/$1';

// Test
$routes['thi-truc-tuyen'] = 'test';
$routes['thi-truc-tuyen/ket-qua'] = 'test/submit_result';
$routes['thi-truc-tuyen/bo-de-(\d+).html'] = 'test/list/$1';
$routes['thi-truc-tuyen/them/(\d+).html'] = 'test/add/$1';
$routes['thi-truc-tuyen/(.+)_(\d+).html'] = 'test/detail/$1/$2';
$routes['thi-truc-tuyen/lich-su.html'] = 'test/history';

// User
$routes['nguoi-dung'] = 'user';
$routes['nguoi-dung/(.+)_(\d+).html'] = 'user/profile/$1/$2';
$routes['nguoi-dung/chinh-sua-thong-tin/(.+)_(\d+).html'] = 'user/profileEdit/$1/$2';
$routes['kich-hoat/(\d+).html'] = 'user/active/$1';
$routes['quen-mat-khau.html'] = 'user/forgotPassword';

// Admin
$routes['bang-dieu-khien'] = 'admin';
$routes['bang-dieu-khien/quan-ly-dien-dan.html'] = 'admin/forum';
$routes['bang-dieu-khien/quan-ly-nguoi-dung.html'] = 'user';
$routes['bang-dieu-khien/quan-ly-bai-hoc.html'] = 'admin/lesson';
$routes['bang-dieu-khien/quan-ly-bai-hoc/(.+)_(\d+).html'] = 'admin/lesson_detail/$1/$2';



// Translate 
$routes['dich/anh-viet'] = 'home/translate/anh-viet';
$routes['dich/viet-anh'] = 'home/translate/viet-anh';
?>