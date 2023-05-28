<?php

class LessonModel extends Model
{
    private $_table = 'lessons';
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
    public function getLessonByGrade($grade = 10) {
        if ($grade == 10 || $grade == 11 || $grade == 12){
            $data = $this->db->table($this->_table)->where('grade', '=', $grade)->get();
            return $data;
        }
        return false;
    }
    public function getLessonSimilarGrade($id) {
        $id = filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS);
        $grade = $this->db->table($this->_table)->select('grade')->where('lesson_id', '=', $id)->first();
        $data = $this->db->table($this->_table)->where('grade', '=', $grade['grade'])->where('lesson_id', '!=', $id)->get();
        return $data;
    }
    public function getLessonById($id) {
        $id = filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = $this->db->table($this->_table)->where('lesson_id', '=', $id)->first();
        if ($data != null){
            $data['grammar'] = $this->db->table('grammars')->where('lesson_id', '=', $id)->get();
            $data['vocabulary'] = $this->db->table('vocabulary')->where('lesson_id', '=', $id)->get();
        }
        return $data;
    }
}
?>