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
    public function getLesson () {
        $data = $this->db->table($this->_table)->get();
        for ($i = 0; $i < count($data); $i++) {
            if ($data != null){
                $data[$i]['grammar'] = $this->db->table('grammars')->where('lesson_id', '=', $data[$i]['lesson_id'])->get();
                $data[$i]['vocabulary'] = $this->db->table('vocabulary')->where('lesson_id', '=', $data[$i]['lesson_id'])->get();
            }
        }
        return $data;
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
    public function deleteLesson($lesson_id) {
        $lesson_id = filter_var($lesson_id, FILTER_SANITIZE_NUMBER_INT);
        $this->db->table('grammars')->where('lesson_id', '=', $lesson_id)->delete();
        $this->db->table('vocabulary')->where('lesson_id', '=', $lesson_id)->delete();
        $this->db->table('lessons')->where('lesson_id', '=', $lesson_id)->delete();
    }
    public function addVocab($lesson_id, $word, $spelling, $meaning, $example, $synonyms = '', $antonyms = ''){
        $lesson_id = filter_var($lesson_id, FILTER_SANITIZE_NUMBER_INT);
        $word = filter_var($word, FILTER_SANITIZE_SPECIAL_CHARS);
        $spelling = filter_var($spelling, FILTER_SANITIZE_SPECIAL_CHARS);
        $meaning = filter_var($meaning, FILTER_SANITIZE_SPECIAL_CHARS);
        $synonyms = filter_var($synonyms, FILTER_SANITIZE_SPECIAL_CHARS);
        $antonyms = filter_var($antonyms, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = [
            'lesson_id' => $lesson_id,
            'word' => $word,
            'spelling' => $spelling,
            'meaning' => $meaning,
            'example' => $example,
            'synonyms' => $synonyms,
            'antonyms' => $antonyms
        ];
        $this->db->table('vocabulary')->insert($data);
    }
    public function updateVocab($vocab_id, $word, $spelling, $meaning, $example, $synonyms = '', $antonyms = ''){
        $vocab_id = filter_var($vocab_id, FILTER_SANITIZE_NUMBER_INT);
        $word = filter_var($word, FILTER_SANITIZE_SPECIAL_CHARS);
        $spelling = filter_var($spelling, FILTER_SANITIZE_SPECIAL_CHARS);
        $meaning = filter_var($meaning, FILTER_SANITIZE_SPECIAL_CHARS);
        $synonyms = filter_var($synonyms, FILTER_SANITIZE_SPECIAL_CHARS);
        $antonyms = filter_var($antonyms, FILTER_SANITIZE_SPECIAL_CHARS);
        $data = [
            'word' => $word,
            'spelling' => $spelling,
            'meaning' => $meaning,
            'example' => $example,
            'synonyms' => $synonyms,
            'antonyms' => $antonyms
        ];
        $this->db->table('vocabulary')->where('vocab_id', '=', $vocab_id)->update($data);
    }
    public function deleteVocab($vocab_id) {
        $vocab_id = filter_var($vocab_id, FILTER_SANITIZE_NUMBER_INT);
        $this->db->table('vocabulary')->where('vocab_id', '=', $vocab_id)->delete();
    }
}
?>