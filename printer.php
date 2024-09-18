<?php  
class Print_tool {  

    public $speed;
    public $amount_pages;
    public $time;

    function __construct($speed, $amount_pages) {
        $this->speed = $speed;
        $this->amount_pages = $amount_pages;
    }

    function printing_time($speed) {  
        $this->time = $this->amount_pages / $speed;  
    }

    function inform()
    {
        echo "<br>Пристрій введення завершив роботу.<br>";
    }
}  

class Scanner extends Print_tool {     

    public $speed;

    function __construct($time, $amount_pages, $speed = 4) {
        parent::__construct($time, $amount_pages);  
        $this->speed = $speed; 
    }

    function printing_time($speed = null) { 
        if ($speed === null) {
            $speed = $this->speed;  
        }
        parent::printing_time($speed); 
    }

    function __destruct() {
        echo "Сканер завершив роботу.<br>";
    }
}  


$b = new Scanner(3, 12); 
$b->printing_time(2); 

?>
