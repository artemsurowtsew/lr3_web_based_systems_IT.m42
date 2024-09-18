<?php  
class Print_tool {  

    protected $speed;
    protected $amount_pages;
    protected $time;  

    function __construct($speed, $amount_pages) {
        $this->speed = $speed;
        $this->amount_pages = $amount_pages;
    }

    function printing_time($speed) {  
        $this->time = $this->amount_pages / $speed;  
    }

    function __destruct() {
        echo "<br>Пристрій введення завершив роботу.<br>";
    }
}  

class Scanner extends Print_tool {     

    public $speed;
    public $color_scan;

    function __construct($amount_pages, $speed = 3, $color_scan = false) {
        parent::__construct($speed, $amount_pages);  
        $this->color_scan = $color_scan;  
    }

    function printing_time($speed = null) { 
        if ($speed === null) {
            $speed = $this->speed;  
        }

        if ($this->color_scan) {
            $speed /= 2; 
            echo "Кольорове сканування активне. Швидкість знижена.<br>";
        }
        parent::printing_time($speed); 
    }

    function inform() {
        echo "Час, необхідний для сканування заданої кількості сторінок: $this->time секунд.<br>";  
        if ($this->color_scan) {
            echo "Час для сканування однієї сторінки збільшено через кольорове сканування!<br>"; 
        }
    }

    function __destruct() {
        echo "Сканер завершив роботу.<br>";
    }
}  

$b = new Scanner(66, 3, false);  
$b->printing_time();  
$b->inform();
?>
