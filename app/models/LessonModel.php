<?php

class LessonModel extends Model
{
    private $_table = 'lesson';
    function tableFill()
    {
        return $this->_table;
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'lesson_id';
    }
    
}
?>