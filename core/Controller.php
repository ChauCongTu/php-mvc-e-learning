<?php
class Controller{
    public $db;
    public function model($model){
        if(file_exists(_DIR_ROOT.'/app/models/'.$model.'.php')){
            require_once _DIR_ROOT.'/app/models/'.$model.'.php';
            if(class_exists($model)){
                $model = new $model();
                return $model;
            }
        }
        return false;
    }
    public function render($view, $data = []){
        extract($data);
        ob_start();
        if(file_exists(_DIR_ROOT.'/app/views/'.$view.'.php')){
            require _DIR_ROOT.'/app/views/'.$view.'.php';
        }
        $contentView = ob_get_contents();
        ob_end_clean();
        $template = new Template();
        $template->run($contentView, $data);
    }
}