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
            <div class="col-md-6 mb-2">
                <form action="" method="post">
                    <textarea name="textToTranslate" class="textToTranslate" rows="10"><?php echo (isset($textToTranslate) ? $textToTranslate : false); ?></textarea>
                    <button type="submit" name="translate" id="button" class="btn btn-danger float-end w-25"><i class="fa-solid fa-arrow-right-arrow-left"></i> Dịch</button>
                </form>
            </div>
            <div class="col-md-6">
                <textarea rows="10" class="result" disabled><?php echo (isset($translated_text) ? $translated_text : false); ?></textarea>
            </div>
        </div>
    </div>
</section>