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

// Forum
$routes['dien-dan'] = 'forum';
$routes['dien-dan/(.+)_(\d+)'] = 'forum/list/$1/$2';
$routes['dien-dan/(.+)_(\d+).html'] = 'forum/detail/$1/$2';
$routes['dien-dan/them-bai-viet_(\d+).html'] = 'forum/create/$1';
$routes['dien-dan/chinh-sua-bai-viet_(\d+).html'] = 'forum/edit/$1';
$routes['dien-dan/binh-luan/(\d+)'] = 'forum/comment/$1';
$routes['dien-dan/chinh-sua-binh-luan/(\d+)'] = 'forum/edit_comment/$1';
$routes['dien-dan/xoa-binh-luan/(\d+)'] = 'forum/delete_comment/$1';


// Translate 
$routes['dich/anh-viet'] = 'home/translate/anh-viet';
$routes['dich/viet-anh'] = 'home/translate/viet-anh';
?>