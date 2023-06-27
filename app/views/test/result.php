<section class="test">
    <div class="container pt-4 pb-4 text-center">
        <h1>Kết quả</h1>
        <p class="score"><?php echo $result['score']; ?></p>
        <p class="numb_question">Số câu đúng: <?php echo $result['true_question']; ?>/<?php echo $result['total_question']; ?></p>
        <a href="/thi-truc-tuyen" class="btn btn-light btn-lg border mt-2"><i class="fa-solid fa-arrow-left me-2"></i>Quay lại</a>
    </div>
</section>