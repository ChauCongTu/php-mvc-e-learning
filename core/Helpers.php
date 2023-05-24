<?php
class Helpers {
    /**
     * redirect to $url
     * 
     * 
     */
    public static function redirectTo(string $url){
        header("Location: ". $url);
        exit;
    }
}
?>