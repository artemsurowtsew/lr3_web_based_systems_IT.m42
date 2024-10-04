<?php  
// Оголошення інтерфейсу для пристроїв введення
interface InputDevice {
    public function getSpeed();
    public function getAmountPages();
}

// Оголошення інтерфейсу для скануючих пристроїв
interface Scannable {
    public function printing_time($speed);
    public function inform();
}

// Базовий клас - пристрій введення інформації, який реалізує інтерфейс InputDevice
class Print_tool implements InputDevice {  
    protected $speed;
    protected $amount_pages;
    protected $time;  

    // Конструктор з параметрами
    function __construct($speed, $amount_pages) {
        $this->speed = $speed;
        $this->amount_pages = $amount_pages;
    }

    // Реалізація методів інтерфейсу InputDevice
    public function getSpeed() {
        return $this->speed;
    }

    public function getAmountPages() {
        return $this->amount_pages;
    }

    // Метод для розрахунку часу друку (сканування)
    public function printing_time($speed) {  
        $this->time = $this->amount_pages / $speed;  
    }

    // Деструктор
    function __destruct() {
        echo "<br>Пристрій введення завершив роботу.<br>";
    }
}  

// Похідний клас - Сканер, що реалізує інтерфейси InputDevice та Scannable
class Scanner extends Print_tool implements Scannable {     

    protected $color_scan;

    // Конструктор з параметрами
    function __construct($amount_pages, $speed = 3, $color_scan = false) {
        parent::__construct($speed, $amount_pages);  
        $this->color_scan = $color_scan;  
    }

    // Метод для розрахунку часу друку (сканування) з урахуванням кольорового сканування
    public function printing_time($speed = null) { 
        if ($speed === null) {
            $speed = $this->speed;  
        }

        // Якщо сканування кольорове, швидкість знижується вдвічі
        if ($this->color_scan) {
            $speed /= 2; 
            echo "Кольорове сканування активне. Швидкість знижена.<br>";
        }
        parent::printing_time($speed); 
    }

    // Метод для відображення інформації про сканування
    public function inform() {
        echo "Час, необхідний для сканування заданої кількості сторінок: $this->time секунд.<br>";  
        if ($this->color_scan) {
            echo "Час для сканування однієї сторінки збільшено через кольорове сканування!<br>"; 
        }
    }

    // Деструктор
    function __destruct() {
        echo "Сканер завершив роботу.<br>";
    }
}  

// Створення об'єкту сканера з параметрами
$b1 = new Scanner(66, 3, false);  
$b1->printing_time();  
$b1->inform();

// Створення об'єкту сканера з кольоровим скануванням
$b2 = new Scanner(150, 2, true);
$b2->printing_time();  
$b2->inform();
?>
