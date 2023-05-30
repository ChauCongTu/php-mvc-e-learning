<?php
class Helpers {
    /**
     * Redirect to URL
     * @access    public
     * @param string
     * @return    void
     */
    public static function redirect_to(string $url){
        header("Location: ". $url);
        exit;
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
    public static function displayTime($timeString) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = strtotime($timeString);
        $timeDiff = time() - $time;
        if ($timeDiff < 60) {
            return 'vừa xong';
        } elseif ($timeDiff < 3600) {
            $diff = round($timeDiff / 60);
            return "{$diff} phút trước";
        } elseif ($timeDiff < 86400) {
            $diff = round($timeDiff / 3600);
            return "{$diff} giờ trước";
        } else {
            $diff = round($timeDiff / 86400);
            return "{$diff} ngày trước";
        }
    }
    /**
     * Pagination
     * @access    public
     *  
     * 
     */
    public static function pagination($totalRecords, $recordsPerPage, $currentPage) {
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
}
?>