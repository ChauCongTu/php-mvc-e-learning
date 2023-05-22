<html>
    <form method="post" action="">
        <textarea name="textToTranslate" rows="5"><?php echo (isset($_POST["textToTranslate"]))? $_POST["textToTranslate"]:"";?></textarea>
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

?>