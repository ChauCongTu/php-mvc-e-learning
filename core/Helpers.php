<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
class Helpers
{
    /**
     * Redirect to URL
     * @access    public
     * @param string
     * @return    void
     */
    public static function redirect_to(string $url)
    {
        header("Location: " . $url);
        exit;
    }

    public static function current_url()
    {
        $currentURL = 'http';
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $currentURL .= "s";
        }
        $currentURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $currentURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $currentURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $currentURL;
    }

    /**
     * Convert string to slug
     * @access    public
     * @param string
     * @return    string
     */
    public static function to_slug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
    /**
     * Display datetime format $time ago
     * @access    public
     * @param  string 
     * @return    string
     */
    public static function displayTime($timeString)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = strtotime($timeString);
        $timeDiff = time() - $time;
        if ($timeDiff < 60) {
            return 'mới đây';
        } elseif ($timeDiff < 3600) {
            $diff = round($timeDiff / 60);
            return "{$diff} phút trước";
        } elseif ($timeDiff < 86400) {
            $diff = round($timeDiff / 3600);
            return "{$diff} giờ trước";
        } elseif ($timeDiff < 2592000) {
            $diff = round($timeDiff / 86400);
            return "{$diff} ngày trước";
        } elseif ($timeDiff < 31536000) {
            $diff = round($timeDiff / 2592000);
            return "{$diff} tháng trước";
        } else {
            $diff = round($timeDiff / 31536000);
            return "{$diff} năm trước";
        }
    }

    /**
     * Pagination
     * @access    public
     *  
     * 
     */
    public static function pagination($totalRecords, $recordsPerPage, $currentPage)
    {
        $totalPages = ceil($totalRecords / $recordsPerPage);
        $pagination = '';
        if ($totalPages > 1) {
            $pagination .= '<ul class="pagination justify-content-center" style="margin:20px 0">';
            $disabled = ($currentPage == 1) ? 'disabled' : '';
            $previousPage = ($currentPage > 1) ? ($currentPage - 1) : 1;
            $pagination .= '<li class="page-item ' . $disabled . '">';
            $pagination .= '<a class="page-link" href="?page=' . $previousPage . '">';
            $pagination .= '«</a></li>';
            for ($i = 1; $i <= $totalPages; $i++) {
                $active = ($i == $currentPage) ? 'active' : '';
                $pagination .= '<li class="page-item ' . $active . '">';
                $pagination .= '<a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
            }
            $disabled = ($currentPage == $totalPages) ? 'disabled' : '';
            $nextPage = ($currentPage < $totalPages) ? ($currentPage + 1) : $totalPages;
            $pagination .= '<li class="page-item ' . $disabled . '">';
            $pagination .= '<a class="page-link" href="?page=' . $nextPage . '">';
            $pagination .= '»</a></li>';
            $pagination .= '</ul>';
        }
        return $pagination;
    }

    public static function translate($textToTranslate, $from, $to)
    {
        $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=" . $from . "&tl=" . $to . "&dt=t&q=" . rawurlencode($textToTranslate);
        $response = file_get_contents($url);
        $result = json_decode($response);
        if ($result[0] == null) {
            return false;
        } else {
            $translatedText = "";
            foreach ($result[0] as $values) {
                $translatedText = $translatedText . htmlspecialchars($values[0], ENT_QUOTES, 'UTF-8');
            }
            return $translatedText;
        }
    }
    public static function generate_key($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $string .= $characters[$randomIndex];
        }

        return $string;
    }
    public static function display_role($role = 0)
    {
        if ($role == 0)
            return '<span class="r-member"> - Thành viên</span>';
        else if ($role == 1)
            return '<span class="r-mod"> <img src="/public/Image/icon/iconsaotim.png"/> Mod</span>';
        else if ($role == 2)
            return '<span class="r-cm"> <img src="/public/Image/icon/iconsaoxanhla.png"/> Content Manager</span>';
        else if ($role == 3)
            return '<span class="r-admin"> <img src="/public/Image/icon/iconsaodo.png"/> Admin</span>';
        else
            return '<span class="r-banned"> <i class="fa-solid fa-lock"></i> Banned</span>';
    }
    public static function sendMail($receiver, $subject, $content)
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP(); // gửi mail SMTP
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->Username = 'skyland.0410@gmail.com'; // SMTP username
            $mail->Password = 'nspqpitfdumeaeao';
            $mail->Port = 587; // TCP port to connect to
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->setLanguage('vi', '/optional/path/to/language/directory/');
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64'; //hoặc 8bit, hoặc quoted-printable
            $mail->ContentType = 'text/html';
            //Recipients
            $mail->setFrom('admin@chaucongtu.site', '[EnglishWeCan] Cộng đồng học tiếng Anh trực tuyến');
            $mail->addAddress($receiver); // Add a recipient
            // $mail->addAddress('ellen@example.com'); // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $content;
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
