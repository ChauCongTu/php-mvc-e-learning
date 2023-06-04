<?php
class Test extends Controller
{
    public $data = [];
    public $model = 'TestModel';
    public function index()
    {
        $this->data['sub_content']['grade_10'] = $this->model($this->model)->getExam(10);
        $this->data['sub_content']['grade_11'] = $this->model($this->model)->getExam(11);
        $this->data['sub_content']['grade_12'] = $this->model($this->model)->getExam(12);
        $this->data['page_title'] = 'Thi Tiếng Anh trực tuyến';
        $this->data['content'] = 'test/index';
        $this->render('layouts/client-layout', $this->data);
    }
    public function list($grade = 10)
    {
        $this->data['sub_content']['test'] = $this->model($this->model)->getExam($grade);
        $this->data['sub_content']['grade'] = $grade;
        $this->data['page_title'] = 'Thi Tiếng Anh trực tuyến | Bộ đề lớp 10';
        $this->data['content'] = 'test/list';
        $this->render('layouts/client-layout', $this->data);
    }
    public function add($grade)
    {
        $this->data['sub_content']['grade'] = $grade;
        if (Session::data('User') == null) {
            Helpers::redirect_to('/dang-nhap.html');
        } else {
            if (isset($_POST['create_submit'])) {
                $request = new Request();
                $request->rules([
                    'title' => 'required',
                    'size' => 'required',
                    'time' => 'required'
                ]);
                $request->message([
                    'title.required' => '*Vui lòng nhập tiêu đề',
                    'size.required' => '*Vui lòng nhập số câu',
                    'time.required' => '*Vui lòng nhập thời gian làm bài'
                ]);
                $validate = $request->validate();
                if (!$validate) {
                    $this->data['sub_content']['errors'] = $request->errors();
                    $this->data['page_title'] = 'Trang Web học Tiếng Anh trực tuyến';
                    $this->data['content'] = 'test/add';
                    $this->render('layouts/client-layout', $this->data);
                } else {
                    $data = array(
                        'grade' => $grade,
                        'title' => $_POST['title'],
                        'time' => $_POST['time'],
                        'size' => $_POST['size'],
                        'question' => []
                    );
                    Session::data('test', $data);
                    $this->data['sub_content']['test'] = $data;
                    $this->data['page_title'] = 'Trang Web học Tiếng Anh trực tuyến';
                    $this->data['content'] = 'test/start_add';
                    $this->render('layouts/client-layout', $this->data);
                }
            } else {
                $question = 1;
                $this->data['page_title'] = 'Trang Web học Tiếng Anh trực tuyến';
                $this->data['content'] = 'test/add';
                $this->render('layouts/client-layout', $this->data);
            }
        }
    }
    public function process_add_question()
    {
        if (isset($_POST['add_submit'])) {
            $data = Session::data('test');
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            $this->model($this->model)->addExams($data['grade'], $data['title'], $data['size'], $data['time']);
            $exam_id = $this->model($this->model)->getLastId();
            for ($i = 1; $i <= $data['size']; $i++) {
                $data['question'] = array(
                    $i => array(
                        'numb' => $i,
                        'content' => $_POST['content_' . $i . ''],
                        'answer_1' => $_POST['answer_1_' . $i . ''],
                        'answer_2' => $_POST['answer_2_' . $i . ''],
                        'answer_3' => $_POST['answer_3_' . $i . ''],
                        'answer_4' => $_POST['answer_4_' . $i . ''],
                        'correct_answer' => $_POST['correct_' . $i . ''],
                    )
                );
                $this->model($this->model)->addQuestion($exam_id, $i, $data['question'][$i]['content'], $data['question'][$i]['answer_1'], $data['question'][$i]['answer_2'], $data['question'][$i]['answer_3'], $data['question'][$i]['answer_4'], $data['question'][$i]['correct_answer']);
            }
            Helpers::redirect_to("/test");
        }
    }
    public function detail($slug,   $exam_id)
    {
        $exam_id = filter_var($exam_id, FILTER_SANITIZE_NUMBER_INT);
        $this->data['sub_content']['test'] = $this->model($this->model)->getExamById($exam_id);
        $this->data['sub_content']['ranking'] = $this->model($this->model)->getRanking($exam_id);
        Session::data('exam_id', $exam_id);
        if (isset($_POST['start'])) {
            $data = array(
                'key' => Helpers::generate_key(32),
                'exam_id' => $exam_id,
                'user_id' => Session::data('User')['user_id'],
                'user_name' => Session::data('User')['name'],
                'size' => $this->data['sub_content']['test']['size'],
                'answer' => []
            );
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

        $exam_id = intval(Session::data('exam_id'));
        $questions = $this->model($this->model)->getQuestions($exam_id);

        header('Content-type: application/json');
        echo json_encode($questions[$question - 1]);
    }
    public function save_anwser()
    {
        $numb_question = $_POST['numb_question'];
        $answer = $_POST['answer'];
        $data = Session::data('test');
        $data['answer'][$numb_question] = $answer;
        Session::data('test', $data);
        header('Content-type: application/json');
        echo json_encode(Session::data('test'));
    }
    public function submit_result()
    {
        if (isset($_POST['submit_result'])) {
            // Nộp bài
            // Gọi danh sách câu trả lời trong Session::data['test']['answer'];
            $point_per_question = 10 / Session::data('test')['size'];
            $score = 0;
            $answer_sheet = Session::data('test')['answer'];
            $barem = [];
            $true_question = 0;
            $data = $this->db->table('questions')->where('exam_id', '=', Session::data('test')['exam_id'])->get();
            foreach ($data as $value) {
                $barem[$value['numb']] = $value['correct_answer'];
            }
            for ($i = 1; $i <= count($barem); $i++) {
                if (isset($answer_sheet[$i])) {
                    if ($barem[$i] == $answer_sheet[$i]) {
                        $score += $point_per_question;
                        $true_question ++;
                    }
                }
            }
            $this->model($this->model)->saveResult(Session::data('test')['user_id'], Session::data('test')['user_name'], Session::data('test')['exam_id'], $score);
            $this->data['sub_content']['result'] = array(
                'true_question' => $true_question,
                'total_question' => Session::data('test')['size'],
                'score' => $score
            );
            $this->data['page_title'] = 'Trang Web học Tiếng Anh trực tuyến';
            $this->data['content'] = 'test/result';
            $this->render('layouts/client-layout', $this->data);
        }
        else {
            echo 'Có lỗi xảy ra!';
        }
    }
    public function show_result()
    {
        echo '<pre>';
        print_r(Session::data('test'));
        echo '</pre>';
    }
}
