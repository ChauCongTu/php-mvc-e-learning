<?php
class Template {
    private $content = null;
    public function run ($content, $data = []){
        extract($data);
        $this->content = $content;
        
        $this->printEntities();
        $this->printRaw();

        eval(' ?> '.$this->content.' <?php ');
    }

    /**************************
     * Print Entities
     * use {{$variable}} in View
     * similar <?php echo htmlentities($variable); ?>
     * 
     **************************/
    public function printEntities(){
        preg_match_all('~{{\s*(.+?)\s*}}~is', $this->content, $matches);
        if (!empty($matches[1])){
            foreach ($matches[1] as $key => $item){
                $this->content = str_replace($matches[0][$key], '<?php echo htmlentities('.$item.'); ?>', $this->content);
            }
        }
    }
     /**************************
     * Print Raw
     * use {{$variable}} in View
     * similar <?php echo $variable; ?>
     * 
     **************************/
    public function printRaw(){
        preg_match_all('~{!\s*(.+?)\s*!}~is', $this->content, $matches);
        if (!empty($matches[1])){
            foreach ($matches[1] as $key => $item){
                $this->content = str_replace($matches[0][$key], '<?php echo '.$item.'; ?>', $this->content);
            }
        }
    }
}
?>