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

    function inform() {
        echo "Час, необхідний для сканування заданої кількості сторінок: $this->time секунд.<br>";  
    }

    function __destruct() {
        echo "<br>Пристрій введення завершив роботу.<br>";
    }
}  

class Scanner extends Print_tool {     

    public $speed;

    function __construct($time, $amount_pages, $speed = 3) {
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



$b = new Scanner(null, 66); 
$b->printing_time();  
$b->inform();
?>
