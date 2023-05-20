<?php

class CouponModel extends Model{
    private $_table = 'coupon';
    function __construct(){

    }
    function tableFill(){
        return $this->_table;
    }
    function fieldFill(){
        return '*';
    }
    function primaryKey()
    {
        return 'coupon';
    }
    public function getList(){
        $data = $this->db->table($this->_table)->get();
        return $data;
    }
}
?>