<?php

class TestModel extends Model
{
    private $_table = 'exams';
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
        return 'post_id';
    }

    public function getLastId(){
        $data = $this->db->table('exams')->orderBy('exam_id', 'DESC')->limit(1)->get();
        var_dump($data);
        return $data[0]['exam_id'];
    }
    public function getExam($grade, $limit = 0) {
        if ($limit == 0) {
            $data = $this->db->table('exams')->where('grade', '=', $grade)->get();
        }
        else{
            $data = $this->db->table('exams')->where('grade', '=', $grade)->limit($limit)->get();
        }
        for ($i = 0; $i < count($data); $i++){
            $data[$i]['question'] = $this->getQuestions($data[$i]['exam_id']);
            $data[$i]['numbUser'] = $this->getNumbUserDo($data[$i]['exam_id']);
        }
        return $data;
    }
    public function getResult($user_id){
        $data = $this->db->table('test_results')->where('user_id', '=', $user_id)->get();
        for($i = 0; $i < count($data); $i ++) {
            $data[$i]['title'] = $this->getExamById($data[$i]['exam_id'])['title'];
        }
        return $data;
    }
    public function getNumbUserDo($test_id) {
        $data = $this->db->table('test_results')->where('exam_id', '=', $test_id)->get();
        return count($data);
    }
    public function getExamById($exam_id) {
        $data = $this->db->table('exams')->where('exam_id', '=', $exam_id)->first();
        $data['question'] = $this->getQuestions($exam_id);
        return $data;
    }
    public function getQuestions($exam_id) {
        $data = $this->db->table('questions')->where('exam_id', '=', $exam_id)->get();
        return $data;
    }
    public function getRanking($exam_id) {
        $data = $this->db->table('test_results')->where('exam_id', '=', $exam_id)->orderBy('score', 'DESC')->limit(10)->get();
        return $data;
    }
    public function saveResult($user_id, $user_name,$exam_id, $score)
    {
        $user_id = filter_var($user_id, FILTER_SANITIZE_NUMBER_INT);
        $user_name = filter_var($user_name, FILTER_SANITIZE_SPECIAL_CHARS);
        $exam_id = filter_var($exam_id, FILTER_SANITIZE_NUMBER_INT);
        $score;
        $data = array(
            'user_id' => $user_id,
            'user_name' => $user_name,
            'exam_id' => $exam_id,
            'score' => $score
        );
        $result = $this->db->table('test_results')->insert($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function addExams($grade, $title, $size, $time)
    {
        $grade = filter_var($grade, FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($title, FILTER_SANITIZE_SPECIAL_CHARS);
        $size = filter_var($size, FILTER_SANITIZE_NUMBER_INT);
        $time = filter_var($time, FILTER_SANITIZE_NUMBER_INT);
        $data = array(
            'grade' => $grade,
            'title' => $title,
            'size' => $size,
            'time' => $time
        );
        $result = $this->db->table('exams')->insert($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function addQuestion($exam_id, $numb, $content, $answer_1, $answer_2, $answer_3, $answer_4, $correct_answer){
        $exam_id = filter_var($exam_id, FILTER_SANITIZE_NUMBER_INT);
        $numb = filter_var($numb, FILTER_SANITIZE_NUMBER_INT);
        $content = filter_var($content, FILTER_SANITIZE_SPECIAL_CHARS);
        $answer_1 = filter_var($answer_1, FILTER_SANITIZE_SPECIAL_CHARS);
        $answer_2 = filter_var($answer_2, FILTER_SANITIZE_SPECIAL_CHARS);
        $answer_3 = filter_var($answer_3, FILTER_SANITIZE_SPECIAL_CHARS);
        $answer_4 = filter_var($answer_4, FILTER_SANITIZE_SPECIAL_CHARS);
        $correct_answer = filter_var($correct_answer, FILTER_SANITIZE_NUMBER_INT);
        $data = array(
            'exam_id' => $exam_id,
            'numb' => $numb,
            'content' => $content,
            'answer_1' => $answer_1,
            'answer_2' => $answer_2,
            'answer_3' => $answer_3,
            'answer_4' => $answer_4,
            'correct_answer' => $correct_answer
        );
        $result = $this->db->table('questions')->insert($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
