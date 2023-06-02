<?php
class Test extends Controller
{
    public $data = [];
    public $model_home;
    public function index()
    {
        $this->data['page_title'] = 'Thi Tiếng Anh trực tuyến';
        $this->data['content'] = 'test/index';
        $this->render('layouts/client-layout', $this->data);
    }
    public function list($grade = 10)
    {

        $this->data['page_title'] = 'Thi Tiếng Anh trực tuyến | Bộ đề lớp 10';
        $this->data['content'] = 'test/list';
        $this->render('layouts/client-layout', $this->data);
    }
    public function detail($exam_id)
    {
        if (isset($_POST['start'])) {
            $data = array(
                'key' => Helpers::generate_key(32),
                'exam_id' => $exam_id,
                'user_id' => Session::data('User')['user_id'],
                'answer' => []
            );
            Session::delete('test');
            Session::data('test', $data);
            $this->data['page_title'] = 'Trang Web học Tiếng Anh trực tuyến';
            $this->data['content'] = 'test/start';
            $this->render('layouts/client-layout', $this->data);
        } else {
            $question = 1;
            $this->data['page_title'] = 'Trang Web học Tiếng Anh trực tuyến';
            $this->data['content'] = 'test/detail';
            $this->render('layouts/client-layout', $this->data);
        }
    }
    public function process()
    {
        $question = $_POST['question'];

        $questions = array(
            array(
                'question_id' => 1,
                'exam_id' => 1,
                'numb' => 1,
                'content' => 'What is the plural form of the word "child"?',
                'answer_1' => 'childs',
                'answer_2' => 'children',
                'answer_3' => 'childes',
                'answer_4' => 'childers',
                'correct_answer' => 2
            ),
            array(
                'question_id' => 2,
                'exam_id' => 1,
                'numb' => 2,
                'content' => 'Which of the following animals is considered a "big cat"?',
                'answer_1' => 'Lion',
                'answer_2' => 'Leopard',
                'answer_3' => 'Cheetah',
                'answer_4' => 'All of the above',
                'correct_answer' => 4
            ),
            array(
                'question_id' => 3,
                'exam_id' => 1,
                'numb' => 3,
                'content' => 'What is the largest organ in the human body?',
                'answer_1' => 'Liver',
                'answer_2' => 'Heart',
                'answer_3' => 'Brain',
                'answer_4' => 'Skin',
                'correct_answer' => 4
            ),
            array(
                'question_id' => 4,
                'exam_id' => 1,
                'numb' => 4,
                'content' => 'What is the process by which plants create their own food called?',
                'answer_1' => 'Photosynthesis',
                'answer_2' => 'Cellular respiration',
                'answer_3' => 'Digestion',
                'answer_4' => 'Metabolism',
                'correct_answer' => 1
            ),
            // Thêm các câu hỏi và các đáp án tương ứng ở đây
        );
        // Trả về thông tin của học sinh được yêu cầu dưới dạng chuỗi JSON
        header('Content-type: application/json');
        echo json_encode($questions[$question]);
    }
    public function save_anwser(){
        $numb_question = $_POST['numb_question'];
        $answer = $_POST['answer'];
        $data = Session::data('test');
        $data['answer'][$numb_question] = $answer;
        Session::delete('test');
        Session::data('test', $data);
    }
    public function submit_result(){
        // Nộp bài
        // Gọi danh sách câu trả lời trong Session::data['test']['answer'];
        //
    }
    public function show_result()
    {
        echo '<pre>';
        print_r(Session::data('test'));
        echo '</pre>';
    }
    public function reset_result()
    {
        Session::delete('test');
    }
}
