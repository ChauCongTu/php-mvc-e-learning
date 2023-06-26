<section class="translate">
    <div class="pb-3 pt-3 container">
        <div class="h2"><i class="fa-solid fa-language"></i> Công cụ dịch tiếng anh</div>
        <?php
        if ($type_translate == 0) {
            echo '<div class="fw-bold">Chế độ: </div><a href="/dich/anh-viet">Anh -> Việt</a> | <a href="/dich/viet-anh" class="fw-bold">Việt -> Anh</a>';
        } else {
            echo '<div class="fw-bold">Chế độ: </div><a href="/dich/anh-viet" class="fw-bold">Anh -> Việt</a> | <a href="/dich/viet-anh">Việt -> Anh</a>';
        }
        ?>
        <div class="row mt-2">
            <input type="hidden" id="type_translate" value="<?php echo $type_translate; ?>">
            <div class="col-md-6 mb-2">
                <form action="" method="post">
                    <textarea name="textToTranslate" class="textToTranslate" id="input" rows="10"></textarea>
                </form>
            </div>
            <div class="col-md-6">
                <textarea rows="10" class="result" id="output" disabled></textarea>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        var type = $('#type_translate').val();
        console.log(type);
        $('#input').on('input', function() {
            // Xử lý sự kiện khi nội dung bị thay đổi
            console.log($('#input').val());
            var inputVal = $('#input').val();
            $.ajax({
                url: '/home/translate_ajax',
                type: 'post',
                data: {
                    inputVal: inputVal,
                    type: type
                },
                dataType: 'json',
                success: function (data) { 
                    $('#output').val(data.result);
                }
            });
        });
    });
</script>