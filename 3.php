<?php
header("Content-Type: text/html; charset=utf-8");

abstract class Country {
    public $area;
    public $population;
    public $language;

    public function __construct($area, $population, $language) {
        $this->area = $area;
        $this->population = $population;
        $this->language = $language;
    }

    public function show() {
        echo "<p>Area: " . $this->area . "</p>";
        echo "<p>Population: " . $this->population . "</p>";
        echo "<p>Language: " . $this->language . "</p>";
    }

    public function search($field, $value) {
        if (property_exists($this, $field)) {
            if ($this->$field == $value) {
                return true;
            }
        }
        return false;
    }

    abstract public function Analyze();

    public function __destruct() {
        echo "Objects are deleted!";
    }
}

abstract class Area_classification extends Country {
    protected $mark;

    public function __construct($area, $population, $language, $mark) {
        parent::__construct($area, $population, $language);
        $this->mark = $mark;
    }

    public function Analyze() {
        if ($this->area > 10000) {
            echo "<p>Це середня Країна</p>";
            $this->mark++;
        } elseif ($this->area < 10000) {
            echo "<p>Це маленька Країна</p>";
            $this->mark--;
        } else {  
            echo "<p>Це велика Країна</p>";
            $this->mark += 2;
        }
    }
}


class SpecificCountry extends Area_classification {

}

$object1 = new SpecificCountry(45339, "1,349 мільйона", "Естонська", 1);
$object2 = new SpecificCountry(208, "36 469 тисяч", "Французька", 1);
$object1->show();

$object1->Analyze();


unset($object1);

$object2->show();

$object2->Analyze();


unset($object2);
?>
