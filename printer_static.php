<?php  
class Print_tool {  

    protected $speed;
    protected $amount_pages;
    protected $time;  

        // Статичне поле
        public static $device_count = 0;

    function __construct($speed, $amount_pages) {
        $this->speed = $speed;
        $this->amount_pages = $amount_pages;
        self::$device_count++;
    }

    function printing_time($speed) {  
        $this->time = $this->amount_pages / $speed;  
    }
    public static function getDeviceCount() {
        return self::$device_count;
    }


    function __destruct() {
        echo "<br>Пристрій введення завершив роботу.<br>";
    }
}  

class Scanner extends Print_tool {     

    protected $speed;
    protected $color_scan;

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

$b1 = new Scanner(66, 3, true); 
$b2 = new Scanner(50, 2, false); 
$b3 = new Scanner(25,1,true);


$b1->printing_time();  
$b1->inform();
$b2->printing_time();  
$b2->inform();


$b3->printing_time();  
$b3->inform();

// Викликаємо статичний метод для отримання кількості пристроїв
echo "Кількість створених пристроїв: " . Print_tool::getDeviceCount() . "<br>";
?>
