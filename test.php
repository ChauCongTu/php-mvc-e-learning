<!-- <html>
    <form method="post" action="">
        <textarea name="textToTranslate" rows="5"><?php echo (isset($_POST["textToTranslate"])) ? $_POST["textToTranslate"] : ""; ?></textarea>
        <select name="languagePair">
            <option value="vi">Anh sang Việt</option>
            <option value="en">Việt sang Anh</option>
        </select>
        <button name = "translate">Dịch</button>
    </form>
</html>
<?php
if (isset($_POST["translate"])){
    $textToTranslate = $_POST["textToTranslate"];
    $languagePair = $_POST["languagePair"];

    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=".$languagePair."&dt=t&q=" . rawurlencode($textToTranslate);

    $response = file_get_contents($url);

    // echo '<pre>';
    // print_r($response);
    // echo '</pre>';

    // chuyển đổi kết quả dạng JSON thành đối tượng
    $result = json_decode($response);

    // echo '<pre>';
    // print_r($result[0]);
    // echo '</pre>';
    if ($result[0] == null) {
        echo 'Vui lòng nhập đoạn văn hoặc cụm từ, không sử dụng kí tự đặc biệt';
    }
    else {
        $translatedText = "";
        foreach ($result[0] as $values){
            $translatedText = $translatedText . htmlspecialchars($values[0], ENT_QUOTES, 'UTF-8') . "<br/>";
        }
        echo $translatedText;
    }

}

?> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<?php 
function pagination($totalRecords, $recordsPerPage, $currentPage, $currentUrl) {
    $totalPages = ceil($totalRecords / $recordsPerPage);
    $pagination = '';
    if ($totalPages > 1) {
        $pagination .= '<nav class="text-center"><ul class="pagination">';
        $disabled = ($currentPage == 1) ? 'disabled' : '';
        $previousPage = ($currentPage > 1) ? ($currentPage - 1) : 1;
        $pagination .= '<li class="page-item ' . $disabled . '">';
        $pagination .= '<a class="page-link" href="' . $currentUrl . '?page=' . $previousPage . '">';
        $pagination .= '«</a></li>';
        for ($i = 1; $i <= $totalPages; $i++) {
            $active = ($i == $currentPage) ? 'active' : '';
            $pagination .= '<li class="page-item ' . $active . '">';
            $pagination .= '<a class="page-link" href="' . $currentUrl . '?page=' . $i . '">' . $i . '</a></li>';
        }
        $disabled = ($currentPage == $totalPages) ? 'disabled' : '';
        $nextPage = ($currentPage < $totalPages) ? ($currentPage + 1) : $totalPages;
        $pagination .= '<li class="page-item ' . $disabled . '">';
        $pagination .= '<a class="page-link" href="' . $currentUrl . '?page=' . $nextPage . '">';
        $pagination .= '»</a></li>';
        $pagination .= '</ul></nav>';
    }
    return $pagination;
}


$data = [
    ['id' => 1, 'name' => 'Nhơn'],
    ['id' => 2, 'name' => 'Nam'],
    ['id' => 3, 'name' => 'Mai'],
    ['id' => 4, 'name' => 'Hoàng'],
    ['id' => 5, 'name' => 'Thế Anh'],
    ['id' => 6, 'name' => 'Nam'],
    ['id' => 7, 'name' => 'Mai'],
    ['id' => 8, 'name' => 'Hoàng'],
    ['id' => 9, 'name' => 'Thế Anh'],
    // ... nhiều hơn
 ];
 
 $recordsPerPage = 3;
 $totalRows = count($data);
 $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
 $currentUrl = $_SERVER['PHP_SELF'];
 
 $start = ($currentPage - 1) * $recordsPerPage;
 $end = $start + $recordsPerPage;
 
 $pagedData = array_slice($data, $start, $recordsPerPage);
 
 // Hiển thị các bản ghi trên trang hiện tại
 foreach ($pagedData as $record) {
     echo $record['id'].$record['name'] . '<br>';
 }
 
 // Tạo phân trang
 echo pagination($totalRows, $recordsPerPage, $currentPage, $currentUrl);
 


?>