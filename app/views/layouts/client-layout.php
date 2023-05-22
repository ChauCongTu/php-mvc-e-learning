<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo ($page_title != null) ? "E-Learning - " . $page_title : "NShop - Trang không có tiêu đề"; ?></title>
    <meta name="description" content="Mua sắm trực tuyến với đa dạng sản phẩm, từ quần áo đến thiết bị điện tử. Mua bán trực tuyến tiện lợi và an toàn với NShop">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="NShop, Mua bán trực tuyến, Giá rẻ, Deal giá shock, Thời trang, Điện tử, Nội thất">
    <meta name="robots" content="index, follow">
    <meta name="author" content="JoshCQN Team">
    <meta name="generator" content="PHP MVC">
    <!-- Open Graph tags -->
    <meta property="og:title" content="E-Learning - Trang Web học và thi tiếng Anh trực tuyến">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:image" content="https://yourwebsite.com/images/og-image.jpg">
    <meta property="og:description" content="Mua sắm trực tuyến với đa dạng sản phẩm, từ quần áo đến thiết bị điện tử. Mua bán trực tuyến tiện lợi và an toàn với NShop">
    <link rel="icon" type="image/x-icon" href="~/Content/Images/favicon.png">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css" />
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/assets/css/app.css" />
</head>
<?php $this->render('blocks/header'); ?>
<body>
    <?php
        if (!empty($sub_content)) {
            $this->render($content, $sub_content);
        } else {
            $this->render($content);
        }
    ?>
</body>

<?php $this->render('blocks/footer'); ?>